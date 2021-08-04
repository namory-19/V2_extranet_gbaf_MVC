<?php

require_once 'model/front/frontModelConnection.php';


// function to delete the session

function killSession()
{
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();

    header('Location: index.php?controller=connection');
}

// function to control and allows connection

function connectionUser()
{
    if (isset ($_POST['username']) && ($_POST['password'])) 
    {
        if (isset($_POST['remember_me'])) 
        {
            setcookie('username', $_POST['username'], time() + 365*24*3600, null, null, false, true); 
            setcookie('password', $_POST['password'], time() + 365*24*3600, null, null, false, true); 
        }
        else 
        {
            setcookie('username', $_POST['username'], time() -3600, null, null, false, true); 
            setcookie('password', $_POST['password'], time() -3600, null, null, false, true); 
        }

        $UserIsRegistred = checkIfUserIsRegistred($_POST['username']);
        
        $passcheck = password_verify($_POST['password'], $UserIsRegistred['password_user']); 
        
        if ($UserIsRegistred) 
        {
            if ($UserIsRegistred['active_user'] === '1') 
            {
                if ($passcheck) 
                {
                    $name = $UserIsRegistred['name_user'];
                    $_SESSION['name'] = $name;
                    $surname = $UserIsRegistred['surname_user'];
                    $_SESSION['surname'] = $surname;
                    $username = $UserIsRegistred['username_user'];
                    $_SESSION['username'] = $username;
                    $id_user = $UserIsRegistred['id_user'];
                    $_SESSION['id_user'] = $id_user;
                    $mail = $UserIsRegistred['mail_user'];
                    $_SESSION['mail'] = $mail;
                    $answer = $UserIsRegistred['answer_user'];
                    $_SESSION['answer'] = $answer;
                    $question = $UserIsRegistred['question_user'];
                    $_SESSION['question'] = $question;
                    $usergroup = $UserIsRegistred['group_user'];
                    $_SESSION['usergroup'] = $usergroup;
                    $active = $UserIsRegistred['active_user'];
                    $_SESSION['active'] = $active;
                    
                    header('Location: index.php?controller=home'); 
                }
                else 
                {
                    $alert = alertMessage("error","Votre mot de passe n'est pas bon, merci de corriger votre saisie.");
                }
            }
            else 
            {
                $alert = alertMessage("error","Votre compte a été désactivé par un administrateur, merci de contacter ce dernier à <a href=\"mailto:admin@gbaf.fr\">admin@gbaf.fr</a>");
            }
        }
        else 
        {
            $alert = alertMessage("error","Votre identfiant n'est pas bon, merci de corriger votre saisie.");
        }
    }
    require_once 'view/front/connectionUserView.php';
}
