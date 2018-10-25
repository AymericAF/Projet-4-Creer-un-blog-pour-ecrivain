<?php
// Crée une session_start s'il y en a pas déjà
if(isset($_SESSION)){
} else {
    session_start();
}

require_once(__DIR__.'/config.php');
require_once(__DIR__.'/controller/adminController.php');
require_once(__DIR__.'/controller/billetController.php');
require_once(__DIR__.'/controller/accueilController.php');
require_once(__DIR__.'/controller/commentController.php');

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
            break;
        case 'displayBilletToModify' :
            require_once(__DIR__.'/controller/billetController.php');
            displayBilletToModify($_GET['idBillet']);
            break;
        case 'modifyBillet' :
            require_once(__DIR__.'/controller/billetController.php');
            modifyBillet($_POST['idBillet']);
            break;
        case 'deleteBillet' :
            require_once(__DIR__.'/controller/billetController.php');
            deleteBillet($_GET['idBillet']);
            break;
        case 'displayViewCreateComment' :
            require_once(__DIR__.'/controller/commentController.php');
            displayViewCreateComment($_GET['idBillet']);
            break;
        case 'createComment' :
            require_once(__DIR__.'/controller/commentController.php');
            createComment();
            break;
        case 'newUser' :
            require_once(__DIR__.'/controller/accueilController.php');
            newUser($_POST['pseudo'], $_POST['email'], $_POST['password'], $_POST['passwordConfirmation']);
            break;
        case 'seDeconnecter' :
            require_once(__DIR__.'/controller/adminController.php');
            seDeconnecter();
            break;
        case 'articleView' : 
            require_once(__DIR__.'/controller/billetAndCommentController.php');
            displayBilletWithComments($_GET['idBillet']);
            break;
        case 'reportAComment' :
            require_once(__DIR__.'/controller/commentController.php');
            addReport($_GET['idComment']);
            break;
        default:
            require_once(__DIR__.'/controller/accueilController.php');
            viewHome();
    }
} else{
    require_once(__DIR__.'/controller/accueilController.php');
    viewHome();
}
