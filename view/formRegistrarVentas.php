<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?PHP
session_start();
if(isset($_SESSION['codigo']))
{
    //tenemos valores anteriores registrados
    unset($_SESSION['codigo']); //para liberar espacio 
    unset($_SESSION['producto']);
    unset($_SESSION['precio']);
    unset($_SESSION['cantidad']);
    unset($_SESSION['monto']);
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/main.js"></script>
    </head>
    <body>
        <form action="../controller/createVenta.php" method="POST">
            <p>CLIENTE: <input type="text" name="cliente"></p>
            <p>FECHA: <input type="date" name="fecha"></p>
            
            <hr />
            
            <p>PRODUCTO:</p>
            <div class="row">
                    <p>CODIGO: <input type="text" id="codigo"></p>
                    <p>PRODUCTO: <input type="text" id="producto"></p>
                    <p>PRECIO: <input type="text" id="precio"></p>
                    <p>CANTIDAD: <input type="text" id="cantidad"></p>
                    
                    <button type="button" onclick="buscar();">BUSCAR</button>
                    <button type="button" onclick="agregaLista();" >AGREGAR LISTA</button>
                </div>  
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
                        <?php //  include_once '../view/agregaListaDetalle.php'; ?>
                    </tbody>
                </table>
                </div>
            </center>
            
            <hr />

            <p>Resultado</p>
            <p>Sub-total: <input type="number" id="subtotal" step="any" name="subtotal" readonly></p>
            <div class="form-check">
                <input type="checkbox" id="descuento" onclick="descontar();">   
                <p>DESCUENTO</p>
            </div>
            <p>IGV: <input type="text" id="igv" readonly></p>
            <p>Total: <input type="number" id="total" step="any" name="total" readonly></p>
            
            <p><input type="submit" name="btn" value="REGISTRAR"></p>
        </form>
    </body>
</html>