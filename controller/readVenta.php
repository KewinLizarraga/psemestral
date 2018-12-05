<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../model/venta.php';

$obj=new venta();
//$resultado=$obj->getListaVentas();
//while ($fila=$resultado->fetch_array(MYSQLI_ASSOC)){
//    echo '<tr>'.
//            '<td>'.$fila['codigoVenta'].'</td>
//            <td>'.$fila['cliente'].'</td>
//            <td>'.$fila['fecha'].'</td>
//            
//        </tr>';
//}

if (isset($_POST['valor'])) {
    $valor=$_POST['valor'];
    $respuesta=$obj->setVentaByCodigo($valor);
    if ($respuesta) {
        $codigo=$obj->getCodigo();
        $cliente=$obj->getCliente();
        $fecha=$obj->getFecha();
        $total=$obj->getTotal();
        
        echo "<tr>
            <th scope='row>".$codigo."</th>
            <th>".$cliente."</th>
            <th>".$fecha."</th>
            <th>".$total."</th>
            <td><a href='#' data-toggle='modal' data-target='#detalleModal' onclick=\"ModalDetalle(".$codigo.");\">Detalle</a></td>
            </tr>";
    }
    else{
        echo "<tr>
            <th scope='row' colspan='5'>No se encontro resultados</th>
            </tr>";
    }
}
else{
    $resultado=$obj->getListaVentas();
    while ($fila=$resultado->fetch_array(MYSQLI_ASSOC)){
        echo "<tr>
            <th scope='row'>".$fila['codigoVenta']."</th>
            <td>".$fila['cliente']."</td>
            <td>".$fila['fecha']."</td>

            <td><a href='#'>Detalle</a></td>
            </tr>";
    }
}