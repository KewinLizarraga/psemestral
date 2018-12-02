<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once '../model/venta.php';
        if(isset($_GET['codigo'])){
            $codigo=$_GET['codigo'];
            $cn=new venta();
            $cn->setProductoByCodigo($codigo);
            $cliente=$cn->getCliente();
            $fecha=$cn->getFecha();
        }
        else{
            $codigo="-";
            $cliente="-";
            $fecha="-";
        }
        ?>
        
        <form action="../controller/updateVenta.php" method="POST">
            <p>CODIGO: <input type="text" name="codigo" value="<?php echo $codigo ?>"></p>
            <p>CLIENTE: <input type="text" name="cliente" value="<?php echo $cliente ?>"></p>
            <p>FECHA: <input type="date" name="fecha" value="<?php echo $fecha ?>"></p>
            <p><input type="submit" name="btn" value="ACTUALIZAR"></p>
        </form>
    </body>
</html>
