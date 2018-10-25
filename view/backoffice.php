<?php 
    require_once(__DIR__.'/../utils.php');
    forceConnection('login'); 
?>

        <?php pageTitle('Backoffice');
        require_once('header.php')?>

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
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
