<?php
require_once(__DIR__.'/../utils.php');
require_once(__DIR__.'/../controller_utils.php');
require_once(__DIR__.'/../controller/reportController.php');
forceConnection('accueil');

?>

        <?php pageTitle('Article');
        require_once('headerUser.php');?>
                <p>Pour signaler un commentaire, vous devez être connecté.</p>
        <?php 

                if(isset($billet)){
                    echo "<div class='container divSousHeader'>";
                    echo '<h1>'.$billet->getTitle().'</h1>';
                    echo '<p>'.$billet->getContent().'<p>';
                    if(isset($_SESSION['userId'])){
                        echo "<a role='button' class='commentButton btn btn-primary' href='index.php?action=displayViewCreateComment&idBillet=".$billet->getId()."'>Laisser un commentaire</a>";
                    } else{
                        echo "<p class='bold'>Pour laisser ou signaler un commentaire, vous devez être connecté.</p>";
                        echo "<a class='btn btn-primary connect' href='index.php?action=login'>Se connecter</a>";
                    }
                    echo "</div>";
                }
                if(isset($_SESSION['message'])){
                    echo "<div class='container alert alert-".$_SESSION['messageType']." divSousHeader'>";
                    echo "<p>".$_SESSION['message']."</p>";
                    echo "</div>";
                    unset($_SESSION['message']);
                }
                
                if(isset($commentsTab)){
                    echo "<div class='container divSousHeader'><h2>Les commentaires</h2>";
                    foreach($commentsTab as $value){
                        echo "<div class='comments padding-10'>";
                        echo '<p><strong>'.$value[3].' le '.$value[4].'</strong></p>';
                        echo '<p>'.$value[2].'</p>';
                        if(isset($_SESSION['userId'])){
                            if($value[5]!= 1){
                                if($value[6]==1){
                                    echo "<p class='smallMessage'>Vous avez déjà signalé ce commentaire.</p>";
                                } else{
                                    echo "<a role='button' class='commentButton btn btn-primary' href='index.php?action=reportAComment&idComment=".$value[0]."'>Signaler le commentaire</a>";
                                }
                                
                            } else{
                                echo "<p class='smallMessage bold'>Ce commentaire a été validé par un modérateur et ne peut donc plus être signalé.</p>";
                            }
                        } 
                        echo '</div>';

                    }
                    echo "</div>";
                }        
        ?>
        <?php require_once(__DIR__.'/footer.php'); ?>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
    