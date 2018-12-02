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
        require_once '../model/producto.php';
        if(isset($_GET['codigoProducto'])){
            $codigo=$_GET['codigoProducto'];
            $cn=new producto();
            $cn->setProductoByCodigo($codigo);
            $nombre=$cn->getNombre();
            $precio=$cn->getPrecio();
        }
        else{
            $codigo="-";
            $nombre="-";
            $precio="-";
        }
        ?>
        
        <form action="../controller/updateProducto.php" method="POST">
            <p>CODIGO: <input type="text" name="codigo" value="<?php echo $codigo ?>"></p>
            <p>NOMBRE: <input type="text" name="nombre" value="<?php echo $nombre ?>"></p>
            <p>PRECIO: <input type="number" step="any" name="precio" value="<?php echo $precio ?>"></p>
            <p><input type="submit" name="btn" value="ACTUALIZAR"></p>
        </form>
    </body>
</html>
