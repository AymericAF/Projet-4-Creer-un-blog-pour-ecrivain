<?php
// Crée une session_start s'il y en a pas déjà
if(isset($_SESSION)){
} else {
    session_start();
    $_SESSION['active'] = true;
}

// Crée une variable indiquant que l'utilisateur est bien passé par l'index
// $_SESSION['index'] = 'true';

if(defined('INDEX')){
} else{
    define('INDEX', 'true');
}

// Crée une constante 'ROOT' s'il n'y en a pas déjà une
if(defined('ROOT')){

} else {
    define('ROOT', 'http://localhost/projet4CreerBlogPourEcrivain');
}

// Routeur vers les différents Controller
if(isset($_REQUEST['action'])){
    switch ($_REQUEST['action']) {
        case 'loginAdmin':
            require('controller/adminController.php');
            login();
            break;
        case 'createBillet':
            require('controller/billetController.php');
            create();
            break;
        case 'login':
            require_once('controller/adminController.php');
            displayViewAdmin();
            break;
        case 'accueil':
            require_once('controller/accueilController.php');
            viewHome();
        default:
            require_once('controller/accueilController.php');
            viewHome();
    }
} else{
    require_once('controller/accueilController.php');
    viewHome();
}
