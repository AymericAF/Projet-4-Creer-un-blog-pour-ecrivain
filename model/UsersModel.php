<?php
require_once('model/ConnexionManager.php');
class Users extends ConnexionManager{
    public $usersInformations = array('id'=>'', 'pseudo'=>'', 'password'=>'', 'mail_address'=>'', 'access_level'=>'');
    
    public function getAllUsersInformations($user){
        $data = $this->dbConnect()->query("SELECT * FROM users WHERE pseudo='$user'");
        while ($donnees = $data->fetch()){
            $this->usersInformations['id'] = $donnees['id'];
            $this->usersInformations['pseudo'] = $donnees['pseudo'];
            $this->usersInformations['password'] = $donnees['password'];
            $this->usersInformations['mail_address'] = $donnees['mail_address'];
            $this->usersInformations['access_level'] = $donnees['access_level'];
        }
        return $this->usersInformations;
        $data->closeCursor();
        }
}