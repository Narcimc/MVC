<?php
// dao data access object, tienen las operaciones necesarias para
//trabajar con los datos
require_once 'config/Conexion.php';

class ProductosDAO {
    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }

    public function selectAll($parametro) {// buscar productos, recibe un parametro
     
        // sql de la sentencia
      $sql = "SELECT * FROM productos, categoria where prod_idCategoria = cat_id and 
      (prod_nombre like :b1 or cat_nombre like :b2) and prod_estado=1"; //:b1 para nombre de producto y :b2 para nombre de actegoria son los parametros que luego se agg
      $stmt = $this->con->prepare($sql);
      // preparar la sentencia
      $conlike = '%' . $parametro . '%'; 
      $data = array('b1' => $conlike, 'b2' => $conlike); //se los envia luego en un arreglo
      // ejecutar la sentencia
      $stmt->execute($data);
      //recuperar  resultados
      $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
      //retornar resultados
      return $resultados;
  }

  public function selectOne($id) { // buscar un producto por su id
        $sql = "select * from productos where ".
        "prod_id=:id";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        // ejecutar la sentencia
        $stmt->execute($data);
        // recuperar los datos (en caso de select)
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);// fetch retorna el primer registro
        // retornar resultados
        return $producto;
    }

    public function insert($prod){//si no se quiere usar un objeto se tendria que enviar cada dato
        try{
        //sentencia sql
        $sql = "INSERT INTO productos ( prod_nombre, descripcion_prod , prod_estado, prod_precio, 
        prod_idCategoria, prod_usuarioActualizacion, prod_fechaActualizacion) VALUES 
        ( :nom, :descripcion , :estado, :precio, :idCat, :usu, :fecha)"; //se validan los datos a enviar 

        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = array( //aqui no importa el orden de los parametros porque antes ya fueron enviados
        'nom' =>  $prod->getNombre(),
        'descripcion' => $prod->getDescripcion(),
        'estado' =>  $prod->getEstado(),
        'precio' =>  $prod->getPrecio(),
        'idCat' =>  $prod->getIdCategoria(),
        'usu' =>  $prod->getUsuario(),
        'fecha' =>  $prod->getFechaActualizacion()
        );
        //execute
        $sentencia->execute($data);
        //retornar resultados, 
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
        //rowCount permite obtener el numero de filas afectadas
           return false;
        }
        //manejo de excepciones 
    }catch(Exception $e){
        echo $e->getMessage();
        return false;
    }
        return true;
    }

    public function update($prod){//Actualizar

        try{
            //prepare
            $sql = "UPDATE productos SET prod_nombre=:nom," .
                    "descripcion_prod=:descripcion,".
                    "prod_estado=:estado,prod_precio=:precio,prod_idCategoria=:idCat,prod_usuarioActualizacion=:usu," .
                    "prod_fechaActualizacion=:fecha WHERE prod_id=:id";
           //bind parameters
            $sentencia = $this->con->prepare($sql);
            $data = array(
               'nom' =>  $prod->getNombre(),
               'descripcion' => $prod->getDescripcion(),
                'estado' =>  $prod->getEstado(),
                'precio' =>  $prod->getPrecio(),
                'idCat' =>  $prod->getIdCategoria(),
                'usu' =>  $prod->getUsuario(),
                'fecha' =>  $prod->getFechaActualizacion(),
                'id' =>  $prod->getId()
        );
            //execute
            $sentencia->execute($data);
            //retornar resultados, 
            if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
                //rowCount permite obtner el numero de filas afectadas
                return false;
            }
        }catch(Exception $e){
          echo $e->getMessage();
            return false;
        }
            return true;       
    }

   public function delete($prod){
       try{
        //prepare
        $sql = "update productos SET prod_estado=0,prod_usuarioActualizacion=:usu," .
        "prod_fechaActualizacion=:fecha WHERE prod_id=:id";
        //now());
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = array(
        'usu' =>  $prod->getUsuario(),
        'fecha' =>  $prod->getFechaActualizacion(),
        'id' =>  $prod->getId()
        );
        //execute
        $sentencia->execute($data);
        //retornar resultados, 
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
        //rowCount permite obtner el numero de filas afectadas
        return false;
        }
    }catch(Exception $e){
        echo $e->getMessage();
        return false;
    }
    
        return true;
    }

    
}
