<?php
require_once(__DIR__.'/../utils.php');
require_once('model/ConnexionManager.php');
require_once('model/ReportModel.php');
forceConnection('login');

class ReportsManager extends ConnexionManager{
    public function createReportInDb($id_comment, $id_author){
        $req = $this->dbConnect()->prepare('INSERT INTO reports(id_comment, id_author) VALUES(:id_comment, :id_author)');
        $report = new Report();
        $report->setId_comment($id_comment);
        $report->setId_author($id_author);
        
        $req->execute(array(
            'id_comment' => $report->getId_comment(),
            'id_author' => $report->getId_author()
        ));
        $req->closeCursor();
    }

    public function checkIfUserReportCommentInDb($user, $id_comment){
        $reports = array();
        $req = $this->dbConnect()->prepare('SELECT EXISTS (SELECT * FROM reports WHERE id_author=:user AND id_comment=:id_comment)');
        $req->bindParam(':user', $user, PDO::PARAM_INT);
        $req->bindParam(':id_comment', $id_comment, PDO::PARAM_INT);

        $req->execute();

        $result = $req->fetch();
        return $result;
        $req->closeCursor();
        
    } 
}
