<?php

// function which retrieves the number (of lines) of comments for the record being viewed

function selectNumberOfComments($actorsId)
{
    $db = connectionDb();
    $req = $db->prepare('SELECT COUNT(*) AS numberComment FROM comment WHERE actors_id = :actorsId'); 
    $req->execute(array(
        'actorsId' => $actorsId
    ));
    $numberOfComments = $req->fetch();
    $req->closeCursor();
    return $numberOfComments;
}

// function which retrieves the number (of lines) of comments by user for the record being viewed

function selectNumberOfCommentsByUser($actorsId)
{
    $db = connectionDb();
    $req = $db->prepare('SELECT COUNT(*) AS numberOfCommentUser FROM comment WHERE actors_id = :actorsId AND user_id = :userIdComment'); 
    $req->execute(array(
        'actorsId' => $actorsId,
        'userIdComment' => $_SESSION['id_user']
    ));
    $numberOfCommentsByUser = $req->fetch();
    $req->closeCursor();
    return $numberOfCommentsByUser;
}

// function allows insert new comment in database

function insertCommentInDb($actorsId)
{
    $db = connectionDb();
    $req = $db->prepare('INSERT INTO comment(content_comment, date_comment, user_id, actors_id) VALUES(:comment, NOW(), :userIdComment, :actorsId)'); // insére le nouveau commentaire en BDD
    $req->execute(array(
        'comment' => $_POST['commentaire'],
        'userIdComment' => $_SESSION['id_user'],
        'actorsId' => $actorsId
    ));
    $req->closeCursor(); 
       
}

// function which retrieves comments user in actors post

function selectCommentsActors($actorsId,$firstComment,$numberOfCommentsByPage)
{
    $db = connectionDb();
    $req = $db->prepare('SELECT u.surname_user, u.url_img_avatar_user , c.content_comment, DATE_FORMAT(c.date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS dateComment FROM comment c INNER JOIN user u ON c.user_id=u.id_user WHERE actors_id = :actorsId ORDER BY c.user_id DESC LIMIT ' .$firstComment.','.$numberOfCommentsByPage);
    $req->execute(array(
        'actorsId' => $actorsId
    ));
    return $req;
}

// function which retrieve the number of dislike

function selectNumberOfUnlike($actorsId,$down)
{
    $db = connectionDb();
    $req = $db->prepare('SELECT COUNT(*) AS numberOfUnlike FROM like_unlike WHERE down = :down AND actors_id = :actorsId'); // requête qui permet de récupèrer le nombre de dislike (down vaut 1) pour la fiche
    $req->execute(array(
        'actorsId' => $actorsId,
        'down' => $down
    ));
    $numberOfUnlike = $req->fetch();
    $req->closeCursor();
    return $numberOfUnlike; 
}

// function which retrieve the number of like

function selectNumberOfLike($actorsId,$up)
{
    $db = connectionDb();
    $req = $db->prepare('SELECT COUNT(*) AS numberOfLike FROM like_unlike WHERE up = :up AND actors_id = :actorsId'); // requête qui permet de récupèrer le nombre de dislike (up vaut 1) pour la fiche 
    $req->execute(array(
        'actorsId' => $actorsId,
        'up' => $up
    ));
    $numberOfLike = $req->fetch();
    $req->closeCursor();
    return $numberOfLike; 
}


// function which retrieve the number of like and dislike by user in the same post

function selectNumberOfLikeAndUnlikeByUser($actorsId,$up,$down)
{
    $db = connectionDb();
    $req = $db->prepare('SELECT COUNT(*) AS numberOfLikeAndUnlikeByUser FROM like_unlike WHERE (up = :up OR down = :down) AND actors_id = :actorsId AND user_id = :userId'); 
    $req->execute(array(
        'actorsId' => $actorsId,
        'up' => $up,
        'down' => $down,
        'userId' => $_SESSION['id_user']
    ));
    $numberOfLikeAndUnlikeByUser = $req->fetch();
    $req->closeCursor();
    return $numberOfLikeAndUnlikeByUser; 
}

// function allows insert vote (like and dislike) in database 


function insertLikeOrUnlikeOnDb($actorsId)
{
    $db = connectionDb();
    $req = $db->prepare('INSERT INTO like_unlike(up, down, actors_id, user_id) VALUES(:up, :down, :actorsId, :userId)'); 
    $req->execute(array(
        'up' => $_GET['up'],
        'down' => $_GET['down'],
        'actorsId' => $actorsId,
        'userId' => $_SESSION['id_user']
    ));
    $req->closeCursor();
}

