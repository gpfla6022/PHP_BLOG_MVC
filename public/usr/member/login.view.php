<?php
$pageTitle = "로그인";
require_once __DIR__ . '/../header.php';
?>
<h1>
    로그인
</h1>
<form action="doLogin.php" method="POST">
    <table>
        <tr>
            <td>아이디</td>
            <td><input required type="text" autocomplete="off" name="userId"></td>
        </tr>
        <tr>
            <td>비밀번호</td>
            <td><input required type="password" autocomplete="off" name="userPW"></td>
        </tr>
    </table>
    <input type="submit" value="로그인">
</form>
    <a href="../../index.php">취소</a>
<?php
require_once __DIR__ . '/../footer.php';
?>