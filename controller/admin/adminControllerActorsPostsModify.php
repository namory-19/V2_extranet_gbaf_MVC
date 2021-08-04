<?php

require_once 'model/admin/adminModelActorsPostsModify.php';
require_once 'model/admin/adminModelActorsPostsAdd.php';
require_once 'model/front/frontModelActors.php';

// function allowing update of actors post

function modifyActorsPosts()
{
    $actualUrlPost = $_GET['urlpost'];
    $actorPost = selectActorPost($actualUrlPost);

    if ($actualUrlPost === $actorPost['url_post_actors'])
    {
        if (isset ($_POST['title']) && ($_POST['text'])) 
        {
            $urlPostDirty=$_POST['title']; 
            $urlPostClean = valideChaine( $urlPostDirty ); 
            $newUrlPost = $urlPostClean.'.html'; 
            $idActors = $actorPost['id_actors'];
            updateDataPostActorsInDb($idActors, $newUrlPost);

            if (isset($_FILES['img_actors']) && $_FILES['img_actors']['error'] == 0) 
            { 
                if ($_FILES['img_actors']['size'] <= 1000000) 
                {
                    $fileInfo = pathinfo($_FILES['img_actors']['name']); 
                    $extensionUpload = $fileInfo['extension']; 
                    $extensionAuthorized = array('jpg', 'jpeg', 'gif', 'png', 'JPG', 'JPEG', 'GIF', 'PNG'); 
                        if (in_array($extensionUpload, $extensionAuthorized)) 
                        {
                        $urlImgActors = 'public/img/actors/'.$urlPostClean.'.'.$extensionUpload;                       
                        move_uploaded_file($_FILES['img_actors']['tmp_name'], 'public/img/actors/' . basename($urlImgActors)); 
                        updateUrlImgActorsPostsInDB($urlImgActors);
                        }
                        else
                        {
                            $alert = alertMessage('error',"L'image envoyée n'est pas du bon format, merci de renvoyer une image au format : jpg, jpeg, gif ou png.");
                        }
                }
                else
                {
                    $alert = alertMessage('error',"L'image envoyée est trop lourde, merci de renvoyer une image inférieure à 1mo.");
                }
            } 
            $actorPost = selectActorPost($newUrlPost);
            $alert = alertMessage('success',"Vos modifications ont bien été enregistrées!");
        }
    }
    else
    {
       header('location:/index.php?controller=adminhome');
    }
    require_once 'view/admin/adminActorsPostsModifyView.php';
}
