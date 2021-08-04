<?php

require_once 'model/dbConnection.php';

// function allows update password in database

function updatePassUser($passHash)
    {
        $db = connectionDb();
        $req = $db->prepare('UPDATE user SET password_user = :passwordUser WHERE username_user = :usernameUser'); 
        $req->execute(array(
            'passwordUser' => $passHash,
            'usernameUser' => $_POST['username']
        ));
    }

