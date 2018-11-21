<?php 
    require_once(__DIR__.'/../utils.php');
    require(__DIR__.'/../parameters.php');
    forceConnection('login');
    checkAdminLevelAuthorisation();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apikey=<?php echo $apiKeyTinyMCE;?>"></script>
        <script>tinymce.init({ selector:'.tinyText', language_url: '<?php echo ROOT.'/public/language/tinymce_languages/langs/fr_FR.js';?>'});</script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel='stylesheet' href=<?php echo ROOT.'/public/css/style.css'; ?>>
    </head>

    <body>
        <?php require_once(__DIR__.'/header.php');?>
        <!-- <h1>Création de billet</h1> -->
        <form class='container divSousHeaderAdmin' method='post' action='<?php echo ROOT.'/index.php';?>'>
            <div class='form-group'>
                <label for='newBilletTitle'>Titre</label>
                <input type='text' name='newBilletTitle' id='newBilletTitle'>
            </div>
            <div class='form-group'>
                <label for='newBilletContent'>Contenu du billet</label>
                <textarea class='tinyText' name='newBilletContent' id='newBilletContent'></textarea>
            </div>
            <div class='form-group'>
                <input class='btn btn-primary' type="submit" value='Enregistrer'>   
                <input type="hidden" name='action' value='createBillet'>
            </div>     
        </form>
      
        <?php 
            if(isset($confirmationMessage)){
                echo '<p>'.$confirmationMessage.'</p>';
            }
        ?>
        <?php require_once(__DIR__.'/footerBackoffice.php');?>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
