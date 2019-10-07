<!DOCTYPE HTML>
<html>
<header>
	<title>Administración de ventas</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link href="estilos.css" rel="stylesheet" type="text/css">
</header>

<body>
	<center>
		<div class="group">
		<h1>Administración de ventas</h1>
		<table>
			<tr>
				<td>
					<form action = "generarv.php">
						<center>
							<input class="form-btn" name="submit" type="submit" value="Generar venta">
					</form>
				</td>
				
				<td>
					<form action = "mostrarv.php">
							<input class="form-btn" name="submit" type="submit" value="Mostrar Ventas">
					</form>
				</td>
				
				<td>
					<form action = "inicio.php">
							<input class="form-btn" name="submit" type="submit" value="Regresar">
						</center>
					</form>
				</td>
			</tr>
		</table>
		</div>
	</center>
</body>

</html>