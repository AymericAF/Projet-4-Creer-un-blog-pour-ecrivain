<?php
require_once(__DIR__.'/../utils.php');
require_once(__DIR__.'/../model/ReportsManager.php');
require_once(__DIR__.'/../controller_utils.php');
forceConnection('accueil');

function createReport($id_comment, $id_author){
    if(isset($id_comment) && isset($id_author)){
        $id_comment = intval($id_comment);
        $id_author = intval($id_author);
        if(is_int($id_comment) && is_int($id_author)){
            $report = new ReportsManager();
            $report->createReportInDb($id_comment, $id_author);
            addMessage('success', 'Vous avez signalé un commentaire à un modérateur qui fera le nécessaire dans les plus bref délai.');
            
        } else{
            addMessage('warning', "Les identifiants de commentaires ou d'auteurs ne sont pas valides.");
        }
    } else{
        addMessage('warning', "Les identifiants de commentaires ou d'auteurs ne sont pas valides.");
    }
    header("location:".  $_SESSION['url']);
    unset($_SESSION['url']);
}



