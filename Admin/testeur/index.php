<?php 
	require_once('../../_include.php'); 
	$page = 3;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Testeur</title>
		<link rel="stylesheet" href="../../libraries/bootstrap/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="../../css/style.css" type="text/css">
	</head>
	<body>
		<?php 
			include('../../_header.php'); 
			
			// Get all waiters
			$testeurManager 	= new TesteurManager();
			$allTesteurs		= $testeurManager->getAllTesteurs();
		?>
		
		<div class="table_container">
			<h2>Testeurs</h2>
			<a class="btn btn-primary" href="add.php"><i class="icon-plus icon-white"></i>Ajouter un testeur</a>
			<br /><br />
			<table class="table table-striped table-bordered table-condensed">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nom</th>
						<th>Prénom</th>
						<th>Téléphone</th>
						<th>Email</th>
						<th>Date de naissance</th>
						<th>Lieu de résidence</th>
                                                <th>Pilote</th>
                                                <th>Testeur</th>
                                                <th>vehiculé</th>
                                                <th>Commentaire</th>
                                                <th>Actions</th>
					</tr>
				</thead>
				<?php
					foreach($allTesteurs as $testeur){
						$testeur->displayAsCell();
					}
				?>
			</table>
		</div>
		
	</body>
</html>