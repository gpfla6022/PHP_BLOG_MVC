<?php
class APP__UsrBoardController {

    # 인스턴스 변수 선언
    private APP__BoardService $boardService;

    # 인스턴스 변수 초기화
    function __construct(){
        
        # 전역변수 호출
        global $App__boardService;
        $this -> boardService = $App__boardService;

    }

    function actionDoAdd(){

        # 변수 수취
        $name = getStrValue($_REQUEST['name'],"");
        $memId = getIntValue($_REQUEST['memId'],0);
        $writeAuth = getBoolValue($_REQUEST['writeAuth'],null);

        # 변수값 확인
        if ( !$name ) {
            BackToHistory("게시판 이름을 입력하여 주십시오.");
        }
        if ( $memId == 0 or $memId != 1 ) {
            BackToHistory("잘못된 접근입니다.");
        }
        if ( $writeAuth == null ) {
            BackToHistory("게시글 작성권한을 설정하여 주십시오.");
        }

        # 게시판 상세보기로 돌려보내기 위한 인덱스값 수취
        $id = $this -> boardService -> addBoard($name, $memId, $writeAuth);

        # 생성된 게시판으로 복귀
        BackToPath("/../../index.php","게시판이 성공적으로 생성되었습니다.");

    }

    # 게시판 리스트 페이지 생성 메소드
    function actionShowList(){

        # 페이지 생성에 필요한 내용을 담은 변수
        $boards = $this -> boardService -> getForPrintBoards();


        require_once App__getViewPath("usr/board/list");
    }

    # 게시판 추가 페이지 생성
    function actionShowAdd() {
        require_once App__getViewPath("usr/board/add");
    }

    # 게시판 상세페이지 생성
    function actionShowDetail() {

        $id = getIntValue($_REQUEST['id'], 0);

        if ( $id == 0 ) {
            BackToPath("/../../index.php","잘못된 접근 입니다.");
        }

        $board = $this -> boardService -> getBoardByIndex($id);
        
        require_once App__getViewPath("usr/board/detail");
    }

}