<?php
require_once(__DIR__.'/../utils.php');
forceConnection('login');

Class Comment{
    private $_id;
    private $_article_id;
    private $_comment;
    private $_author;
    private $_creation_date;
    private $_moderated;
    private $_report;

    public function getId(){
        return $this->_id;
    }

    public function getArticleId(){
        return $this->_article_id;
    }

    public function getComment(){
        return $this->_comment;
    }

    public function getAuthor(){
        return $this->_author;
    }

    public function getCreationDate(){
        return $this->_creation_date;
    }

    public function getModerated(){
        return $this->_moderated;
    }
    
    public function getReport(){
        return $this->_report;
    }

    public function setId($id){
        $this->_id = $id;
    }

    public function setArticleId($articleId){
        $this->_article_id = $articleId;
    }

    public function setComment($comment){
        $this->_comment = $comment;
    }

    public function setAuthor($author){
        $this->_author = $author;
    }

    public function setCreationDate($creationDate){
        $this->_creation_date = $creationDate;
    }

    public function setModerated($moderated){
        $this->_moderated = $moderated;
    }
    public function setReport($report){
        $this->_report = $report;
    }
}