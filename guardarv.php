<?php
	$host = "localhost";
	$usuario = "root";
	$pass = "";
	$bd = "proyecto";
	
	$conexion = mysqli_connect($host,$usuario,$pass,$bd);
	
	$sesion = "select * from sesion";
	$r_sesion = mysqli_query($conexion,$sesion);
	$f_sesion = mysqli_fetch_array($r_sesion);
	$empleado = $f_sesion['id_emp'];
	
	$maximo = "select MAX(id_ticket) as maximo from ticket";
	$respuesta = mysqli_query($conexion,$maximo);
	$comprobacion = mysqli_num_rows($respuesta);
	
	// ---------------------- Comprobar si hay folios de ticket
	if($comprobacion >= 1)
	{
		$arreglo = mysqli_fetch_array($respuesta);
		
		$ticket = $arreglo['maximo'] + 1;
		$tabla = "id_ticket,id_emp,id_art,desc_art,pre_art,sub_ticket,total_ticket";
		
		$query2 = "select * from venta";
		$resultado = mysqli_query($conexion,$query2);
		
		$query3 = "select SUM(pre_art) as total from venta";
		$suma = mysqli_query($conexion,$query3);
		$total = mysqli_fetch_array($suma);
		
		while($venta = mysqli_fetch_array($resultado))
		{
			// ---------------- Definición de valores ------------------------
			//$empleado = $f_sesion['id_emp'];
			$id_art = $venta['id_art'];
			$descripcion = $venta['desc_art'];
			
			// -------------------------- Obtener precio base ------------------------
			
			$query4 = "select * from articulo where id_art = ".$id_art.";";
			$res = mysqli_query($conexion,$query4);
			$origen = mysqli_fetch_array($res);
			
			$precio = $origen['pre_art'];
			$subtotal = $venta['pre_art'];
			
			$query5 = "insert into ticket (".$tabla.") values (";
			$query5 .= $ticket.",".$empleado.",".$id_art.",'".$descripcion."',".$precio.",";
			$query5 .= $subtotal.",".$total['total'].");";
			mysqli_query($conexion,$query5);
		}
		
		$query = "TRUNCATE venta;";
		mysqli_query($conexion,$query);
		header('location: correcto.php');
	}
	
	// ------------------------ Si no hay datos -----------------------
	
	else
	{
		$query = "TRUNCATE venta;";
		mysqli_query($conexion,$query);
		mysqli_close($conexion);
		header('location: inicio.php');
	}
?>