<?php

require_once 'model/front/frontModeldPassForgot.php';
require_once 'model/front/frontModelConnection.php';

// function allows the view of id pass forgot page

function idPassForgot()
{
    require_once 'view/front/idPassForgotView.php';
}

// function allows check if user is registred

function controlAccount()
{
    if (isset($_POST['username'])) 
    { 
        $UserIsRegistred = checkIfUserIsRegistred($_POST['username']);
        
        if ($UserIsRegistred == false) 
        {
            $alert = alertMessage("error","Votre identfiant n'est pas bon, merci de corriger votre saisie.");
            return $alert;
        }
        else
        {
            return $UserIsRegistred;
        }
    }
    require_once 'view/front/idPassForgotView.php';
}

// function allows to change user password

function changePassUser()
{
            if (isset($_POST['reponse'])) // si la réponse est présente
            {
                $UserIsRegistred = controlAccount();
                $answerUser = strtolower($_POST['reponse']); 
                if ($answerUser === $UserIsRegistred['answer_user']) 
                {
                    if ($_POST['password'] === $_POST['repassword']) 
                    {
                        $password = $_POST['password']; 
                        if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $password)) 
                        {
                            $passHash = password_hash($_POST['password'], PASSWORD_DEFAULT); 
                            updatePassUser($passHash);

                            $alert = alertMessage("success","Félicitation, votre mot de passe a été changé avec succès! <a href=\"index.php?controller=connection\" target=\"_blank\" rel=\"noopener noreferrer\">Cliquez ici</a> pour vous connecter à l'extranet GBAF.");
                            return $alert;
                        }
                        else
                        {
                            $alert = alertMessage("error","Votre mot de passe ne respecte pas la régle imposée : 8 à 15 caractères, 1 majuscule minimum, 1 miniscule minimum, 1 chiffre minimum, 1 caractère spécial.");
                            return $alert;
                        }
                    }
                    else
                    {
                        $alert = alertMessage("error","Vos mots de passe ne sont pas identiques, merci de corriger votre saisie.");
                        return $alert;
                    }
                }
                else
                {
                    $alert = alertMessage("error","Votre réponse à la question n'est pas bonne, merci de corriger votre saisie.");
                    return $alert;
                }
            }
            require_once 'view/front/idPassForgotView.php';
}
?> 