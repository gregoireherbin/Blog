<?php
// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

// Affichage de tous les articles

function listPosts()
{   
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    if($posts === false){
        throw new Exception("Impossible d'afficher les articles");
    }
    else {
    require('view/frontend/listPostsView.php');
    }
}

// Affichage d'un article avec ses commentaires etc.

function post()
{   
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager ->getComments($_GET['id']);
    $count = $commentManager -> getCount($_GET['id']);
    $commentbyfive = $commentManager ->getCommentsByFive($_GET['id']);
    $reponse = $postManager ->getLastPosts($_GET['id']);

    require('view/frontend/postView.php');
}
// Affichage d'un commentaire


function viewComment($id,$idPost){
    $commentManager = new CommentManager();
    $comment = $commentManager->getComment($id);

    require('view/frontend/changeView.php');
}
// Ajout d'un commentaire

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();
    $affectedLines = $commentManager -> postComment($postId, $author, $comment);
    if ($affectedLines === false) {
        // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
     
         header('Location: index.php?action=post&id=' . $postId.'&page='.$_GET['page'].'');
    }
}

function changeComment ($comment,$id){
 
    $commentManager = new CommentManager();
    $affectedLines = $commentManager -> modifyComment($comment,$id);
    if ($affectedLines === false) {
        // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
        throw new Exception('Impossible de modifier le commentaire !');
    }
    else {
     
        header('Location: index.php?action=post&id='.$_GET['idPost'].'&page='.$_GET['page'].'');
        
    }

}