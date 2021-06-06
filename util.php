<?php

class DB__SeqSql{

    # 인스턴스 변수 초기화
    private string $templateStr = "";
    private array $params = [];

    # 쿼리문 수취후 바인딩용 메소드
    function add(string $sqlBit,string $param = null) {

        # 이 인스턴스 안에 있는 변수  templateStr에 
        # 인자로 받은 sqlBit을 더해서 할당
        $this -> templateStr .= " ". $sqlBit;

        # 이 인스턴스 안에 있는 array params에
        # 인자로 받은 param을 삽입
        if ( $param ) {
            $this -> params[] = $param;
        }

        
    }

    # 이 인스턴스에 있는 templateStr을 리턴
    function getTemplate(): string{
        return trim($this->templateStr);
    }

    # 이 인스턴스에 있는 params를 리턴
    function getParams(): array {
        return $this -> params;
    }

    # 이 인스턴스에 있는 params의 갯수를 리턴
    function getParamsCount(): int{
        return count($this->params);
    }

    # 바인딩 시, 인자의 갯수만큼 타입 약자를 리턴
    function getBindTypeLetter():string{

        # 타입 약자를 받을 변수 초기화
        $paramTypesStr = "";

        # params 갯수 할당
        $count = count($this->params);

        # count 만큼 s를 paramtypesStr에 할당
        for ( $i = 0 ; $i < $count ; $i++ ) {
            $paramTypesStr .= "s";
        }

        # paramtypesStr 리턴
        return $paramTypesStr;

    }

}

function DB__getStmtFromSecSql(DB__SeqSql $sql): mysqli_stmt {

    # 전역변수 
    global $dbConn;

    # 쿼리문 준비
    $stmt = $dbConn -> prepare( $sql -> getTemplate() );

    # 쿼리문 바인딩
    if ( $sql -> getParamsCount() ) {
        $stmt -> bind_param( $sql->getBindTypeLetter(), ...$sql -> getParams() );
    }

    # 바인딩된 쿼리문 리턴
    return $stmt;

}

function DB__getRows(DB__SeqSql $sql ) : array {
   
    # 쿼리문 바인딩
    $stmt = DB__getStmtFromSecSql($sql);

    # 쿼리문 실행
    $stmt -> execute();
    
    # 결과 수취
    $result = $stmt->get_result();
    
    # 빈 배열 선언
    $rows = [];

    # 배열에 DB row append
    while ( $row = $result -> fetch_assoc() ) {
        $rows[] = $row;
    }

    # 배열 리턴
    return $rows;

}

function DB__getRow(DB__SeqSql $sql): array|null {

    # sql로 table 전체를 받아옴
    $rows = DB__getRows($sql);

    # 만일 값이 있으면 값 리턴
    if ( isset($rows[0]) ) {
        return $rows[0];
    }

    # 없으면 null 리턴
    return null;
}

# 쿼리문 실행 메소드
function DB__execute( DB__SeqSql $sql ) {
    
    # 바인딩 쿼리문 할당
    $stmt = DB__getStmtFromSecSql($sql);
    
    # 쿼리문 실행
    $stmt->execute();

}

# 쿼리 실행 후 index값 리턴
function DB__insert( DB__SeqSql $sql ) {
    
    # mysqli insert id 메소드를 위한 전역변수
    global $dbConn;

    # 쿼리문 실행 메소드
    DB__execute($sql);

    # 인덱스값 리턴
    return mysqli_insert_id($dbConn);
}

# 경고창 출력
function printAlert($msg) {

    echo ("
    <script>
        alert('${msg}');
    </script>
    ");
    
}

# 경고 출력 후 지정된 경로로 복귀
function BackToPath($path, $msg = null){

    if ($msg) { 
        printAlert($msg);
    }

    echo ("
    <script>
        location.replace('${path}');
    </script>
    ");

}

# 경고 출력 후 이전페이지로 복귀
function BackToHistory($msg = null){

    if( $msg ) {
        printAlert($msg);
    }

    echo ("
    <script>
        history.back();
    </script>
    ");

}

# 문자열 값 존재여부 확인
function getStrValue($value, $default) {

    # 값이 존재하면 문자열로서 리턴
    if (isset($value)) {
        return strval($value);
    }

    # 그렇지 않으면 default값 리턴
    return $default;
}

# 숫자 값 존재여부 확인
function getIntValue($value, $default) {

    # 값이 존재하면 숫자로서 리턴
    if (isset($value)) {
        return intval($value);
    }

    # 그렇지 않으면 default값 리턴
    return $default;
}

# 숫자 값 존재여부 확인
function getBoolValue($value, $default) {

    # 값이 존재하면 숫자로서 리턴
    if (isset($value)) {
        return boolval($value);
    }

    # 그렇지 않으면 default값 리턴
    return $default;
}