<?php
$pageTitle = "TEST BLOG :: " . $board['name'] . " 게시판";
require_once __DIR__ . '/../header.php';
?>
<h1> <?=$board['name']?>게시판 상세정보 </h1>
<div>
    <a href="/usr/article/write.php">게시물 생성</a>
</div>

<?php
require_once __DIR__ . '/../footer.php';
?>