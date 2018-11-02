<?php 
    require_once(__DIR__.'/../utils.php');
    require_once(__DIR__.'/../controller/billetController.php');
    forceConnection('login');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'.tinyText', language_url: '<?php echo ROOT.'/public/language/tinymce_languages/langs/fr_FR.js';?>'});</script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel='stylesheet' href=<?php echo ROOT.'/public/css/style.css'; ?>>
    </head>

    <body>
        <?php require_once(__DIR__.'/header.php');?>
        <!-- <h1>Modification de billet</h1> -->
        <form class='container divSousHeaderAdmin padding-top-20' method='post' action='<?php echo ROOT.'/index.php';?>'>
            <div class='form-group'>
                <label class='bold' for='newBilletTitle'>Titre :</label>
                <input class='titleModify' type='text' name='newBilletTitle' id='newBilletTitle' value="<?php if(isset($billet)){echo $billet->getTitle();}?>">
            </div>
            <div class='form-group'>
                <label class='bold' for='newBilletContent'>Contenu du billet :</label>
                <textarea class='tinyText' name='newBilletContent' id='newBilletContent'><?php if(isset($billet)){echo $billet->getContent();}?></textarea> 
            </div>
            <div class='form-group'>
                <input class='btn btn-primary' type="submit" value='Enregistrer'>   
                <input type='hidden' name='idBillet' id='idBillet' value="<?php if(isset($billet)){echo $billet->getId();}?>" >
                <input type="hidden" name='action' value='modifyBillet'>  
            </div>
        </form>
        <?php require_once(__DIR__.'/footerBackoffice.php'); ?>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
