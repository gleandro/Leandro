<?php 

class CompleteRange
{

	public function build($array){

		//Se obtiene el tamaño del arreglo
		$size = COUNT($array);
		
		//obtenermos primer numero
		$inicio = $array[0];

		//obtenemos segundo numero
		$fin = $array[$size-1];

		$salida = array();

		for ($i=$inicio; $i <= $fin; $i++) { 

			//Insertamos todos los numeros a nuestro nuevo array
			array_push($salida,$i);

		}
		
		//devolvemos el nuevo array
		return $salida;

	}

}


$lista_num = [55, 58, 60];
$clase = new CompleteRange();
$string = $clase->build($lista_num);
print_r($string);

?>