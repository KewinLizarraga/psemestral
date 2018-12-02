<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'conexion.php';

class detalleventa {
    private $codVenta;
    private $codProducto;
    private $cantidad;
    private $descuento;
    
    public function __construct() {
        
    }
    
    // Asignación de valores
    public function setDetalleventaByCodigo($codVenta,$codProducto){
        $cn=new conexion();
        $cn->conectar();
        $sql="SELECT FROM detalleventa WHERE codigoVenta=".$codVenta." AND codigoProducto=".$codProducto;
        $resultado=$cn->getEjecucionQuery($sql);
        
        if($resultado->num_rows > 0){   // Verificar si tiene registro
            $registro=$resultado->fetch_array(MYSQLI_ASSOC);
            $this->codVenta=$registro['codigoVenta'];
            $this->codProducto=$registro['codigoProducto'];
            $this->cliente=$registro['cliente'];
            $this->fecha=$registro['fecha'];
        }
        
        $resultado->free();     // Libera recursos usados
        $cn->cerrarConexion();
    }
    
    // Create detalleventa
    public function registrarDetalleventa($cantidad, $descuento) {
        $cn=new conexion();
        $cn->conectar();
        $sql="INSERT INTO detalleventa(cantidad,descuento) VALUES('$cantidad','$descuento')";
        return $cn->setEjecucionQuery($sql);
    }
    
    // Update detalleventa
    public function actualizarDetalleventa($codVenta,$codProducto,$cantidad,$descuento) {
        $cn= new conexion();
        $cn->conectar();
        $sql="UPDATE detalleventa SET cantidad='$cantidad',decuento='$descuento' WHERE codigoVenta=$codVenta AND codigoProducto=$codProducto";
        return $cn->setEjecucionQuery($sql);
    }
    
    // Delete detalleventa
    public function eliminarDetalleventa($codVenta,$codProducto) {
        $cn=new conexion();
        $cn->conectar();
        $sql="DELETE FROM detalleventa WHERE codigoVenta=$codVenta AND codigoProducto=$codProducto";
        return $cn->setEjecucionQuery($sql);
    }
    
    // Metodo reporte detalleventa
    public function getListaDetalleventa( ) {
        $cn=new conexion();
        $cn->conectar();
        $sql="SELECT * FROM detalleventa";
        return $cn->getEjecucionQuery($sql);
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
    
    public function setDescuento($descuento) {
        $this->descuento = $descuento;
    }
    
    public function getCodVenta() {
        return $this->codVenta;
    }
    
    public function getCodProducto() {
        return $this->codProducto;
    }
    
    public function getCantidad() {
        return $this->cantidad;
    }
    
    public function getDescuento() {
        return $this->descuento;
    }
}