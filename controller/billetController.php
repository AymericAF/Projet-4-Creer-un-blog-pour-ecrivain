<?php
require_once(__DIR__.'/../utils.php');
require_once(__DIR__.'/../model/BilletsManager.php');
require_once(__DIR__.'/../controller_utils.php');

forceConnection('login');

function create(){
    if(isset($_POST['newBilletTitle']) && isset($_POST['newBilletContent'])){
        $newBillet = new BilletsManager;
        $newBillet->createInDb();
        $confirmationMessage = 'Votre billet a bien été enregistré.';
        displayViewCreateBillet();
    }
}

function modifyBillet($id){
    if(isset($_POST['newBilletTitle']) && isset($_POST['newBilletContent'])){
        $billet = new BilletsManager;
        $billet->modifyBilletInDb($id);
        read('backoffice', 'Votre billet a bien été modifié');
    }
}

function displayViewCreateBillet(){
    require_once(__DIR__.'/../view/createBillet.php');
}

function displayBilletToModify($id){
    $id = intval($id);
    if(isset($id) && !empty($id) && is_int($id)){
        $billetToModify = new BilletsManager;
        $billet = $billetToModify->getBilletById($id);    
        require_once(__DIR__.'/../view/modifyBillet.php');
    } else echo 'Il y a qq chose qui ne va pas';
}

function displayViewModifyBillet(){
    require_once(__DIR__.'/../view/modifyBillet.php');
}

function deleteBillet($id){
    $billet = new BilletsManager;
    $billet->deleteBilletInDb($id);
    read('backoffice', 'Le billet a bien été supprimé');
}
