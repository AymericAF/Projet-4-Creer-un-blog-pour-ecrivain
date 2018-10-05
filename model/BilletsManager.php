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
        $offset = ($page - 1) * $nbArticlesParPage;
        $req = $this->dbConnect()->query('SELECT * FROM articles ORDER BY id DESC LIMIT '.$nbArticlesParPage.' OFFSET '.$offset);
        while($result = $req->fetch()){
            $billetTitle = $result['title'];
            $billetContent = $result['content'];
            $billets[] = array($billetTitle, $billetContent);
        }
        return $billets;
       
        $req->closeCursor();
    }

    public function nbOfBillets(){
        $req = $this->dbConnect()->query('SELECT COUNT(*) AS total FROM articles');
        $result = $req->fetch();
        $total = $result['total'];
        return $total;
        $req->closeCursor();
    }
}