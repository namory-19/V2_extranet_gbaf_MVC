<?php

// function which get all user data in function of user id

function selectUserDataByIdUser($idUser)
{
    $db = connectionDb();
    $req = $db->prepare('SELECT * FROM user WHERE id_user = :idUser'); 
    $req->execute(array(
        'idUser' => $idUser
    ));
    $UserDataByIdUser = $req->fetch();
    $req ->closeCursor();
    return $UserDataByIdUser;
}

// function which update data of user in database

function updateDataUserInDb()
{
    $db = connectionDb();
    $req = $db->prepare('UPDATE user SET name_user = upper(:name_user), surname_user = :surname_user, mail_user = :mail_user WHERE username_user = :username_user'); 
    $req->execute(array(
        'name_user' => $_POST['nom'],
        'surname_user' => $_POST['prenom'],
        'mail_user' => $_POST['mail'],
        'username_user' => $_SESSION['username']
    ));
    $req ->closeCursor();
}

// function which update data connection of user in database

function updateDataConnectionInDb($passHash)
{
    $db = connectionDb();
    $req = $db->prepare('UPDATE user SET username_user = :username_user, password_user = :password_user WHERE id_user = :idUser'); 
    $req->execute(array(
        'username_user' => $_POST['username'],
        'password_user' => $passHash,
        'idUser' => $_SESSION['id_user']
    ));
    $req ->closeCursor();
}

// function which update data secret question of user in database

function updateSecretQuestionInDb()
{
    $db = connectionDb();
    $req = $db->prepare('UPDATE user SET question_user = :question_user, answer_user = lower(:answer_user) WHERE id_user = :idUser'); 
    $req->execute(array(
        'question_user' => $_POST['question'],
        'answer_user' => $_POST['reponse'],
        'idUser' => $_SESSION['id_user']
    ));
    $req->closeCursor();
}

// function which update avatar image url of user in database

function updateImageAvatarInDb($urlImgAvatar)
{
    $db = connectionDb();
    $req = $db->prepare('UPDATE user SET url_img_avatar_user = :urlImgAvatar WHERE id_user = :idUser'); 
    $req->execute(array(
        'urlImgAvatar' => $urlImgAvatar,
        'idUser' => $_SESSION['id_user']
    ));
    $req->closeCursor();
}