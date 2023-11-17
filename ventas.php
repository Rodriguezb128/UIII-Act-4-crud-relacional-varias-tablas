<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT pedido.Total, pedido.Fecha, pedido.id_pedido, GROUP_CONCAT(	productos.Nombreproducto, '..',  productos.Descripcion, '..', cantidad_producto.Cantidad SEPARATOR '__') AS productos FROM pedido INNER JOIN cantidad_producto ON cantidad_producto.id_pedido = pedido.id_pedido INNER JOIN productos ON productos.id_producto = cantidad_producto.id_producto GROUP BY pedido.id_pedido ORDER BY pedido.id_pedido;");
$pedidos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Ventas</h1>
		<div>
			<a class="btn btn-success" href="./vender.php">Nueva <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Número</th>
					<th>Fecha</th>
					<th>Productos vendidos</th>
					<th>Total</th>
					<th>Ticket</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($pedidos as $pedido){ ?>
				<tr>
					<td><?php echo $pedido->id_pedido ?></td>
					<td><?php echo $pedido->Fecha ?></td>
					<td>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Descripción</th>
									<th>Cantidad</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach(explode("__", $pedido->productos) as $productosConcatenados){ 
								$producto = explode("..", $productosConcatenados)
								?>
								<tr>
									<td><?php echo $producto[0] ?></td>
									<td><?php echo $producto[1] ?></td>
									<td><?php echo $producto[2] ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</td>
					<td><?php echo $pedido->Total ?></td>
					<td><a class="btn btn-info" href="<?php echo "imprimirTicket.php?id=" . $pedido->id_pedido?>"><i class="fa fa-print"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminarVenta.php?id=" . $pedido->id_pedido?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>