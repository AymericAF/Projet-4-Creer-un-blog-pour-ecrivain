<?php
require_once(__DIR__.'/../utils.php');
require_once(__DIR__.'/../model/CommentsManager.php');
require_once(__DIR__.'/../controller_utils.php');
require_once(__DIR__.'/../model/BilletsManager.php');

forceConnection('accueil');

function createComment(){
    if(isset($_POST['idBillet']) && is_int(intval($_POST['idBillet'])) && !empty($_POST['newCommentContent'])){
        $comment = new CommentsManager();
        $comment->createCommentInDb();  
    }
}

function displayViewCreateComment($idBillet){
    if(isset($_SESSION['userId'])){
        $idBillet = intval($idBillet);
        $billets = new BilletsManager();
        if(isset($idBillet) && is_int($idBillet)){
            $billet = $billets->getBilletById($idBillet);
            require_once(__DIR__.'/../view/createComment.php');  
        }
    } else{
        require_once(__DIR__.'/../view/admin.php');
    }
}

