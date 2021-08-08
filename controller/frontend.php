<?php

require('model/frontend.php');

function listPosts()
{
    $posts = getPosts();

    require('view/frontend/listPostsView.php');
}

function post()
{
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);
    $count = getCount($_GET['id']);
    $commentbyfive = getCommentsByFive($_GET['id']);
    $reponse = getLastPosts($_GET['id']);

    require('view/frontend/postView.php');
}