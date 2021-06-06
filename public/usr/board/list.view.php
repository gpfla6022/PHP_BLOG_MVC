<?php
$pageTitle = "TEST BLOG :: 게시판 리스트";
require_once __DIR__ . '/../header.php';
?>
<h1> 게시판 리스트 </h1>

<?php foreach ($boards as $board) { 
    $detailPath = "detail.php?id=${board['id']}";
    ?>
    <span>번호 : <?=$board['id']?> </span>
    <a href="<?=$detailPath?>"><?=$board['name']?></a>
    <hr>
<?php } ?>
<div>
    기능 
</div>
<hr>
<div>
    <a href="add.php">게시판 생성</a>
</div>
<?php
require_once __DIR__ . '/../footer.php';
?>