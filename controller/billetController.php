<?php
if(isset($_SESSION['active'])){
} else {
    header('location:http://localhost/projet4CreerBlogPourEcrivain/index.php?action=login');
}

require_once('model/BilletsManager.php');

function create(){
    if(isset($_POST['newBilletTitle']) && isset($_POST['newBilletContent'])){
        $newBillet = new BilletsManager;
        $newBillet->createInDb();
        $confirmationMessage = 'Votre billet a bien été enregistré.';
        header('location:view/createBillet.php');
    }
}

