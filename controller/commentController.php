<?php
require_once(__DIR__.'/../utils.php');
require_once(__DIR__.'/../model/CommentsManager.php');
require_once(__DIR__.'/../controller_utils.php');
require_once(__DIR__.'/../model/BilletsManager.php');

forceConnection('accueil');

function createComment(){
    $_POST['idBillet'] = intval($_POST['idBillet']);
    if(isset($_POST['idBillet']) && is_int($_POST['idBillet']) && !empty($_POST['newCommentContent'])){
        $comment = new CommentsManager();
        $comment->createCommentInDb();  
        addMessage('success', 'Votre commentaire a été publié.');
    } else{
        addMessage('warning', "Vous n'avez pas saisi de commentaire.");
    }
    header("location:".  $_SESSION['url']);
    unset($_SESSION['url']);
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

function commentValidation($idComment){
    $idComment = intval($idComment);
    if(isset($idComment) && is_int($idComment)){
        $comments = new CommentsManager();
        $comments = $comments->commentValidationInDb($idComment);
        addMessage('success', 'Le commentaire a été validé.');
    } else{
        addMessage('warning', "L'identifiant du commentaire n'est pas valide.");
    }
    header("location:".  $_SESSION['url']);
    unset($_SESSION['url']);
}

function deleteComment($idComment){
    $idComment = intval($idComment);
    
    if(isset($idComment) && is_int($idComment)){
        $comments = new CommentsManager();
        $comments = $comments->deleteCommentInDb($idComment);
        addMessage('danger', 'Le commentaire a été supprimé.');
    } else{
        addMessage('warning', "L'identifiant du commentaire n'est pas valide.");
    }
    header("location:".  $_SESSION['url']);
    unset($_SESSION['url']);
}
