<?php

class APP__ArticleService{

    private APP__ArticleRepository $articleRepository;

    function __construct(){

        global $App__articleRepository;
        
        $this -> articleRepository = $App__articleRepository;

    }

    # 게시물 작성 메소드
    function writeArticle($title, $body, $memIndex, $boardIndex) {
        return $this -> articleRepository -> writeArticle($title, $body, $memIndex, $boardIndex);
    }

    # 특정 게시물 테이블 불러오기 메소드
    function getArticlesByBoardIndex($boardIndex) {
        return $this -> articleRepository -> getArticlesByBoardIndex($boardIndex);
    }

    # 게시물 상세보기 메소드
    function getArticleByArticleIndex($id) {
        return $this -> articleRepository -> getArticleByArticleIndex($id);
    }

    # 게시물 수정 메소드
    function modArticle($id, $title, $body, $boardIndex) {
        return $this -> articleRepository -> modArticle($id, $title, $body, $boardIndex);
    }

    # 게시물 삭제 메소드
    function delArticle($id) {
        return $this -> articleRepository -> delArticle($id);
    }


}