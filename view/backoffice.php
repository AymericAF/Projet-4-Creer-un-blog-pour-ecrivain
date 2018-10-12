<?php 
    require_once(__DIR__.'/../utils.php');
    forceConnection('login'); 
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Backoffice</title>
        <link rel='stylesheet' href=<?php echo ROOT.'/public/css/style.css'; ?>>
    </head>

    <body>
        <?php require_once('header.php')?>

        <h1>Les derniers billets</h1>

        <div>
            
            <?php 
                if(isset($confirmationMessage)){
                    echo '<p>'.$confirmationMessage.'</p>';
                }
            ?>
            
            <?php 
                if(isset($billets)){
                    foreach($billets as $value){
                        echo '<h2>'.$value[0].'</h2>';
                        echo "<a class='modifyButton' href=index.php?action=displayBilletToModify&idBillet=$value[2]>Modifier</a>";
                        echo "<a class='deleteButton' href=index.php?action=deleteBillet&idBillet=$value[2]>Supprimer</a>";
                        echo $value[1];
                        echo '<br />';
                    }
                }
            ?>
        </div>
    </body>
</html>
