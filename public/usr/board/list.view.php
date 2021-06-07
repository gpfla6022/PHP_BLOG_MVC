<?php
$pageTitle = "게시판 리스트";
require_once __DIR__ . '/../header.php';
?>
<h1> 게시판 리스트 </h1>

<?php foreach ($boards as $board) { 
    $detailPath = "../article/list.php?id=${board['id']}";
    ?>
    <span>번호 : <?=$board['id']?> </span><br>
    <a href="<?=$detailPath?>"><?=$board['name']?> 게시판</a>
    <hr>
<?php } ?>
<div>
    <a href="add.php">게시판 생성</a>
</div>
<?php
require_once __DIR__ . '/../footer.php';
?>