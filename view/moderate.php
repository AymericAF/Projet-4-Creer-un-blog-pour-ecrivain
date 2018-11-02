<?php 
    require_once(__DIR__.'/../utils.php');
    forceConnection('login'); 
?>

        <?php pageTitle('Modération');
        require_once('header.php')?>

        <div>
        
            <?php
                if(isset($_SESSION['message'])){
                    echo "<div class='test container alert alert-".$_SESSION['messageType']." divSousHeaderAdmin'>";
                    echo "<p>".$_SESSION['message']."</p>";
                    echo "</div>";
                    unset($_SESSION['message']);
                }
                if(isset($comments)){
                    foreach($comments as $value){
                        echo "<div class='container comments divSousHeaderAdmin'>";
                        echo '<p>'.$value[1].'</p>';  
                        echo "<p><strong>Nb de signalement: </strong><span class='badge badge-primary'>".$value[2]."</span> </p>";
                        echo "<a class='btn btn-success margin-right-10 margin-bottom-10' href='index?action=commentValidation&idComment=".$value[0]."' role='button'>Valider le commentaire</a>";
                        echo "<a class='btn btn-danger margin-bottom-10' href='index?action=deleteComment&idComment=".$value[0]."' role='button'>Supprimer le commentaire</a>";
                        echo '</div>';
                    }
                }
            ?>
            <?php require_once(__DIR__.'/footerBackoffice.php'); ?>
            
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
