<?php 

class ClearPar
{

	public function build($cadena){

		//obtenemos tamaña de la cadena
		$total_cadena = strlen($cadena);

		$salida="";

		//una variable booleana
		$left = false;

		//recorremos la cadena
		for ($i=0; $i < $total_cadena; $i++) { 

			$dato = $cadena[$i];

			//si la el dato es "(" se activara el flag true, buscando una dato ")"
			if ($dato == "(") {
				$left=true;
			}

			//si el dato es ")" y el flag esta activado cogera el anterior a este y el mismo para formar una pareja "()"
			else if($left==true && $dato ==")") {
				$salida .=$cadena[$i-1].$dato;

				//se desactiva el flag
				$left=false;
			}
		}

		//devolvemos la cadena
		return $salida;
	}

}

$clase = new ClearPar();
$string = $clase->build("((()");
echo $string;

?>