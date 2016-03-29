<!DOCTYPE html>
<html>
<head>
	<title><?= $title; ?></title>
	<link href='https://fonts.googleapis.com/css?family=Oswald|Passion+One|Anton|Pacifico|Amatic+SC|Sigmar+One|Luckiest+Guy' rel='stylesheet' type='text/css'>
    <link rel="stylesheet"  type="text/css" href="<?= APP_W.'pub/css/m.css'; ?>">
    <script src="<?= APP_W.'pub/js/jquery.min.js'; ?>"></script>
    <script src="<?= APP_W.'pub/js/app.js'; ?>"></script>
</head>
<body>
	<header>
		<!--<div id="title">
			<h1><?= $title; ?></h1>
		</div>-->
		<!--<div id="title-principal"><a href="<= APP_W.'home'; ?>">AD</a></div><div id="title-mini"></div><div id="title-secondary">VIVE</div>-->
		<?php 

			if(isset($_SESSION['user']) == FALSE){
				echo '<form class="form-log" method="POST" action="../M-master/home/login" >
					<label for="email">Login </label><input type="text" id="form-email" name="email" /><br/>
					<label for="password">Password </label><input type="password" id="form-password" name="password" /><br/>
					<input type="submit" id="login" value="Enviar" />
				</form>
				
				<form class="form-reg" method="POST" action="../M-master/register/register" >
				<label for="new_email">User </label><input type="text" id="reg-email" name="new_email" /><br/>
				<label for="new_password">Password </label><input type="password" id="reg-password" name="new_password" /><br/>
				<label for="new_nombre">Nombre </label><input type="text" id="reg-nombre" name="new_nombre" /><br/>
				<label for="new_poblacion">Poblacion </label>
				<select name="new_poblacion">
					<option value="Gava">Gava</option>
					<option value="Viladecans">Viladecans</option>
					<option value="Castelldefels">Castelldefels</option>
					<option value="Sitges">Sitges</option>
					<option value="Sant Boi">Sant Boi</option>
				</select>
				<input type="submit" id="register" value="Enviar" />
				</form>';
			}

		?>		
	</header>