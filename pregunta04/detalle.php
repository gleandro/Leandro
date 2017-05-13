<?php 


class Detalle
{

	function obtener_detalle($id){

		//Obtener datos del archivo .json
		$data = file_get_contents("employees.json");
		$products = json_decode($data, true);


		//recorrer el array de empleados
		foreach ($products as $key => $emp) {

			//buscamos al empleado en el arreglo
			if ($id == $emp['id']) {
				$emp_out=$emp;
				break;
			}
		}
		//retornamos los datos del empleado
		return $emp_out;
	}
}

$temp_id = $_POST['id'];

$clase = new Detalle();
$empleado = $clase->obtener_detalle($temp_id);

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Detalle de empleado</title>
</head>
<body>
		<div>
			<table align="center">
				<tr>
					<td style="padding: 10px;">name</td>
					<td style="padding: 10px;"><?php echo $empleado['name'] ?></td>
				</tr>
				<tr>
					<td style="padding: 10px;">email</td>
					<td style="padding: 10px;"><?php echo $empleado['email'] ?></td>
				</tr>
				<tr>
					<td style="padding: 10px;">phone</td>
					<td style="padding: 10px;"><?php echo $empleado['phone'] ?></td>
				</tr>
				<tr>
					<td style="padding: 10px;">address</td>
					<td style="padding: 10px;"><?php echo $empleado['address'] ?></td>
				</tr>
				<tr>
					<td style="padding: 10px;">position</td>
					<td style="padding: 10px;"><?php echo $empleado['position'] ?></td>
				</tr>
				<tr>
					<td style="padding: 10px;">salary</td>
					<td style="padding: 10px;"><?php echo $empleado['salary'] ?></td>
				</tr>
				<tr>
					<td style="padding: 10px;">skills</td>
					<td style="padding: 10px;">
					<?php foreach ($empleado['skills'] as $key => $skill): ?>
						<div>&bull;<?php echo $skill['skill']; ?></div>
					<?php endforeach ?>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<a href="home.php"><button>Regresar</button></a>
					</td>
				</tr>
			</table>
		</div>
</body>
</html>