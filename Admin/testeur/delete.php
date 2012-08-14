<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		
		require_once('../../_include.php');
		$waiterManager = new WaiterManager();
		$waiterManager->deleteWaiter($id);
		
		header('Location: http://yoofoodapp.com/Admin/Waiter');
	}
?>