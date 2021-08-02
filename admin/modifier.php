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

// On insère le nouveau billet

$reponse = $bdd->prepare('UPDATE posts SET title=:title,content=:content,creation_date=NOW() WHERE id = :id_post');
$reponse->execute(array(
	'title'=>htmlspecialchars($_GET['title']),
	'content'=>htmlspecialchars($_GET['content']),
	'id_post'=> htmlspecialchars($_GET['id'])
	));



header('location:administration.php');

?>