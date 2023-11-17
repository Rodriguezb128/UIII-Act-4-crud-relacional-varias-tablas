<?php
if(!isset($_POST["total"])) exit;


session_start();


$total = $_POST["total"];
$idp = $_POST["idp"];
$contado = $_POST["contado"];
$iva = $_POST["iva"];
$descuento = $contado * 0.1;
include_once "base_de_datos.php";


$ahora = date("Y-m-d H:i:s");


$sentencia = $base_de_datos->prepare("INSERT INTO pedido(id_producto, Fecha, Iva, Total, Contado, Descuento) VALUES (?, ?, ?, ?, ?, ?);");
$sentencia->execute([$idp, $ahora, $iva, $total, $contado, $descuento]);

$sentencia = $base_de_datos->prepare("SELECT id_pedido FROM pedido ORDER BY id_pedido DESC LIMIT 1;");
$sentencia->execute();
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

$idpedido = $resultado === false ? 1 : $resultado->id_pedido;

$base_de_datos->beginTransaction();
$sentencia = $base_de_datos->prepare("INSERT INTO cantidad_producto(id_producto, id_pedido, Cantidad) VALUES (?, ?, ?);");
$sentenciaExistencia = $base_de_datos->prepare("UPDATE productos SET Mercanciadisponible = Mercanciadisponible - ? WHERE id_producto = ?;");
foreach ($_SESSION["carrito"] as $producto) {
	$total += $producto->total;
	$sentencia->execute([$producto->id_producto, $idpedido, $producto->cantidad]);
	$sentenciaExistencia->execute([$producto->cantidad, $producto->id_producto]);
}
$base_de_datos->commit();
unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];
header("Location: ./vender.php?status=1");
?>