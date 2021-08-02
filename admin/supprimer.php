<?php
try
{
	// On se connecte à MySQL

$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On supprime le billet

$reponse = $bdd->prepare('DELETE FROM posts WHERE id = :id_post');
$reponse->execute(array(
	'id_post'=>htmlspecialchars($_GET['id_post'])
	));



header('location:administration.php');

?>