<?php
require_once(__DIR__.'/../utils.php');
forceConnection('accueil');

function viewHome(){
    require_once(__DIR__.'/../view/accueil.php');
}

