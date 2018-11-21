<?php
require_once(__DIR__.'/../utils.php');
require_once(__DIR__.'/../model/BilletsManager.php');
require_once(__DIR__.'/../controller_utils.php');

forceConnection('login');

function create(){
    if(isset($_POST['newBilletTitle']) && isset($_POST['newBilletContent'])){
        $newBillet = new BilletsManager();
        $newBillet->createInDb();
        $confirmationMessage = 'Votre billet a bien été enregistré.';
        read('backoffice', 1);
    } 
}

function modifyBillet($id){
    if(isset($_POST['newBilletTitle']) && isset($_POST['newBilletContent'])){
        $billet = new BilletsManager();
        $billet->modifyBilletInDb($id);
        addMessage('success', 'Votre billet a bien été modifié.');
        read('backoffice', 1);
    }
}

function displayViewCreateBillet(){
    require_once(__DIR__.'/../view/createBillet.php');
}

function displayBilletToModify($id){
    $id = intval($id);

    $idCheckResult = checkIdBilletExist($id);
  
    if($idCheckResult == 0){
        addMessage('warning', "L'identifiant utilisé n'est pas valide.");
        read('backoffice', 1);
    } else{
        $billetToModify = new BilletsManager();
        $billet = $billetToModify->getBilletById($id);    
        require_once(__DIR__.'/../view/modifyBillet.php');
    }
}

function displayViewModifyBillet(){
    require_once(__DIR__.'/../view/modifyBillet.php');
}

function displayBackofficeView(){
    require_once(__DIR__.'/../view/backoffice.php');
}

function deleteBillet($id){
    $idCheckResult = checkIdBilletExist($id);
  
    if($idCheckResult == 0){
        addMessage('warning', "L'identifiant utilisé n'est pas valide.");
        read('backoffice', 1);
    } else{
        $billet = new BilletsManager();
        $billet->deleteBilletInDb($id);
        addMessage('danger', 'Le billet a bien été supprimé.');
        read('backoffice', 1);
    }
}

function checkIdBilletExist($id){
    $idBilletToCheck = new BilletsManager();
    $idBilletToCheck = $idBilletToCheck->getBilletById($id);
    $idBilletToCheck = $idBilletToCheck->getId(); 
    if($idBilletToCheck == null){
        $idCheckResult = 0;
    } else{
        $idCheckResult = 1;
    }
    return $idCheckResult;
}
