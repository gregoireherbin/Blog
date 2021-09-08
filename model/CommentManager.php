<?php 
require_once('Manager.php');

class CommentManager extends Manager {

    // Récupération des commentaires d'un billet


     public  function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id_post = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    // Récupération d'un seul commentaire 


     public  function getComment($commentId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('SELECT comment FROM comments WHERE id = ?');
        $comment->execute(array($commentId));

        return $comment;
    }

    // On compte le nombre de commentaires

     public  function getCount($postId)
    {
        $db = $this-> dbConnect();
        $req =  $db->prepare('SELECT COUNT(*) AS nbr_comments FROM comments WHERE id_post=?');
        $req->execute(array($postId));
        $count=$req->fetch();

        return $count;
    }


    // On affiche tous les commentaires du billet par 5

     public  function getCommentsByFive($postId)
    {

       $db = $this->dbConnect();
       $mini = $_GET['page']*5;
       if ($_GET['page']>=0 ){
       $req = $db->prepare('SELECT *, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss")  AS date_comment FROM comments WHERE id_post=? ORDER BY comment_date  LIMIT '.$mini.',5');
       $req->execute(array($postId));
       }

       return $req;
    }

    // On ajoute un commentaire

     public  function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(id_post, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
        
    }

    public function modifyComment($comment,$id){

        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET comment=? WHERE id=?');
        $affectedLines = $comments ->execute(array($comment,$id));

        return $affectedLines;
    }
}