<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../model/producto.php';

$cod=$_POST['cod'];
$obj = new producto();
$obj->setProductoByCodigo($cod);

//$codigo=$obj->getCodigo();
//$nombre=$obj->getNombre();
$precio=$obj->getPrecio();

echo $precio;