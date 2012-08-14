<?php
        include('../_include.php');
	$badLogin = 0;
	
	if(isset($_POST['username'], $_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(strcmp($username, 'feeltest') == 0 && strcmp($password, 'admin') == 0){
			$_SESSION['user'] = 'feeltest';
		} else {
			$badLogin = 1;
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Feeltest</title>
		<link rel="stylesheet" href="../libraries/bootstrap/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="../css/style.css" type="text/css">
	</head>
	
	<body>
		<?php include('../_header.php'); ?>
		<?php 
			if(isset($_SESSION['user'])){
				?>
				<div class="form_container">
					<h2>Bienvenue <?php echo $_SESSION['user']; ?> !</h2>
					<a href="logout.php">Se délogguer</a>
				</div>
		<?php
			} else {	?>
				<div class="form_container">
					<form id="login" method="post" class="well" action="index.php">
						<h2>Connexion</h2><br />
						<label for="email">Nom d'utilisateur</label>
						<input type="text" name="username" id="username" placeholder="Name"class="span6" />
						<label for="password">Mot de passe</label>
						<input type="password" name="password" id="password" placeholder="Password" class="span6" /><br /><br />
						<button type="submit" class="btn btn-primary">Login</button>
						<?php 
							if($badLogin == 1) {
								echo '<p style="color: red; text-align:center;">Mauvais identifiants !</p>';
							}
						?>
					</form>
				</div>
		<?php
			}
		?>
	</body>
</html>