<?php 
	require_once('../../_include.php'); 
	$page = 3;

	// If creation of waiter
	if(isset($_POST['first_name'], $_POST['last_name'], $_POST['login'], $_POST['password'])){
			 
		$first_name    = $_POST['first_name'];
		$last_name 	   = $_POST['last_name'];
		$login 		   = $_POST['login'];
		$password 	   = $_POST['password'];
		$restaurant_id = (int)$_POST['restaurant_id'];
		$zone_id 	   = (int)$_POST['zone_id'];

		if($restaurant_id == -1){
			$restaurant_id = null;
		}
				
		if($zone_id == -1){
			$zone_id = null;
		}
		
		if(strlen($first_name) != 0 && strlen($last_name) != 0 && strlen($login) != 0 && strlen($password) != 0){
			$password 		= hash('sha256', $password);
			$newWaiter 		= new Waiter($first_name, $last_name, $login, $password, null, $restaurant_id, $zone_id);
			$waiterManager 	= new WaiterManager();
			$waiterManager->addWaiter($newWaiter);
			
			header('Location: http://yoofoodapp.com/Admin/Waiter');
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Waiters</title>
		<link rel="stylesheet" href="../../libraries/bootstrap/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="../../css/style.css" type="text/css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			// Create list for drop down of zones
			var zonesList = new Array();
			<?php			
				$restaurantManager = new RestaurantManager();
				$allRestaurants = $restaurantManager->getAllRestaurants();
				
				$zoneManager = new ZoneManager();
				foreach($allRestaurants as $restaurant){
					?>
					var tempArray = new Array();
					<?
					$zones = $zoneManager->getZonesForRestaurant($restaurant->getId());
					foreach($zones as $zone){
						?>
						var zone = new Array();
						zone['name'] = "<?php echo $zone->getName(); ?>"; 
						zone['id']	 = "<?php echo $zone->getId(); ?>";
						tempArray[tempArray.length] = zone; 
						<?php
					}
					?>
					zonesList[<?php echo $restaurant->getId(); ?>] = tempArray;
					<?php
				}
				
			?>
			$(document).ready(function(){
				$('#restaurant_id').change(function(){
					var key = $(this).val();
					var zones = zonesList[key];
					var index;
					$('#zone_id').find('option').remove();
					$('#zone_id').append('<option value="-1">Select a zone</option>');
					
					if(zones.length > 0){
						$('#zone_id').attr('disabled', false);
						for(index=0; index<zones.length; index++){
							$('#zone_id').append('<option value="'+zones[index]['id']+'">'+zones[index]['name']+'</option>');
						}
					} else {
						$('#zone_id').attr('disabled', true);
					}
				});
			});
		</script>
	</head>
	<body>
		<?php 
			include('../../_header.php'); 
		?>
		<div class="form_container">
			<form action="add.php" method="post" class="well">
				<h2>New waiter</h2><br />
				<label for="first_name">First name</label>
				<input type="text" name="first_name" id="first_name" placeholder="First name" class="span6"/>
				<label for="last_name">Last name</label>
				<input type="text" name="last_name" id="last_name" placeholder="Last name" class="span6"/>
				<label for="login">Login</label>
				<input type="text" name="login" id="login" placeholder="Login" class="span6"/>
				<label for="password">Password</label>
				<input type="password" name="password" id="password" placeholder="Password" class="span6"/>
				<label for="restaurant_id">Restaurant</label>
				<select name="restaurant_id" id="restaurant_id" class="span6">
					<option value="-1" selected="selected">Select a restaurant</option>
					<?php
						foreach($allRestaurants as $restaurant){
							$restaurant->displayAsOption();
						}
					?>
				</select>
				<label for="restaurant_id">Zone</label>
				<select name="zone_id" id="zone_id" class="span6" disabled="disabled">
					<option value="-1" selected="selected">Select a zone</option>
				</select>
				<br /><br />
				<button type="submit" class="btn btn-primary">Create</button>
			</form>
		</div>
		
	</body>
</html>