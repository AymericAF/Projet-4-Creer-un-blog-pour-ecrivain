<?php
if(isset($_SESSION['active'])){
} else {
    header('location:http://localhost/projet4CreerBlogPourEcrivain/index.php?action=login');
}

class User{
    private $_id;
    private $_pseudo;
    private $_mail_address;
    private $_password;
    private $_access_level;

    public function getId(){
        return $this->_id;
    }

    public function getPseudo(){
        return $this->_pseudo;
    }

    public function getMail_address(){
        return $this->_mail_address;
    }

    public function getPassword(){
        return $this->_password;
    }

    public function getAccess_level(){
        return $this->_access_level;
    }

    public function setId($id){
        $this->_id = $id;
    }

    public function setPseudo($pseudo){
        $this->_pseudo = $pseudo;
    }

    public function setMail_address($mail_address){
        $this->_mail_address = $mail_address;
    }

    public function setPassword($password){
        $this->_password = $password;
    } 

    public function setAccess_level($access_level){
        $this->_access_level = $access_level;
    }
}