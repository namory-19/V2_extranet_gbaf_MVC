<?php

require_once 'model/front/frontModelAvatar.php';

// function that allows the display of the avatar image

function viewImgAvatar()
{
    $urlImgAvatar = selectUrlImgAvatarByUserId();
    if ($urlImgAvatar['url_img_avatar_user'] == false) 
    {
        $avatarImg = '../public/img/icon_user.png'; 
    }
    else
    {
        $avatarImg = '../public/img/avatar/'.$urlImgAvatar['url_img_avatar_user']; 
    }

   return $avatarImg; 
}