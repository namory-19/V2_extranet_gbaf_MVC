<?php

require_once 'model/admin/adminModelActorsPostsDelete.php';

// function allowing delete actors post

function deleteActorsPosts()
{
    deleteActorsPostsInDb();
    header('Location: index.php?controller=adminhome');
}