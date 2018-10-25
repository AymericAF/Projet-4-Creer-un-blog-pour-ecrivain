<?php 
    require_once(__DIR__.'/../utils.php');
    forceConnection('accueil');
?>

<div class='container-fluid full-width'>
    <header>
        <div class='container-fluid max-height' >
            <div class='row max-height'>
                <div class='col-sm'>
                    <a href="index.php?action=accueilView"><h1 class='logo connect' >Jean Forteroche</h1></a>
                </div>  
                <div class='col-sm-2'>
                    <?php if(isset($_SESSION['userId'])){
                        echo "<a class='connect' href=index.php?action=seDeconnecter>Se déconnecter</a>";
                        } else{
                            echo "<a class='connect' href=index.php?action=loginAdmin>Se connecter</a>";
                        } 
                    ?>  
                </div>
            </div>

        </div>

    </header>
