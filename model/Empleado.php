<?php 
		require_once 'Conexion.php';
	/**
	 * 
	 */
	class Empleado
	{
		private $dui;
		private $nombre;
		private $genero;
		private $cargo;
		private $telefono;
		private $estaEmpleado;
		private $usuario_idUsuario;
		public $db;

		
		function __construct()
		{
			 $this->db = conectar();
		}
		
		 public function getDB()
   	{
        return $this->db;
    }


	public function getDui()
   	{
        return $this->dui;
    }

    
    public function setDui($dui)
    {
        $this->dui = $dui;

        return $this;
    }


    public function getNombre()
   	{
        return $this->nombre;
    }

    
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getGenero()
   	{
        return $this->genero;
    }

    
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    public function getCargo()
   	{
        return $this->genero;
    }

    
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    public function getTelefono()
   	{
        return $this->telefono;
    }

    
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getEstadoEmpleado()
   	{
        return $this->estaEmpleado;
    }

    
    public function setEstadoEmpleado($estaEmpleado)
    {
        $this->estaEmpleado = $estaEmpleado;

        return $this;
    }

    public function getUsuario_idUsuario()
   	{
        return $this->usuario_idUsuario;
    }

    
    public function setUsuario_idUsuario($usuario_idUsuario)
    {
        $this->usuario_idUsuario = $usuario_idUsuario;

        return $this;
    }


    public function agregarEmpleado(){
    	$sql="INSERT INTO empleado (idEmpleado, dui, nombre, genero, cargo, telefono, estadoEmpleado, fechaRegistro, fechaModificacion, fechaEliminacion, Usuario_idUsuario)VALUES(0,'".$this->dui."','".$this->nombre."','".$this->genero."','".$this->cargo."','".$this->telefono."',".$this->estaEmpleado.",NOW(),'','',".$this->usuario_idUsuario.")";
        
    	$res=$this->db->query($sql);

    	$data= array();
    	if ($res) {
    		$data['estado']=true;
    		$data['descripcion']="Registro Exitoso";
    	}
    	else{
    		$data['estado']=false;
    		$data['descripcion']="ERROR en Registro";
    	}
    	return json_encode($data);
    }//end AgregarEmpleado



    public function getAll()
    {
        $sqlAll = "SELECT * from empleado WHERE estadoEmpleado = 1";
        $info = $this->db->query($sqlAll);
        if ($info->num_rows>0) {
            
            $dato = $info;
        }else{

            $dato = false;
        }
        return $dato;
    }


    public function getEmpleado($idEmpleado)
    { 

        $sql="SELECT idEmpleado, dui, nombre, genero, cargo, telefono FROM empleado WHERE idEmpleado =".$idEmpleado;
        $result = $this->db->query($sql);

        $res=$result->fetch_assoc();
        $data=array();
        $data['id']=$res['idEmpleado'];
        $data['dui'] = $res['dui'];
        $data['nombre']= $res['nombre'];
        $data['genero']= $res['genero'];
        $data['cargo']= $res['cargo'];
        $data['telefono']= $res['telefono'];
        return json_encode($data);

    }//end para cargar los datos a la hora de modificar 

     public function updateEmpleado($idEmpleado)
    {
       $sql = "UPDATE  empleado SET dui = '".$this->dui."',nombre= '".$this->nombre."',genero='".$this->genero."',cargo='".$this->cargo."',telefono='".$this->telefono."',fechaModificacion=NOW() WHERE idEmpleado=".$idEmpleado;
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
       
    }//end de actualizar

     public function deleteEmpleado($idEmpleado)
    {
       $sql = "UPDATE  empleado SET fechaEliminacion=NOW(),  estadoEmpleado=0 WHERE idEmpleado=".$idEmpleado;
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

    }//end eliminar

}//end class

 ?>