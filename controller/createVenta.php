<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../model/venta.php';
require_once '../model/detalleventa.php';

$cliente=$_POST['cliente'];
$fecha=$_POST['fecha'];
$subtotal=$_POST['subtotal'];

$obj=new venta();
if($obj->registrarVentas($cliente, $fecha, $total)){
    if($respuesta=$obj->latest()){
        $registro=$respuesta->fetch_array(MYSQLI_ASSOC);
        $codigoVenta=$registro['codigoventa'];
        
        session_start();
        for($i=0;$i<count($_SESSION['codigo']); $i++){
            if ($_SESSION['codigo'][$i]!="x") {
                $codigoProducto=$_SESSION['codigo'][$i];
                $cantidad=$_SESSION['monto'][$i];
                $monto=$_SESSION['monto'][$i];
                $obj=new detalleventa();
                if ($obj->registrarDetalleventa($codigoVenta, $codigoProducto, $cantidad, $subtotal)) {
                    echo "Exito";
                    session_destroy();
                    $ruta="location:../view/formVentas.php";
                }
                else{
                    echo "No registro la venta";
                    $ruta="location:../view/formVentas.php";
                }
            }
        }
    }
    else{
        echo "No se obtuvo el codigo de la venta";
        $ruta="location:../view/formVentas.php";
    }
}
else{
    echo "No se registro la venta";
    $ruta="location:../view/formVentas.php";
}

header($ruta);