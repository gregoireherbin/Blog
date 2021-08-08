<?php

session_start();

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

// On insère le nouveau commentaire


if ($_SESSION){
$reponse = $bdd->prepare('INSERT INTO comments (id_post, author, comment, comment_date)  VALUES (:id_post,:author,:comment,NOW())');
$reponse->execute(array(
	'id_post'=>htmlspecialchars($_GET['id_post']),
	'author'=>htmlspecialchars($_POST['author']),
	'comment'=>htmlspecialchars($_POST['comments'])
	));
header('location:postView.php?id='.$_GET['id_post'].'&page='.$_GET['page'].'');
}

else{

	echo "Désolé vous devez être connecté pour poster un commentaire !";
}

/*header('location:commentaires.php?id_post='.$_GET['id_post'].'&page=0');*/


?>
