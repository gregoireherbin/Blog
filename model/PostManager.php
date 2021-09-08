<?php

require_once('Manager.php');

class PostManager extends Manager {
    
    // Récupération de tous les billets

    public function  getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, picture, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date' );

        return $req;
    }


    // Récupération d'un seul billet

    public function  getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, picture, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }


    //  Affichage des 5 derniers billets sur la colonne de droite

    public function  getLastPosts($postId) 
    {
        
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * ,DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss")  AS creation_date FROM posts  WHERE id!=?  ORDER BY creation_date LIMIT 0,5');
        $req->execute(array($postId));
        
        return $req;
     
    }
}