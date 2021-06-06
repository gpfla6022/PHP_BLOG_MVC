<?php
$pageTitle = "BOARD LIST";
require_once __DIR__ . '/../header.php';
?>
<h1> BOARD LIST </h1>
<hr>
<?php foreach ($boards as $board) { 
    $detailPath = "detail.php?id=${board['id']}";
    ?>
    <span>게시판 번호 : <?=$board['id']?> </span><br>
    <span>게시판 이름 : <a href="<?=$detailPath?>"><?=$board['name']?></a></span>
    <hr>
<?php } ?>
<div>
    <a href="add.php">게시판 생성</a>
</div>
<?php
require_once __DIR__ . '/../footer.php';
?>