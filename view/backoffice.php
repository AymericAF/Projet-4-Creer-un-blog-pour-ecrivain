<?php 
    require_once(__DIR__.'/../utils.php');
    forceConnection('login'); 
?>

        <?php pageTitle('Backoffice');
        require_once('header.php')?>

        <div>
        
            <?php
                if(isset($_SESSION['message'])){
                    echo "<div class='test container alert alert-".$_SESSION['messageType']." divSousHeaderAdmin'>";
                    echo "<p>".$_SESSION['message']."</p>";
                    echo "</div>";
                    unset($_SESSION['message']);
                }
            ?>
            <?php 
                if(isset($billets)){
                    foreach($billets as $value){
                        echo "<div class='container divSousHeaderAdmin'>"; 
                        echo '<h2>'.$value[0].'</h2>';
                        echo $value[1];
                        echo "<a class='modifyButton btn btn-primary' href=index.php?action=displayBilletToModify&idBillet=$value[2]>Modifier</a>";
                        echo '  ';
                        echo "<a class='deleteButton btn btn-danger' href=index.php?action=deleteBillet&idBillet=$value[2]>Supprimer</a>";
                        echo '</div>';
                        echo '<br />';
                    }
                }
            ?>

        </div>
        <nav aria-label="Page navigation" class='divSousHeaderAdmin'>
                <ul class="pagination container">
                    <li class="page-item"><a class="page-link" href='index.php?action=backofficeView&page=<?php if(($page-1) == 0){echo $page;}else{echo ($page-1);}; ?>'>Page précédente</a></li>
                    <?php 
                        $i = 1;
                        while($i <= $maxNbOfPage) {
                            echo "<li class='page-item'><a class='page-link' href='index.php?action=backofficeView&page=$i'>$i</a></li>";
                            $i++;
                        };
                    ?>
                    <li class="page-item"><a class="page-link" href='index.php?action=backofficeView&page=<?php if(($page+1)>$maxNbOfPage){echo $page;}else{echo ($page+1);}?>'>Page suivante</a></li>
                </ul>
        </nav>
        <?php   
            require_once(__DIR__.'/footerBackoffice.php');
        ?>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
