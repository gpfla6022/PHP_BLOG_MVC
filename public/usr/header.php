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
<!-- 폰트어썸 불러오기 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">   

<!-- 테일윈드 불러오기 -->    
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1/dist/tailwind.min.css" rel="stylesheet" type="text/css" />
<!-- 데이지 UI 불러오기 테일윈드 필요 -->    
    <link href="https://cdn.jsdelivr.net/npm/daisyui@1.3.2/dist/full.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/resource/common.css">
</head>
<body>
<div class="navbar mb-2 bg-base-300 rounded-box">
  <div class="flex-1 px-2 lg:flex-none">
    <a class="text-lg font-bold">
            CODERSCODE
          </a>
        
</div> 
    <div class="flex justify-end flex-1 px-2">
    <div class="dropdown dropdown-end">
            <div tabindex="0" class="btn btn-ghost rounded-btn">CODE</div> 
            <ul class="shadow menu dropdown-content bg-base-100 rounded-box w-52">
            <li>
                <a>PYTHON</a>
            </li> 
            <li>
                <a>KOTLIN</a>
            </li> 
            <li>
                <a>PHP</a>
            </li>
            </ul>
        </div>
        <div>
            <div class="dropdown dropdown-end">
            <div tabindex="0" class="btn btn-ghost rounded-btn">ME</div> 
            <ul class="shadow menu dropdown-content bg-base-100 rounded-box w-52">
            <li>
                <a>login</a>
            </li> 
            <li>
                <a>logout</a>
            </li> 
            <li>
                <a>none</a>
            </li>
            </ul>
            </div>
        </div>
    </div>
</div> 

<?php if ( isset($_SESSION['logonMember']) ) { ?>
    <section>
        <a href="../member/doLogout.php">로그아웃</a><br>
        <a href="../member/modify.php">정보수정</a><br>
        <a href="../member/doDelete.php">회원탈퇴</a><br>
        <a href="../article/write.php">글작성</a>
    </section>
<?php } else { ?>
    <section>
        <a href="../member/login.php">로그인</a>
        <a href="../member/join.php">회원가입</a>
    </section>
<?php } ?>
<section>
    <hr>
    <a href="../board/list.php">홈</a>
</section>