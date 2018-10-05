<?php 
    require_once(__DIR__.'/../utils.php');
    forceConnection('login');
?>

<!DOCTYPE html>
<html>
    <head>
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'.tinyText', language_url: '<?php echo ROOT.'/public/language/tinymce_languages/langs/fr_FR.js';?>'});</script>
        <link rel='stylesheet' href='
            <?php echo ROOT.'/public/css/style.css'; ?>'>
    </head>

    <body>
        <?php require_once(__DIR__.'/header.php');?>
        <h1>Création de billet</h1>
        <form method='post' action='http://localhost/projet4CreerBlogPourEcrivain/index.php'>
            <label for='newBilletTitle'>Titre</label>
            <input type='text' name='newBilletTitle' id='newBilletTitle'>
            <label for='newBilletContent'>Contenu du billet</label>
            <textarea class='tinyText' name='newBilletContent' id='newBilletContent'></textarea>
            <input type="submit" value='Enregistrer'>   
            <input type="hidden" name='action' value='createBillet'>     
        </form>
        <p>
            <?php 
                if(isset($confirmationMessage)){
                    echo $confirmationMessage;
                }
            ?>
        </p>
        
    </body>
</html>
