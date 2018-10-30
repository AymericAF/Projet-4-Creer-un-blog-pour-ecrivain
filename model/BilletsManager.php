<?php
require_once(__DIR__.'/../utils.php');
require_once('model/ConnexionManager.php');
require_once('model/BilletModel.php');
forceConnection('login');

class BilletsManager extends ConnexionManager{
    public function createInDb(){ 
        $req = $this->dbConnect()->prepare("INSERT INTO articles(title, content, creation_date, user_id) VALUES(:title, :content, :creation_date, :user_id)");
        $billet = new Billet;
        $billet->setTitle(htmlspecialchars($_POST['newBilletTitle']));
        $billet->setContent($_POST['newBilletContent']);
        $billet->setCreation_date(date("Y-m-d H:i:s"));
        $billet->setUser_id($_SESSION['userId']);
        
        $req->execute(array(
            'title' => $billet->getTitle(),      
            'content'=> $billet->getContent(),
            'creation_date' => $billet->getCreation_date(),
            'user_id' => $billet->getUser_id(),
        )); 

        $req->closeCursor();
    }

    public function readInDb($nbArticlesParPage, $page){
        $billets = array();
        if($page === 0){
            $page = 1;
        }

        $offset = ($page -1) * $nbArticlesParPage;

        $req = $this->dbConnect()->prepare("SELECT * FROM articles ORDER BY id DESC LIMIT :limit OFFSET :offset");
        $req->bindParam(':limit', $nbArticlesParPage, PDO::PARAM_INT);
        $req->bindParam(':offset', $offset, PDO::PARAM_INT);
        $req->execute();

        while($result = $req->fetch()){
            $billetTitle = $result['title'];
            $billetContent = $result['content'];
            $billetId = $result['id'];
            $billets[] = array($billetTitle, $billetContent, $billetId);
        }
        $req->closeCursor();
        return $billets;
    }

    public function nbOfBillets(){
        $req = $this->dbConnect()->query('SELECT COUNT(*) AS total FROM articles');
        $result = $req->fetch();
        $total = $result['total'];
        $req->closeCursor();
        return $total;
    }

    public function getBilletById($id){
        $billet = new Billet;
        
        $req = $this->dbConnect()->prepare('SELECT * FROM articles WHERE id= :id');
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();

        while($result = $req->fetch()){
            $billet->setTitle($result['title']);
            $billet->setContent($result['content']);
            $billet->setId($result['id']);
        }
        $req->closeCursor();
        return $billet;
    }

    public function modifyBilletInDb($id){
        $id=intval($id);
        $billet = new Billet;

        $billet->setTitle(htmlspecialchars($_POST['newBilletTitle']));
        $billet->setContent($_POST['newBilletContent']);
        $billet->setLast_modification_date(date("Y-m-d H:i:s"));
        $billet->setId($id);
        $req = $this->dbConnect()->prepare('UPDATE articles SET title=:title, content=:content, last_modification_date=:last_modification_date WHERE id=:id');

        $req->execute(array(
            'title' => $billet->getTitle(),
            'content' => $billet->getContent(),
            'id' => $billet->getId(),
            'last_modification_date' => $billet->getLast_modification_date()
        ));

        $req->closeCursor();
    }

    // public function deleteBilletInDb($id){
    //     $id=intval($id);
    //     var_dump($id);
    //     $req = $this->dbConnect()->prepare('DELETE FROM articles WHERE id=:id');
    //     $req->execute(array(
    //         'id' => $id
    //     ));
    //     $req->closeCursor(); 
    // }

    public function deleteBilletInDb($id){
        $id=intval($id);
        $req = $this->dbConnect()->prepare('DELETE reports FROM reports INNER JOIN comments ON reports.id_comment = comments.id WHERE comments.article_id = :id');
        $req->execute(array(
            'id' => $id
        ));
        $req->closeCursor();

        $req2 = $this->dbConnect()->prepare('DELETE FROM comments WHERE article_id = :id2');
        $req2->execute(array(
            'id2' => $id
        ));
        $req2->closeCursor();
        
        $req3 = $this->dbConnect()->prepare('DELETE FROM articles WHERE id = :id3');
        $req3->execute(array(
            'id3' => $id
        ));
        $req3->closeCursor();
    }

    public function readOneArticle($id){
        $id=intval($id);
        $billet = new Billet;
        $req = $this->dbConnect()->prepare('SELECT * FROM articles WHERE id=:id');
        $req->execute(array(
            'id' => $id
        ));
        while($result = $req->fetch()){
            $billet->setTitle($result['title']);
            $billet->setContent($result['content']);
            $billet->setId($result['id']);
        }
        $req->closeCursor();
        return $billet;
    }

}