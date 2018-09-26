<?php 
    // if($_SESSION['access_level']!=='admin'){
    //     header('location: ../index.php');
    // }
    if(defined('ROOT')){

    } else {
        define('ROOT', 'http://localhost/projet4CreerBlogPourEcrivain');
    }

?>

<header>
    <h1>NOTRE SITE</h1>
    <nav>
        <ul>
            <li><a href='<?php echo ROOT.'/view/createBillet.php'; ?>'>Nouveau Billet</a>
            </li>
        </ul>
        
    </nav>

</header>
