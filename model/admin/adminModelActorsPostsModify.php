<?php

// function which update actors data post in database

function updateDataPostActorsInDb($idActors,$newUrlPost)
{
    $db = connectionDb(); // appelle la fonction de connexion à la BDD.
    $req = $db->prepare('UPDATE actors SET title_post_actors = :title, url_website_actors = :url_website,  content_post_actors = :content,  url_post_actors = :url_post, meta_description_actors = :meta_description, meta_keywords_actors = :meta_keywords WHERE id_actors = :id_actors'); // insére tous les modifications apportées à la fiche acteur
    $req->execute(array(
        'title' => $_POST['title'],
        'url_website' => $_POST['url_website'],
        'content' => $_POST['text'],
        'url_post' => $newUrlPost,
        'meta_description' => $_POST['meta_description'],
        'meta_keywords' => $_POST['meta_keywords'],
        'id_actors' => $idActors
    )); 
}


                  


