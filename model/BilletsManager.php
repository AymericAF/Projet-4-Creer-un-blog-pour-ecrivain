<?php
if(isset($_SESSION['active'])){
} else {
    header('location:http://localhost/projet4CreerBlogPourEcrivain/index.php?action=login');
}
require_once('model/ConnexionManager.php');
require_once('model/BilletModel.php');

class BilletsManager extends ConnexionManager{
    public function createInDb(){ 
        $req = $this->dbConnect()->prepare("INSERT INTO articles(title, content, creation_date, user_id) VALUES(:title, :content, :creation_date, :user_id)");
        $billet = new Billet;
        $billet->setTitle(htmlspecialchars($_POST['newBilletTitle']));
        $billet->setContent(htmlspecialchars($_POST['newBilletContent']));
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
}