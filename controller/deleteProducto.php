<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../model/producto.php';
$codigo=$_GET['codigoProducto'];

$cn=new producto();

if($cn->eliminarProducto($codigo)){
    $ruta='location:../view/formProductos.php';
    header($ruta);
}
else{
    echo"Error al Eliminar";
}