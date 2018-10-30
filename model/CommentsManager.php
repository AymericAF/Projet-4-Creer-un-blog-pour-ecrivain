<?php
require_once(__DIR__.'/../utils.php');
require_once('model/ConnexionManager.php');
require_once('model/CommentModel.php');
forceConnection('login');

class CommentsManager extends ConnexionManager{
    public function createCommentInDb(){
        $req = $this->dbConnect()->prepare("INSERT INTO comments(article_id, comment, author, creation_date, moderated) VALUES(:article_id, :comment, :author, :creation_date, :moderated)");
        $comment = new Comment;
        $comment->setArticleId(intval($_POST['idBillet']));
        $comment->setComment(htmlspecialchars($_POST['newCommentContent']));
        $comment->setAuthor($_SESSION['userId']);
        $comment->setCreationDate(date("Y-m-d H:i:s"));
        $comment->setModerated(0);

        $req->execute(array(
            'article_id' => $comment->getArticleId(),      
            'comment'=> $comment->getComment(),
            'author'=> $comment->getAuthor(),
            'creation_date' => $comment->getCreationDate(),
            'moderated' => $comment->getModerated(),
        )); 

        $req->closeCursor();
    }

    public function readCommentsInDb($article_id){
        $comments=array();
        $article_id = intval($article_id);
        
        $req = $this->dbConnect()->prepare("SELECT * , DATE_FORMAT(comments.creation_date, '%d-%m-%y à %H:%i:%s') AS niceDate, comments.id AS idComment FROM comments JOIN users ON comments.author = users.id WHERE article_id=:article_id ORDER BY comments.id DESC");
        $req->bindParam(':article_id', $article_id, PDO::PARAM_INT);
        $req->execute();
        
        while($result = $req->fetch()){
            $commentId = $result['idComment'];
            $commentArticleId = $result['article_id'];
            $commentContent = $result['comment'];
            $commentAuthor = $result['pseudo'];
            $commentCreationDate = $result['niceDate'];
            $commentModerated = $result['moderated'];
            $comments[] = array($commentId, $commentArticleId, $commentContent, $commentAuthor, $commentCreationDate, 
            $commentModerated);
        }
        $req->closeCursor();
        return $comments;
    }

    public function displayCommentsByNbOfReportsInDb(){
        $comments = array();
        $req = $this->dbConnect()->query('SELECT comments.id AS idComment, comments.comment AS commentContent, COUNT(reports.id) FROM comments JOIN reports ON comments.id = reports.id_comment WHERE comments.moderated=0 GROUP BY idComment');
        while($result = $req->fetch()){
            $commentId = $result['idComment'];
            $commentContent = $result['commentContent'];
            $nbOfReport = $result['COUNT(reports.id)'];
            $comments[] = array($commentId, $commentContent, $nbOfReport);
        };
        $req->closeCursor();
        return $comments;
    }

    public function commentValidationInDb($idComment){
        $req = $this->dbConnect()->prepare('UPDATE comments SET moderated=1 WHERE id=:id');
        $req->bindParam(':id', $idComment, PDO::PARAM_INT);
        $req->execute();
        $req->closeCursor();
    }
}
