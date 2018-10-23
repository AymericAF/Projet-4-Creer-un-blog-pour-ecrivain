<?php
require_once(__DIR__.'/../utils.php');
forceConnection('login');


?>
<!DOCTYPE Html>
<html>
    <head>
        <title>Connexion</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel='stylesheet' href=<?php echo ROOT.'/public/css/style.css'; ?>>
    </head>

    <body>
        <?php require_once('headerUser.php')?>

        <form id='test' method="post" action='<?php echo ROOT.'/index.php';?>'>
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
        <div>
            <p>Vous n'avez pas de compte utilisateur? </p>
            <p>Veuillez saisir les informations ci-dessous pour vous en créer un.</p>
            <form method="post" action='<?php echo ROOT.'/index.php';?>'>
                <label for='pseudo'>Pseudo</label>
                <input type='text' name='pseudo' id='pseudo'>
                <label for='email'>E-Mail</label>
                <input type='email' name='email' id='email'>
                <label for='emailConfirmation'>Mot de passe</label>
                <input type='password' name='password' id='password'>
                <label for='password'>Confirmation du mot de passe</label>
                <input type='password' name='passwordConfirmation' id='passwordConfirmation'>
                <input type='hidden' name='action' value='newUser'>
                <input type='submit' value='Enregistrer'>
            </form>
            <?php if(isset($message)){
                echo '<p>'.$message.'</p>';
            }; ?>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>