    <?php
    //frontController
        require_once 'config/config.php';
        // leer parametros
        //toma una peticion y la pasa al controlador que corresponde
        //c es el nombre para el controlador  
        $controlador = (!empty($_REQUEST['c']))?htmlentities($_REQUEST['c']):CONTROLADOR_PRINCIPAL;
        // index 
        $controlador = ucwords(strtolower($controlador))."Controller";//standar//ucword primero todo en minusculas y luego la primra letra en mayuscula
        
        //IndexController
        //f seria la funcion que queremos 
        $funcion = (!empty($_REQUEST['f']))?htmlentities($_REQUEST['f']):FUNCION_PRINCIPAL;
        //f= index
        
        require_once 'controller/' . $controlador . '.php';
     
        $cont = new  $controlador();// creacion del objeto controlador con una variable
        $cont->$funcion();// llamada a la funcion del controlador

