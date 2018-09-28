<?php
if(isset($_SESSION['active'])){
} else {
    header('location:http://localhost/projet4CreerBlogPourEcrivain/index.php?action=login');
}

require_once('model/ConnexionManager.php');
require_once('model/UserModel.php');

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