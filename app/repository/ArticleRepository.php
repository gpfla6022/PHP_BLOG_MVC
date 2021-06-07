<?php
class APP__ArticleRepository{

    # 게시물 작성 메소드
    function writeArticle($title, $body, $memIndex, $boardIndex) {

        $sql = new DB__SeqSql();
        $sql -> add("INSERT INTO `article`");
        $sql -> add("SET `title` = ?",$title);
        $sql -> add(", `body` = ?",$body);
        $sql -> add(", `regDate` = NOW()");
        $sql -> add(", `updateDate` = NOW()");
        $sql -> add(", `memIndex` = ?",$memIndex);
        $sql -> add(", `boardIndex` = ?",$boardIndex);
        
        # 게시물 인덱스값 받기
        $id = DB__insert($sql);

        # 게시물 인덱스값 리턴
        return $id;
    }

    # 특정 게시물 목록 불러오기
    function getArticlesByBoardIndex($boardIndex) {

        $sql = new DB__SeqSql();
        $sql -> add("SELECT *");
        $sql -> add("FROM `article`");
        $sql -> add("WHERE `boardIndex` = ?", $boardIndex);
        $sql -> add("ORDER BY `id` DESC;");

        return DB__getRows($sql);

    }

    # 게시물 번호로 특정 게시물 불러오기
    function getArticleByArticleIndex($id) {

        $sql = new DB__SeqSql();
        $sql -> add("SELECT *");
        $sql -> add("FROM `article`");
        $sql -> add("WHERE `id` = ?", $id);


        return DB__getRow($sql);

    }

    # 게시물 수정하기
    function modArticle($id, $title, $body, $boardIndex) {

        $sql = new DB__SeqSql();
        $sql -> add("UPDATE `article`");
        $sql -> add("SET `title` = ?", $title);
        $sql -> add(", `body` = ?", $body);
        $sql -> add(", `boardIndex` = ?", $boardIndex);
        $sql -> add("WHERE `id` = ?", $id);

        return DB__execute($sql);

    }

    # 게시물 삭제하기
    function delArticle($id) {

        $sql = new DB__SeqSql();
        $sql -> add("DELETE FROM `article`");
        $sql -> add("WHERE `id` = ?", $id);

        return DB__execute($sql);

    }

}