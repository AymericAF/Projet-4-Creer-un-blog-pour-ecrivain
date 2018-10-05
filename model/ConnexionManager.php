<?php
require_once(__DIR__.'/../utils.php');
forceConnection('login');

class ConnexionManager{
    protected function dbConnect(){
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
            return $db;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
}


