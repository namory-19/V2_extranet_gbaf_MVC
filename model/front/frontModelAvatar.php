<?php

// function which get avatar url in function of user id in session

function selectUrlImgAvatarByUserId()
{
    $db = connectionDb();
    $req = $db->prepare('SELECT url_img_avatar_user FROM user WHERE id_user = :id_user'); 
    $req->execute(array(
        'id_user' => $_SESSION['id_user']
    ));
    $urlImgAvatar = $req->fetch();
    $req->closeCursor();
    return $urlImgAvatar;
}