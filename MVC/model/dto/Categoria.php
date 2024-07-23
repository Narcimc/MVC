<?php
//dto Objeto de transferencia a otra 
//ORM object relacional mapping
class Categoria{ //una clase que represente algo
    private $id, $nombre, $descripcion, $estado, $usuario, $fechaActualizacion; //elementos que existan en las tablas aunque no se llamen ugual

    function __construct() {
        
    }

   function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getEstado() {
        return $this->estado;
    }
    function getUsuario() {
        return $this->usuario;
    }

    function getFechaActualizacion() {
        return $this->fechaActualizacion;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setFechaActualizacion($fechaActualizacion) {
        $this->fechaActualizacion = $fechaActualizacion;
    }
    
    // Methods get y set parametrizados
    public function __set($nombre, $valor) {
        // Verifica que la propiedad exista
        if (property_exists('Categoria', $nombre)) {
            $this->$nombre = $valor;
        } else {
            echo $nombre . " No existe.";
        }
    }

    public function __get($nombre) {
        // Verifica que exista la propiedad
        if (property_exists('Categoria', $nombre)) {
            return $this->$nombre;
        }
// Retorna null si no existe
        return NULL;
    }
}