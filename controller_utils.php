<?php
require_once('config.php');
forceConnection('accueil');

function read($view, $message=''){
    $nbOfBilletsPerPage = 5;
    $billet = new BilletsManager;
    $nbOfBillets = $billet->nbOfBillets();
    $maxNbOfPage = ceil($nbOfBillets/$nbOfBilletsPerPage);

    $billets = $billet->readInDb(5, 1);
    
    if(!empty($message)){
        $confirmationMessage = $message;
    }

    require_once(__DIR__.'/view/'.$view.'.php');
};

