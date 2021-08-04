<?php

// function allows the registration of user

require_once 'model/front/frontModelRegistration.php';

function registerUser()
{
    if (isset ($_POST['name']) && ($_POST['surname'])  && ($_POST['mail']) && ($_POST['username']) && ($_POST['password']) && ($_POST['repassword']) && ($_POST['question']) && ($_POST['answer'])) 
    {
        $_SESSION['username'] = $_POST['username']; 
        if ($_POST['password'] === $_POST['repassword']) 
        {
            $password = $_POST['password']; 
            if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $password)) 
            {
                if ($_POST['mail'] === $_POST['remail']) 
                {
                    $UserIsRegistred = checkIfUserIsRegistred($_POST['username']);

                    if ($UserIsRegistred == false) 
                    {
                        $passHash = password_hash($_POST['password'], PASSWORD_DEFAULT); 
                        registrationFormInsertInDb($_POST['name'], $_POST['surname'], $_POST['mail'], $_POST['username'], $passHash, $_POST['question'], $_POST['answer']);
                        $alert = alertMessage("success","Félicitation, votre compte a été créé avec succès! <a href=\"index.php?controller=connection\" target=\"_blank\" rel=\"noopener noreferrer\">Cliquez ici</a> pour vous connecter à l'extranet GBAF.");
                    }
                    else
                    {
                        $alert = alertMessage("error","Cet identifiant est déjà pris, merci d'en choisir un autre.");
                    }
                }
                else
                {
                    $alert = alertMessage("error","Vos adresses mail ne sont pas identiques, merci de corriger votre saisie.");
                }
            }  
            else
            {
                $alert = alertMessage("error","Votre mot de passe ne respecte pas la régle imposée : 8 à 15 caractères, 1 majuscule minimum, 1 miniscule minimum, 1 chiffre minimum, 1 caractère spécial.");
            }
        }
        else
        {
            $alert = alertMessage("error","Vos mots de passe ne sont pas identiques, merci de corriger votre saisie");
        }
    }
    require_once 'view/front/registrationView.php';
}