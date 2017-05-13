<?php 

	$data = file_get_contents("employees.json");
    $products = json_decode($data, true);
   

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>pregunta04</title>
	<link rel="stylesheet" href="">
</head>
<body>
<h2 align="center">Lista de todos los empleados</h2>

	<div>
		<table align="center">
			<tr>
				<th>name</th>
				<th>email</th>
				<th>position</th>	
				<th>salary</th>
				<th>opciones</th>
			</tr>
			<?php foreach ($products as $key => $emp): ?>
			<tr>
				<form action="detalle.php" method="post" accept-charset="utf-8">
				<td hidden="hidden"><input type="text" name="id" id="id" value="<?php echo $emp['id']; ?>"></td>
				<td style="padding: 10px;"><?php echo $emp['name']; ?></td>
				<td style="padding: 10px;"><?php echo $emp['email']; ?></td>
				<td style="padding: 10px;"><?php echo $emp['position']; ?></td>
				<td style="padding: 10px;"><?php echo $emp['salary']; ?></td>
				<td style="padding: 10px;"><button type="submit">Detalle</button></td>
				</form>
			</tr>
			<?php endforeach ?>
			
		</table>
	</div>

<!--	<?php print_r($products) ?> -->
</body>
</html>