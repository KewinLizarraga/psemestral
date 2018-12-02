<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'conexion.php';

class producto {
    private $codigo;
    private $nombre;
    private $precio;
    
    public function __construct() {
        
    }
    
    // Asignacion de valores
    public function setProductoByCodigo($codigo) {
        $cn=new conexion();
        $cn->conectar();
        $sql="SELECT * FROM producto WHERE codigoProducto=".$codigo;
        $resultado=$cn->getEjecucionQuery($sql);
        
        if($resultado->num_rows > 0){   // Verifica si tiene registro
            $registro=$resultado->fetch_array(MYSQLI_ASSOC);
            $this->codigo=$registro['codicoProducto'];
            $this->nombre=$registro['nombre'];
            $this->precio=$registro['precio'];
        }
        
        $resultado->free();     // Libera recursos usados
        $cn->cerrarConexion();
    }
    
    // Create productos
    public function registrarProductos($nombre, $precio) {
        $cn=new conexion();
        $cn->conectar();
        $sql="INSERT INTO producto(nombre,precio) VALUE('$nombre','$precio')";
        return $cn->setEjecucionQuery($sql);
    }
    
    // Update productos
    public function actualizarProductos($codigo, $nombre, $precio) {
        $cn=new conexion();
        $cn->conectar();
        $sql="UPDATE producto SET nombre='$nombre', precio='$precio' WHERE codigoProducto=$codigo";
        return $cn->setEjecucionQuery($sql);
    }
    
    // Delete productos
    public function eliminarProducto($codigo) {
        $cn=new conexion();
        $cn->conectar();
        $sql="DELETE FROM producto WHERE codigoProducto=$codigo";
        return $cn->setEjecucionQuery($sql);
    }
    
    // Metodo reporte productos
    public function getListaProductos() {
        $cn=new conexion();
        $cn->conectar();
        $sql="SELECT * FROM producto";
        return $cn->getEjecucionQuery($sql);
    }
    
    
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }
    
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    public function setPrecio($precio) {
        $this->precio = $precio;
    }
    
    public function getCodigo() {
        return $this->codigo;
    }
    
    public function getNombre() {
        return $this->nombre;
    }
    
    public function getPrecio() {
        return $this->precio;
    }
}