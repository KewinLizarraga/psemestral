<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../model/venta.php';

$codigo=$_POST['codigo'];
$cliente=$_POST['cliente'];
$fecha=$_POST['fecha'];

$cli=new venta();
if($cli->actualizarVentas($codigo, $cliente, $fecha)){
    $ruta='location:../view/formVentas.php';
    header($ruta);
}
else{
    echo "Error, no se puede Editar";
}