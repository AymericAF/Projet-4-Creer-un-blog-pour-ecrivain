<?php
if(isset($_SESSION['active'])){
} else {
    header('location:http://localhost/projet4CreerBlogPourEcrivain/index.php?action=login');
}

require_once('model/UsersManager.php');



function login(){
    if(isset($_POST['pseudo']) && isset($_POST['password'])){
        $connexion = new Users;
        $user = $connexion->getUserInformationWithPseudo($_POST['pseudo']);

        if($user->getAccess_level() ==='admin' && password_verify($_POST['password'], $user->getPassword())){
            $_SESSION['access_level'] = 'admin';
            $_SESSION['userId'] = $user->getId();
            require_once('view/backoffice.php');
        } elseif($user->getAccess_level()==='user' && password_verify($_POST['password'], $user->getPassword())){
            $_SESSION['access_level'] = 'user';
            $erreurAdmin = "Vous n'êtes pas autorisé à accèder à cette partie du site.";
            require('view/admin.php');
        } else{
            $_SESSION['access_level'] = 'not_valid';
            $erreurAdmin = "Votre user et/ou votre mot de passe ne sont pas valides. Veuillez vérifier ces informations";
            require('view/admin.php');
        }
    } else{
        $_SESSION['access_level'] = 'not_valid';
        $erreurAdmin = "Vous n'avez pas saisi votre user et/ou votre mot de passe. Veuillez saisir ces informations.";
        require('view/admin.php');
    }  
}

function displayViewAdmin(){
    require('view/admin.php');
}

