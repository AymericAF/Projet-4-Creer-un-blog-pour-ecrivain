<?php
require_once(__DIR__.'/../utils.php');
require_once(__DIR__.'/../model/UsersManager.php');
require_once(__DIR__.'/../controller_utils.php');
forceConnection('accueil');

function viewHome($page){
    read('accueil', $page);
}

function userLogin(){
    if(isset($_SESSION['userId'])){
        require_once(__DIR__.'/../view/createComment.php');
    } else{
        redirect('loginAdmin');
    }
}

function newUser($pseudo, $email, $password, $passwordConfirmation){
    if(isset($pseudo) && !empty($pseudo) && isset($email) && !empty($email) && isset($password) && !empty($password) && isset($passwordConfirmation) && !empty($passwordConfirmation)){
        if($password!==$passwordConfirmation){
            $message = 'Le mot de passe saisi et sa confirmation sont différents. Veuillez saisir le même mot de passe dans ces 2 champs.';
            require_once(__DIR__.'/../view/admin.php');
        } else{
            $usersCheckPseudo = new Users();
            $userCheckPseudo = $usersCheckPseudo->getUserInformationWithPseudo($pseudo);
            $usersCheckEmail = new Users();
            $userCheckEmail = $usersCheckEmail->getUserInformationWithEmail($email);
            if(!empty($userCheckEmail->getMail_address())){
                $message = 'Cette adresse e-mail est déjà utilisée.';
                require_once(__DIR__.'/../view/admin.php');
            } elseif(!empty($userCheckPseudo->getPseudo())){
                $message = 'Ce Pseudo est déjà utilisé. Veuillez en saisir un autre.';
                require_once(__DIR__.'/../view/admin.php');
               } else{
                    $users = new Users();
                    $users->newUserInDb($pseudo, $email, $password, $passwordConfirmation);
                    $message = 'Votre compte utilisateur a bien été créé. Vous pouvez l\'utiliser dès à présent.';
                    require_once(__DIR__.'/../view/admin.php');
               }
        }

    } else{
    $message = 'Certaines informations n\'ont pas été saisie.';
    require_once(__DIR__.'/../view/admin.php');
    }
}
