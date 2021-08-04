<?php

// function allows the connection to database

function connectionDb()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=gbaf_mvc;charset=utf8', 'root', 'root'); 
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // affichage des erreurs SQL
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION); // affichage des erreurs SQL
        return $db;
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
}