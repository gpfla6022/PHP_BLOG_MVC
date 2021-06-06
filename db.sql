# 데이터베이스 생성
CREATE DATABASE `php_2021`;

# 데이터베이스 사용
USE `php_2021`;

# 계정 생성
GRANT ALL PRIVILEGES
ON *.*
TO `lucky`@`%`
IDENTIFIED BY 'guy';

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