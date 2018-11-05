<?php
require_once(__DIR__.'/../utils.php');
require_once(__DIR__.'/../model/BilletsManager.php');
require_once(__DIR__.'/../model/CommentsManager.php');
require_once(__DIR__.'/../controller_utils.php');
require_once(__DIR__.'/../model/ReportsManager.php');

forceConnection('accueil');

function articleViewDisplay($id){
    $billets = new BilletsManager();
    $billet = $billets->readOneArticle($id);
    require_once(__DIR__.'/../view/article.php');
}

function displayArticleComments($idBillet){
    $idBillet = intval($idBillet);
    if(isset($idBillet) && is_int($idBillet)){
        $comments = new CommentsManager();
        $commentsTab = $comments->readCommentsInDb($idBillet);
        require_once(__DIR__.'/../view/article.php');
    } else{
        header("http/1.1 404 Not Found");
        require_once(__DIR__.'/../view/accueil.php');
    }
}

function displayBilletWithComments($idBillet){
    $idBillet = intval($idBillet);
    if(isset($idBillet) && is_int($idBillet)){
        $billets = new BilletsManager();
        $billet = $billets->readOneArticle($idBillet);
        $comments = new CommentsManager();
        if(isset($_SESSION['userId'])){
            $commentsTab = $comments->readCommentsInDb($idBillet, $_SESSION['userId']);
        } else{
            $commentsTab = $comments->readCommentsInDb($idBillet);
        }
        require_once(__DIR__.'/../view/article.php');
    } else{
        header("http/1.1 404 Not Found");
        require_once(__DIR__.'/../view/accueil.php');
    }
}


