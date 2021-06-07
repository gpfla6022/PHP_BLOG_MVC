<?php
$islogon = $_REQUEST['App__islogon'];
$logonMemberIndex = $_REQUEST['App__logonMemberIndex'];
$logonMember = $_REQUEST['App__logonMember'];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$pageTitle?></title>
</head>
<body>
<h1>
    CODERSCODE
</h1>
<hr>
<div>
    <?php if ( isset($_SESSION['logonMember']) ) { ?>
        <div>
            <a href="../member/doLogout.php">로그아웃</a><br>
            <a href="../member/modify.php">정보수정</a><br>
            <a href="../member/doDelete.php">회원탈퇴</a><br>
            <a href="../article/write.php">글작성</a>
        </div>
    <?php } else { ?>
        <div>
            <a href="../member/login.php">로그인</a>
            <a href="../member/join.php">회원가입</a>
        </div>
    <?php } ?>
</div>
<hr>
<a href="../board/list.php">홈</a>