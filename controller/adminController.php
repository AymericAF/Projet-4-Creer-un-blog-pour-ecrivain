<?php
require_once('model/UsersModel.php');

function login(){
    if(isset($_REQUEST['user']) && isset($_REQUEST['password'])){
        $connexion = new Users;
            $user = $connexion->getAllUsersInformations($_REQUEST['user']);
            if($user['access_level']==='admin' && password_verify($_REQUEST['password'], $user['password'])){
                $_SESSION['access_level'] = 'admin';
                $_SESSION['userId'] = $user['id'];
                require_once('view/backoffice.php');
            } elseif($user['access_level']==='user' && password_verify($_REQUEST['password'], $user['password'])){
                $erreurAdmin = "Vous n'êtes pas autorisé à accèder à cette partie du site.";
                require_once('view/admin.php');
            } else{
                $erreurAdmin = "Votre user et/ou votre mot de passe ne sont pas valides. Veuillez vérifier ces informations";
                require_once('view/admin.php');
            }
    } else{
        $erreurAdmin = "Vous n'avez pas saisi votre user et/ou votre mot de passe. Veuillez saisir ces informations.";
        require_once('view/admin.php');
    }  
}


