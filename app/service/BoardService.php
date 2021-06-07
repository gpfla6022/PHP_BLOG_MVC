<?php
class APP__BoardService {

    # 인스턴스 변수 선언
    private APP__BoardRepository $boardRepository;

    # 인스턴스 변수 초기화
    function __construct(){
        
        # 전역변수(객체) 호출
        global $App__boardRepository;
        $this -> boardRepository = $App__boardRepository;

    }

    # 게시판 추가 메소드 (index값 반환)
    function addBoard($name, $memId, $writeAuth) {
        return $this -> boardRepository -> addBoard($name, $memId, $writeAuth);
    }

    # 게시판 리스트를 위한 테이블 리턴 메소드
    function getForPrintBoards() {
        return $this -> boardRepository -> getForPrintBoards();
    }

    # 게시판 상세사항 메소드
    function getBoardByIndex($id) {
        return $this -> boardRepository -> getBoardByIndex($id);
    }


}