<?php
$logonMember = $_SESSION['logonMember'];
$articleId = $_REQUEST['id'];
?>
<h2>댓글쓰기</h2>
<form action="/../usr/reply/doWrite.php" method="POST">
    <input type="hidden" name="memIndex" value="<?=$logonMember?>">
    <input type="hidden" name="articleId" value="<?=$articleId?>">
    댓글 :
    <textarea required name="body" cols="30" rows="10"></textarea>
    <input type="submit" value ="작성">
</form>
