<?php

require_once 'model/front/frontModelCommentActors.php';
require_once 'controller/front/frontControllerActors.php';


// function allowing to display the number of comments per article


function numberOfComments()
{
    $actorPost = selectActorPost($_GET['urlpost']);
    $actorsId=$actorPost['id_actors'];
    $numberOfComments = selectNumberOfComments($actorsId);

    if ($numberOfComments === false) 
    {
        $numberOfComments=0; 
    }
    else
    {
        return $numberOfComments;
    }
}


// function allowing the control of the number of comments per user and per post


function numberCommentByUser()
{
    $actorPost = selectActorPost($_GET['urlpost']);
    $actorsId=$actorPost['id_actors'];
    $numberOfCommentsByUser = selectNumberOfCommentsByUser($actorsId);

    if ($numberOfCommentsByUser === false) 
    {
        $numberOfCommentsByUser=0; 
    }
    else
    {
        return $numberOfCommentsByUser;
    }
     
}


// function to submit a new comment


function submitComment()
{
    $numberOfCommentsByUser = numberCommentByUser(); 
    if (isset($_POST['commentaire'])) 
    {
        if ($numberOfCommentsByUser['numberOfCommentUser'] >= 1) 
        {  
            $alert = alertMessage('error', "Impossible de commenter plus d'une fois la même fiche acteur!");
            return $alert; 
        }
        else
        {
            $actorPost = selectActorPost($_GET['urlpost']);
            $actorsId=$actorPost['id_actors'];
            insertCommentInDb($actorsId);

            header('location:index.php?controller=actorsposts&urlpost='.$_GET['urlpost']);
        }
    }
}


// function allowing to display the comments on an actor post as well as its pagination


function viewCommentsActors()
{
    if(isset($_GET['page']) && !empty($_GET['page'])) 
    {
        $currentPage = $_GET['page']; 
    }
    else
    {
        $currentPage = 1; 
    }
    $actorPost = selectActorPost($_GET['urlpost']);
    $actorsId=$actorPost['id_actors'];
    $numberOfComments = selectNumberOfComments($actorsId);

    $numberOfCommentsByPage = 5; 
    $firstComment = ($currentPage * $numberOfCommentsByPage) - $numberOfCommentsByPage;
    $numberOfCommentsPage = ceil($numberOfComments['numberComment']/$numberOfCommentsByPage); 

    $req = selectCommentsActors($actorsId,$firstComment,$numberOfCommentsByPage);
    $reqAndnumberOfCommentsPage = [$req,$numberOfCommentsPage];
    return $reqAndnumberOfCommentsPage;
}



// function to display the number of unlike


function viewUnlike()
{
    $actorPost = selectActorPost($_GET['urlpost']);
    $actorsId=$actorPost['id_actors'];
    $down=1; // attribue la valeur 1 à la variable

    $numberOfUnlike = selectNumberOfUnlike($actorsId,$down);
    return $numberOfUnlike;
}


// function to display the number of like


function viewLike()
{
    $actorPost = selectActorPost($_GET['urlpost']);
    $actorsId=$actorPost['id_actors'];
    $up=1;
    $numberOfLike = selectNumberOfLike($actorsId,$up);
    return $numberOfLike;
}


// function which allows to return the number of likes and unlike by user and by post

function controlLikeUser()
{
    $actorPost = selectActorPost($_GET['urlpost']);
    $actorsId=$actorPost['id_actors'];
    $up=1; 
    $down=1; 
    $numberOfLikeAndUnlikeByUser = selectNumberOfLikeAndUnlikeByUser($actorsId,$up,$down);
    return $numberOfLikeAndUnlikeByUser;
}


// function allowing to add a like or an unlike and to check that the user has not already voted

function pushLike()
{
    if (isset($_GET['up']))  
    {
        if (isset($_GET['down'])) 
        {
            $numberOfLikeAndUnlikeByUser=controlLikeUser();

            if ($numberOfLikeAndUnlikeByUser['numberOfLikeAndUnlikeByUser'] >= 1) 
            {  
                $alert = alertMessage('error', "Impossible de liker plus d'une fois!");
                return $alert;
            }
            else
            {
                $actorPost = selectActorPost($_GET['urlpost']);
                $actorsId=$actorPost['id_actors'];
                insertLikeOrUnlikeOnDb($actorsId);

            }
        }
    }
}