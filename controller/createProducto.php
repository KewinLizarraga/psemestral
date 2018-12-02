<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../model/producto.php';

$codigo=$_POST['codigoProducto'];
$nombre=$_POST['nombre'];
$precio=$_POST['precio'];

$obj=new producto();
if($obj->registrarProductos($nombre, $precio)){
    $ruta="location:../view/formProductos.php";
}

header($ruta);