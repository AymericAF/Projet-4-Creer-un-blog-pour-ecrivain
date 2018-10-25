<?php 
    require_once(__DIR__.'/../utils.php');
    forceConnection('login');
?>

<div class='container-fluid full-width'>
    <header class='headerAdmin'>
        <div class='container-fluid'>
            <div class="row">
                <div class="col-sm">
                    <h1>Jean Forteroche</h1>
                </div>
                <div class="col-sm-2">
                    <?php if(isset($_SESSION['userId'])){
                        echo '<p>Vous êtes connecté UserId:'.$_SESSION['userId'].'</p>';
                        echo '<a href=index.php?action=seDeconnecter>Se déconnecter</a>';
                        } else{
                            echo '<p>Vous n\'êtes pas connecté</p>';
                            echo '<a href=index.php?action=loginAdmin>Se connecter</a>';
                        } ;
                    ?> 
                </div>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href='<?php echo ROOT.'/index.php?action=backofficeView'; ?>'>Accueil</a></li>
                <li><a href='<?php echo ROOT.'/index.php?action=createBilletDisplayView'; ?>'>Nouveau Billet</a></li>
            </ul>
            
        </nav>

    </header>






