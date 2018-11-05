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
require_once(__DIR__.'/controller/moderateController.php');

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
            $_SESSION['url'] = $_SERVER['HTTP_REFERER'];
            require_once(__DIR__.'/controller/adminController.php');
            displayViewAdmin();
            break;
        case 'accueil':
            require_once(__DIR__.'/controller/accueilController.php');
            if(isset($_GET['page'])){
                viewHome($_GET['page']);
            }else{
                viewHome(1);
            }
            
            break;
        case 'createBilletDisplayView' :
            require_once(__DIR__.'/controller/billetController.php');
            displayViewCreateBillet();
            break;
        case 'backofficeView' :
            require_once(__DIR__.'/controller/adminController.php');
            if(isset($_GET['page'])){
                viewBackoffice($_GET['page']);
            }else{
                viewBackoffice(1);
            }
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
            $_SESSION['url'] = $_SERVER['HTTP_REFERER'];
            displayViewCreateComment($_GET['idBillet']);
            break;
        case 'createComment' :
            require_once(__DIR__.'/controller/commentController.php');
            createComment();
            break;
        case 'newUser' :
            require_once(__DIR__.'/controller/accueilController.php');
            newUser($_POST['pseudoCreate'], $_POST['email'], $_POST['passwordCreate'], $_POST['passwordConfirmation']);
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
            require_once(__DIR__.'/controller/reportController.php');
            $_SESSION['url'] = $_SERVER['HTTP_REFERER'];
            createReport($_GET['idComment'], $_SESSION['userId']);
            break;
        case 'moderateView' :
            require_once(__DIR__.'/controller/moderateController.php');
            moderateView();
            break;
        case 'commentValidation' :
            require_once(__DIR__.'/controller/commentController.php');
            $_SESSION['url'] = $_SERVER['HTTP_REFERER'];
            commentValidation($_GET['idComment']);
            break;
        case 'deleteComment' :
            require_once(__DIR__.'/controller/commentController.php'); 
            $_SESSION['url'] = $_SERVER['HTTP_REFERER'];
            deleteComment($_GET['idComment']);
            break;
        default:
            require_once(__DIR__.'/controller/accueilController.php');
            viewHome(1);
    }
} else{
    require_once(__DIR__.'/controller/accueilController.php');
    viewHome(1);
}
