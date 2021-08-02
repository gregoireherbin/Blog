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




// Vérification de la validité des informations


if($_POST){

	// Hachage du mot de passe
	$pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

	// On rend inoffensives les balises HTML que le visiteur a pu rentrer
	$_POST['email'] = htmlspecialchars($_POST['email']); 
	
	//On vérifie si le pseudo existe déjà
	$user = $_POST['pseudo'];
	$req = $bdd->prepare('SELECT * FROM members WHERE pseudo=:pseudo');
	$req->execute(array(
		'pseudo'=>$user));
	$donnees=$req->fetch();

	



	if($donnees){
		 echo "<div class=\"alert alert-danger\" role=\"alert\">le pseudo existe déjà ! Choisissez en un autre</div>";
	}
	elseif ($_POST['mdp']!=$_POST['cmdp']){
		echo "<div class=\"alert alert-danger\" role=\"alert\">les mots de passe ne correspondent pas, saisissez les à nouveaux.</div>";
	}
	elseif(!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']) ){
		echo "<div class=\"alert alert-danger\" role=\"alert\">L'adresse  ".$_POST['email'] ." n'est pas valide, recommencez !</div>";
	}
	else{
		 // Si tout est bon on insère les données dans la BDD
		    	$req = $bdd->prepare('INSERT INTO members  (pseudo, pass, email,date_inscription) VALUES (:pseudo, :pass, :email,NOW())');
		    	$req->execute(array(
		    		'pseudo'=>$_POST['pseudo'],
		    		'pass'=>$pass_hache,
		    		'email'=>$_POST['email']
		    	 ));

		//message de confirmation que tout s'est bien passé
		echo "<div class=\"alert alert-success\" role=\"alert\">Félicitations vous êtes inscrits !</div>";

	}
} 

