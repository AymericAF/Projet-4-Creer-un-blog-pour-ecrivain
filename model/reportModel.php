<?php
require_once(__DIR__.'/../utils.php');
forceConnection('login');

class Report{
    private $_id;
    private $_comment_id;
    private $_author;
    private $_creation_date;
    private $_reason;

    public function getId(){
        return $this->_id;
    }

    public function getComment_id(){
        return $this->_comment_id;
    }

    public function getAuthor(){
        return $this->_author;
    }

    public function getCreation_date(){
        return $this->_creation_date;
    }

    public function getReason(){
        return $this->_reason;
    }

    public function setId($id){
        $this->_id = $id;
    }

    public function setComment_id($comment_id){
        $this->_comment_id = $comment_id;
    }

    public function setAuthor($author){
        $this->_author = $author;
    }

    public function setCreation_date($creation_date){
        $this->_creation_date = $creation_date;
    }

    public function setReason($reason){
        $this->_reason = $reason;
    }
}
