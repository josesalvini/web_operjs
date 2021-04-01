<?php
require_once "conexion.php";

header("Content-Type: application/json");
//echo "Metodo HTTP: ".$_SERVER['REQUEST_METHOD'];
$conexion = new conexion;
$response = [
    'status' => "OK",
    'result' => array("error_id" => "200",
                     "error_msg" => "Metodo no permitido.")
];

switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        echo $response;
        break;
    case 'GET':
        if(isset($_GET['id'])){
            $query ="select * from serv_FacturaElectronica where Nro_Identificacion= '" .$_GET['id'] ."'";
        }else{
            $query ="select * from serv_FacturaElectronica";
        }
        echo json_encode($conexion -> obtenerDatos($query));
        break;
}

//Nro_Identificacion
//print_r($conexion -> obtenerDatos($query));

?>