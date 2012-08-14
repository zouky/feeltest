<?php 
	require_once('../../_include.php'); 
	$page = 3;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>waiters</title>
		<link rel="stylesheet" href="../../libraries/bootstrap/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="../../css/style.css" type="text/css">
	</head>
	<body>
		<?php 
			include('../../_header.php'); 
			
			// Get all waiters
			$waiterManager 	= new WaiterManager();
			$allWaiters		= $waiterManager->getAllWaiters();
		?>
		
		<div class="table_container">
			<h2>Waiters</h2>
			<a class="btn btn-primary" href="add.php"><i class="icon-plus icon-white"></i> Add waiter</a>
			<br /><br />
			<table class="table table-striped table-bordered table-condensed">
				<thead>
					<tr>
						<th>Id</th>
						<th>First_name</th>
						<th>Last_name</th>
						<th>Device token</th>
						<th>Restaurant</th>
						<th>Zone</th>
						<th>Actions</th>
					</tr>
				</thead>
				<?php
					foreach($allWaiters as $waiter){
						$waiter->displayAsCell();
					}
				?>
			</table>
		</div>
		
	</body>
</html>