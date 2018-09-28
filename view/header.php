<?php 
    if(isset($_SESSION['active'])){
    } else {
        header('location:http://localhost/projet4CreerBlogPourEcrivain/index.php?action=accueil');
    }

    if(defined('ROOT')){

    } else {
        define('ROOT', 'http://localhost/projet4CreerBlogPourEcrivain');
    }
?>

<header>
    <h1>NOTRE SITE</h1>
    <nav>
        <ul>
            <li><a href='<?php echo ROOT.'/view/backoffice.php'; ?>'>Accueil</a></li>
            <li><a href='<?php echo ROOT.'/view/createBillet.php'; ?>'>Nouveau Billet</a>
            </li>
        </ul>
        
    </nav>

</header>
