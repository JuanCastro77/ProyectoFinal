<?php 
require_once 'Conexion.php';
require_once '../vendor/autoload.php';
    class Usuario
    {

        private $username;
        private $password;
        private $salt;
        private $estado;
        private $rol;
        public $db;
        
        public function __construct()
        {
            
            $this->db = conectar();
            
        }


        public function getDb()
        {
            return $this->db;
        }


    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     *
     * @return self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $passEncode = sha1($password);
        $this->password = $passEncode;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @param mixed $salt
     *
     * @return self
     */
    public function setSalt()
    {
        $this->salt = $this->generateSalt();

        return $this;
    }

    public function generateSalt()
    {
        $salt = $this->password;
        for ($i=1; $i<=5 ; $i++) { 
            $salt = sha1($salt);
        }
        return $salt;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     *
     * @return self
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * @param mixed $rol
     *
     * @return self
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }
     public function login($username,$password)
    {
      
      $sql="SELECT u.nombreUsuario as usuario, u.idUsuario, r.rol as rol FROM usuario u INNER JOIN rol r on u.Rol_idRol = r.idRol WHERE u.estado=1 and r.estado=1 and u.nombreUsuario='".$username."' and u.password='".sha1($password)."' ";
      $info =$this->db->query($sql);

      if($info)
      {
        $data=$info->fetch_assoc();
        $cantidadRegistros=count($data);

        if ($cantidadRegistros>0) 
        {
          session_start();
          $_SESSION['ROL']=$data['rol'];
          $_SESSION['USUARIO']=$data['usuario'];
          $_SESSION['ID']=$data['idUsuario'];

          header("Location: ../views/dashboard.php");
        }
        else
        {
          header("Location: ../index.php");

        }
      }
      else
      {
        header("Location: ../index.php");
      }
    }


    public function AllRol()
    {
        $sql = "SELECT * FROM rol WHERE estado=1";
        $info = $this->db->query($sql);

        if ($info->num_rows>0) {
           $data = $info;
        }else{
            $data= null;
        }

        return $data;
    }



    public function getAll()
    {
        $sqlAll = "SELECT * from usuario WHERE estado = 1";
        $info = $this->db->query($sqlAll);
        if ($info->num_rows>0) {
            
            $dato = $info;
        }else{

            $dato = false;
        }
        return $dato;
    }



    public function saveUser()
    {
       $sql = "INSERT INTO usuario values (0,'".$this->username."','".$this->password."','".$this->salt."',".$this->estado.",NOW(),'','',".$this->rol.");";
       $res = $this->db->query($sql);

       return $res;


    }

    public function getUsuario($idUsuario)
    {
        
        $sql = "SELECT r.idRol as idRol, u.Rol_idRol, u.idUsuario, u.nombreUsuario, r.rol from usuario u 
        INNER JOIN rol r ON u.Rol_idRol = r.idRol
        WHERE u.idUsuario = ".$idUsuario;
        
        $result = $this->db->query($sql);
        $res=$result->fetch_assoc();
        $data=array();
        $data['id']=$res['idUsuario'];
        $data['username'] = $res['nombreUsuario'];
        $data['idRol']= $res['Rol_idRol'];
        $data['nombrerol']= $res['rol'];
        
        return json_encode($data);


    }

    public function updateUser($idUsuario)
    {
       $sql = "UPDATE  usuario SET nombreUsuario = '".$this->username."',password= '".$this->password."',salt='".$this->salt."',fechaModificacion=NOW(),Rol_idRol=".$this->rol." WHERE idUsuario=".$idUsuario;
       $res = $this->db->query($sql);

        $data = array();
        if ($res) {
            $data['estado']=true;
            $data['descripcion']="Datos modificados exitosamente";
        }else{
            $data['estado']=false;
            $data['descripcion']="Error en la modificacion ".$this->db->error;
        }

    return json_encode($data);
       


    }

    public function deleteUser($idUsuario)
    {
       $sql = "UPDATE  usuario SET fechaEliminacion=NOW(), estado=0 WHERE idUsuario=".$idUsuario;
       $res = $this->db->query($sql);

        $data = array();
        if ($res) {
            $data['estado']=true;
            $data['descripcion']="Datos eliminados exitosamente";
        }else{
            $data['estado']=false;
            $data['descripcion']="Error en la eliminacion ".$this->db->error;
        }

    return json_encode($data);

    }

    public function estadistica()
    {
        $sql = "SELECT count(id) as cantidad,  EXTRACT(MONTH FROM fechaRegistro) AS mes from usuario u "
        ." GROUP BY MONTH(fechaRegistro)";
        $res = $this->db->query($sql);
         $array= array();
        foreach ($res as  $value) {
               $array[]=array('cantidad'=>$value['cantidad'], 'mes'=>$value['mes']);
        }

        $data['estado']=true;
        $data['info']=$array;
     
        return json_encode($data);
    }

    //obtener ultimo empleado registrado--------------------
    public function ultimaInsercion(){
      $ultimaInsercion=mysqli_insert_id($this->db);
      return $ultimaInsercion;
    }

    public function obtenerIdUsuario()
    {
      $sql = "SELECT idUsuario FROM usuario WHERE idUsuario = ".$_SESSION['ID'];
      $id = $this->db->query($sql);
      $data = $id->fetch_assoc();
      $idReal = $data['idUsuario'];

      return $idReal;
    }

}


 ?>