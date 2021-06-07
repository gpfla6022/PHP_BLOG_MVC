<?php
class APP__ReplyRepository {

    # 댓글 테이블 리턴 메소드
    function getReplies($articleId) {

        $sql = new DB__SeqSql();
        $sql -> add("SELECT *");
        $sql -> add("FROM `reply`");
        $sql -> add("WHERE `articleId` = ?",$articleId);
        $sql -> add("ORDER BY `id` DESC;");

        return DB__getRows($sql);

    }

    # 댓글 작성 메소드
    function writeReply($articleId, $memIndex, $body) {

        $sql = new DB__SeqSql();
        $sql -> add("INSERT INTO `reply`");
        $sql -> add("SET `articleId` = ?", $articleId);
        $sql -> add(", `memIndex` = ?", $memIndex);
        $sql -> add(", `body` = ?", $body);
        $sql -> add(", `regDate` = NOW()");
        $sql -> add(", `updateDate` = NOW();");

        return DB__execute($sql);

    }

    # 댓글 삭제 메소드
    function deleteReply($id) {

        $sql = new DB__SeqSql();
        $sql -> add("DELETE FROM `reply`");
        $sql -> add("WHERE `id` = ?", $id);

        return DB__execute($sql);

    }

    # 댓글 수정 메소드
    function modifyReply($id, $body) {

        $sql = new DB__SeqSql();
        $sql -> add("UPDATE `reply`");
        $sql -> add("SET `body` = ?", $body);
        $sql -> add(", `updateDate` = NOW()");
        $sql -> add("WHERE `id` = ?", $id);

        return DB__execute($sql);

    }



}