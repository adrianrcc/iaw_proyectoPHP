<?php
// REFERENCIA AL ARCHIVO DE CONFIGURACIÓN DE LA BASE DE DATOS
include_once("config.php");

// NOS MUESTRA LOS USUARIOS ORDENADOS POR ID EN ORDEN DESCENDIENTE
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Homepage</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"  crossorigin="anonymous">	
</head>

<body>
<div class = "container">
	<div class="jumbotron">
      <h1 class="display-4">Simple LAMP web app</h1>
      <p class="lead">Demo app</p>
    </div>	
	<a href="add.html" class="btn btn-primary">Add New Data</a><br/><br/>
	<table width='80%' border=0 class="table">

	<tr bgcolor='#CCCCCC'>
		<td>Name</td> <!--Define la celda de una tabla que contiene datos. -->
		<td>Apellido1</td>
		<td>Apellido2</td>
		<td>Age</td>
		<td>Email</td>
		<td>Update</td>
	</tr>
	<!--
	MySQLi: controlador de base de datos usado en php.
	$stmt: 'statement' es una variable de propósito general usada en con MySQLi en diversas líneas.
	$res: Variable utilizada para simplificar variables de resultado más complejas.
	fetch: 'tomar' datos.
	-->
	<?php
	while($res = mysqli_fetch_array($result)) {
		echo "<tr>\n";
		echo "<td>".$res['name']."</td>\n";
		echo "<td>".$res['apellido1']."</td>\n";
		echo "<td>".$res['apellido2']."</td>\n";
		echo "<td>".$res['age']."</td>\n";
		echo "<td>".$res['email']."</td>\n";
		echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>\n";
		echo "</tr>\n";
	}

	mysqli_close($mysqli);
	?>
	</table>
</div>
</body>
</html>
