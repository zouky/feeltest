<?php 

	require_once('../../_include.php'); 

	if(isset($_GET['id'])){
		$morphologieManager = new MorphologieManager();
		$morphologie = $morphologieManager->getMorphologieById($_GET['id']);
	}
	
	if(isset($_POST['id'], $_POST['nom'])){
		$nom		 = $_POST['nom'];
                $commentaire     = $_POST['commentaire'];
		$id              = (int)$_POST['id'];
		
		if(strlen($id) != 0 && strlen($nom) != 0){
			$morphologieManager = new MorphologieManager();
			$morphologie = $morphologieManager->getMorphologieById($id);
			
			$morphologie->setNom($nom);
                        $morphologie->setCommentaire($commentaire);
			$morphologieManager->updateMorphologie($morphologie);
			
			header('Location: '.$siteUrl.'/Admin/Morphologie');
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Editer une Morphologie</title>
		<link rel="stylesheet" href="../../libraries/bootstrap/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="../../css/style.css" type="text/css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
	</head>
	<body>
		<?php 
			include('../../_header.php'); 
		?>
		<div class="largeform_container">
			<form action="edit.php" method="post" class="well">
				<h2>Editer une Morphologie</h2><br />
				<?php
					echo '<input type="text" name="id" value="'.$morphologie->getId().'" style="display:none" />';
				?>
				<label for="nom">Nom</label>
				<input type="text" name="nom" id="nom" class="span6" placeholder="Nom" value="<?php echo $morphologie->getNom(); ?>"/>
                                <label for="commentaire">Commentaire</label>
				<textarea name="commentaire" id="commentaire" class="span6" placeholder="Commentaire"><?php echo $morphologie->getCommentaire(); ?></textarea>
				<br /><br />
				<br /><br />
				<button type="submit" class="btn btn-primary">Editer</button>
			</form>
		</div>
	</body>
</html>