<!DOCTYPE HTML>
<html>
<header>
	<title>Art&iacute;culos registrados</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link href="estilos.css" rel="stylesheet" type="text/css">
</header>

<body>
	<center>
		<h1>Art&iacute;culos registrados</h1>
		
		<div class="group" style="width:60%">
		<table style="width:100%">
			<tr>
				<td><font face="verdana"><b>C&oacute;digo</b></font></td>
				<td><font face="verdana"><b>Marca</b></font></td>
				<td><font face="verdana"><b>Descripci&oacute;n</b></font></td>
				<td><font face="verdana"><b>Cantidad</b></font></td>
				<td><font face="verdana"><b>Precio</b></font></td>
			</tr>
			<?php
				/*mysql_connect: realiza la conexión al servidor de MySQL Server, pasándole como parámetro el nombre del servidor
				o la IP, el usuario y la contraseña de MySQL con permisos suficientes.*/
				$link = mysqli_connect("localhost", "root", "","proyecto");

				$query = "SELECT * FROM articulo;";
				//mysql_query: ejecución de consulta SQL en el servidor de MySQL Server.
				$result = mysqli_query($link,$query);
				
				/*mysql_fetch_array: función MySQL que obtiene en una matriz los registros del resultado de
				la ejecución de una consulta SQL.*/
					while($row = mysqli_fetch_array($result))
					{
						echo "<tr>";
							echo "<td><font face=\"verdana\">" . 
								$row["id_art"] . "</font></td>";
							echo "<td><font face=\"verdana\">" . 
								$row["marca_art"] . "</font></td>";
							echo "<td><font face=\"verdana\">" . 
								$row["desc_art"] . "</font></td>";
							echo "<td><font face=\"verdana\">" . 
								$row["cant_art"] . "</font></td>";
							echo "<td><font face=\"verdana\">" . 
								$row["pre_art"]. "</font></td>";
						echo "</tr>";
					}
					
				//mysql_free_result: libera la memoria del resultado obtenido de la ejecución de la consulta SQL.
				mysqli_free_result($result);
				//mysql_close: cierra la conexión establecida con la base de datos.
				mysqli_close($link);
			?>
		</table>
		</div>
		<br>
		<button class = "form-btn" onclick = "location.href = 'inventarios.php'">Volver</button>
	</center>
</body>
</html>