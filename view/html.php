<?php 
    require_once(__DIR__.'/../utils.php');
    forceConnection('accueil');
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title><?php echo $title;?></title>
        <meta charset="utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel='stylesheet' href=<?php echo ROOT.'/public/css/style.css'; ?>>
    </head>

    <body>
