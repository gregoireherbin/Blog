<!DOCTYPE html>
<html>
<head>
	<?php $title='Article'; ?>
</head>
	<body>

		
			
		<?php ob_start(); ?>
			<div class="row mt-5">
				<div class="col-lg-8 px-4">
					<div class="card mb-3">
					  <div class="row no-gutters">
	    				<div class="col-md-6 ">
	      				<img src="public/img/<?= $post['picture'];?>" class="card-img" alt="...">
	    				</div>
		    			<div class="col-md-6">
		    				<div class="card-body">
		      	  		<h5 class="card-title"><?= htmlspecialchars($post['title']).' le '.htmlspecialchars($post['creation_date_fr']);?></h5>
		        			<p class="card-text"><?= htmlspecialchars($post['content']);?></p>
		      			</div>
		    			</div>
		  			</div>
					</div>

					<h3 class="mb-5">Commentaires :</h3>

	<?php



	//On compte le nombre de commentaires

	$nbr_commentaires=(int)$count['nbr_comments'];
	$pages=ceil($nbr_commentaires/5);

	// On affiche les commentaires par groupe de 5

	while ($donnees = $commentbyfive->fetch())
	{?>	<p><strong><?= htmlspecialchars($donnees['author']).'</strong> a écrit : '.htmlspecialchars($donnees['comment']).' le  '. htmlspecialchars($donnees['comment_date']);?> <a href="index.php?action=viewComment&id=<?=$donnees['id'];?>&idPost=<?=$_GET['id'];?>&page=<?=$_GET['page'];?>">(modifier)</a></p>
	<?php
	}


	//Pagination
	?>

	<nav aria-label="Page navigation example">
	  <ul class="pagination">
	    <li class="page-item"><a class="page-link" href="index.php?action=post&id=<?=$_GET['id']?>&page=<?php if ($_GET['page']>0){echo $_GET['page']-1;} else {echo 0;}?>">Précédent</a></li>
	<?php 
		$page=0;

		while ($page<$pages){
	?>
		<li class="page-item"><a class="page-link" href="index.php?action=post&id=<?=$_GET['id']?>&page=<?=$page?>"><?= $page+1 ?></a></li>
		<?php $page++;
		}   
	?>
	    <li class="page-item"><a class="page-link" href="index.php?action=post&id=<?=$_GET['id']?>&page=<?php if($_GET['page']<(($pages-1))){echo $_GET['page']+1;} else { echo ($pages-1);} ?>">Suivant</a></li>
	  </ul>
	</nav>



	<!--Fin pagination ---->

	<!-- Formulaire d'ajout de commentaires -->

					<h3 class="mb-5">Ajouter un commentaire :</h3>
					<form method="POST" action="index.php?action=addComment&id=<?= $post['id'] ?>&page=<?php if($pages>0){echo $pages-1;}else{echo $pages;}?>">
						<label for="author" class="form-label" >Pseudo :</label>
						<input type="text" class="form-control" name="author" required><br><br>
						<label for="comments" class="form-label">Message :</label>
						<textarea name="comment" class="form-control" required></textarea><br><br>
						<input type="submit" class="btn btn-primary mb-5 btn-center" name="Envoyer">
					</form>
				<?php
				if(!$_SESSION){?>
					<div class="alert alert-danger" role="alert">
						Vous devez être connecté pour ajouter un commentaire !
					</div>
				<?php } ?>
	</div>

	<!---  Affichage des 5 derniers billets sur la colonne de droite -->

	<div class="col-lg-4 px-4">
		<?php	



		while($donnees=$reponse->fetch()){?>

		<div class="card mb-3">
		  <div class="row g-0">
		    <div class="col-md-6">
		      <img src="public/img/<?= $donnees['picture']?>" class="card-img" alt="...">
		    </div>
		    <div class="col-md-6">
		      <div class="card-body">
		        <h5 class="card-title fs-6 fw-normal"><?= htmlspecialchars($donnees['title']).' le '.htmlspecialchars($donnees['creation_date']);?></h5>
		        
		      </div>
		    </div>
		  </div>
	</div>
			
		<?php
		}
		?>

		


	</div>
	<?php		$content = ob_get_clean(); 	 
				require('view/frontend/template.php'); 

			?>

		
	</body>
</html>


