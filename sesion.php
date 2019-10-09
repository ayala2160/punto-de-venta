<!DOCTYPE HTML>
<html>
<header>
	<title>Administración de ventas</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link href="estilos.css" rel="stylesheet" type="text/css">
</header>

<body>
	<center>
		<div class="group"style="width:50%">
<?php
	$host = "localhost";
	$usuario = "root";
	$pass = "";
	$base = "proyecto";
	
	$user = $_POST['user'];
	$password = $_POST['password'];
	
	$conexion = mysqli_connect($host,$usuario,$pass,$base);
	
	if(!$conexion)
	{
		exit("Error al conectarse al servidor: ".mysqli_error());
	}
	
	$inicializar = "truncate sesion;";
	mysqli_query($conexion,$inicializar);
	
	$query = "select * from empleados where us_emp = '".$user."';";
	
	$result = mysqli_query($conexion,$query);
	
	if($fila = mysqli_fetch_array($result))
	{
		if($user === $fila['us_emp'])
		{			
			if($password === $fila['pass_emp'])
			{
				echo "<div class='group'>";
				echo "<h1>Acceso Correcto</h1>";
				
				$query_ok = "insert into sesion(id_emp) values(".$fila['id_emp'].");";
				mysqli_query($conexion,$query_ok);
				
				mysqli_close($conexion);
				header('location: inicio.php');
			}
			
			else
			{
				echo "<center>";
					echo "<h1>Acceso incorrecto</h1><br>";
					echo "<p>Contraseña incorrecta<p>";
					
					echo "<form action = 'index.php'>
							<input type = 'submit' value = 'Regresar'>
						</form>";
				echo "</center>";
			}
		}
		
		else
		{
			echo "<h1>Acceso incorrecto</h1><br>";
			echo "<p>Usuario incorrecto<p>";
		}
	}
	
	else
	{
		exit("
			<center>
				<h1>Error: Usuario o contraseña no encontrados</h1><br>
				<form action = 'index.php'>
					<input class='form-btn' name='submit' type='submit' value='Regresar'>
				</form>
			</center>
			");
	}
	
	mysqli_close($conexion);
?>
			</div>
		</center>
	</body>
</html>