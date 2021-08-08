<?php 

require('model/frontend.php');

$db = dbConnect();



// Si tout va bien, on peut continuer

//  Récupération de l'utilisateur et de son pass hashé
$req = $db->prepare('SELECT id, pass FROM members WHERE pseudo = :pseudo');
$req->execute(array(
    'pseudo' => $_POST['pseudo']));
$resultat = $req->fetch();

// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($_POST['mdp'], $resultat['pass']);




    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $_POST['pseudo'];
        if($_GET['id']){
           header('location:index.php?action=post&id='.$_GET['id'].'&page=0');
         
        }
        else {
           header('location:index.php');
           
        }
        
        
    }
    else {
        echo header('location:connexion.php?id='.$_GET['id'].'&warning=1');
        
    }


