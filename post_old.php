<?php

require('model.php');

if (isset($_GET['id_post']) && $_GET['id_post'] > 0) {
    $post = getPost($_GET['id_post']);
    $comments = getComments($_GET['id_post']);
    $count = getCount($_GET['id_post']);
    $commentbyfive = getCommentsByFive($_GET['id_post']);
    $reponse = getLastPosts($_GET['id_post']);
    
    require('commentaires.php');
}
else {
    echo 'Erreur : aucun identifiant de billet envoyé';
}

