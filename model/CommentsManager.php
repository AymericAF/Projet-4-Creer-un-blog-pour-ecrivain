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
            'moderated' => $comment->getModerated()
        )); 

        $req->closeCursor();
    }

    public function readCommentsInDb($article_id){
        $comments=array();
        $article_id = intval($article_id);
        
        $req = $this->dbConnect()->prepare('SELECT * FROM comments WHERE article_id=:article_id ORDER BY id DESC');
        $req->bindParam(':article_id', $article_id, PDO::PARAM_INT);
        $req->execute();
        
        while($result = $req->fetch()){
            $commentId = $result['id'];
            $commentArticleId = $result['article_id'];
            $commentContent = $result['comment'];
            $commentAuthor = $result['author'];
            $commentCreationDate = $result['creation_date'];
            $commentModerated = $result['moderated'];
            $comments[] = array($commentId, $commentArticleId, $commentContent, $commentAuthor, $commentCreationDate, 
            $commentModerated);
        }
        $req->closeCursor();
        return $comments;
    }
}