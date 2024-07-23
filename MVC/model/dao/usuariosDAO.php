<?php
//Dao  Objeto de acceso a datos 
require_once 'config/Conexion.php'; //pide la conexion

class UsuariosDao {
     private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();//cargar la conexion
    }
     public function selectAll() {//consultar todos 
        // sql de la sentencia
        $sql = "select usu_id,username from usuario where usu_estado=1";
        //preparacion de la sentencia
        $stmt = $this->con->prepare($sql); //se manda a preparar la sentencia 
        //ejecucion de la sentencia
        $stmt->execute();//se usa 
        //recuperacion de resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
        // retorna cada fila como un objeto de una clase anonima
        // cuyos nombres de atributos son iguales a los nombres de las columnas retornadas
        // retorna datos para el controlador
        return $resultados;
    }
    
    public function selectAllxParam($parametro) {
        // sql de la sentencia
        $sql = "select usu_id,username from usuario where usu_estado=1
         and usu_id=:idParam";
        //preparacion de la sentencia
        $stmt = $this->con->prepare($sql); //se manda a preparar
        $data = array("idParam"=>$parametro);
        //ejecucion de la sentencia
        $stmt->execute($data);
        //recuperacion de resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);//retorna todo como objeto
        // retorna cada fila como un objeto de una clase anonima
        // cuyos nombres de atributos son iguales a los nombres de las columnas retorn
        // retorna datos para el controlador
        return $resultados;

    }

    public function insert($cat){


    }
    public function update($cat){


    }
    public function delete($cat){
        $sql = "update usuario set cat_estado=0 where cat_id=?";
    }

}
