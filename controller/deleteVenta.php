<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../model/venta.php';
$codigo=$_GET['cod'];

$cn=new venta();

if($cn->eliminarVentas($codigo)){
    $ruta='location:../view/formVentas.php';
    header($ruta);
}
else{
    echo"Error al Eliminar";
}