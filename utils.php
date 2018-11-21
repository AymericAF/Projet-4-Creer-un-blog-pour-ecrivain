<?php
require_once('config.php');
forceConnection('accueil');

function isSessionStarted(){
    return session_status() == PHP_SESSION_ACTIVE;
}

function redirect($action){
    header('location: '.ROOT.'/index.php?action='.$action);
}

function isUserConnected(){
    if(isSessionStarted()){
        return true;
    } else {
        return false;
    }
}

function forceConnection($action){
    if(!isUserConnected()){
        redirect($action);
    }
}

function pageTitle($title){
    require_once(__DIR__.'/view/html.php');
}

function checkAdminLevelAuthorisation(){
    if($_SESSION['access_level'] !== 'admin'){
        header('location: '.ROOT);
    }
}


