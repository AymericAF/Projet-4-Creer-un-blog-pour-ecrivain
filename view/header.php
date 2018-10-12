<?php 
    require_once(__DIR__.'/../utils.php');
    forceConnection('login');
?>

<header>
    <h1>NOTRE SITE</h1>
    <nav>
        <ul>
            <li><a href='<?php echo ROOT.'/index.php?action=backofficeView'; ?>'>Accueil</a></li>
            <li><a href='<?php echo ROOT.'/index.php?action=createBilletDisplayView'; ?>'>Nouveau Billet</a></li>
        </ul>
        
    </nav>

</header>
