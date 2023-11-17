<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM productos WHERE id_producto = ?;");
$sentencia->execute([$id]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if($producto === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}

?>
<?php include_once "encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar producto con el ID <?php echo $producto->id_producto; ?></h1>
		<form method="post" action="guardarDatosEditados.php">
			<input type="hidden" name="id" value="<?php echo $producto->id_producto; ?>">
	
			<label for="Nombreproducto">Nombre Producto:</label>
			<input value="<?php echo $producto->Nombreproducto ?>" class="form-control" name="Nombreproducto" required type="text" id="Nombreproducto" placeholder="Escribe el nombre">

			<label for="Precio">Precio:</label>
			<input required id="Precio" name="Precio" type="number" class="form-control" value="<?php echo $producto->Precio?>" placeholder="Precio">

			<label for="Tipoproducto">Tipo Producto:</label>
			<input value="<?php echo $producto->Tipoproducto ?>" class="form-control" name="Tipoproducto" required type="text" id="Tipoproducto" placeholder="Tipo de producto">

			<label for="Descripcion">Descripcion:</label>
			<input value="<?php echo $producto->Descripcion ?>" class="form-control" name="Descripcion" required type="text" id="Descripcion" placeholder="Descripcion">

			<label for="Iva">Iva:</label>
			<input value="<?php echo $producto->Iva ?>" class="form-control" name="Iva" required type="number" id="Iva" placeholder="IVA">
			
			
			<label for="Marca">Marca:</label>
			<input value="<?php echo $producto->Marca ?>" class="form-control" name="Marca" required type="text" id="Marca" placeholder="Marca">
			
			
			<label for="Mercanciadisponible">Mercancia Disponible:</label>
			<input value="<?php echo $producto->Mercanciadisponible ?>" class="form-control" name="Mercanciadisponible" required type="number" id="Mercanciadisponible" placeholder="Mercancia Disponible">

			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div>
<?php include_once "pie.php" ?>
