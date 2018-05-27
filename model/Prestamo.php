<?php 
/**
* 
*/
class Pedido
{
	public $idPrestamo;
	public $horaPrestamo;
	public $Empleado_idEmpleado;
	public $db;
        
        public function __construct()
        {
            
            $this->db = conectar();
            
        }


        public function getDb()
        {
            return $this->db;
        }


        public function getIdprestamo()
   	{
        return $this->idPrestamo;
    }

    
    public function setIdprestamo($idPrestamo)
    {
        $this->idPrestamo = $idPrestamo;

        return $this;
    }



    public function getHoraprestamo()
   	{
        return $this->horaPrestamo;
    }

    
    public function setHoraprestamo($horaPrestamo)
    {
        $this->horaPrestamo = $horaPrestamo;

        return $this;
    }


    public function getEmpleado_idEmpleado()
   	{
        return $this->Empleado_idEmpleado;
    }

    
    public function setEmpleado_idEmpleado($Empleado_idEmpleado)
    {
        $this->Empleado_idEmpleado = $Empleado_idEmpleado;

        return $this;
    }
	
}
 ?>