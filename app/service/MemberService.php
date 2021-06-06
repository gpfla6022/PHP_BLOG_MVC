<?php
class APP__MemberService {

    # 인스턴스 변수로서 memberRepository를 호출
    private APP__MemberRepository $memberRepository;

    # 생성자
    function __construct(){
        
        # 전역변수 APP__memberRepository 호출
        global $App__memberRepository;

        # 이 인스턴스의 memberRepository는 전역변수의 객체를 사용하기로 생성
        $this -> memberRepository = $App__memberRepository;
    }

    # 회원가입 메소드
    function joinMember($memId, $memPW, $memName, $memNick, $memEmail, $memPHNum) {
        
        # 인스턴스 변수에 할당된 객체의 joinMember 메소드를 사용하여 리포지터리에서 쿼리문 발송, 
        # 인자 전달
        return $this -> memberRepository -> joinMember($memId, $memPW, $memName, $memNick, $memEmail, $memPHNum);
    }

    # 로그인 메소드
    function loginMember($memId, $memPW) {

        # 인스턴스 변수에 할당된 객체의 loginMember 메소드 이용
        return $this -> memberRepository -> getMemberByMemIdAndMemPW($memId, $memPW);

    }

    # 회원정보 수정 메소드
    function modifyMember($id, $memPW, $memNick, $memEmail, $memPHNum) {
        return $this -> memberRepository -> modifyMember($id, $memPW,$memNick, $memEmail,$memPHNum);
    }

    # 회원번호로 회원정보 조회 메소드
    function getMemberByIndex($id) {
        return $this -> memberRepository -> getMemberByLogonMember($id);
    }

    # 회원 탈퇴 메소드
    function deleteMember($id) {
        return $this -> memberRepository -> deleteMember($id);
    }

}