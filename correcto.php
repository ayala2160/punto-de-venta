<!DOCTYPE HTML>
<html>
<header>
	<title>Venta registrada</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link href="estilos.css" rel="stylesheet" type="text/css">
</header>

<body>
	<center>
		<div class="group">
		<h1>Se ha registrado la venta correctamente!</h1>
		
		<table>
			<tr>
				<td>
					<form action = "generarv.php">
						<input class="form-btn" name="submit" type="submit" value="Generar otra venta">
					</form>
				</td>
				
				<td>
					<form action = "inicio.php">
						<input class="form-btn" name="submit" type="submit" value="Volver al inicio">
					</form>
				</td>
			</tr>
		</table>
		</div>
	</center>
</body>

</html>