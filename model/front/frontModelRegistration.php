<?php

require_once 'model/dbConnection.php';

// function allows insert data of registration form in database

function registrationFormInsertInDb($name, $surname, $mail, $username, $password, $question, $answer)
{
    $db = connectionDb();
    $req = $db->prepare('INSERT INTO user(name_user, surname_user, mail_user, username_user, password_user, question_user, answer_user, url_img_avatar_user, active_user, group_user, inscription_date_user) VALUES(upper(:name_user), :surname_user, :mail_user, :username_user, :password_user, :question_user, lower(:answer_user), :url_img_avatar_user, 1, 1, NOW())'); 
    $req->execute(array(
        'name_user' => $name,
        'surname_user' => $surname,
        'mail_user' => $mail,
        'username_user' => $username,
        'password_user' => $password,
        'question_user' => $question,
        'answer_user' => $answer,
        'url_img_avatar_user' => ''
    ));
    $req->closeCursor();
}