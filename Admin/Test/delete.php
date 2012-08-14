<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		
		require_once('../../_include.php');
		$restaurantManager = new RestaurantManager();
		$restaurantManager->deleteRestaurant($id);
		
		header('Location: http://yoofoodapp.com/Admin/Restaurant');
	}
?>