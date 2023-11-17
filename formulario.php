<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nuevo producto</h1>
	<form method="post" action="nuevo.php">
		<label for="nom">Nombre de producto:</label>
		<input class="form-control" name="nom" required type="text" id="nom" placeholder="Escribe el nombre">

		<label for="precio">Precio:</label>
		<input class="form-control" name="precio" required type="number" id="precio" placeholder="Precio">

		<label for="tipo">Tipo de producto:</label>
		<input class="form-control" name="tipo" required type="text" id="tipo" placeholder="Tipo de producto">

		<label for="descripcion">Descripción:</label>
		<textarea required id="descripcion" name="descripcion" cols="30" rows="5" class="form-control"></textarea>

		<label for="iva">IVA:</label>
		<input class="form-control" name="iva" required type="number" id="iva" placeholder="IVA">

		<label for="marca">Marca:</label>
		<input class="form-control" name="marca" required type="text" id="marca" placeholder="Marca">

		<label for="merca">Mercancia disponible:</label>
		<input class="form-control" name="merca" required type="number" id="merca" placeholder="Mercancia disponible">

		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>