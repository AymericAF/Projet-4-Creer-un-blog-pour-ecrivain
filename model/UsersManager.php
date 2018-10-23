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

    public function getUserInformationWithEmail($email){
        $user = new User;
        $data = $this->dbConnect()->query("SELECT * FROM users WHERE mail_address='$email'");
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

    public function newUserInDb($pseudo, $email, $password, $passwordConfirmation){
        $user = new User;
        $user->setPseudo(htmlspecialchars($pseudo));
        $user->setMail_address(htmlspecialchars(($email)));
        $user->setPassword(password_hash(htmlspecialchars($password), PASSWORD_DEFAULT));
        $user->setAccess_level('user');
        $req = $this->dbConnect()->prepare('INSERT INTO users(pseudo, mail_address, password, access_level) VALUES(:pseudo, :mail_address, :password, :access_level)');
        $req->execute(array(
            'pseudo'=>$user->getPseudo(),
            'mail_address'=>$user->getMail_address(),
            'password'=>$user->getPassword(),
            'access_level'=>$user->getAccess_level()
        ));
    }
}
