<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../model/venta.php';

$codigo=$_POST['codigoVenta'];
$cliente=$_POST['cliente'];
$fecha=$_POST['fecha'];

$obj=new venta();
if($obj->registrarVentas($cliente, $fecha)){
    $ruta="location:../view/formVentas.php";
}

header($ruta);