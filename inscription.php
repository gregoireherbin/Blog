<!DOCTYPE html>
<html>
<head>
	<title>Mon Blog</title>
	<!-- <link rel="stylesheet" type="text/css" href="styles.css"> -->
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
	<main class="container">
		<div class="row bg-info mb-5">
			<h1 class="text-center text-white">Inscription</h1>
		</div>
		<div class="row">
			<form method="POST" action="inscription.php">
				<label for="pseudo" class="form-label">Pseudo :</label>
				<input type="text" class="form-control" name="pseudo" required><br><br>
				<label for="mdp" class="form-label">Mot de passe :</label>
				<input type="password" name="mdp" class="form-control" required><br><br>
				<label for="cmdp" class="form-label">Ressaisir le mot de passe :</label>
				<input type="password" name="cmdp" class="form-control" required><br><br>
				<label for="email" class="form-label">Email : </label>
				<input type="email" name="email" class="form-control" required><br><br>
				<input type="submit" class="btn btn-primary mb-5" name="Envoyer">
				<input type="reset" name="reset" class="btn btn-danger mb-5">
			
		
			
  			 <?php include('inscription_post.php')?>
			</form>
		</div>
	</main>
</body>
</html>

