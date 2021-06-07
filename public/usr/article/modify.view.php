<?php
$pageTitle = "게시글 수정";
require_once __DIR__ . '/../header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../webinit.php';
$boardService = new APP__BoardService();
$boards = $boardService -> getForPrintBoards();
$articleId = $_REQUEST['articleId'];
?>
<div>
    <h1>
        게시글 수정
    </h1>
</div>
<div>
    <form action="doModify.php">
        <input type="hidden" name="memIndex" value="<?=$_SESSION['logonMember']?>">
        <input type="hidden" name="articleId" value="<?=$articleId?>">
        게시판 선택 : 
        <select name="boardIndex"> 
            <?php foreach($boards as $board) { 
                if ($_SESSION['admin'] == 1 ) {?>
                    <option value="<?=$board['id']?>"><?=$board['name']?></option>
                <?php }
                if ($_SESSION['admin'] != 1) {
                    if ($board['writeAuth'] == 1) {?>
                        <option value="<?=$board['id']?>"><?=$board['name']?></option>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </select>
        <table>
            <tr>
                <td>게시글 제목</td>
                <td><input required type="text" name="title" autocomplete="off"></td>
            </tr>
        </table>
        <div>
            <p>게시글 내용</p>
            <div>
                <textarea name="body" cols="30" rows="10"></textarea>
            </div>
        </div>
        <input type="submit" value="수정">
    </form>
    <a href="../../index.php"><button>취소</button></a>
</div>
<?php
require_once __DIR__ . '/../footer.php';
?>
