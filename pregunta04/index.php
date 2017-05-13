<?php

//se incluye el archivo principal
include("Slim/Slim.php");

//se registran la instancia de slim
\Slim\Slim::registerAutoloader();

//se declara la aplicacion 
$app = new \Slim\Slim();



$app->get(
    '/consulta/:min&:max',function($min,$max) use ($app){
        $data = file_get_contents("employees.json");
        $products = json_decode($data, true);
        $empleados = array();
    	foreach ($products as $key => $emp) {  
            $salary = str_replace(',','',substr($emp['salary'],1,5));
                
            if ((int)$min <= (int)$salary && (int)$salary <= (int)$max) {
                //echo (int)$min.'-'.$salary.'-'.(int)$max.'-------------------';
                array_push($empleados,$emp);
            }
        }   
$xmlstr = <<<XML
<?xml version='1.0' standalone='yes'?>
<employees>
</employees>


XML;

$empleados_xml = new SimpleXMLElement($xmlstr);

foreach ($empleados as $key => $emp2) {
    $nuevo = $empleados_xml->addChild('employe');
    $nuevo->addChild('id',$emp2['id']);
    $nuevo->addChild('isOnline',$emp2['isOnline']);
    $nuevo->addChild('salary',$emp2['salary']);
    $nuevo->addChild('age',$emp2['age']);
    $nuevo->addChild('position',$emp2['position']);
    $nuevo->addChild('name',$emp2['name']);
    $nuevo->addChild('gender',$emp2['gender']);
    $nuevo->addChild('email',$emp2['email']);
    $nuevo->addChild('phone',$emp2['phone']);
    
    $skills = $nuevo->addChild('skills');
    foreach ($emp2['skills'] as $key => $sk) {
        $skills->addChild('skill',$sk['skill']);
    }
}

echo $empleados_xml->asXML();

}
);

$app->run();

echo(header('content-type: text/xml'));

?>


