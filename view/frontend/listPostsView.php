<!DOCTYPE html>
<html>
<head>
	<?php $title='Mon Blog'; ?>
</head>
	<body>
		<?php ob_start(); ?>
			<div class="row p-3">
				<?php
				$donnees= $posts->fetch();
				if(!empty($donnees)){?>
				<div class="card ">
					<div class="row no-gutters">
						<div class="col-md-6">
							<img src="public/img/<?= $donnees['picture']?>" class="card-img" alt="...">
						</div>
						<div class="col-md-6">
							<div class="card-body">
								<h5 class="card-title">
									<?= htmlspecialchars($donnees['title']).' <h4>le '.htmlspecialchars($donnees['creation_date_fr']);?>
								</h4></h5>
								<p class="card-text"><?= htmlspecialchars($donnees['content']);?></p>
								<a  class="btn btn-primary" href="index.php?action=post&id=<?= $donnees['id'];?>&page=0">Commentaires</a>
							</div>
						</div>
					</div>
				</div>
			</div>
				<?php } 
				?>

			<div class="row row-cols-1 row-cols-md-2 g-4" data-masonry='{"percentPosition": true}'>
			<?php

	// On affiche chaque entrée une à une
				while ($donnees = $posts->fetch()){?>	
					<div class="col-lg-4 col-xs-12 p-3">
					<?php	
					include 'includes/affichage_billet.php';
					?>
					</div>
					<?php
				}
				?>
			</div>
			
		
		<?php
		$content = ob_get_clean(); 

		require('view/frontend/template.php'); 
		?>
	</body>
</html>