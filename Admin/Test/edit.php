<?php 
	session_start();
	
	require_once('../../_include.php'); 
	$page = 1;
	
	// If id get the test
	if(isset($_GET['id'])){
		$restaurantManager = new RestaurantManager();
		$restaurant = $restaurantManager->getRestaurantById($_GET['id']);
	}
	
	// If edition of test
	if(isset($_POST['id'], $_POST['name'], $_POST['city'])){
		$name = $_POST['name'];
		$city = $_POST['city'];
		$id	  = $_POST['id'];
		$current_menu = null;
		
		if(isset($_POST['current_menu'])){
			$current_menu = $_POST['current_menu'];
		}
		
		if(strlen($id) != 0 && strlen($name) != 0 && strlen($city) != 0){
			$restaurant = new Restaurant($name, $city, $current_menu, $id);
			$restaurantManager = new RestaurantManager();
			$restaurantManager->updateRestaurant($restaurant);
			
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
			<form action="edit.php" method="post" class="well">
				<h2>Edit restaurant</h2><br />
				<?php
					echo '<input type="text" name="id" value="'.$restaurant->getId().'" style="display:none" />';
				?>
				<label for="name">Name</label>
				<input type="text" name="name" id="name" class="span6" placeholder="Name" value="<?php echo $restaurant->getName(); ?>"/>
				<label for="city">City</label>
				<input type="text" name="city" id="city" class="span6" placeholder="City" value="<?php echo $restaurant->getCity(); ?>"/>
				<label for="current_menu">Current menu</label>
				<select name="current_menu" id="current_menu" class="span6">
					<option value="" selected="selected">select a menu</option>
					<?php
	 					foreach($allMenus as $menu){
							$menu->displayAsOption($restaurant->getCurrentMenu());
						}
					?>
				</select>
				<br /><br />
				<button type="submit" class="btn btn-primary">Update</button>
			</form>
		</div>
	</body>
</html>