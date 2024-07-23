<?php
//dto Objeto de transferencia a otra Dto Usuario 
class Usuario{ //una clase que represente algo
    private $id, $username, $clave, $nombreu, $estado//atributos de la clase

    function __construct() {
        
    }

   function getId() {
        return $this->id; //retorna el id //this es para acceder
    }

    function getUsername() {
        return $this->username;
    }

    function getClave() {
        return $this->clave;
    }

    function getNombreu() {
        return $this->nombreu;
    }
    function getEstado() {
        return $this->estado;
    }

    function setId($id) {
        $this->id = $id; //metodo set recibe el parametro
    }

    function setusername($username) {
        $this->username = $username;
    }

    function setclave($clave) {
        $this->clave = $clave;
    }

    function setnombreu($nombreu) {
        $this->nombreu = $nombreu;
    }
    function setestado($estado) {
        $this->estado = $estado;
    }

    // Methods get y set parametrizados
    public function __set($username, $valor) { //puede solo recibir el valor y no el atributo//UNA SOLA FUNCION QUE SIRVE PARA TODOS LOS ATRIBUTOS
        // Verifica que la propiedad exista
        if (property_exists('Usuario', $username)) {
            $this->$username = $valor;
        } else {
            echo $username . " No existe.";
        }
    }

    
    public function __get($username) {
        // Verifica que exista la propiedad
        if (property_exists('Usuario', $username)) {// verificar que exista el atributo
            return $this->$username;
        }
// Retorna null si no existe
        return NULL;
    }
}