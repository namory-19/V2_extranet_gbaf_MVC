<?php
require_once 'model/front/frontModelActors.php';


// function allowing to reduce the length of a text


function textShort($text, $numberCharacters){
    $textShort=strip_tags($text);
    if ( strlen($text) <= $numberCharacters )
        return $textShort;
    if ( ($pos_espace = strpos($textShort,' ',$numberCharacters)) === FALSE ) 
        return $textShort;
    $textShort = substr($textShort,0,$pos_espace);  
    return $textShort;
}



// function allowing to display the list of actor articles with the pagination of 5 per page


function viewActorsListPosts()
{
    if(isset($_GET['page']) && !empty($_GET['page']))
        {
            $currentPage = $_GET['page']; 
        }
    else
        {
            $currentPage = 1; 
        }


    $totalNumberOfPosts = selectNumberOfActorsPosts();
    $numberPostsByPage = 5; 
    $firstPostOfCurrentPage = ($currentPage * $numberPostsByPage) - $numberPostsByPage;
    $totalNumberOfPages = ceil($totalNumberOfPosts['total_number_of_posts'] / $numberPostsByPage); 
    
    $req = selectActorsPostsWithPaging($firstPostOfCurrentPage,$numberPostsByPage);

    if ($_GET['controller'] == 'home')
    {
        require_once 'view/front/homeView.php';
    }
    elseif ($_GET['controller'] == 'adminhome')
    {
        require_once 'view/admin/adminHomeView.php';
    }
}


// function used to display an actor article


function viewActorsPost()
{
    if (isset($_GET['controller']) && ($_GET['urlpost'])) 
    {
        $actorPost = selectActorPost($_GET['urlpost']);
        
        if ($_GET['urlpost'] !== $actorPost['url_post_actors']) 
        {
            header('Location: index.php?controller=home'); 
        }
        else 
        {
            require_once 'view/front/actorsPostView.php';
        }
    }
    else
    {
        header('Location: index.php?controller=home'); 
    }
}
