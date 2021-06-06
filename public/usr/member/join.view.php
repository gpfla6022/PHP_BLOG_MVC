<?php
$pageTitle = "회원가입";
require_once __DIR__ . '/../header.php';
?>
<div>
    회원가입
</div>
<div>
    <form action="doJoin.php" method="POST">
        <table>
            <tr>
                <td>아이디</td>
                <td><input required type="text" name="memId" autocomplete="off"></td>
            </tr>
            <tr>
                <td>비밀번호</td>
                <td><input required type="password" name="memPW" autocomplete="off"></td>
            </tr>
            <tr>
                <td>이름</td>
                <td><input required type="text" name="memName" autocomplete="off"></td>
            </tr>
            <tr>
                <td>닉네임</td>
                <td><input required type="text" name="memNick" autocomplete="off"></td>
            </tr>
            <tr>
                <td>이메일</td>
                <td><input required type="email" name="memEmail" autocomplete="off"></td>
            </tr>
            <tr>
                <td>전화번호</td>
                <td><input required type="text" name="memPHNum" autocomplete="off"></td>
            </tr>
        </table>
        <input type="submit" value="가입">
    </form>
    <a href="../../index.php"><button>취소</button></a>
</div>