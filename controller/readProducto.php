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
                '<a href="../view/formEditarProductos.php?cod='.$fila["codigoProducto"].'"><img src="../recursos/edit.png" title="Editar"></a>'.
                '<a href="../view/formEliminarProductos.php?cod='.$fila["codigoProducto"].'"><img src="../recursos/delete.png" title="Eliminar"></a>'.
            '<td>
        </tr>';
}