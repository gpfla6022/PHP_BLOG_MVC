<?php
# 로그인을 위한 세션 시작
session_start();

# 유틸 불러오기
require_once __DIR__ . '/util.php';
require_once __DIR__ . '/app/app.php';

$dbConn = mysqli_connect("127.0.0.1","lucky","guy","php_2021") or die ("DB CONNECTION ERROR");