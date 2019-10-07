<?php
	$host = "localhost";
	$usuario = "root";
	$pass = "";
	$bd = "proyecto";
	
	$conexion = mysqli_connect($host,$usuario,$pass,$bd);
	$query = "TRUNCATE venta;";
	
	mysqli_query($conexion,$query);
	
	mysqli_close($conexion);
	header('location: inicio.php');
?>