# 데이터베이스 생성
CREATE DATABASE `php_2021`;

# 데이터베이스 사용
USE `php_2021`;

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
`memName` = '김동일',
`memNick` = '구피구버',
`memPHNum` = '010-2134-1234',
`memEmail` = 'yesman@yes24.com',
`admin` = FALSE,
`delStatus` = FALSE,
`regDate` = NOW(),
`updateDate` = NOW();

DROP TABLE `board`;

DESC `board`;

# 게시판 테이블 생성
CREATE TABLE `board`(
    `id` INT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` CHAR(20) NOT NULL,
    `memId` INT(20) NOT NULL,
    `writeAuth` CHAR(20) NOT NULL,
    `regDate` DATETIME NOT NULL,
    `updateDate` DATETIME NOT NULL
);

# 테스트 게시판 생성
INSERT INTO `board`
SET `name` = '공지',
`memId` = 1,
`writeAuth` = 0,
`regDate` = NOW(),
`updateDate` = NOW();

INSERT INTO `board`
SET `name` = '자유',
`memId` = 1,
`writeAuth` = 1,
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
SET `title` = '공지사항',
`body` = '테스트용 공지사항 입니다',
`regDate` = NOW(),
`updateDate` = NOW(),
`memIndex` = 1,
`boardIndex` = 1;

INSERT INTO `article`
SET `title` = '두번째 공지사항',
`body` = '테스트용 공지사항 입니다',
`regDate` = NOW(),
`updateDate` = NOW(),
`memIndex` = 1,
`boardIndex` = 1;

# 댓글 테이블 생성
CREATE TABLE `reply`(
    `id` INT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `articleId` INT(20) UNSIGNED NOT NULL,
    `memIndex` INT(20) UNSIGNED NOT NULL,
    `body` TEXT NOT NULL,
    `regDate` DATETIME NOT NULL,
    `updateDate` DATETIME NOT NULL
);

SELECT *
FROM `reply`;