<!DOCTYPE HTML>
<html>
<header>
	<title>Página principal</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link href="estilos.css" rel="stylesheet" type="text/css">
</header>

<body>
	<center>
		<div class="group">
		<h1>Bienvenido</h1>
		<table>
			<tr>
				<td>
					<form action = "inventarios.php">
					<center>
						<input class="form-btn" name="submit" type="submit" value="Inventario">
					</form>
				</td>
				
				<td>
					<form action = "ventas.php">
						<input class="form-btn" name="submit" type="submit" value="Ventas">
					</form>
				</td>
				
				<td>
					<form action = "index.php">
						<input class="form-btn" name="submit" type="submit" value="Cerrar sesión">
					</center>
					</form>
				</td>
			</tr>
		</table>
		</div>
	</center>
</body>

</html>