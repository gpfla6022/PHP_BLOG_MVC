# 데이터베이스 생성
CREATE DATABASE `php_my_blog`;


# 데이터베이스 사용
USE `php_my_blog`;

# 테이블 조회
SHOW TABLES;

# 계정 생성
GRANT ALL PRIVILEGES
ON *.*
TO `cookie`@`%`
IDENTIFIED BY 'delicious';

# 테이블 생성
CREATE TABLE `member`(
    `id` INT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `memId` CHAR(50) NOT NULL,
    `memPW` CHAR(100) NOT NULL,
    `memNick` CHAR(100) NOT NULL,
    `memName` CHAR(7) NOT NULL,
    `memPHNum` CHAR(20) NOT NULL,
    `memEmail` CHAR(50) NOT NULL,
    `admin` BOOL NOT NULL,
    `delStatus` BOOL NOT NULL,
    `regDate` DATETIME NOT NULL,
    `updateDate` DATETIME NOT NULL
);

# 테스트 회원 생성
INSERT INTO `member`
SET `memId` = 'admin',
`memPW` = '1',
`memName` = '관리자',
`memNick` = '관리자',
`memPHNum` = '010-2134-1234',
`memEmail` = 'admin@admin.com',
`admin` = TRUE,
`delStatus` = FALSE,
`regDate` = NOW(),
`updateDate` = NOW();

INSERT INTO `member`
SET `memId` = 'user1',
`memPW` = '1',
`memName` = '고길동',
`memNick` = '길동',
`memPHNum` = '010-2134-1234',
`memEmail` = 'yesman@yes24.com',
`admin` = FALSE,
`delStatus` = FALSE,
`regDate` = NOW(),
`updateDate` = NOW();

# 게시판 테이블 생성
CREATE TABLE `board`(
    `id` INT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` CHAR(20) NOT NULL,
    `memId` INT(20) NOT NULL,
    `writeAuth` BOOL NOT NULL,
    `regDate` DATETIME NOT NULL,
    `updateDate` DATETIME NOT NULL
);

# 테스트 게시판 생성
INSERT INTO `board`
SET `name` = '공지',
`memId` = 1,
`writeAuth` = FALSE,
`regDate` = NOW(),
`updateDate` = NOW();

INSERT INTO `board`
SET `name` = '자유',
`memId` = 1,
`writeAuth` = TRUE,
`regDate` = NOW(),
`updateDate` = NOW();

# 게시물 테이블 생성
CREATE TABLE `article`(
    `id` INT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `title` CHAR(50) NOT NULL,
    `body` TEXT NOT NULL,
    `regDate` DATETIME NOT NULL,
    `updateDate` DATETIME NOT NULL,
    `memIndex` INT(20) UNSIGNED NOT NULL,
    `boardIndex` INT(20) UNSIGNED NOT NULL
);

# 테스트 게시물 생성
INSERT INTO `article`
SET `title` = '1st',
`body` = '1sttt',
`regDate` = NOW(),
`updateDate` = NOW(),
`memIndex` = 1,
`boardIndex` = 1;

INSERT INTO `article`
SET `title` = '2nd',
`body` = '2nddd',
`regDate` = NOW(),
`updateDate` = NOW(),
`memIndex` = 1,
`boardIndex` = 1;

SELECT * 
FROM `board`
ORDER BY `id` DESC;
