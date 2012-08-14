<?php 
	require_once('../../_include.php'); 
	$page = 1;

	// If creation of restaurant
	if(isset($_POST['name'], $_POST['city'], $_POST['current_menu'])){
		$name = $_POST['name'];
		$city = $_POST['city'];
		$current_menu = $_POST['current_menu'];
		
		if(intval($current_menu) == -1){
			$current_menu = null;
		}
		
		if(strlen($name) != 0 && strlen($city) != 0){
			$newRestaurant 		= new Restaurant($name, $city, $current_menu);
			$restaurantManager 	= new RestaurantManager();
			$restaurantManager->addRestaurant($newRestaurant);
			
			header('Location: http://yoofoodapp.com/Admin/Restaurant');
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Restaurants</title>
		<link rel="stylesheet" href="../../libraries/bootstrap/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="../../css/style.css" type="text/css">
	</head>
	<body>
		<?php 
			include('../../_header.php'); 
			
			// Get all menus
			$menuManager = new MenuManager();
			$allMenus    = $menuManager->getAllMenus();
		?>
		<div class="form_container">
			<form action="add.php" method="post" class="well">
				<h2>New restaurant</h2><br />
				<label for="name">Name</label>
				<input type="text" name="name" id="name" placeholder="Name" class="span6"/>
				<label for="city">City</label>
				<input type="text" name="city" id="city" placeholder="City" class="span6"/>
				<label for="current_menu">Current menu</label>
				<select name="current_menu" id="current_menu" class="span6">
					<option value="-1" selected="selected">Select a menu</option>
					<?php
						foreach($allMenus as $menu){
							$menu->displayAsOption();
						}
					?>
				</select>
				<br /><br />
				<button type="submit" class="btn btn-primary">Create</button>
			</form>
		</div>
		
	</body>
</html>