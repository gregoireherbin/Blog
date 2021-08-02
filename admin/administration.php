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

// On récupère tout le contenu de la table jeux_video
$reponse = $bdd->query('SELECT *, DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss")  AS creation_date FROM posts');

?>


<!DOCTYPE html>
<html>
<head>
	<title>Mon Blog</title>
	
	<link rel="stylesheet" type="text/css" href="../bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../styles.css">
</head>

<body>
	<main class="container">
		<div class="row bg-secondary mb-5">
			<h1 class="text-center text-white">Administration</h1>
		</div>
			<div class="row" data-masonry='{"percentPosition": true}'>
	

			<?php

			// On affiche chaque entrée une à une
			while ($donnees = $reponse->fetch())
			{?>	
					<div class="col-lg-4 col-xs-12 p-3">
							<?php	
							include 'billet.php';
							?>
						 </div>  
			<?php
			}
			?>
	
		</div>
		<div class="row p-3">
			<h3 class="mb-3">Billet :</h3>
			<form method="POST" enctype="multipart/form-data" action="ajouter.php">
				<input type="hidden" name="id_post" value="<?php if(isset($_GET['id_post'])){echo $_GET['id_post'];} ?>">
				<label for="title" class="form-label">Titre :</label>
				<input type="text" class="form-control" name="title" required value="<?php if(isset($_GET['title'])){echo $_GET['title'];}?>"><br><br>
				<label for="content" class="form-label">Contenu :</label>
				<textarea name="content" class="form-control" required ><?php if(isset($_GET['content'])){echo $_GET['content'];}?></textarea><br><br>
			<!--	<label for="file" class="label-file btn btn-success mb-5">Choisir une image</label>
				<input id="file" name="picture" class="input-file form-control-file" type="file" required>-->

				<label for="formFile" class="form-label">Image :</label>
				<input class="form-control mb-5"  name="picture" type="file" id="formFile" required>

				<input type="submit" class="btn btn-primary mb-5" value="Ajouter">
				<a href="administration.php" class="btn btn-warning mb-5" name="Reset">Réinitialiser</a>
		</div>
		<footer class="bg-light text-center text-lg-start mt-4">
			  <!-- Copyright -->
			  <div class="text-center p-3" style="">
			    © 2021 Copyright : Grégoire HERBIN
			  </div>
			  <!-- Copyright -->
		</footer>
	</main>
</body>
<script type="text/javascript" src="../masonry-docs.min.js"></script>

</html>


