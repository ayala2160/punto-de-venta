<!DOCTYPE HTML>
<html>
<header>
	<title>Iniciar sesión</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link href="estilos.css" rel="stylesheet" type="text/css">
</header>

<body>
	<center>
		<div class="group">	
		<h1>Iniciar sesión</h1>
		<br>
			<table>
				<td>
					<form action = "sesion.php" method = "post">
						<center>
						<label for="username ">Usuario <span><em>(requerido)</em></span></label>
						<input type="username" name="user" class="form-input" required/>
						<label for="password ">Contraseña <span><em>(requerido)</em></span></label>
						<input type="password" name="password" class="form-input" required/><br>
							<input class="form-btn" name="submit" type="submit" value="Entrar">
						</center>
					</form>
				</td>
			</table>
		</div>
	</center>
</body>

</html>