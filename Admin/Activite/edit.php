<?php 

	require_once('../../_include.php'); 
	$page = 2;

	if(isset($_GET['id'])){
		$activiteManager = new ActiviteManager();
		$activite = $activiteManager->getActiviteById($_GET['id']);
	}
	
	if(isset($_POST['id'], $_POST['nom'], $_POST['description'])){
		$nom		 = $_POST['nom'];
		$description     = $_POST['description'];
                $commentaire     = $_POST['commentaire'];
		$id              = (int)$_POST['id'];
		
		if(strlen($id) != 0 && strlen($nom) != 0 && strlen($description) != 0){
			$activiteManager = new ActiviteManager();
			$activite = $activiteManager->getActiviteById($id);
			
			$activite->setNom($activite);
			$activite->setDescription($description);
                        $activite->setCommentaire($commentaire);
			$activiteManager->updateActivite($activite);
			
			header('Location: http://localhost/Feeltest/Admin/Activite');
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Editer une activite</title>
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
				<h2>Editer une Activite</h2><br />
				<?php
					echo '<input type="text" name="id" value="'.$activite->getId().'" style="display:none" />';
				?>
				<label for="nom">Nom</label>
				<input type="text" name="nom" id="nom" class="span6" placeholder="Nom" value="<?php echo $activite->getNom(); ?>"/>
				<label for="description">Description</label>
				<textarea name="description" id="description" class="span6" placeholder="Description"><?php echo $activite->getDescription(); ?></textarea>
                                <label for="commentaire">Commentaire</label>
				<textarea name="commentaire" id="commentaire" class="span6" placeholder="Commentaire"><?php echo $activite->getCommentaire(); ?></textarea>
				<br /><br />
				<br /><br />
				<button type="submit" class="btn btn-primary">Update</button>
			</form>
		</div>
	</body>
</html>