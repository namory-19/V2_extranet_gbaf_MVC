<?php

require_once 'model/dbConnection.php';

// function allows check if user us registred in database

function checkIfUserIsRegistred($username)
{
    $db = connectionDb();
    $req = $db->prepare('SELECT * FROM user WHERE username_user = :username_user'); // va chercher dans la BDD la ligne correspondante au username entré dans le formulaire de connexion
    $req->execute(array(
        'username_user' => $username,
    ));
    $UserIsRegistred = $req->fetch();
    $req->closeCursor();
    return $UserIsRegistred;
}
