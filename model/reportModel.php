<?php
require_once(__DIR__.'/../utils.php');
forceConnection('login');

class Report{
    private $_id;
    private $_id_comment;
    private $_id_author;

    public function getId(){
        return $this->_id;
    }

    public function getId_comment(){
        return $this->_id_comment;
    }

    public function getId_author(){
        return $this->_id_author;
    }


    public function setId($id){
        $this->_id = $id;
    }

    public function setId_comment($id_comment){
        $this->_id_comment = $id_comment;
    }

    public function setId_author($id_author){
        $this->_id_author = $id_author;
    }
}
