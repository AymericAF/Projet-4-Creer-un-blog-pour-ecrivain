<?php
require_once(__DIR__.'/../utils.php');
forceConnection('accueil');

function viewHome(){
    read('accueil');
}

