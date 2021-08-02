
	<div class="card">
		<div class="card-body m-2">
			<h5 class="card-title"><?= htmlspecialchars($donnees['title']).' le '.htmlspecialchars($donnees['creation_date']);?></h5>
	        <img class="card-img-top" src="../img/<?= htmlspecialchars($donnees['picture']);?>" alt="Card image cap">
			<p class="card-text"><?= htmlspecialchars($donnees['content']);?></p>
	        <a  class="btn btn-primary" href="commentaires.php?id_post=<?= $donnees['id'];?>">Commentaires</a>
	        <a  class="btn btn-danger" href="supprimer.php?id_post=<?= $donnees['id'];?>">Supprimer</a>
	        <a  class="btn btn-warning" href="administration.php?id_post=<?= $donnees['id'];?>&title=<?=$donnees['title'];?>&picture=<?=$donnees['picture'];?>&content=<?=$donnees['content'];?>">Modifier</a>
		</div>
	</div>						
