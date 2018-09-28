<?php
if(isset($_SESSION['active'])){
} else {
    header('location:http://localhost/projet4CreerBlogPourEcrivain/index.php?action=accueil');
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Accueil</title>
    </head>

    <body>
        <h1>Bienvenue à la page d'accueil</h1>

    </body>
</html>