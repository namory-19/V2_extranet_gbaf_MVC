<?php
// Front controller

require_once 'controller/front/frontControllerConnection.php';
require_once 'controller/front/frontControllerRegistration.php';
require_once 'controller/front/frontControllerActors.php';
require_once 'controller/front/frontControllerIdPassForgot.php';
require_once 'controller/front/frontControllerAccount.php';
require_once 'controller/front/frontControllerLegalMention.php';

// Admin controller

require_once 'controller/admin/adminControllerActorsPostsModify.php';
require_once 'controller/admin/adminControllerActorsPostsAdd.php';
require_once 'controller/admin/adminControllerActorsPostsDelete.php';

// General controller

require_once 'controller/controllerAlertMessage.php';


// Router

if (isset($_GET['controller']))
{
    if ($_GET['controller'] == 'home')
    {
        session_start(); 
        if ((!isset($_SESSION['id_user'])) || ($_SESSION['active'] ==='0')) 
        {
            killSession(); 
        }
        else
        {
            viewActorsListPosts();
        }
    }
    elseif ($_GET['controller'] == 'adminhome')
    {
        session_start(); 
        if (isset($_SESSION['id_user']) && ($_SESSION['usergroup'] = 2))
        {
            viewActorsListPosts();
        }
        else
        {
            header('Location: index.php?controller=home');   
        }
    }
    elseif ($_GET['controller'] == 'adminactorsposts' && $_GET['action'] == 'add')
    {
        session_start(); 
        if (isset($_SESSION['id_user']) && ($_SESSION['usergroup'] = 2))
        {
            addActorsPosts();
        }
        else
        {
            header('Location: index.php?controller=home');   
        }
    }
    elseif ($_GET['controller'] == 'adminactorsposts' && $_GET['action'] == 'modify')
    {
        session_start(); 
        if (isset($_SESSION['id_user']) && ($_SESSION['usergroup'] = 2))
        {
            modifyActorsPosts();
        }
        else
        {
            header('Location: index.php?controller=home');   
        }
    }
    elseif ($_GET['controller'] == 'adminactorsposts' && $_GET['action'] == 'delete')
    {
        session_start(); 
        if (isset($_SESSION['id_user']) && ($_SESSION['usergroup'] = 2))
        {
            deleteActorsPosts();  
        }
        else
        {
            header('Location: index.php?controller=home');   
        }
    }
    elseif ($_GET['controller'] == 'registration')
    {
        session_start(); 
        if (isset($_SESSION['id_user'])) 
        {
            header('Location: index.php?controller=home');       
        }
        else
        {
            registerUser();
        }
    }
    elseif ($_GET['controller'] == 'connection')
    {
        session_start(); 
        if (isset($_SESSION['id_user'])) 
        {
            header('Location: index.php?controller=home');       
        }
        else
        {
            connectionUser();
        }
    }
    elseif ($_GET['controller'] == 'idpassforgot')
    {
        session_start(); 
        if (isset($_SESSION['id_user'])) 
        {
            header('Location: index.php?controller=home'); 
        }
        else
        {
            idPassForgot();
        }
    }
    elseif ($_GET['controller'] == 'actorsposts')
    {
        session_start(); 
        if ((!isset($_SESSION['id_user'])) || ($_SESSION['active'] ==='0')) 
        {
            killSession(); 
        }
        else
        {
            viewActorsPost();
        }
    }
    elseif ($_GET['controller'] == 'account')
    {
        session_start(); 
        if ((!isset($_SESSION['id_user'])) || ($_SESSION['active'] ==='0')) 
        {
            killSession(); 
        }
        else
        {
            updateDataUser();
            updateDataConnexion();
            updateSecretQuestion();
            updateImageAvatar();
        }
    }
    elseif ($_GET['controller'] == 'legalmention')
    {
        session_start(); 
        if ((!isset($_SESSION['id_user'])) || ($_SESSION['active'] ==='0')) 
        {
            killSession(); 
        }
        else
        {
            viewLegalMention();
        }
    }

    elseif ($_GET['controller'] == 'disconnect')
    {
        killSession();
    }
}
else
{
    header('Location: index.php?controller=home');
}