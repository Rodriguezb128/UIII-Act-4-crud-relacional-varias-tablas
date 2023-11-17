<?php
if (!isset($_POST["cantidad"])) {
	exit("No hay cantidad");
}
if (!isset($_POST["indice"])) {
	exit("No hay índice");
}
$cantidad = floatval($_POST["cantidad"]);
$indice = intval($_POST["indice"]);
session_start();
if ($cantidad > $_SESSION["carrito"][$indice]->Mercanciadisponible) {
	header("Location: ./vender.php?status=5");
	exit;
}
$_SESSION["carrito"][$indice]->cantidad = $cantidad;
$_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->cantidad * $_SESSION["carrito"][$indice]->Precio + ($_SESSION["carrito"][$indice]->Iva * $_SESSION["carrito"][$indice]->cantidad);
header("Location: ./vender.php");
