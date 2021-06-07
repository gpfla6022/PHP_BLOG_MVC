<?php
$pageTitle = $article['title'] . " 상세보기 ";
require_once __DIR__ . '/../header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../webinit.php';
$memberService = new APP__MemberService();
$relyService = new APP__ReplyService();
$replies = $relyService -> getReplies($article['id']);
?>
<h1> 글제목 :  <?=$article['title']?>  </h1>
<hr>
내용 : <?=$article['body']?><br>
글쓴회원번호 : <?=$article['memIndex']?> 
<hr>
<a href="modify.php?articleId=<?=$article['id']?>">수정</a>
<a href="doDelete.php?id=<?=$article['id']?>">삭제</a>
<hr>
<?php
require_once __DIR__ . '/../reply/write.php';
?>
<hr>
<h2> 댓글 목록</h2>
<?php foreach( $replies as $reply ) { 
    $member = $memberService -> getMemberByIndex($reply['memIndex']);?>
    작성자 : <?=$member['memNick']?><br>
    댓글 : <?=$reply['body']?>
    <hr>
    <a href="/usr/reply/modify.php?articleId=<?=$article['id']?>">수정</a>
    <a href="/usr/reply/doDelete.php?id=<?=$article['id']?>">삭제</a>
<hr>
<?php } ?>
<?php
require_once __DIR__ . '/../footer.php';
?>
