<?php

class ChangeString
{



  public function build($cadena){

    //Lista de Letras Mayuscula y Minuscula
    $array_letras = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'ñ', 'o', 'p', 'q', 'r','s', 't', 'u', 'v', 'w', 'x', 'y', 'z','A','B','C','D','F','G','H','I','J','K','L','M','N','Ñ','O','P','Q','R','S','T','U','V','W','X','Y','Z');

    //total de letras en el arreglo
    $total_array = COUNT($array_letras);
    
    //total de datos en la cadena
    $total_cadena = strlen($cadena);

    //output
    $salida = "";

    //variable temporal para obtener el dato
    $temp = "";

    //recorremos el texto
    for($i=0;$i<$total_cadena;$i++){

        $dato = $cadena[$i];    

        //recorremos la lista de letras
        for ($j=0; $j <$total_array ; $j++) { 

          //validamos que nuestro dato se encuentre en el arreglo de letras
          if ($dato == $array_letras[$j]) {

            //si el dato es la letra z se enviara la letra a
            if ($j ==26) {
              $temp = $array_letras[0];
            }

            //si el dato es la letra Z se enviara la letra A
            else if($j ==52) {
              $temp = $array_letras[27];
            }

            //si fuera cualquier otra letra se devolvera la letra que le sigue
            else{
              $temp = $array_letras[$j+1];
            }
            break;
          }

          //Si no se encuentra en el arreglo se almacena en la variable temporal
          else{
            $temp = $dato;
          }
        }

        //concatenamos nuestro output con la variable temporal
        $salida .=$temp;
    }

    //Devolvemos la cadena modificada
    return $salida;
  }
}

$clase = new ChangeString();
$string = $clase->build("**Casa 52Z");
echo $string;

?>
