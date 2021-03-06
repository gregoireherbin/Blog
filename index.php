<?php
session_start();
require('controller/frontend.php');


try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

        elseif ($_GET['action'] == 'addComment' ) {
            if(!empty($_SESSION)){
                if (isset($_GET['id']) && $_GET['id'] > 0 ) {
                 
                    if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                        addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                    }
                    
                    else {
                    // Autre exception
                    throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                }

                else {
                // Autre exception
                throw new Exception('Aucun identifiant de billet envoyé');
                }
            }  
           
            else{
                    post();
                
            }
        }

        elseif ($_GET['action'] == 'viewComment'){

            viewComment($_GET['id'],$_GET['idPost']);


        }

        elseif ($_GET['action'] == 'change'){

            changeComment($_POST['comment'], $_GET['id'],$_GET['page']);
        }
    }

    else {
        listPosts();
    }
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    $errorMessage = $e->getMessage();
    require('view/frontend/errorView.php');
}
