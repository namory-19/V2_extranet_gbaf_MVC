<?php 

// function which delete actors data post in database

function deleteActorsPostsInDb()

    {
        $db=connectionDb();
        $req = $db->prepare('DELETE FROM actors WHERE url_post_actors = :url_post'); // requête qui permet de supprimer la ligne de la fiche acteur correspondante à la fiche courante
        $req->execute(array(
                'url_post' => $_GET['urlpost']
        ));
        $req->closeCursor();
    }