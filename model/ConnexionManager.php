<?php
require_once(__DIR__.'/../utils.php');
forceConnection('login');

class ConnexionManager{
    protected function dbConnect(){
        try
        {
            require(__DIR__.'/../parameters.php');
            $db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $password);
            return $db;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
}


