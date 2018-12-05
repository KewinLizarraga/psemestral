<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require '../model/producto.php';

$obj=new producto();
$resultado=$obj->getListaProductos();
while($fila=$resultado->fetch_array(MYSQLI_ASSOC)){
    echo "<option value='".$fila["codigoProducto"]."'>".$fila["nombre"]."</option>";
}