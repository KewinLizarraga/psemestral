<?php
    require_once("../model/detalleventa.php");
    require_once("../model/producto.php");
	
    $obj = new detalleventa();
    $objp = new producto();

    if (isset($_POST['val'])) {
        $id = $_POST['val'];
        $resultado = $obj ->getListarContVentaCodigo($id);
        $i = 0;
        while($fila = $resultado -> fetch_array(MYSQLI_ASSOC)){
            $i = $i + 1;
            $resp = $objp -> setProductoByCodigo($fila["id_producto"]);
            if ($resp){
                $nombre = $objp ->getNombre();
                $precio = $objp ->getPrecio();
                
                echo "<tr>
                    <th scope='row'>".$i."</th>
                    <td>".$nombre."</td>
                    <td>".$precio."</td>
                    <td>".$fila["cantidad"]."</td>
                    <td>".$fila["monto"]."</td>
                    </tr>";
            }
        }
    }