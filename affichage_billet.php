
	<div class="card h-100 ">
      <img src="img/<?=htmlspecialchars($donnees['picture']);?>" class="img-fluid rounded-start" alt="...">
			<div class="card-body">
				<h5 class="card-title"><?= htmlspecialchars($donnees['title']).' </h5><h4>le '.htmlspecialchars($donnees['creation_date_fr']);?></h4>
				<p class="card-text"><?= htmlspecialchars($donnees['content']);?></p>
		        <a  class="btn btn-primary" href="index.php?action=post&id=<?= $donnees['id'];?>&page=0">Commentaires</a>
			</div>
	</div>						
