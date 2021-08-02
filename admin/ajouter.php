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
//On modifie le billet
var_dump($_FILES);

if($_POST['id_post']){

	$reponse = $bdd->prepare('UPDATE posts SET title=:title,picture=:picture,content=:content,creation_date=NOW() WHERE id = :id_post');
	$reponse->execute(array(
	'title'=>htmlspecialchars($_POST['title']),
	'picture'=>htmlspecialchars($_FILES['picture']['name']),
	'content'=>htmlspecialchars($_POST['content']),
	'id_post'=> htmlspecialchars($_POST['id_post'])
	));

}

else {
// On insère le nouveau billet

$reponse = $bdd->prepare('INSERT INTO posts ( title,picture, content, creation_date)  VALUES (:title,:picture,:content,NOW())');
$reponse->execute(array(
	'title'=>htmlspecialchars($_POST['title']),
	'picture'=>htmlspecialchars($_FILES['picture']['name']),
	'content'=>htmlspecialchars($_POST['content'])
	));

}




 // On enregistre l'image dans le dossier img
 
 if(isset($_FILES['picture']))
{ 
     $dossier = '../img/';
     $fichier = basename($_FILES['picture']['name']);
     if(move_uploaded_file($_FILES['picture']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          echo 'Upload effectué avec succès !';
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo 'Echec de l\'upload !';
     }
}


header('location:administration.php');
?>