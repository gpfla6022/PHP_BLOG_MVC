<?php
class APP__UsrReplyController {

    # 인스턴스 변수 선언
    private APP__ReplyService $replyService;

    # 인스턴스 변수 초기화
    function __construct(){
        
        global $App__replyService;

        $this -> replyService = $App__replyService;

    }

    # 댓글 작성 페이지 생성
    function actionShowWrite() {
        require_once App__getViewPath("usr/reply/write");
    }

    # 댓글 작성 메소드
    function actionDoWrite() {

        $articleId = $_REQUEST['articleId'];
        $memIndex = $_REQUEST['memIndex'];
        $body = $_REQUEST['body'];
        
        $this -> replyService -> writeReply($articleId, $memIndex, $body);

        BackToHistory("댓글이 작성되었습니다");

    }

    # 댓글 삭제 메소드 
    function actionDoDelete() {

        $id = $_REQUEST['id'];

        $this -> replyService -> deleteReply($id);

        BackToHistory("댓글이 삭제되었습니다.");

    }

    # 댓글 수정 페이지 생성
    function actionShowReply() {

        require_once App__getViewPath("usr/reply/modify");

    }

    # 댓글 수정 메소드
    function actionDoModify() {

        $id = $_REQUEST['replyId'];        


    }

    # 댓글 리스트 페이지 생성 메소드
    function actionShowList() {

        $relId = $_REQUEST['relId'];

        $replies = $this -> replyService -> getReplies($relId);

        require_once App__getViewPath("usr/reply/list");

    }


}