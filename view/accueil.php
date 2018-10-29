<?php
require_once(__DIR__.'/../utils.php');
require_once(__DIR__.'/../controller_utils.php');
forceConnection('accueil');
?>

        <?php pageTitle('Accueil');
            require_once('headerUser.php');?>
        <!-- </div> -->
        <div id='title'>
            <h2>Billet simple pour l'Alaska</h2>
            <img src='public\image\aurora-1185464_1920.jpg' class="img-fluid" alt="Aurore boréale en Alaska">
        </div>
        
        
        <?php 
            if(isset($_SESSION['message'])){
                echo "<div class='padding-20-top container alert alert-".$_SESSION['messageType']."'>";
                echo "<p>".$_SESSION['message']."</p>";
                echo "</div>";
                unset($_SESSION['message']);
            }

            if(isset($billets)){
                echo "<div class='container'>";
                echo "<div class='row'>";
                foreach($billets as $value){
                    echo "<div class='col-12 col-sm-4'>";
                    echo "<a role='button' class='articleLink' href=index.php?action=articleView&idBillet=$value[2]><h2>$value[0]</h2></a>";
                    echo "<p>".substr($value[1], 0, 200)."..."."</p>";
                    echo "<a role='button' class='articleLink btn btn-primary' href=index.php?action=articleView&idBillet=$value[2]>Lire la suite</a>";
                    echo '<br />';
                    echo "</div>";
                }
                echo "</div>";
                echo "</div>";
            }
        ?>
        <nav aria-label="Page navigation">
            <ul class="pagination container">
                
                <li class="page-item"><a class="page-link" href='index.php?action=accueil&page=.
                <?php 
                    if($page==0){
                        $page = 1; 
                        echo $page;
                        } else{
                            $page = $page - 1 ;
                            echo $page;
                            };
                ?>>Page précédente</a></li>
                <?php 
                    $i = 1;
                    while($i <= $maxNbOfPage) {
                        echo "<li class='page-item'><a class='page-link' href='index.php?action=accueil&page=$i'>$i</a></li>";
                        $i++;
                    };
                ?>
                <li class="page-item"><a class="page-link" href='index.php?action=accueil&page='$page+1>Page suivante</a></li>
            </ul>
        </nav>
        <?php   
            require_once(__DIR__.'/footer.php');
        ?>
    </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>