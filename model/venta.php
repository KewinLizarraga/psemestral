<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'conexion.php';

class venta {
    private $codigo;
    private $cliente;
    private $fecha;
    
    public function __construct() {
        
    }
    
    // Asignación de valores
    public function setVentaByCodigo($codigo){
        $cn=new conexion();
        $cn->conectar();
        $sql="SELECT FROM venta WHERE codigoVenta=".$codigo;
        $resultado=$cn->getEjecucionQuery($sql);
        
        if($resultado->num_rows > 0){   // Verificar si tiene registro
            $registro=$resultado->fetch_array(MYSQLI_ASSOC);
            $this->codigo=$registro['codigoVenta'];
            $this->cliente=$registro['cliente'];
            $this->fecha=$registro['fecha'];
        }
        
        $resultado->free();     // Libera recursos usados
        $cn->cerrarConexion();
    }
    
    // Create venta
    public function registrarVenta($cliente, $fecha) {
        $cn=new conexion();
        $cn->conectar();
        $sql="INSERT INTO venta(cliente,fehca) VALUES('$cliente','$fecha')";
        return $cn->setEjecucionQuery($sql);
    }
    
    // Update venta
    public function actualizarVenta($codigo,$cliente,$fecha) {
        $cn= new conexion();
        $cn->conectar();
        $sql="UPDATE venta SET cliente='$cliente',fecha='$fecha' WHERE codigoVenta=$codigo";
        return $cn->setEjecucionQuery($sql);
    }
    
    // Delete venta
    public function eliminarVenta($codigo) {
        $cn=new conexion();
        $cn->conectar();
        $sql="DELETE FROM venta WHERE codigoVenta=$codigo";
        return $cn->setEjecucionQuery($sql);
    }
    
    // Metodo reporte venta
    public function getListaVenta( ) {
        $cn=new conexion();
        $cn->conectar();
        $sql="SELECT * FROM venta";
        return $cn->getEjecucionQuery($sql);
    }
    
    
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }
    
    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }
    
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    
    public function getCodigo() {
        return $this->codigo;
    }
    
    public function getCliente() {
        return $this->cliente;
    }
    
    public function getFecha() {
        return $this->fecha;
    }
}