<?php
require_once(__DIR__.'/../utils.php');
require_once(__DIR__.'/../model/BilletsManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/projet4CreerBlogPourEcrivain/controller_utils.php');

forceConnection('login');

function create(){
    if(isset($_POST['newBilletTitle']) && isset($_POST['newBilletContent'])){
        $newBillet = new BilletsManager;
        $newBillet->createInDb();
        $confirmationMessage = 'Votre billet a bien été enregistré.';
        displayViewCreateBillet();
    }
}


function displayViewCreateBillet(){
    require_once(__DIR__.'/../view/createBillet.php');
}
