<?php
/*
	Pequeño, muy pequeño sistema de ventas en PHP con MySQL

	@author parzibyte

	No olvides visitar parzibyte.me/blog para más cosas como esta
*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>SportLife</title>
	
	<link rel="stylesheet" href="./css/fontawesome-all.min.css">
	<link rel="stylesheet" href="./css/2.css">
	<link rel="stylesheet" href="./css/estilo.css">
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">SportLife</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="./listar.php">Productos</a></li>
					<li><a href="./vender.php">Pedido</a></li>
					<li><a href="./ventas.php">Catidad productos</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row">