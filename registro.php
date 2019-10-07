<?php
$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="proyecto";
$db_table_name="articulo";
$db_connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if (!$db_connection) {
	die('No se ha podido conectar a la base de datos');
}

$subs_id = utf8_decode($_POST['id']);
$subs_marca = utf8_decode($_POST['marca']);
$subs_desc = utf8_decode($_POST['descripcion']);
$subs_cant = utf8_decode($_POST['cantidad']);
$subs_precio = utf8_decode($_POST['precio']);

echo $subs_marca;

$resultado = mysqli_query($db_connection, "SELECT * FROM ".$db_table_name." WHERE id_art = '".$subs_id."'");

if (mysqli_num_rows($resultado)>0)
{
	header('Location: Fail.html');

} 

else
{
	$insert_value = 'INSERT INTO `'.$db_table_name.'` (`id_art` , `marca_art`, `desc_art` , `cant_art` , `pre_art`) VALUES ("'.$subs_id.'", "'.$subs_marca.'", "'.$subs_desc.'", "'.$subs_cant.'", "'.$subs_precio.'")';

	$retry_value = mysqli_query($db_connection, $insert_value);

	if (!$retry_value) 
	{
	   die('Error: ' . mysql_error());
	}
	
	else
	{
		mysqli_query($db_connection, $insert_value);
	}
	
	header('Location: Success.html');
}
mysql_close($db_connection);
?>