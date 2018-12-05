<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
$fecha_hora = date('d/m/Y - H:i:s');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/main.js"></script>
    </head>
    <body>
        <form action="../controller/createVenta.php" method="POST">
            <p>CLIENTE: <input type="text" id="cliente" name="cliente"></p>
            <p>FECHA: <input type="text" id="fecha" name="fecha" value="<?php echo $fecha_hora; ?>" disabled></p>
            
            <hr />
            
            <p>PRODUCTO:</p>
            <div class="row">
                    <!--<p>CODIGO: <input type="text" id="codigo"></p>-->
                    <!--<p>PRODUCTO: <input type="text" id="producto"></p>-->
                    
                <p>PRODUCTO:
                    <select id="listaproducto">
                        <option selected>Buscar</option>
                        <?php include '../controller/listaproducto.php'; ?>
                    </select>
                </p>
                <p>PRECIO: <input type="text" id="precio" disabled></p>
                <p>CANTIDAD: <input type="text" id="cantidad"></p>
                    
                    <!--<button type="button" onclick="buscar();">BUSCAR</button>-->
                <button type="button" onclick="agregaLista();" >AGREGAR LISTA</button>
            </div>
            
            <hr />
            
            <p>VENTA:</p>
            <center>
                <div id="muestraDetalle">
                <table border="1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>PRECIO</th>
                            <th>CANTIDAD</th>
                            <th>SUBTOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include_once '../view/agregaListaDetalle.php'; ?>
                    </tbody>
                </table>
                </div>
            </center>
            
            <hr />

            <p>Resultado</p>
            <p>Sub-total: <input type="number" id="subtotal" step="any" name="subtotal" readonly></p>
            <div class="form-check">
                <p>
                    <input type="checkbox" id="descuento" onclick="descontar();">   
                    DESCUENTO
                </p>
            </div>
            <p>IGV: <input type="text" id="igv" readonly></p>
            <p>Total: <input type="number" id="total" step="any" name="total" readonly></p>
            
            <p><input type="submit" name="btn" value="REGISTRAR"></p>
        </form>
    </body>
</html>