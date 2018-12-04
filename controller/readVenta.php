<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../model/venta.php';

$obj=new venta();
$resultado=$obj->getListaVentas();
while ($fila=$resultado->fetch_array(MYSQLI_ASSOC)){
    echo '<tr>'.
            '<td>'.$fila['codigoVenta'].'</td>
            <td>'.$fila['cliente'].'</td>
            <td>'.$fila['fecha'].'</td>
            
        </tr>';
}