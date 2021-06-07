<?php
class APP__ReplyService {

    # 인스턴스 변수 선언
    private APP__ReplyRepository $replyRepository;

    # 인스턴스 변수 초기화
    function __construct(){
        
        global $App__replyRepository;

        $this -> replyRepository = $App__replyRepository;

    }

    # 댓글 테이블 리턴
    function getReplies($articleId) {
        return $this -> replyRepository -> getReplies($articleId);
    }

    # 댓글 작성 메소드
    function writeReply($articleId, $memIndex, $body) {
        return $this -> replyRepository -> writeReply($articleId, $memIndex, $body);
    }

    # 댓글 삭제 메소드
    function deleteReply($id) {
        return $this -> replyRepository -> deleteReply($id);
    }

    # 댓글 수정 메소드
    function modifyReply($id, $body) {
        return $this -> replyRepository -> modifyReply($id, $body);
    }



}