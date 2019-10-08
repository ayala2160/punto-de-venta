<!DOCTYPE HTML>
<html>
<header>
	<title>Registrar venta</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link href="estilos.css" rel="stylesheet" type="text/css">
	
	<style>
		.total
		{
			color: green;
			display:inline;
		}
		
		.valor
		{
			display:inline;
		}
		
		.divisor
		{
			border-style: none;
		}
	</style>
</header>

<body>
	<?php
		// -------------------------- Credenciales de acceso
		$host = "localhost";
		$usuario = "root";
		$pass = "";
		$bd = "proyecto";
		
		// -------------------------- validación de pila temporal
		
		if(!isset($_POST['codigo']))
		{
			$codigo = 0;
		}
		
		else
		{
			$codigo = $_POST['codigo'];
		}
		
		// --------------------------- Validación de conexión a la base de datos
		
		$conexion = mysqli_connect($host,$usuario,$pass,$bd);
		
		if(!$conexion)
		{
			exit("Error, no se pudo conectar a la base de datos: ".mysqli_error());
		}
		
		// --------------------------- Función insertar en pila temporal
		echo "<div class='group'>";	
		
		function tabla_insertar($conexion,$codigo)
		{
			$query = "select * from articulo where id_art = ".$codigo.";";
			$result = mysqli_query($conexion,$query);
			$arreglo = mysqli_fetch_array($result);
			
			if($arreglo['id_art'] === $codigo)
			{
				// Consultar si existe el código
				
				$query_consulta = "select * from venta where id_art = ".$codigo.";";
				$consulta = mysqli_query($conexion,$query_consulta);
				$lineas = mysqli_num_rows($consulta);
				
				if($lineas >= 1)
				{						
					$fila = mysqli_fetch_array($consulta);
					if($fila['cant_vent'] >= 1)
					{
						// script para sumar 1 a la cantidad
						
						$query_incremento = "update venta set cant_vent = cant_vent + 1 where id_art = ".$codigo.";";
						mysqli_query($conexion,$query_incremento);
						
						$query_precio_base = "select pre_art from articulo where id_art = ".$codigo.";";
						$precio_base = mysqli_query($conexion,$query_precio_base);
						$dato_precio = mysqli_fetch_array($precio_base);
						$precio = $dato_precio['pre_art'];
						$cantidad = $fila['cant_vent'] + 1;
						
						$query_precio = "update venta set pre_art = ".$precio." * ".$cantidad." where id_art = ".$codigo.";";
						mysqli_query($conexion,$query_precio);
						
						echo "Producto agregado r=1";
					}
					
					else
					{
						echo "Error, cantidad incorrecta";
					}
				}
				
				else
				{					
					$query_precio = "select * from articulo where id_art = ".$codigo.";";
					$consulta_precio = mysqli_query($conexion,$query_precio);
					$fila = mysqli_fetch_array($consulta_precio);
					$precio = $fila['pre_art'];
					$descripcion = $fila['desc_art'];
					
					$query2 = "insert into venta(id_art, desc_art, cant_vent, pre_art) values (".$codigo.",'".$descripcion."',1,".$precio.");";
					mysqli_query($conexion,$query2);
					
					echo "Producto agregado r=2";
				}
			}
			
			else
			{
				if($codigo == 0)
				{
					echo "<h2>Bienvenido</h2>";
				}
				
				else
				{
					echo "<h2>El articulo no existe</h2>";
				}
			}
		}
		
		// ----------------------------- Función consultar tabla temporal
		
		function consulta_tabla($conexion)
		{
			$query_mostrar = "select * from venta;";
			$mostrar = mysqli_query($conexion,$query_mostrar);
			
			while($fila = mysqli_fetch_array($mostrar))
			{				
				echo "<tr>";
					echo "<td>".$fila['id_art']."</td>";
					echo "<td>".$fila['desc_art']."</td>";
					echo "<td>".$fila['cant_vent']."</td>";
					echo "<td>".$fila['pre_art']."</td>";
				echo "</tr>";
			}
		}
		
		function total($conexion)
		{
			$query = "select SUM(pre_art) as total from venta;";
			$resultado = mysqli_query($conexion,$query);
			$fila = mysqli_fetch_array($resultado);
			$total = $fila['total'];
			
			echo "<h2 class = 'valor'>$".$total."</h2>";
		}
		
		// ------------------ Programa
		
		echo "<center>";
			tabla_insertar($conexion,$codigo);
			echo "<h1>Registrar venta</h1>";
			
			// ------------------------- Resumen de venta --------------------------------
						
				echo "<br>";
				
				echo "<table style='width:100%'>";
					echo "<tr>";
						echo "<td>";
							echo "Artículo";
						echo "</td>";
						
						echo "<td>";
							echo "Descripción";
						echo "</td>";
						
						echo "<td>";
							echo "Cantidad";
						echo "</td>";
						
						echo "<td>";
							echo "Precio";
						echo "</td>";
					echo "</tr>";
					
					// insertar ciclo aqui
					consulta_tabla($conexion);
					
				echo "</table>";
				
				echo "<br>";
			
			// ------------------------- Total --------------------------------
			
				echo "<h1 class = 'total'>Total: </h1>";
				total($conexion);
				echo "<br>";
			
			// ------------------------- añadir productos --------------------------------
			
				echo "<br>";
				
				echo "<form action = 'generarv.php' method = 'post' autocomplete = 'off'>";
					
					echo "<label for='codigo'>Código del producto <span><em>(requerido)</em></span></label>";
					echo "<input type='text' name='codigo' class='form-input' required>";
					
					echo "<input class='form-btn' name='submit' type='submit' value='Agregar'>";
				echo "</form>";
				
				echo "</br>";
			
			// ------------------------- cancelar / guardar venta ------------------------------
				echo "<br>";
					echo "<table>";
						echo "<tr>";
							echo "<td>";
								echo "<form action = 'cancelarv.php'>";
									echo "<center><input class='form-btn' name='submit' type='submit' value='Cancelar venta'></center>";						
								echo "</form>";
							echo "</td>";
							echo "<td>";
								echo "<form action = 'guardarv.php'>";
									echo "<center><input class='form-btn' name='submit' type='submit' value='Cobrar'></center>";
								echo "</form>";
							echo "</td>";
						echo "</tr>";
					echo "</table>";
				echo "<br>";
			echo "</div>";
		echo "</center>";
		
		mysqli_close($conexion);
	?>
</body>

</html>