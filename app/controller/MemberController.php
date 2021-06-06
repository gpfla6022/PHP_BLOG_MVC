<?php
class APP__UsrMemberController {

    # Service 객체를 인스턴스 변수로서 사용
    private APP__MemberService $memberService;

    # 생성자
    function __construct(){
        # 전역변수(객체) 서비스 호출
        global $App__memberService;
        
        # 이 인스턴스의 $APP__memberService 는 전역변수로 초기화
        $this -> memberService = $App__memberService;

    }

    # 로그인을 위한 페이지 생성
    function actionShowLogin() {
        require_once App__getViewPath("usr/member/login");
    }

    # 회원가입을 위한 페이지 생성
    function actionShowJoin() {
        require_once App__getViewPath("usr/member/join");
    }

    function actionDoJoin() {

        # 변수 수취
        $memId = $_REQUEST['memId'];
        $memPW = $_REQUEST['memPW'];
        $memName = $_REQUEST['memName'];
        $memNick = $_REQUEST['memNick'];
        $memEmail = $_REQUEST['memEmail'];
        $memPHNum = $_REQUEST['memPHNum'];

        $this -> memberService -> joinMember($memId, $memPW, $memName, $memNick, $memEmail, $memPHNum);

        BackToPath("/../../index.php","$memNick 님 환영합니다!");
    }

    # 로그인 메소드
    function actionDoLogin() {

        # 로그인 정보 확인
        if ( !isset($_REQUEST['userId']) ) {
            BackToHistory("아이디를 입력하여 주시기 바랍니다.");
        } else {
            $memId = $_REQUEST['userId'];
        }
        if ( !isset($_REQUEST['userPW']) ) {
            BackToHistory("비밀번호를 입력하여 주시기 바랍니다.");
        } else {
            $memPW = $_REQUEST['userPW'];
        }

        # member 변수에 해당 회원 배열 할당
        $member = $this -> memberService -> loginMember($memId, $memPW);

        # 빈 배열일 경우, 인덱스로 복귀
        if ( empty($member) ) {
            BackToHistory(" 아이디 혹은 비밀번호가 일치하지 않습니다. ");
            exit;
        }

        # 세션에 회원번호 할당
        $_SESSION['logonMember'] = $member['id'];
        # 인덱스로 복귀
        backToPath("/../../index.php","{$member['memNick']}님 환영합니다! ");

    }

    # 로그아웃 메소드
    function actionDoLogout() {
        # 세션 변수 해제
        unset($_SESSION['logonMember']);
        BackToPath("/../../index.php", " 로그아웃 되셨습니다. ");
    }

    # 회원정보 수정 메소드
    function actionDoModify() {

        # 기입 정보 확인
        if ( !isset($_REQUEST['memPW']) ) {
            BackToHistory("비밀번호를 입력하여 주시기 바랍니다.");
        } else {
            $memPW = $_REQUEST['memPW'];
        }

        # 변수 수취
        $memNick = $_REQUEST['memNick'];
        $memEmail = $_REQUEST['memEmail'];
        $memPHNum = $_REQUEST['memPHNum'];
        $id = $_SESSION['logonMember'];

        # 수정 실행
        $this -> memberService -> modifyMember($id, $memPW, $memNick, $memEmail, $memPHNum);


        # 인덱스로 복귀
        backToPath("/../../index.php","회원정보가 수정되었습니다!");

    }

    # 회원정보 수정 페이지 생성
    function actionShowModify() {

        # 로그인 되어있는 회원의 번호 수집
        $id = $_SESSION['logonMember'];

        # 생성할 페이지의 정보 준비
        $member = $this -> memberService -> getMemberByIndex($id);

        require_once App__getViewPath("usr/member/modify");
    }

    # 회원 탈퇴 메소드
    function actionDoDelete() {

        # 로그인 되어있는 회원의 번호 수집
        $id = $_SESSION['logonMember'];

        # 해당 회원 정보 삭제 후, 삭제상태로 변환
        $this -> memberService -> deleteMember($id);

        # 강제 로그아웃
        unset($_SESSION['logonMember']);

        # 인덱스 페이지로 복귀
        backToPath("/../../index.php","그동안 감사했습니다.");

    }




}