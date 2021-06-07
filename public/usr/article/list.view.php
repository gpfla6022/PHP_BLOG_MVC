<?php
require_once __DIR__ . '/../board/detail.php';
$i =count($articles)+1;
?>
<h2>게시물 목록</h2>
<?php foreach ( $articles as $article ) { ?>
    번호 : <?php echo $i -= 1;?><br>
    <a href="detail.php?id=<?=$article['id']?>">제목 : <?=$article['title']?></a><br>
    <hr>
<?php } ?>
<?php
require_once __DIR__ . '/../footer.php';
?>