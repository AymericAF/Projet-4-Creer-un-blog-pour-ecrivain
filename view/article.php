<?php
require_once(__DIR__.'/../utils.php');
require_once(__DIR__.'/../controller_utils.php');
forceConnection('accueil');

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Article</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel='stylesheet' href=<?php echo ROOT.'/public/css/style.css'; ?>>
    </head>

    <body>
        <?php require_once('headerUser.php')?>
        <?php 
                
                if(isset($billet)){
                    echo '<h1>'.$billet->getTitle().'</h1>';
                    echo '<p>'.$billet->getContent().'<p>';
                    echo "<a class='commentButton' href=index.php?action=displayViewCreateComment&idBillet=".$billet->getId().">Laisser un commentaire</a>";
                    echo "<a class='commentButton' href=index.php?action=reportAComment&idBillet=".$billet->getId().">Signaler le commentaire</a>";
                }
                if(isset($commentsTab)){
                    foreach($commentsTab as $value){
                        echo '<p>'.$value[2].'</p>';
                    }
                }
                
                
        ?>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>