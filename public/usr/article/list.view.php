<?php
$pageTitle = "ARTICLE LIST";
require_once __DIR__ . '/../header.php';
?>
<h1>ARTICLE LIST</h1>
<hr>
<?php foreach ($articles as $article){
    $detailPath = "detail.php?id=${article['id']}";
    ?>
    <span>게시물 번호 : <?=$article['id']?></span><br>
    <span>제목 : <?=$article['title']?></span><br>
    <span>작성일 : <?=$article['regDate']?></span>
    <a href="detail.php">게시물 상세보기</a> 
    <hr>
<?php } ?>
<div>
    <a href="write.php">게시물 생성</a>
</div>
<?php
require_once __DIR__ . '/../footer.php';
?>

