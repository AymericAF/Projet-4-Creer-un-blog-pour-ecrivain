<?php
if(isset($_SESSION['active'])){
} else {
    header('location:http://localhost/projet4CreerBlogPourEcrivain/index.php?action=login');
}

class Billet{
    private $_id;
    private $_title;
    private $_content;
    private $_creation_date;
    private $_last_modification_date;
    private $_user_id;

    public function getId(){
        return $this->_id;
    }

    public function getTitle(){
        return $this->_title;
    }

    public function getContent(){
        return $this->_content;
    }

    public function getCreation_date(){
        return $this->_creation_date;
    }

    public function getLast_modification_date(){
        return $this->_last_modification_date;
    }

    public function getUser_id(){
        return $this->_user_id;
    }

    public function setId($id){
        $this->_id = $id;
    }

    public function setTitle($title){
        $this->_title = $title;
    }

    public function setContent($content){
        $this->_content = $content;
    }

    public function setCreation_date($creation_date){
        $this->_creation_date = $creation_date;
    }

    public function setLast_modification_date($last_modification_date){
        $this->_last_modification_date = $Last_modification_date;
    }

    public function setUser_id($user_id){
        $this->_user_id = $user_id;
    }

}
