<?php
class APP__BoardRepository {

    # 게시판 생성 메소드
    function addBoard($name, $memId, $writeAuth){

        $sql = new DB__SeqSql();
        $sql -> add("INSERT INTO `board`");
        $sql -> add("SET `name` = ?", $name);
        $sql -> add(", `memId` = ?", $memId);
        $sql -> add(", `writeAuth` = ?", $writeAuth);
        $sql -> add(", `regDate` = NOW()");
        $sql -> add(", `updateDate` = NOW();");

        $id = DB__insert($sql);

        return $id;
    }

    # 게시판 리스트 메소드
    function getForPrintBoards() {

        $sql = new DB__SeqSql();
        $sql -> add("SELECT *");
        $sql -> add("FROM `board`");

        return DB__getRows($sql);

    }

    # 특정 게시판 조회 메소드
    function getBoardByIndex($id) {

        $sql = new DB__SeqSql;
        $sql -> add("SELECT *");
        $sql -> add("FROM `board`");
        $sql -> add("WHERE `id` = ?",$id);

        return DB__getRow($sql);

    } 





}