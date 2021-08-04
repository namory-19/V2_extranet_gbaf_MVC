<?php

require_once 'model/front/frontModelAccount.php';   

// function allowing the modification of personal information on the page my account on the user front office

function updateDataUser()
{
    if (isset ($_POST['nom']) && ($_POST['prenom'])  && ($_POST['mail'])) 
    {
        updateDataUserInDb();
        $UserDataByIdUse = selectUserDataByIdUser($_SESSION['id_user']);

        $name = $UserDataByIdUse['name_user'];
        $_SESSION['name'] = $name;
        $surname = $UserDataByIdUse['surname_user'];
        $_SESSION['surname'] = $surname;
        $mail = $UserDataByIdUse['mail_user'];
        $_SESSION['mail'] = $mail;

        $alert = alertMessage("success","Félicitation, vos informations ont été modifiées avec succès!");
    } 
    require_once 'view/front/accountUserViewPersonalInformation.php'; 
}



// function allowing the modification of the connection information on the page my account


function updateDataConnexion()
{
    if (isset ($_POST['username']) && ($_POST['actualpass']) && ($_POST['password']) && ($_POST['repassword'])) 
    {
        if ($_POST['password'] === $_POST['repassword']) 
        {
            $password = $_POST['password']; 
            if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $password)) 
            {
                $UserDataByIdUse = selectUserDataByIdUser($_SESSION['id_user']);

                $UserIsRegistred = checkIfUserIsRegistred($_POST['username']);

                $passCheck = password_verify($_POST['actualpass'], $UserDataByIdUse['password_user']); 

                if ($passCheck) 
                {
                    if (($UserIsRegistred == false) || ($UserDataByIdUse['username_user'] === $_SESSION['username'])) 
                    {
                        $passHash = password_hash($_POST['password'], PASSWORD_DEFAULT); 

                        updateDataConnectionInDb($passHash);

                        $UserDataByIdUse = selectUserDataByIdUser($_SESSION['id_user']);

                        $username = $UserDataByIdUse['username_user'];
                        $_SESSION['username'] = $username;
                        
                        $alert = alertMessage("success","Les modifications ont été apportées avec succès!");
                        return $alert;
                    }
                    else
                    {
                        $alert = alertMessage("error","Cet identifiant est déjà pris, merci d'en choisir un autre!");
                        return $alert;
                    }   
                }
                else
                {
                    $alert = alertMessage("error","Votre mot de passe actuel n'est pas bon, merci de corriger votre saisie.");
                    return $alert;
                }         
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
    require_once 'view/front/accountUserViewConnectionInformation.php'; 
}


// function allowing the modification of the secret question (and its answer) on the page my account.


function updateSecretQuestion()
{
    if (isset ($_POST['question']) && ($_POST['reponse'])) 
    {
        updateSecretQuestionInDb();

        $UserDataByIdUser = selectUserDataByIdUser($_SESSION['id_user']);

        $answer = $UserDataByIdUser['answer_user'];
        $_SESSION['answer'] = $answer;
        $question = $UserDataByIdUser['question_user'];
        $_SESSION['question'] = $question;
        
        $alert = alertMessage("success","Les modifications ont été apportées avec succès!");
        return $alert;
    }
    require_once 'view/front/accountUserViewSecretAnswer.php';
}




// function allowing the add or change  avatar image on the my account page


function updateImageAvatar()
{
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) 
    {
        if ($_FILES['avatar']['size'] <= 1000000) 
        {
            $infoFile = pathinfo($_FILES['avatar']['name']);
            $extensionUpload = $infoFile['extension']; 
            $extensionAuthorized = array('jpg', 'jpeg', 'gif', 'png', 'JPG', 'JPEG', 'GIF', 'PNG'); 
            if (in_array($extensionUpload, $extensionAuthorized)) 
            {
                $urlImgAvatar = 'avatar_user_'.$_SESSION['id_user'].'.'.$extensionUpload;                         
                move_uploaded_file($_FILES['avatar']['tmp_name'], 'public/img/avatar/' . basename($urlImgAvatar)); 
                updateImageAvatarInDb($urlImgAvatar);

                $_SESSION['url_img_avatar'] = $urlImgAvatar; 
                
                $alert = alertMessage("success","Votre image a été envoyé avec succès!");
                return $alert;
            }
            else
            {
                $alert = alertMessage("error","L'image envoyée n'est pas du bon format, merci de renvoyer une imag au format : jpg, jpeg, gif ou png.");
                return $alert;
            }
        }
        else
        {
            $alert = alertMessage("error","L'image envoyée est trop lourde, merci de renvoyer une image inférieure à 3mo.");
            return $alert;
        }
    }
    require_once 'view/front/accountUserViewAvatar.php';
}