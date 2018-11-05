<?php
require_once(__DIR__.'/../utils.php');
forceConnection('login');


?>
        <?php pageTitle('Connexion');
        require_once('headerUser.php');?>
        <div class='container divSousHeader'>
    
            <div class='row padding-top-20'>
                <div class='col-md-6'>
                    <p class='bold'>Vous avez un compte utilisateur? </p>
                    <p>Veuillez saisir les informations ci-dessous pour vous connecter.</p>
                    <form class='col-12' method="post" action='<?php echo ROOT.'/index.php';?>'>
                        <div class='form-group'>
                            <label for="pseudoConnect">Pseudo :</label>
                            <input type="text" name="pseudoConnect" id="pseudoConnect">
                        </div>
                        <div class='form-group'>
                            <label for="passwordConnect">Mot de passe :</label>
                            <input type="password" name="passwordConnect" id="passwordConnect">
                        </div>
                        <div class='form-group'>
                            <input class='btn btn-primary' type="submit" value="Valider">
                            <input type='hidden' name='action' value='loginAdmin'>
                        </div>
                    </form>
                </div>
                <div class='col-md-6'>
                    <p class='bold'>Vous n'avez pas de compte utilisateur? </p>
                    <p>Veuillez saisir les informations ci-dessous pour vous en créer un.</p>
                    <form class='col-12' method="post" action='<?php echo ROOT.'/index.php';?>'>
                        <div class='form-group'>
                            <label for='pseudoCreate'>Pseudo :</label>
                            <input type='text' name='pseudoCreate' id='pseudoCreate'>
                        </div>
                        <div class='form-group'>
                            <label for='email'>E-Mail :</label>
                            <input type='email' name='email' id='email'>
                        </div>
                        <div class='form-group'>
                            <label for='passwordCreate'>Mot de passe :</label>
                            <input type='password' name='passwordCreate' id='passwordCreate'>
                        </div>
                        <div class='form-group'>
                            <label for='passwordConfirmation'>Confirmation du mot de passe :</label>
                            <input type='password' name='passwordConfirmation' id='passwordConfirmation'>
                        </div>
                        <div class='form-group'>
                            <input type='hidden' name='action' value='newUser'>
                            <input class='btn btn-primary' type='submit' value='Enregistrer'>
                        </div>

                    </form>
                    <?php if(isset($message)){
                        echo '<p>'.$message.'</p>';
                    }
                    ?>
                </div>
                <?php if(isset($_SESSION['message'])){
                    echo "<div class='container alert alert-".$_SESSION['messageType']." '>";
                    echo "<p>".$_SESSION['message']."</p>";
                    echo "</div>";
                    unset($_SESSION['message']);
                } ?>
            </div>

        </div>
        <?php require_once(__DIR__.'/footer.php'); ?>
        </div>
       
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>