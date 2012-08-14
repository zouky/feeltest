<?php 
	require_once('../../_include.php'); 
	$page = 1;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Tests</title>
		<link rel="stylesheet" href="../../libraries/bootstrap/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="../../css/style.css" type="text/css">
	</head>
	<body>
		<?php 
			include('../../_header.php'); 
			
			// Get all restaurants
			$testManager     = new testManager();
			$allTests	 = $testManager->getAllTests();
		?>
		
		<div class="table_container">
			<h2>Tests</h2>
			<a class="btn btn-primary" href="add.php"><i class="icon-plus icon-white"></i> Ajouter un test</a>
			<br /><br />
			<table class="table table-striped table-bordered table-condensed">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nom</th>
						<th>Client</th>
						<th>Référence</th>
						<th>Date de début</th>
                                                <th>Date de fin</th>
						<th>Détail</th>
						<th>Activité</th>
						<th>Commentaire</th>
					</tr>
				</thead>
				<?php
					foreach($allTests as $test){
						$test->displayAsCell();
					}
				?>
			</table>
		</div>
		
	</body>
</html>