<?php
# 컨트롤러로 요청(Response)이 도달하기 전 요청을 가로채서
# 필요조건이 충족되었나 체크하는 기능을 갖고 있는 것이 인터셉터이다.

# 인터셉터가 명령을 가로채기 전 실행할 함수( 초기화 )
function App__runBeforeActionInterceptor($action) {

    # 로그인한 맴버의 객체를 획득하기 위하여
    # 맴버 서비스 객체를 호출
    global $App__memberService;

    # 로그인한 회원과 관련된 정보 변수
    # 선언 및 초기화
    $_REQUEST['App__islogon'] = false;
    $_REQUEST['App__logonMemberIndex'] = 0;
    $_REQUEST['App__logonMember'] = null;

    # 만일 로그인으로 세션변수에 값이 있다면
    if ( isset($_SESSION['logonMember']) ) {

        # 로그인 한 회원의 정보 수취
        ##  로그인 여부 (Bool)
        $_REQUEST['App__islogon'] = true;
        ##  로그인한 회원의 회원번호(int) == SESSION 변수의 값과 동일
        $_REQUEST['App__logonMemberIndex'] = intval($_SESSION['logonMember']);
        ##  로그인한 회원의 array
        $_REQUEST['App__logonMember'] = $App__memberService -> getMemberByIndex($_REQUEST['App__logonMemberIndex']);
    }
}

function App__runNeedLoginInterCeptor($action) {

    # switch - case 문의 응용
    # switch 구문안의 경우를 제외하곤 if문의 조건을 요구한다.
    # switch 구문의 조건을 만나면 함수를 종료(return)
    # 그렇지 않으면 if문을 실행
    switch ( $action ) {
        case 'usr/member/login':
        case 'usr/member/doLogin':
        case 'usr/member/join':
        case 'usr/member/doJoin':
        case 'usr/board/list';
        case 'usr/board/detail';
            return;
    }

    if ( $_REQUEST['App__islogon'] == false ) {
        BackToHistory("로그인 후 이용하여 주시기 바랍니다.");
    }

}

function App__runNeedLogoutInterceptor($action) {

    # switch - case 문의 응용
    # switch 구문을 만난다면 밖에있는 if문을 실행
    # 그렇지 않다면, 함수를 종료
    switch ( $action ) {
        case 'usr/member/login':
        case 'usr/member/doLogin':
        case 'usr/member/join':
        case 'usr/member/doJoin':
            break;
        default:
            return;
    }


    # switch 구문 안의 경우엔 로그인을 한 상태로 이용할수 없는 기능으로
    # 제한하기 위하여 사용하는 인터셉터의 기능
    if ( $_REQUEST['App__islogon'] ) {
        BackToHistory("이미 로그인 되어있는 상태입니다.");
    }


}

# 인터셉터 작동 함수
function App__runInterCeptor($action) {

    App__runBeforeActionInterceptor($action);
    App__runNeedLoginInterCeptor($action);
    App__runNeedLogoutInterceptor($action);

}

