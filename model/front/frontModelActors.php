<?php 

// function which get the total numbers of actor posts

function selectNumberOfActorsPosts()
{
    $db = connectionDb();
    $req = $db->query('SELECT COUNT(*) AS total_number_of_posts FROM actors'); 
    $totalNumberOfPosts = $req->fetch();
    $req->closeCursor();
    return $totalNumberOfPosts;
}

// function which get actor posts list in function of position in paging

function selectActorsPostsWithPaging($firstPostOfCurrentPage,$numberPostsByPage)
{
    $db = connectionDb();
    $req = $db->query('SELECT id_actors, title_post_actors, content_post_actors, url_post_actors, url_img_actors FROM actors ORDER BY id_actors DESC LIMIT ' .$firstPostOfCurrentPage.','.$numberPostsByPage); 
    return $req;
}

// function which get actor post

function selectActorPost($urlPostActors)
{
$db = connectionDb();
$req = $db->prepare('SELECT id_actors, title_post_actors, url_website_actors, content_post_actors, url_post_actors, url_img_actors, meta_description_actors, meta_keywords_actors, user_id, DATE_FORMAT(date_post_actors, \'%d/%m/%Y à %Hh%imin%ss\') FROM actors WHERE url_post_actors = :url_post_actors'); 
$req->execute(array(
    'url_post_actors' => $urlPostActors));
$actorPost = $req->fetch();
$req->closeCursor();
return $actorPost;
}


