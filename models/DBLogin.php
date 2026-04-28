<?php
require_once './config/connection_rosario.php';


class ModeloLogin{
    private $modeloLogin; // Aqui se guaradaran aatos del login (ejem. usuario, constraseña)
    private $dbLogin;  // Aqui se guarda la conexion a la bd. 
    
    /**Constructor que se ejecuta al crear el objeto */
    public function __construct()
    {
        $this->modeloLogin = array();  //inicializasmos el modeloLogin como arreglo vacio

        /**2. Establecemos la conexión a la base de datos
        //    (llama a un método estático de la classe RosarioConexion del archivo connection_rosario.php) */
        $this-> dbLogin = RosarioConexion::ConexionRosario();  //conexion  
    }


    /**Funcion que valida el login 
     * pasamos los parametros $usuario y $password porque son los que se ingresan en el front-end
    */
    public function validarLogin($usuario, $password){
        //consulta el usario que me interesa
        $query = $this->dbLogin->prepare("SELECT id_usuario, nombre, usuario, password, rol, estado, fecha_creacion
                                        FROM usuarios
                                         WHERE usuario = :usuario 
                                         AND estado = 1");
        $query->execute([':usuario' => $usuario]); 

        /**resultado de la busqueda */
        $user = $query->fetch(PDO::FETCH_ASSOC); 


        /**Validamos que el usuario este activo */
        if($user && $user['estado'] == 1  ){
            //Verificamos la contraseña 
            if(password_verify($password, $user['password'])){
                // Login exitoso - retorno solo lo necesario para la sesión
                return [
                    'id_usuario' => $user['id_usuario'],
                    'usuario' => $user['usuario'],
                    'nombre' => $user['nombre'],
                    'rol' => $user['rol'],
                    'fecha_creacion' => $user['fecha_creacion']
                ];

            }
            
            //login fallido
            return false;
        }
        return false;
        
    }
}
?>