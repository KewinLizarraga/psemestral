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
        <p><a href="formRegistrarVentas.php">REGISTRAR VENTA</a></p>
        <center>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>CLIENTE</th>
                        <th>FECHA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include_once '../controller/readVenta.php'; ?>
                </tbody>
            </table>

        </center>
        <?php
        // put your code here
        ?>
    </body>
</html>
