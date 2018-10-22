<?php 
    require_once(__DIR__.'/../utils.php');
    forceConnection('accueil');
?>

<header>
    <h1>NOTRE SITE</h1>
    <?php if(isset($_SESSION['userId'])){
        echo '<p>Vous êtes connecté UserId: '.$_SESSION['userId'].'</p>';
        echo '<a href=index.php?action=seDeconnecter>Se déconnecter</a>';
        } else{
            echo '<p>Vous n\'êtes pas connecté</p>';
            echo '<a href=index.php?action=loginAdmin>Se connecter</a>';
        } 
        
    ?>
    
    <nav>
        <ul>

        </ul>
        
    </nav>

</header>