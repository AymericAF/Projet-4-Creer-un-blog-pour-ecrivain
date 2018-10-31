<?php
require_once(__DIR__.'/../utils.php');
require_once(__DIR__.'/../controller_utils.php');
require_once(__DIR__.'/../model/CommentsManager.php');
forceConnection('login');

function moderateView(){
    displayCommentsByNbOfReports();
    require_once(__DIR__.'/../view/moderate.php');
}

function displayCommentsByNbOfReports(){
    $comments = new CommentsManager();
    $comments = $comments->displayCommentsByNbOfReportsInDb();
    require_once(__DIR__.'/../view/moderate.php');
}
