<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../model/producto.php';

$obj=new producto();
$resultado=$obj->getListaProductos();
while ($fila=$resultado->fetch_array(MYSQLI_ASSOC)){
    echo '<tr>'.
            '<td>'.$fila['codigoProducto'].'</td>
            <td>'.$fila['nombre'].'</td>
            <td>'.$fila['precio'].'</td>
            <td>'.
                '<input type="number" name="cantidad" min="0" max="10">'.
            '</td>
            <td>'.
//                '<input type="submit" value="Agregar">'. //CORREGIR
                '<button type="button" class="btn" onclick="agregarLista();">Agregar</button>'.
            '</td>
        </tr>';
}