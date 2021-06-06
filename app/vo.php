<?php
# 관련있는 데이터를 모아놓은 것 
# VO는 value object의 약자이다

class ResultData {

    # 인스턴스 변수
    private string $errorCode;

    # 생성자
    function __construct($code){
        
        # 에러코드를 외부에서 주입받는다.
        $this -> errorCode = $code;

    }

    # swich 구문을 이용한 코드별 에러메세지 출력
    function getMsg($errorCode) {

        switch( str_starts_with( $errorCode , "S-" ) ){

            case 1 :
                $msg = "로그인 회원과 작성회원이 동일합니다.";
                return $msg;
            default :
                $msg = "성공";
        }

        switch( str_starts_with( $errorCode , "F-") ) {

            case 1 :
                $msg = "로그인 회원과 작성회원이 일치하지 않습니다.";
                return $msg;
            default :
                $msg = "권한이 없습니다";
                return $msg;
        }


    }







}