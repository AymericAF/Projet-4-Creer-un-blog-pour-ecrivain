<?php 
    require_once(__DIR__.'/../utils.php');
    forceConnection('login');
?>

<div class='container-fluid full-width'>
    <header class='headerAdmin'>
        <div class='container-fluid'>
            <div class="row">
                <div class="col-sm">
                    <a href="index.php?action=backofficeView"><h1 class='logo connect' >Jean Forteroche</h1></a>       
                </div>
                <div class="col-sm-2">
                    <?php if(isset($_SESSION['userId'])){
                        echo "<a class='connect' href=index.php?action=seDeconnecter>Se déconnecter</a>";
                        } else{
                            echo "<a class='connect' href=index.php?action=login>Se connecter</a>";
                        } ;
                    ?> 
                </div>
            </div>
        </div>
        <div>
            <nav>
                <ul class='nav'> 
                    <li class='nav-item'><a class='connect nav-link' href='<?php echo ROOT.'/index.php?action=backofficeView'; ?>'>Accueil</a></li>
                    <li class='nav-item'><a class='connect nav-link' href='<?php echo ROOT.'/index.php?action=createBilletDisplayView'; ?>'>Nouveau Billet</a></li>
                </ul>
            
            </nav>
        </div>
        


    </header>






