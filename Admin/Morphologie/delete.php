<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		
		require_once('../../_include.php');
		$activiteManager = new ActiviteManager();
		$activiteManager->deleteActivite($id);
		
		header('Location: http://localhost/Feeltest/Admin/Activite');
	}
?>