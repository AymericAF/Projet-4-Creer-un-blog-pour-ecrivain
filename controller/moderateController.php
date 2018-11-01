<?php
require_once(__DIR__.'/../utils.php');
require_once(__DIR__.'/../controller_utils.php');
require_once(__DIR__.'/../model/CommentsManager.php');
forceConnection('login');

function moderateView(){
    $comments = displayCommentsByNbOfReports();
    $nbOfReportsNotModerated = displayNbOfReportsNotModerated();
    require_once(__DIR__.'/../view/moderate.php');
}

function displayCommentsByNbOfReports(){
    $comments = new CommentsManager();
    $comments = $comments->displayCommentsByNbOfReportsInDb();
    return $comments;
}

function displayNbOfReportsNotModerated(){
    $nbOfReportsNotModerated = new CommentsManager();
    $nbOfReportsNotModerated = $nbOfReportsNotModerated->displayNbOfReportsNotModeratedInDb();
    return $nbOfReportsNotModerated;
}


