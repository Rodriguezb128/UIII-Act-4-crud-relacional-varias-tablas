<?php

#Salir si alguno de los datos no está presente
if(
	!isset($_POST["Nombreproducto"]) || 
	!isset($_POST["Precio"]) || 
	!isset($_POST["Tipoproducto"]) || 
	!isset($_POST["Descripcion"]) || 
	!isset($_POST["Iva"]) || 
	!isset($_POST["Marca"]) || 
	!isset($_POST["Mercanciadisponible"])
) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id = $_POST["id"];
$nom = $_POST["Nombreproducto"];
$precio = $_POST["Precio"];
$tipo = $_POST["Tipoproducto"];
$desc = $_POST["Descripcion"];
$iva = $_POST["Iva"];
$marca = $_POST["Marca"];
$merca = $_POST["Mercanciadisponible"];

$sentencia = $base_de_datos->prepare("UPDATE productos SET Nombreproducto = ?, Precio = ?, Tipoproducto = ?, Descripcion = ?, Iva = ?, Marca = ?, Mercanciadisponible = ? WHERE id_producto = ?;");
$resultado = $sentencia->execute([$nom, $precio, $tipo, $desc, $iva, $marca, $merca, $id]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>