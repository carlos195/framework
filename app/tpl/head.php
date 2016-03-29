<?php

	if(isset($_SESSION['user']) == TRUE){
			if($_SESSION['rol'] == 2){
				$menu = array(
					'Tus anuncios' => APP_W.'anuncios',
					$_SESSION['user'] => APP_W.'perfil',
				'	Logout' => APP_W.'home/logout'
				);
			}else{
				$menu = array(
					$_SESSION['user'] => APP_W.'perfil',
					'Logout' => APP_W.'home/logout'
				);
			}
	}

	include 'common.php';
?>
<nav>
	<?php
		if(isset($_SESSION['user']) == TRUE){
				MMenu::create($menu);
		}else{
				echo '<ul class="menu">
					<li></li>
					<li id="link-sesion">Inicia sesion</li>
					<li id="link-registro">Registrate</li>
				</ul>';
		}
	?>
</nav>