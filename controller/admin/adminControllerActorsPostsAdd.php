<?php

require_once 'model/admin/adminModelActorsPostsAdd.php';


// function replace several spaces in a row with one " - " and also replace the " ' " by  " - "


function valideChaine($chaineNonValide)
{
  $chaineNonValide = preg_replace('`\s+`', '-', trim($chaineNonValide));
  $chaineNonValide = str_replace("'", "-", $chaineNonValide);
  $chaineNonValide = str_replace(",", "-", $chaineNonValide);
  $chaineNonValide = str_replace("&", "-", $chaineNonValide);
  $chaineNonValide = preg_replace("`_+`", '-', trim($chaineNonValide));
  $chaineValide=strtr($chaineNonValide,
"ÀÁÂàÄÅàáâàäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏ" .
"ìíîïÙÚÛÜùúûüÿÑñ",
"aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn");
  return ($chaineValide);
}



// function which allows the add of a new actor post


function addActorsPosts()
{
    if (isset ($_POST['title']) && ($_POST['title'])) 
    {
        $urlImgActors = 'public/img/no_image.png'; 

        $urlPostDirty=$_POST['title']; 
        $urlPostClean = valideChaine( $urlPostDirty ); 
        $urlPost = $urlPostClean.'.html'; 
        
        addActorsPostsInDb($urlPost, $urlImgActors);

        $alert = alertMessage("success","Félicitation, votre articlé a été enregistré avec succès! <a href=\"index.php?controller=adminhome\" target=\"_blank\" rel=\"noopener noreferrer\">Cliquez ici</a> pour retourner à la liste des articles.");


        if (isset($_FILES['img_actors']) && $_FILES['img_actors']['error'] == 0)
        { 
            if ($_FILES['img_actors']['size'] <= 1000000) 
            {
                $infoFile = pathinfo($_FILES['img_actors']['name']); 
                $extensionUpload = $infoFile['extension']; 
                $extensionAuthorized = array('jpg', 'jpeg', 'gif', 'png', 'JPG', 'JPEG', 'GIF', 'PNG'); 
                if (in_array($extensionUpload, $extensionAuthorized)) 
                {
                    $titleDirty=$_POST['title']; 
                    $titleClean= valideChaine( $titleDirty ); 
                    $urlImgActors = 'public/img/actors/'.$titleClean.'.'.$extensionUpload;                        
                    move_uploaded_file($_FILES['img_actors']['tmp_name'], 'public/img/actors/' . basename($urlImgActors));  
                    
                    updateUrlImgActorsPostsInDB($urlImgActors);
                }
                else
                {
                    $alert = alertMessage("error","L'image envoyée n'est pas du bon format, merci de renvoyer une image au format : jpg, jpeg, gif ou png.");     
                }
            }
            else
            {
                $alert = alertMessage("error","'image envoyée est trop lourde, merci de renvoyer une image inférieure à 1mo.");     
            }
        }   
    }
    require_once 'view/admin/adminActorsPostsAddView.php';
}