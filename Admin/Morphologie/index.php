<?php 
	require_once('../../_include.php'); 
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Morphologies</title>
		<link rel="stylesheet" href="../../libraries/bootstrap/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="../../css/style.css" type="text/css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<!--		<script type="text/javascript">
			$(document).ready(function(){
				$('tr').click(function(){ 
					window.location = 'display.php?menu_id='+$(this).attr('id'); 
				});
			});
		</script>-->
	</head>
	<body>
		<?php 
			include('../../_header.php'); 
			
			// Get all morphologie
			$morphologieManager = new MorphologieManager();
			$allMorphologies    = $morphologieManager->getAllMorphologies();
		?>
		
		<div class="table_container">
			<h2>Morphologies</h2>
			<a class="btn btn-primary" href="add.php"><i class="icon-plus icon-white"></i> Ajouter une morphologie</a>
			<br /><br />
			<table class="table table-striped table-bordered table-condensed">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Commentaire</th>
                                                <th>Action</th>
					</tr>
				</thead>
				<?php
					foreach($allMorphologies as $morphologies){
						$morphologies->displayAsCell();
					}
				?>
			</table>
		</div>
	</body>
</html>