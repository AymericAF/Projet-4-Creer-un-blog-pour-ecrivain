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
                if(isset($billets)){
                    foreach($billets as $value){
                        echo '<h2>'.$value[0].'</h2>';
                        echo $value[1];
                        echo '</br>';
                    }
                }
            ?>
        </div>
    </body>
</html>