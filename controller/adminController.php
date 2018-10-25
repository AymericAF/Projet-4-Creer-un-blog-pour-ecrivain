<?php
require_once(__DIR__.'/../model/UsersManager.php');
require_once(__DIR__.'/billetController.php');
require_once(__DIR__.'/../controller_utils.php');

function login(){
    if(isset($_POST['pseudo']) && isset($_POST['password'])){
        $connexion = new Users();
        $user = $connexion->getUserInformationWithPseudo($_POST['pseudo']);

        if($user->getAccess_level() ==='admin' && password_verify($_POST['password'], $user->getPassword())){
            $_SESSION['access_level'] = 'admin';
            $_SESSION['userId'] = $user->getId();
            read('backoffice');
        } elseif($user->getAccess_level()==='user' && password_verify($_POST['password'], $user->getPassword())){
            $_SESSION['access_level'] = 'user';
            $_SESSION['userId'] = $user->getId();
            // header("location:".  $_SERVER['HTTP_REFERER']); 
    
            read('accueil');
            // require_once(__DIR__.'/../view/accueil.php');
        } else{
            $_SESSION['access_level'] = 'not_valid';
            $erreurAdmin = "Votre user et/ou votre mot de passe ne sont pas valides. Veuillez vérifier ces informations";
            require_once(__DIR__.'/../view/admin.php');
        }
    } else{
        $_SESSION['access_level'] = 'not_valid';
        $erreurAdmin = "Vous n'avez pas saisi votre user et/ou votre mot de passe. Veuillez saisir ces informations.";
        require_once(__DIR__.'/../view/admin.php');
    }  
}

function displayViewAdmin(){
    require_once(__DIR__.'/../view/admin.php');
}

function displayViewBackoffice(){
    require_once(__DIR__.'/../view/backoffice.php');
}

function seDeconnecter(){
    $_SESSION = array();
    if (ini_get("session.use_cookies")){
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    };
    session_destroy();
    header("location:".  $_SERVER['HTTP_REFERER']); 
}
