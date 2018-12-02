<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class conexion {
    private $servidor;
    private $usuario;
    private $clave;
    private $baseDatos;
    
    private $conexion;
    
    // Constructor
    public function __construct() {
        $this->servidor="localhost";
        $this->usuario="root";
        $this->clave="";
        $this->baseDatos="psemestral";
    }
    
    // Conexion con la Base de Datos
    public function conectar() {
        $this->conexion=new mysqli($this->servidor, $this->usuario, $this->clave, $this->baseDatos);
    }
    
    // retorna un registro: SELECT
    public function getEjecucionQuery($sql) {
        return $this->conexion->query($sql);
    }
    
    // retorna un valor V-F: INSERT, UPDATE, DELETE
    public function setEjecucionQuery($sql) {
        return $this->conexion->query($sql);
    }
    
    // metodos
    public function setSetvidor($servidor) {
        $this->servidor = $servidor;
    }
    
    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }
    
    public function setClave($clave) {
        $this->clave = $clave;
    }
    
    public function setBaseDatos($baseDatos) {
        $this->baseDatos = $baseDatos;
    }
    
    public function getServidor() {
        return $this->servidor;
    }
    
    public function getUsuario() {
        return $this->usuario;
    }
    
    public function getClave() {
        return $this->clave;
    }
    
    public function getBaseDatos() {
        return $this->baseDatos;
    }
    
    // Destructor
    public function __destruct() {
        
    }
    
    // Cerrar conexion
    public function cerrarConexion() {
        $this->conexion->close();
    }
}