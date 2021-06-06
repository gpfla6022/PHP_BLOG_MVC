<?php
class APP__ArticleService{

    private APP__ArticleRepository $articleRepository;

    function __construct(){

        global $App__articleRepository;
        $this -> articleRepository = $App__articleRepository;
    }

    function getForPrintArticles(){
        return $this -> articleRepository -> getForPrintArticles();
    }

    function articleWrite($memIndex, $title, $body){
        return $this -> articleRepository -> articleWrite($memIndex, $title, $body);
    }

    function getBoardByIndex($id) {
        return $this -> articleRepository -> getArticleByIndex($id);
    }
}

?>