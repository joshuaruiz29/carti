<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>para ver la BD phpmyadmin</title>
</head>
<body>
	<h1>Base de datos</h1>
	<!-- scrpit para las variables de conexion-->
	<?php
	$conexion = mysqli_connect("localhost", "root","", "carti_fans");
	$sqlconsulta = "select *from mensajes";
	$resultado = mysqli_query($conexion, $sqlconsulta);
	?>

	<!-- tabla para mostrar los datos de phpmyadmin -->
	<table>
		<thead>
			<tr>
				<th>nombre</th>
				<th>correo</th>
				<th>mensaje</th>
			</tr>
		</thead>
<!-- inicia ciclo while para leer los registros de la bd-->
<?php
while($filas = mysqli_fetch_assoc($resultado)){
?>
<tr>
	<td><?php echo $filas['nombre']?></td>
	<td><?php echo $filas['correo']?></td>
	<td><?php echo $filas['mensaje']?></td>
</tr>
<!-- cierra ciclo while() -->
<?php
}
?>
</table><!-- cierra la tabla-->

</body>
</html>