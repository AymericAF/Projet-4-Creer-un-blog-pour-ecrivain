<?php
// Crée une session_start s'il y en a pas déjà
if(isset($_SESSION)){
} else {
    session_start();
}

require_once(__DIR__.'/config.php');

// Routeur vers les différents Controller
if(isset($_REQUEST['action'])){
    switch ($_REQUEST['action']) {
        case 'loginAdmin':
            require_once(__DIR__.'/controller/adminController.php');
            login();    
            break;
        case 'createBillet':
            require_once(__DIR__.'/controller/billetController.php');
            create();
            break;
        case 'login':
            require_once(__DIR__.'/controller/adminController.php');
            displayViewAdmin();
            break;
        case 'accueil':
            require_once(__DIR__.'/controller/accueilController.php');
            viewHome();
            break;
        case 'createBilletDisplayView' :
            require_once(__DIR__.'/controller/billetController.php');
            displayViewCreateBillet();
            break;
        case 'backofficeView' :
            require_once(__DIR__.'/controller/adminController.php');
            require_once(__DIR__.'/controller/billetController.php');
            read('backoffice');
            displayViewBackoffice();
            break;
        default:
            require_once(__DIR__.'/controller/accueilController.php');
            viewHome();
    }
} else{
    require_once(__DIR__.'/controller/accueilController.php');
    viewHome();
}
