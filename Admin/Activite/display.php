<?php 
	require_once('../../_include.php'); 
	$page = 2;
	
	if(isset($_GET['menu_id'])){
		$menu_id 	 = (int)$_GET['menu_id'];
		$menuManager = new MenuManager();
		$menu 		 = $menuManager->getMenuById($menu_id);
		
		$productManager = new ProductManager();
		$products = $productManager->getAllProductsForMenuOrderedByType($menu_id);
		
	} else {
		header('Location: http://yoofoodapp.com/Admin/Menu/');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Menus</title>
		<link rel="stylesheet" href="../../libraries/bootstrap/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="../../css/style.css" type="text/css">
	</head>
	<body>
		<?php 
			include('../../_header.php'); 
		?>
		
		<div class="largeform_container">
			<h2>Menu details</h2>
			<br />
			<table class="table table-striped table-bordered table-condensed">
				<tr>
					<th colspan="2"><h3>Attributs</h3></th>
				</tr>
				<tr>
					<tr>
						<td>Name</td>
						<td><?php echo $menu->getName(); ?></td>
					</tr>
				</tr>
				<tr>
					<tr>
						<td>Description</td>
						<td><?php echo $menu->getDescription(); ?></td>
					</tr>
				</tr>
				<tr>
					<th colspan="2"><h3>Products</h3></th>
				</tr>
				<tr>
					<th>Name</th>
					<th>Price</th>
				</tr>
				<?php
					foreach(array_keys($products) as $type){
						echo '<tr><th colspan="2"><h4>'.$type.'</h4></th></tr>';
						$categoryProducts = $products[$type];
						foreach($categoryProducts as $product){
							$product->displayAsMiniCell();
						}
					}
				?>
			</table>
		</div>
	</body>
</html>