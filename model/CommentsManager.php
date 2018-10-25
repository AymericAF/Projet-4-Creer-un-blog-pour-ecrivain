<?php
require_once(__DIR__.'/../utils.php');
require_once('model/ConnexionManager.php');
require_once('model/CommentModel.php');
forceConnection('login');

class CommentsManager extends ConnexionManager{
    public function createCommentInDb(){
        $req = $this->dbConnect()->prepare("INSERT INTO comments(article_id, comment, author, creation_date, moderated, report) VALUES(:article_id, :comment, :author, :creation_date, :moderated, :report)");
        $comment = new Comment;
        $comment->setArticleId(intval($_POST['idBillet']));
        $comment->setComment(htmlspecialchars($_POST['newCommentContent']));
        $comment->setAuthor($_SESSION['userId']);
        $comment->setCreationDate(date("Y-m-d H:i:s"));
        $comment->setModerated(0);
        $comment->setReport(0);

        $req->execute(array(
            'article_id' => $comment->getArticleId(),      
            'comment'=> $comment->getComment(),
            'author'=> $comment->getAuthor(),
            'creation_date' => $comment->getCreationDate(),
            'moderated' => $comment->getModerated(),
            'report' => $comment->getReport()
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
            $commentReport = $result['report'];
            $comments[] = array($commentId, $commentArticleId, $commentContent, $commentAuthor, $commentCreationDate, 
            $commentModerated, $commentReport);
        }
        $req->closeCursor();
        return $comments;
    }

    public function addReport($idComment){
        $req = $this->dbConnect()->prepare('SELECT report FROM comments WHERE id=:idComment');
        $req->bindParam(':idComment', $idComment, PDO::PARAM_INT);
        $req->execute();
        $nbOfReports = $req->fetch();
        $nbOfReports = $nbOfReports['report'];
        $req->closeCursor();

        $req = $this->dbConnect()->prepare('UPDATE comments SET report=:report WHERE id=:idComment');
        $nbOfReports = $nbOfReports + 1;
        $req->bindParam(':report', $nbOfReports, PDO::PARAM_INT);
        $req->bindParam(':idComment', $idComment, PDO::PARAM_INT);
        $req->execute();
        $req->closeCursor();

        $_SESSION['messageSignalement'] = 'Vous avez signalé un commentaire à un modérateur qui fera le nécessaire dans les plus bref délai.';
    }
}
