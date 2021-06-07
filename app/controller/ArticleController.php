<?php
class APP__UsrArticleController {

    # 인스턴스 변수 선언
    private APP__ArticleService $articleService;
    
    # 인스턴스 변수 생성
    function __construct(){
        
        global $App__articleService;
        $this -> articleService = $App__articleService;

    }

    # 게시글 작성 페이지 생성
    function actionShowWrite() {
        require_once App__getViewPath("usr/article/write");
    }

    # 게시글 작성 메소드
    function actionDoWrite() {
        
        # 글 작성관련 변수 수취
        $title = getStrValue($_REQUEST['title'],"");
        $body = getStrValue($_REQUEST['body'],"");
        $memIndex = getIntValue($_SESSION['logonMember'],0);
        $boardIndex = getIntValue($_REQUEST['boardIndex'],0);

        # 정보 확인
        if ( empty($title) ) {
            BackToPath("/../../index.php","제목을 입력하여 주시기 바랍니다.");
        }
        
        if ( empty($body) ) {
            BackToPath("/../../index.php","내용을 입력하여 주시기 바랍니다.");
        }

        if ( $memIndex == 0) {
            BackToPath("/../../index.php","잘못된 접근입니다.");
        }

        if ( $boardIndex == 0 ) {
            BackToPath("/../../index.php","잘못된 접근입니다.");
        }

        # 글번호 리턴
        $id = $this -> articleService -> writeArticle($title,$body,$memIndex,$boardIndex);

        # 해당 게시글로 복귀
        BackToPath("/../../usr/article/detail.php?id=$id","게시글이 성공적으로 작성되었습니다.");
    }

    # 게시물 리스트 페이지 생성
    function actionShowList() {

        # 게시물이 소속된 게시판 번호를 보기 위함
        $boardIndex = $_REQUEST['id'];

        # 페이지에 사용할 게시물 목록
        $articles = $this -> articleService -> getArticlesByBoardIndex($boardIndex);

        require_once App__getViewPath("usr/article/list");
    }

    # 게시물 상세 페이지 생성
    function actionShowDetail() {

        # 게시물 번호 받아오기
        $id = $_REQUEST['id'];

        # 게시물 정보 불러오기
        $article = $this -> articleService -> getArticleByArticleIndex($id);


        require_once App__getViewPath("usr/article/detail");

    }

    # 게시물 수정 페이지 생성
    function actionShowModify() {

        $id = $_REQUEST['articleId'];

        require_once App__getViewPath("usr/article/modify");

    }

    # 게시물 수정 메소드
    function actionDoModify() {
        
        # 변수 수취
        $id = $_REQUEST['articleId'];
        $boardIndex = $_REQUEST['boardIndex'];
        $title = $_REQUEST['title'];
        $body = $_REQUEST['body'];

        # 게시물 정보 불러오기
        $article = $this -> articleService -> getArticleByArticleIndex($id);
        
        # 정보확인
        if ($_SESSION['admin'] != true) {
            
            if ( $article['memIndex'] == $_REQUEST['memIndex']) {
                $memIndex = $_REQUEST['memIndex'];    
            }
        
            if ( $article['memIndex'] != $_REQUEST['memIndex'] ) {
                backToHistory("권한이 없습니다.");
            }

        }

        if ($_SESSION['admin'] == true) {
            $memIndex = $_REQUEST['memIndex'];
        }

        $this -> articleService -> modArticle($id, $title, $body, $boardIndex);

        # 해당 게시글로 복귀
        BackToPath("/../../usr/article/detail.php?id=$id","게시글이 성공적으로 수정되었습니다.");

    }

    # 게시물 삭제 메소드
    function actionDoDelete() {

        # 변수 수취
        $id = $_REQUEST['id'];
        $memIndex = $_REQUEST['memIndex'];

        # 게시물 정보 불러오기
        $article = $this -> articleService -> getArticleByArticleIndex($id);

        # 작성자 일치여부 확인 후 삭제
        if ( $_SESSION['admin'] == true or $article['memIndex'] == $memIndex ) {
            $this -> articleService -> delArticle($id);
            BackToPath("/../../index.php","게시글이 성공적으로 삭제되었습니다.");
            exit;
        } 

        if ( $article['memIndex'] != $memIndex ) {
            BackToHistory("권한이 없습니다.");
            exit;
        }

    }

}