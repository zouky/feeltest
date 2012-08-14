<?php 
	require_once('../../_include.php'); 
	$page = 2;
		
	// If creation of menu
	if(isset($_POST['nom'], $_POST['description'])){
		$nom                = $_POST['nom'];
		$description        = $_POST['description'];
		$commentaire        = $_POST['coommentaire'];
		
		if(strlen($nom) != 0 && strlen($description) != 0){
			$newActivite 	 = new Activite($name, $description, $commentaire);
			$activiteManager = new ActiviteManager();
			$activiteManager->addActivite($newActivite);
			
			
			header('Location: http://localhost/Feeltest/Admin/Activite');
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Nouvelle activité</title>
		<link rel="stylesheet" href="../../libraries/bootstrap/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="../../css/style.css" type="text/css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
	</head>
	<body>
		<?php 
			include('../../_header.php'); 
		?>
		<div class="largeform_container">
			<form action="add.php" method="post" class="well">
				<h2>nouvelle activité</h2><br />
				<label for="nom">Nom</label>
				<input type="text" name="nom" class="span6" id="nom" placeholder="Nom"/>
				<label for="description">Description</label>
				<textarea name="description" class="span6" id="description" placeholder="Description"></textarea>
                                <label for="commentaire">Commentaire</label>
                                <textarea name="commentaire" class="span6" id="commentaire" placeholder="Commentaire"></textarea>	
				<br /><br />	
				<button type="submit" class="btn btn-primary">Creer activité</button>
			</form>
		</div>
	</body>
</html>