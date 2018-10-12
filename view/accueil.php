<?php
require_once(__DIR__.'/../utils.php');
require_once(__DIR__.'/../controller_utils.php');
forceConnection('accueil');

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Accueil</title>
    </head>

    <body>
        <h1>Bienvenue à la page d'accueil</h1>
        <?php 
                if(isset($billets)){
                    foreach($billets as $value){
                        echo '<h2>'.$value[0].'</h2>';
                        echo $value[1];
                        echo '<br />';
                        echo "<a class='commentButton' href=index.php?action=createComment&idBillet=$value[2]>Commentaire</a>";
                    }
                }
        ?>

    </body>
</html>