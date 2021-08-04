<?php 

// function which add actors post in database

function addActorsPostsInDb($urlPost, $urlImgActors)
{
    $db=connectionDb(); // appelle la fonction de connexion à la BDD.
    $req = $db->prepare('INSERT INTO actors(title_post_actors, url_website_actors, content_post_actors, url_post_actors, url_img_actors, meta_description_actors, meta_keywords_actors, user_id, date_post_actors) VALUES(:title, :url_website, :content, :url_post, :url_img_actors, :meta_description, :meta_keywords, :user_id_post, NOW())'); // insére tous les informations du formulaire en base dans la table "actors"
    $req->execute(array(
        'title' => $_POST['title'],
        'url_website' => $_POST['url_website'],
        'content' => $_POST['text'],
        'url_post' => $urlPost,
        'url_img_actors' => $urlImgActors,
        'meta_description' => $_POST['meta_description'],
        'meta_keywords' => $_POST['meta_keywords'],
        'user_id_post' => $_SESSION['id_user']
    ));
    $req->closeCursor();
}

// function which update image url actors post in database

function updateUrlImgActorsPostsInDB($urlImgActors)
{
    $db=connectionDb(); // appelle la fonction de connexion à la BDD.
    // $reponse = $bdd->prepare('UPDATE actors SET url_img_actors = :url_img_actors WHERE id = (SELECT MAX(id))');
    $req = $db->prepare('UPDATE actors SET url_img_actors = :url_img_actors ORDER BY id_actors DESC LIMIT 1'); // récupère la dernière entrée dans la table et met à jour le chemin vers l'image
    $req->execute(array(
        'url_img_actors' => $urlImgActors
        ));
    $req->closeCursor();
}