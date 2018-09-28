<?php
if(isset($_SESSION['active'])){
} else {
    header('location:http://localhost/projet4CreerBlogPourEcrivain/index.php?action=accueil');
}

function viewHome(){
    require_once('view/accueil.php');
}

