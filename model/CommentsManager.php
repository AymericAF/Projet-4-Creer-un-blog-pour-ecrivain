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

    public function readCommentsInDb($article_id, $idUser=''){
        $comments=array();
        $article_id = intval($article_id);

        if($idUser == null){
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
                $userReport = 0;
                $comments[] = array($commentId, $commentArticleId, $commentContent, $commentAuthor, $commentCreationDate, 
                $commentModerated, $userReport);
            }
        } else{
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
                $req2 = $this->dbConnect()->query("SELECT COUNT(*) as 'nombre' FROM reports WHERE id_comment = $commentId AND id_author = $idUser");
                $result2 = $req2->fetch();
                $userReport = $result2['nombre'];
                if($userReport>=1){
                    $userReport = 1;
                } else{
                    $userReport = 0;
                }
                $comments[] = array($commentId, $commentArticleId, $commentContent, $commentAuthor, $commentCreationDate, 
                $commentModerated, $userReport);
            }
           
        }
        $req->closeCursor();
        return $comments;
    }

    public function displayCommentsByNbOfReportsInDb(){
        $comments = array();
        $req = $this->dbConnect()->query('SELECT comments.id AS idComment, comments.comment AS commentContent, COUNT(reports.id) FROM comments JOIN reports ON comments.id = reports.id_comment WHERE comments.moderated=0 GROUP BY idComment ORDER BY COUNT(reports.id) DESC');
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

    public function deleteCommentInDb($idComment){
        $idComment=intval($idComment);
        $req = $this->dbConnect()->prepare('DELETE reports FROM reports INNER JOIN comments ON reports.id_comment = comments.id WHERE comments.id = :idComment');
        $req->execute(array(
            'idComment' => $idComment
        ));
        $req->closeCursor();

        $req2 = $this->dbConnect()->prepare('DELETE FROM comments WHERE id = :idComment2');
        $req2->execute(array(
            'idComment2' => $idComment
        ));
        $req2->closeCursor();
    }

    public function displayNbOfReportsNotModeratedInDb(){
        $req = $this->dbConnect()->query('SELECT comments.id AS idComment, COUNT(reports.id) FROM comments JOIN reports ON comments.id = reports.id_comment WHERE comments.moderated = 0');
        $result = $req->fetch();
        $nbOfReportsNotModerated = $result['COUNT(reports.id)'];
        $req->closeCursor();
        return $nbOfReportsNotModerated;
    }
}
