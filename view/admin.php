<?php
if(isset($_SESSION['active'])){
} else {
    header('location:http://localhost/projet4CreerBlogPourEcrivain/index.php?action=login');
}

?>
<!DOCTYPE Html>
<html>
    <head>
        <title>Connexion Admin</title>
    </head>

    <body>
        <form method="post" action="http://localhost/projet4CreerBlogPourEcrivain/index.php">
            <label for="pseudo">Pseudo :</label>
            <input type="text" name="pseudo" id="pseudo">
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password">
            <input type="submit" value="Valider">
            <input type='hidden' name='action' value='loginAdmin'>
        </form>
        <div>
            <?php  
                if(isset($erreurAdmin)){             
                    echo $erreurAdmin;
                }
            ?>
        </div>
    </body>
</html>