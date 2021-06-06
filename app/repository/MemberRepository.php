<?php
class APP__MemberRepository {

    # 회원가입 메소드
    function joinMember($memId, $memPW, $memName, $memNick, $memEmail, $memPHNum) {
        
        # 객체 생성
        $sql = new DB__SeqSql();

        # 쿼리문 작성
        $sql -> add("INSERT INTO `member`");
        $sql -> add("SET `memId` = ?", $memId);
        $sql -> add(",`memPW` = ?", $memPW);
        $sql -> add(",`memName` = ?", $memName);
        $sql -> add(",`memNick` = ?", $memNick);
        $sql -> add(",`memEmail` = ?", $memEmail);
        $sql -> add(",`memPHNum` = ?", $memPHNum);
        $sql -> add(",`admin` = FALSE");
        $sql -> add(",`delStatus` = FALSE");
        $sql -> add(",`regDate` = NOW()");
        $sql -> add(",`updateDate` = NOW();");
        
        # 인덱스값 수집
        $id = DB__insert($sql);
        
        # 인덱스값 반환
        return $id;

    }

    # 로그인 메소드
    function getMemberByMemIdAndMemPW($memId, $memPW) :array|null {
        # 객체 생성
        $sql = new DB__SeqSql;
        # 쿼리 바인딩
        $sql -> add("SELECT *");
        $sql -> add("FROM `member`");
        $sql -> add("WHERE `memId` = ?", $memId);
        $sql -> add("AND `memPW` = ?", $memPW);

        # 쿼리 리턴
        return DB__getRow($sql);

    }

    # 회원수정 메소드
    function modifyMember($id ,$memPW, $memNick, $memEmail, $memPHNum) {
    
        # 객체 생성
        $sql = new DB__SeqSql();

        # 쿼리문 작성
        $sql -> add("UPDATE `member`");
        $sql -> add("SET `memPW` = ?", $memPW);
        $sql -> add(",`memNick` = ?", $memNick);
        $sql -> add(",`memEmail` = ?", $memEmail);
        $sql -> add(",`memPHNum` = ?", $memPHNum);
        $sql -> add(",`memEmail` = ?", $memEmail);
        $sql -> add(",`updateDate` = NOW()");
        $sql -> add("WHERE `id` = ?",$id);
        
        DB__execute($sql);
    }

    # 로그인 정보로 회원정보 조회 메소드
    function getMemberByLogonMember($id) {
        # 객체 생성
        $sql = new DB__SeqSql;
        # 쿼리 바인딩
        $sql -> add("SELECT *");
        $sql -> add("FROM `member`");
        $sql -> add("WHERE `id` = ?", $id);

        # 쿼리 리턴
        return DB__getRow($sql);

    }

    # 회원탈퇴 메소드
    function DeleteMember($id) {
    
        # 객체 생성
        $sql = new DB__SeqSql();

        # 쿼리문 작성
        $sql -> add("UPDATE `member`");
        $sql -> add("SET `memId` = ' '");
        $sql -> add(",`memPW` = ' '");
        $sql -> add(",`memName` = ' '");
        $sql -> add(",`memNick` = ' '");
        $sql -> add(",`memPHNum` = ' '");
        $sql -> add(",`memEmail` = ' '");
        $sql -> add(",`regDate` = ' ' ");
        $sql -> add(",`updateDate` = ' '");
        $sql -> add(",`admin` = FALSE");
        $sql -> add(",`delStatus` = TRUE");
        $sql -> add("WHERE `id` = ?",$id);
        
        DB__execute($sql);
    }



}
