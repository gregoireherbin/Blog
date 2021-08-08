<?php

//Connexion à la base de données

function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}


// Récupération de tous les billets

function getPosts()
{
    $db = dbConnect();
    $req = $db->query('SELECT id, title, picture, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date' );

    return $req;
}


// Récupération d'un seul billet

function getPost($postId)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT id, title, picture, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
}


// Récupération des commentaires d'un billet


function getComments($postId)
{
    $db = dbConnect();
    $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id_post = ? ORDER BY comment_date DESC');
    $comments->execute(array($postId));

    return $comments;
}



// On compte le nombre de commentaires

function getCount($postId)
{
    $db = dbConnect();
    $req =  $db->prepare('SELECT COUNT(*) AS nbr_comments FROM comments WHERE id_post=?');
    $req->execute(array($postId));
    $count=$req->fetch();

    return $count;
}


// On affiche tous les commentaires du billet par 5

function getCommentsByFive($postId)
{

   $db = dbConnect();
   $mini = $_GET['page']*5;
   if ($_GET['page']>=0 ){
   $req = $db->prepare('SELECT *, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss")  AS date_comment FROM comments WHERE id_post=? LIMIT '.$mini.',5');
   $req->execute(array($postId));
   }

   return $req;
}

//  Affichage des 5 derniers billets sur la colonne de droite

function getLastPosts($postId) 
{
    
    $db = dbConnect();
    $req = $db->prepare('SELECT * ,DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss")  AS creation_date FROM posts  WHERE id!=?  ORDER BY creation_date LIMIT 0,5');
    $req->execute(array($postId));
    
    return $req;
 
}


