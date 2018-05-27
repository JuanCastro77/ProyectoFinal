<?php 
		require_once 'Conexion.php';
	/**
	 * 
	 */
	class Herramienta
	{
		private $nombreHerramienta;
		private $estado;
		private $categoriaHerramienta_idCategoriaHerramienta;
		private $estadoHerramienta_idEstadoHerramienta;
		public $db;

		
		function __construct()
		{
			 $this->db = conectar();
		}
		
		 public function getDB()
   	{
        return $this->db;
    }


	public function getNombreHerramienta()
   	{
        return $this->nombreHerramienta;
    }

    
    public function setNombreHerramienta($nombreHerramienta)
    {
        $this->nombreHerramienta = $nombreHerramienta;

        return $this;
    }


    public function getEstado()
   	{
        return $this->estado;
    }

    
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    public function getCategoriaHerramienta_idCategoriaHerramienta()
   	{
        return $this->categoriaHerramienta_idCategoriaHerramienta;
    }

    
    public function setCategoriaHerramienta_idCategoriaHerramienta($categoriaHerramienta_idCategoriaHerramienta)
    {
        $this->categoriaHerramienta_idCategoriaHerramienta = $categoriaHerramienta_idCategoriaHerramienta;

        return $this;
    }

    public function getEstadoHerramienta_idEstadoHerramienta()
   	{
        return $this->estadoHerramienta_idEstadoHerramienta;
    }

    
    public function setEstadoHerramienta_idEstadoHerramienta($estadoHerramienta_idEstadoHerramienta)
    {
        $this->estadoHerramienta_idEstadoHerramienta = $estadoHerramienta_idEstadoHerramienta;

        return $this;
    }

    


    public function agregarHerramienta(){
    	$sql="INSERT INTO herramienta (idHerramienta, nombreHerramienta, estado, fechaRegistro, fechaModificacion, fechaEliminacion, categoriaHerramienta_idCategoriaHerramienta, estadoHerramienta_idEstadoHerramienta)VALUES(0,'".$this->nombreHerramienta."',".$this->estado.",NOW(),'','',".$this->categoriaHerramienta_idCategoriaHerramienta.",".$this->estadoHerramienta_idEstadoHerramienta.")";

        
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
    }//end AgregarHerramienta

public function AllEstado()
    {
        $sql = "SELECT * FROM estadoherramienta";
        $info = $this->db->query($sql);

        if ($info->num_rows>0) {
           $data = $info;
        }else{
            $data= null;
        }

        return $data;
    }
    public function AllCategoria()
    {
        $sql = "SELECT * FROM categoriaherramienta";
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
        $sqlAll = "SELECT h.idHerramienta, h.nombreHerramienta, ch.idCategoriaHerramienta, ch.categoria, eh.idEstadoHerramienta, eh.estado FROM herramienta h INNER JOIN categoriaherramienta ch ON h.categoriaHerramienta_idCategoriaHerramienta = ch.idCategoriaHerramienta INNER JOIN estadoherramienta eh ON h.estadoHerramienta_idEstadoHerramienta = eh.idEstadoHerramienta WHERE h.estado = 1";
        $info = $this->db->query($sqlAll);
        if ($info->num_rows>0) {
            
            $dato = $info;
        }else{

            $dato = false;
        }
        return $dato;
    }


    public function getHerramienta($idHerramienta)
    { 

        $sql="SELECT h.idHerramienta, h.nombreHerramienta, ch.idCategoriaHerramienta, ch.categoria, eh.idEstadoHerramienta, eh.estado FROM herramienta h INNER JOIN categoriaherramienta ch ON h.categoriaHerramienta_idCategoriaHerramienta = ch.idCategoriaHerramienta INNER JOIN estadoherramienta eh ON h.estadoHerramienta_idEstadoHerramienta = eh.idEstadoHerramienta WHERE  idHerramienta=".$idHerramienta;
        $result = $this->db->query($sql);

        $res=$result->fetch_assoc();
        $data=array();
        $data['idHerramienta']=$res['idHerramienta'];
        $data['nombreHerramienta'] = $res['nombreHerramienta'];
        $data['estado']= $res['estado'];
        $data['idCategoria']= $res['idCategoriaHerramienta'];
        $data['idEstado']= $res['idEstadoHerramienta'];
        return json_encode($data);

    }//end para cargar los datos a la hora de modificar 

     public function updateHerramienta($idHerramienta)
    {
       $sql = "UPDATE  herramienta SET nombreHerramienta = '".$this->nombreHerramienta."',fechaModificacion=NOW(),categoriaHerramienta_idCategoriaHerramienta=".$this->categoriaHerramienta_idCategoriaHerramienta.",estadoHerramienta_idEstadoHerramienta=".$this->estadoHerramienta_idEstadoHerramienta." WHERE idHerramienta=".$idHerramienta;

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

     public function deleteHerramienta($idHerramienta)
    {
       
       $sql = "UPDATE  herramienta SET fechaEliminacion=NOW(),  estado=0 WHERE idHerramienta=".$idHerramienta;
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


     public function obtenerIdEstadoHerramienta()
    {
      $sql = "SELECT IdEstadoHerramienta FROM usuario WHERE IdEstadoHerramienta = ".$_SESSION['IdEstadoHerramienta'];
      $id = $this->db->query($sql);
      $data = $id->fetch_assoc();
      $idReal = $data['IdEstadoHerramienta'];

      return $idReal;
    }
}//end class

 ?>