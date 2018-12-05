<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'conexion.php';

class detalleventa {
    private $codigo;
    private $cantidad;
    private $subtotal; // descuento -> monto
    
    public function __construct() {
        
    }
    
    // Asignación de valores
    public function setDetalleventaByCodigo($codigo){
        $cn=new conexion();
        $cn->conectar();
        $sql="SELECT FROM detalleventa WHERE codigo=".$codigo;
        $resultado=$cn->getEjecucionQuery($sql);
        
        if($resultado->num_rows > 0){   // Verificar si tiene registro
            $registro=$resultado->fetch_array(MYSQLI_ASSOC);
            $this->codigo=$registro['codigo'];
            $this->cliente=$registro['cliente'];
            $this->fecha=$registro['fecha'];
        }
        
        $resultado->free();     // Libera recursos usados
        $cn->cerrarConexion();
    }
    
    // Create detalleventa
    public function registrarDetalleventa($codigoVenta,$codigoProducto,$cantidad, $subtotal) {
        $cn=new conexion();
        $cn->conectar();
        $sql="INSERT INTO detalleventa(codigoVenta,codigoProducto,cantidad,subtotal) VALUES('$codigoVenta','$codigoProducto','$cantidad','$subtotal')";
        return $cn->setEjecucionQuery($sql);
    }
    
    // Update detalleventa
    public function actualizarDetalleventa($cliente,$fecha) {
        $cn= new conexion();
        $cn->conectar();
        $sql="UPDATE detalleventa SET cliente='$cliente',fecha='$fecha'";
        return $cn->setEjecucionQuery($sql);
    }
    
    // Delete detalleventa
//    public function eliminarDetalleventa($codVenta,$codProducto) {
//        $cn=new conexion();
//        $cn->conectar();
//        $sql="DELETE FROM detalleventa WHERE codigoVenta=$codVenta AND codigoProducto=$codProducto";
//        return $cn->setEjecucionQuery($sql);
//    }
    
    // Metodo reporte detalleventa
    public function getListaDetalleventa( ) {
        $cn=new conexion();
        $cn->conectar();
        $sql="SELECT * FROM detalleventa";
        return $cn->getEjecucionQuery($sql);
    }
    
    public function getListaDetalleventaCodigo($codigo) {
        $cn=new conexion();
        $cn->conectar();
        $sql="SELECT * FROM detalleventa WHERE codigoVenta=".$codigo;
        return $cn->setEjecucionQuery($sql);
    }
    
    public function setCodVenta($codVenta) {
        $this->codVenta = $codVenta;
    }
    
    public function setCodProducto($codProducto) {
        $this->codProducto = $codProducto;
    }
    
    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
    
    public function setSubtotal($subtotal) {
        $this->subtotal = $subtotal;
    }
    
//    public function setMonto($fecha) {
//        $this->fecha = $fecha;
//    }
    
    public function getCodVenta() {
        return $this->codVenta;
    }
    
    public function getCodProducto() {
        return $this->codProducto;
    }
    
    public function getCantidad() {
        return $this->cantidad;
    }
    
    public function getSubtotal() {
        return $this->subtotal;
    }
    
//    public function getMonto() {
//        return $this->fecha;
//    }
}