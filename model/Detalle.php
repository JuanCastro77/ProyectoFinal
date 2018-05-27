<?php 
/**
* 
*/
class DetallePedido
{
	protected $cantidad;
	protected $Prestamo_idprestamo;
	protected $Heramienta_idHerramienta;
	
	function __construct()
	{
		
	}

	public function getCantidad()
   	{
        return $this->cantidad;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }



	public function getPrestamo_idprestamo()
   	{
        return $this->Prestamo_idprestamo;
    }
    
    public function setPrestamo_idprestamo($Prestamo_idprestamo)
    {
        $this->Prestamo_idprestamo = $Prestamo_idprestamo;

        return $this;
    }


    public function getHeramienta_idHerramientao()
   	{
        return $this->Heramienta_idHerramienta;
    }
    
    public function setHeramienta_idHerramienta($Heramienta_idHerramienta)
    {
        $this->Heramienta_idHerramienta = $Heramienta_idHerramienta;

        return $this;
    }
}
 ?>