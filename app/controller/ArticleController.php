<?php
class APP__UsrArticleController {

    private APP__ArticleService $articleService;

    function __construct(){

        global $App__articleService;
        $this -> articleService = $App__articleService;
    }

    function actionShowList(){

        $articles = $this -> articleService -> getForPrintArticles();

        require_once App__getViewPath("usr/article/list");
    }

    function actionDoWrite(){

        $memIndex = getStrValue($_REQUEST['memIndex'], "");
        $title = getStrValue($_REQUEST['title'], "");
        $body = getStrValue($_REQUEST['body'], "");

        if( !$memIndex ){
            BackToHistory("잘못된 접근입니다.");
        }

        if( !$title ){
            BackToHistory("게시물 제목을 입력하여 주십시오.");
        }

        if( !$body ){
            BackToHistory("게시물 내용을 작성하여 주십시오.");
        }
        
        $id = $this -> articleService -> articleWrite($memIndex, $title, $body);

        BackToPath("/usr/article/list.php", "게시물이 생성되었습니다.");
    }

    function actionShowWrite(){
        require_once App__getViewPath("usr/article/write");
    }

    function actionShowDetail(){

        $id = getIntValue($_REQUEST['id'], 0);

        if( $id == 0 ){
            BackToPath("/../../index.php", "잘못된 접근 입니다.");
        }
        
        $article = $this -> articleService -> getArticleByIndex($id);

        require_once App__getViewPath("usr/article/detail");
    }


}



?>