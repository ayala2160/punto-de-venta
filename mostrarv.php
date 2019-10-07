<!DOCTYPE HTML>
<html>
<header>
	<title>Ventas registradas</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link href="estilos.css" rel="stylesheet" type="text/css">
	
	<style>
		.no_borde
		{
			border-width: 0px;
		}
	</style>
</header>

<body>
	<center>
		<h1>Ventas registradas</h1>
		<br>
		
		<?php
			$host = "localhost";
			$usuario = "root";
			$pass = "";
			$bd = "proyecto";
			$comparador = 0;
			$folio_v = 0;

			$conexion = mysqli_connect($host,$usuario,$pass,$bd);
			
			$query = "select * from ticket";
			$result = mysqli_query($conexion,$query);
			
			while($consulta = mysqli_fetch_array($result))
			{
				if($folio_v == 0)
				{
					$comparador = 0;
				}
				
				else
				{
					if($folio === $consulta['id_ticket'])
					{
						$comparador = 1;
					}
					
					else
					{
						$comparador = 0;
					}
				}
				
				if($comparador == 0)
				{
				echo "<div class='group'>";
					echo "<table>";
						echo "<tr>";
							echo "<td>";
								echo "<b>Folio: </b>";
							echo "</td>";
							
							echo "<td>";
								$folio = $consulta['id_ticket'];
								echo $consulta['id_ticket'];
							echo "</td>";
						echo "</tr>";
						
						echo "<tr>";
							echo "<td>";
								echo "<b>Fecha: </b>";
							echo "</td>";
							
							echo "<td>";
								echo $consulta['fecha_ticket'];
							echo "</td>";
							
							echo "<td>";
								echo "<b>Atendió: </b>";
							echo "</td>";
							
							echo "<td>";
								echo $consulta['id_emp'];
							echo "</td>";
						echo "</tr>";
						
						echo "<tr>";
							echo "<td colspan = '5' class = 'no_borde'>";
								echo "<br>";
							echo "</td>";
						echo "</tr>";
						
						echo "<tr>";
							echo "<td>";
								echo "<b>Código</b>";
							echo "</td>";
							
							echo "<td>";
								echo "<b>Descripción</b>";
							echo "</td>";
							
							echo "<td>";
								echo "<b>Precio</b>";
							echo "</td>";
							
							echo "<td>";
								echo "<b>Subtotal</b>";
							echo "</td>";
							
							echo "<td>";
								echo "<b>Total</b>";
							echo "</td>";
						echo "</tr>";
						
						$query2 = "select * from ticket where id_ticket = ".$folio.";";
						$result2 = mysqli_query($conexion,$query2);
						$comparador = 1;
						
						while($datos = mysqli_fetch_array($result2))
						{
							echo "<tr>";
								echo "<td>";
									echo $datos['id_art'];
								echo "</td>";
								
								echo "<td>";
									echo $datos['desc_art'];
								echo "</td>";
								
								echo "<td>";
									echo $datos['pre_art'];
								echo "</td>";
								
								echo "<td>";
									echo $datos['sub_ticket'];
								echo "</td>";
								
								echo "<td>";
									echo $datos['total_ticket'];
								echo "</td>";
							echo "</tr>";
						}
						
					echo "</table>";
				echo "</div>";
				echo "<br>";
				}
				
				else
				{
					exit("Se ha producido un error no esperado: ").mysqli_error();
				}
			}
		?>
		
		<form action = "ventas.php">
			<center>
				<input class="form-btn" name="submit" type="submit" value="Regresar">
			</center>
		</form>
		
	</center>
</body>

</html>