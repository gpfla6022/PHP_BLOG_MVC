<?php
# 전역적으로 사용할 수 있도록 MVC 호출
## 리포지터리 호출
require_once __DIR__ . '/Repository/MemberRepository.php';
require_once __DIR__ . '/Repository/BoardRepository.php';

## 서비스 호출
require_once __DIR__ . '/service/MemberService.php';
require_once __DIR__ . '/service/BoardService.php';

## 컨트롤러 호출
require_once __DIR__ . '/controller/MemberController.php';
require_once __DIR__ . '/controller/BoardController.php';

## 전역변수 호출
require_once __DIR__ . '/global.php';

## 인터셉터 호출
require_once __DIR__ . '/interceptor.php';

## VO 호출

# MVC에서 사용할 메소드 생성
## .view.php 파일 경로를 스트링으로 리턴
function App__getViewPath ( $viewSort ) {
    return __DIR__ . '/../public/' . $viewSort . '.view.php';
}

## 어플리케이션 실행
### 링크형태의 action을 실행할 수 있도록 가공하는 메소드
function App__runAction ( $action ) {
    
    # 인자 action(주소)를 3분할 (/)을 기준으로
    list( $controllerType, $controllerName, $actionName ) = explode( '/', $action );

    # 불러올 컨트롤러 클래스 이름 변수에 할당
    $controllerClassName = "APP__" . ucfirst($controllerType) . ucfirst($controllerName) . "Controller";
    #            APP_   APP_Usr                     APP_UsrMember                APP_UsrMemberController

    # action메소드의 이름을 초기화 (어미에 action)
    $actionMethodName = "action";

    # 만일 메소드의 이름이 do로 시작하면 Do~~ 로 바꿔서 action과 합침
    if ( str_starts_with( $actionName, "do" ) ) {
        $actionMethodName .= ucfirst($actionName);
    } else {
        # 만일 do 가 없으면 Show를 붙이고 첫글자 대문자로
        $actionMethodName .= "Show" . ucfirst($actionName);
    }

    # 사용자가 걸러낸 컨트롤러 이름을 객체로 만들어 할당
    $usrCustomController = new $controllerClassName();
    
    # 사용자가 걸러낸 메소드를 클래스에서 사용
    $usrCustomController -> $actionMethodName();
}

# 인터셉터로 action(링크)를 보낸뒤 자격 체크 후
# 어플리케이션 실행
function App__run($action) {

    # action을 인터셉터로 먼저 보냄( 인터셉터가 요청 가로챔 )
    App__runInterCeptor($action);
    # 인터셉터를 통과한 요청을 실행함
    App__runAction($action);

}