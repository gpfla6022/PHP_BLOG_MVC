<?php
$pageTitle = "게시판 생성";
require_once __DIR__ . '/../header.php';
?>
<h1>
    게시판 생성
</h1>
<div>
    <form action="doAdd.php" meth1="get">
        <input type="hidden" name="memId" value="<?=$_SESSION['logonMember']?>">
        <table>
            <tr>
                <td>게시판 이름</td>
                <td><input required type="text" name="name" autocomplete="off"></td>
            </tr>
        </table>
        <select name="writeAuth">
            <option value="false">관리자만 글쓰기 허용</option>
            <option value="true">모든 이용자 글쓰기 허용</option>
        </select>
        <input type="submit" value="생성">
    </form>
    <a href="../../index.php"><button>취소</button></a>
</div>
<?php
require_once __DIR__ . '/../footer.php';
?>
