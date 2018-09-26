<?php
if(isset($_SESSION)){
    
} else {
    session_start();
}

if(defined('ROOT')){

} else {
    define('ROOT', 'http://localhost/projet4CreerBlogPourEcrivain');
}

if(isset($_REQUEST['action'])){
    switch ($_REQUEST['action']) {
        case 'loginAdmin':
            require('controller/adminController.php');
            login();
            break;
        default:
            require('controller/accueilController.php');
            viewHome();
    }
} else{
    require('controller/accueilController.php');
    viewHome();
}
