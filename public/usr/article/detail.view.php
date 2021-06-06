<?php
$pageTitle = "ARTICLE DETAIL";
require_once __DIR__ . '/../header.php';
?>
<h1><?=$article['id']?>번 게시물 상세보기</h1>
<?php
    foreach ($articles as $article){
        $detailPath = "detail.php?id=${article['id']}";
    ?>
    <span>게시물 번호 : <?=$article['id']?></span><br>
    <span>게시물 제목 : <?=$article['title']?></span><br>
    <span>게시물 내용 : <?=$article['body']?></span><br>
    <span>게시물 작성일 : <?=$article['regDate']?></span><br>
    <span>게시물 수정일 : <?=$article['updateDate']?></span>
    <?php } ?>
<div>
    <a href="list.php">게시물 리스트로 돌아가기</a>
</div>
<?php
require_once __DIR__ . '/../footer.php';
?>