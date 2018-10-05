<?php
require_once(__DIR__.'/../utils.php');
require_once(__DIR__.'/ConnexionManager.php');
require_once(__DIR__.'/UserModel.php');
forceConnection('login');

class Users extends ConnexionManager{    
    public function getUserInformationWithPseudo($pseudo){
        $user = new User;
        $data = $this->dbConnect()->query("SELECT * FROM users WHERE pseudo='$pseudo'");
        while ($donnees = $data->fetch()){
            $user->setId($donnees['id']);
            $user->setPseudo($donnees['pseudo']);
            $user->setPassword($donnees['password']);
            $user->setMail_address($donnees['mail_address']);
            $user->setAccess_level($donnees['access_level']);
        }
        return $user;
        $data->closeCursor();
        }
}