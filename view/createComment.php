<?php 
    require_once(__DIR__.'/../utils.php');
    forceConnection('accueil');
?>

        <?php pageTitle('Création de commentaire');
        require_once(__DIR__.'/headerUser.php');?>
        <!-- <h1>Création de commentaire</h1> -->
        <?php 
            if(isset($billet)){
                echo "<div class='container divSousHeader padding-top-20'>";
                echo '<h2>Titre de l\'article : '.$billet->getTitle().'</h2>';
                echo "<p class='bold'>Contenu de l'article : </p>".$billet->getContent();
                echo '</div>';
            }
        ?>
        <div class='container divSousHeader padding-top-20'>
            <p class='bold'>Saisissez votre commentaire.</p>
            <form method='post' action='<?php echo ROOT.'/index.php';?>'>
                <div class='form-group'>
                    <textarea class='comment-to-create' name='newCommentContent' id='newCommentContent'></textarea>
                </div>
                <div class='form-group'>
                    <input class='btn btn-primary' type="submit" value='Enregistrer'>   
                    <input type="hidden" name='action' value='createComment'> 
                    <input type="hidden" name='idBillet' value='<?php echo $billet->getId();?>'> 
                </div>
     
            </form>
        </div>

      
        <?php 
            if(isset($confirmationMessage)){
                echo '<p>'.$confirmationMessage.'</p>';
        }
        ?>
         <?php require_once(__DIR__.'/footer.php'); ?>
        </div>
  
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
