
<!DOCTYPE html>
<html>
<head>
<?php

$title = 'Modification du commentaire';

ob_start();?>

<form class="p-5 text-center" action="index.php?action=change&id=<?=$_GET['id'];?>&idPost=<?=$_GET['idPost'];?>&page=<?=$_GET['page'];?>" method="POST">
	<div class="form-group">
    <label class="mt-5 h1" for="exampleFormControlTextarea1">Modification du commentaire</label>
    <textarea class="form-control mt-5" id="exampleFormControlTextarea1" name="comment" rows="3"><?php $donnees =$comment->fetch();
				    echo $donnees['comment'];?>
		
	</textarea>
  </div>
	<input class="btn btn-primary mt-5" type="submit" name="envoyer">
</form>

<?php

$content=ob_get_clean();  

require('view/frontend/template.php'); 
?>
</head>