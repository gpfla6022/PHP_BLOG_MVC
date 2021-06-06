<?php
$pagetitle = "ARTICLE WRITE";
require_once __DIR__ . '/../header.php';
?>
<h1>ARTICLE WRITE</h1>
<hr>
<div>
    <form action="doWrite.php">
        <input type="hidden" name = "memIndex"  value="<?=$_SESSION['logonMember']?>">
        <table>
            <tr>
                <td>게시물 제목</td>
                <td><input type="text" name = "title" autocomplete="off"></td>
            </tr>
            <tr>
                <td>게시물 내용</td>
                <td><input type="text" name = "body" autocomplete="off"></td>
            </tr>
        </table>
        <input type="submit" value="확인">
        <hr>
        <!--<input type="submit" value="삭제">
        <input type="submit" value="수정">-->
    </form>
    <a href="../../index.php"><button>취소</button></a>
</div>
<?php
require_once __DIR__ . '/../footer.php';
?> 