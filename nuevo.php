<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["nom"]) || !isset($_POST["precio"]) || !isset($_POST["tipo"]) || !isset($_POST["descripcion"]) || !isset($_POST["iva"]) || !isset($_POST["marca"]) || !isset($_POST["merca"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$Nombreproducto = $_POST["nom"];
$precio = $_POST["precio"];
$tipo = $_POST["tipo"];
$descripcion = $_POST["descripcion"];
$iva = $_POST["iva"];
$marca = $_POST["marca"];
$merca = $_POST["merca"];

$sentencia = $base_de_datos->prepare("INSERT INTO productos(Nombreproducto, Precio, Tipoproducto, Descripcion, Iva, Marca, Mercanciadisponible) VALUES (?, ?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$Nombreproducto, $precio, $tipo, $descripcion, $iva, $marca, $merca]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "pie.php" ?>