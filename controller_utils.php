<?php
require_once('config.php');
forceConnection('accueil');

function read($view, $page){
    $nbOfBilletsPerPage = 3;
    $billet = new BilletsManager;
    $nbOfBillets = $billet->nbOfBillets();
    $maxNbOfPage = ceil($nbOfBillets/$nbOfBilletsPerPage);
    
    $page = intval($page);
    
    if(is_int($page)){
        if($page < 0){
            $page = 1;
        }
        if($page > $maxNbOfPage){
            $page = $maxNbOfPage;
        }
        $billets = $billet->readInDb($nbOfBilletsPerPage, $page);
    } else{
        addMessage('warning', "Le numéro de page indiqué n'est pas valide.");
    }
    require_once(__DIR__.'/view/'.$view.'.php');
};

function readComments($view){
    $comments = new BilletsManager;
    $comment = $comments->readCommentsInDb();
    require_once(__DIR__.'/view/'.$view.'.php');
};

function addMessage($type, $message){
    $_SESSION['messageType'] = $type;
    $_SESSION['message'] = $message;
}



