<?php
class APP__ArticleRepository {

    function getForPrintArticles(){

        $sql = new DB__SeqSql();
        $sql -> add("SELECT *");
        $sql -> add("FROM `article`");

        return DB__getRows($sql);
    }

    function articleWrite($memIndex, $title, $body){

        $sql = new DB__SeqSql();
        $sql -> add("INSERT INTO `article`");
        $sql -> add("SET `title` = ?", $title);
        $sql -> add(", `body` = ?", $body);
        $sql -> add(", `memIndex` = ?", $memIndex);
        $sql -> add(", `regDate` = now()");
        $sql -> add(", `updateDate` = now()");

        $id = DB__insert($sql);

        return $id;

    }

    function getArticleByIndex($id){

        $sql = new DB__SeqSql;
        $sql -> add("SELECT *");
        $sql -> add("FROM `article`");
        $sql -> add("WHERE `id` = ?",$id);

        return DB__getRow($sql); 
    }
}


?>