<?php

    require('model.php');
    
    if (isset($_GET['id']) && $_GET['id'] > 0) {
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);
    $count = getCount($_GET['id']);
    $commentbyfive = getCommentsByFive($_GET['id']);
    $reponse = getLastPosts($_GET['id']);    
    require('commentaires.php');}

else {
    echo 'Erreur : aucun identifiant de billet envoyé';
}

