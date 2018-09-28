<?php 
    if(isset($_SESSION['active'])){
        if($_SESSION['access_level']!=='admin'){
            header('location: ../index.php');
        } 
    } else{
        session_start();
        if($_SESSION['access_level']!=='admin'){
            header('location: ../index.php');
        }
    }



    if(defined('ROOT')){
    } else {
        define('ROOT', 'http://localhost/projet4CreerBlogPourEcrivain');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Backoffice</title>
        <link rel='stylesheet' href=<?php echo ROOT.'/public/css/style.css'; ?>>
    </head>

    <body>
        <?php require_once('header.php')?>

        <h1>Bienvenue dans le Backoffice</h1>



        
    </body>
</html>