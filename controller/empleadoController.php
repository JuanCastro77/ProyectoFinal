<?php
require_once '../app//validacionGeneral.php';
require_once '../model/Empleado.php';
require_once '../model/Usuario.php';

if (isset($_POST['key'])) {
	$key = $_POST['key'];
	switch ($key) {
		case 'agregar':
			agregar();
		break;

      case 'cargarDatos';
         cargarDatosRes();
      break;
		
		case 'solicitarInfo':
         solicitarInfo();
      break;
      case 'modificar':
            modificar();
      break;
      case 'eliminar':
         eliminar();
       break;
	}
}

function agregar()
{  
   $objEmpleado = new Empleado();
   $objUsuario = new Usuario();
   $idUsuario= $objUsuario->obtenerIdUsuario();
   $dataEmpleado = $_POST['info'];
   $decodeInfo = json_decode($dataEmpleado);
   
   $objEmpleado->setDui($decodeInfo[0]->value);
   $objEmpleado->setNombre($decodeInfo[1]->value);
   $objEmpleado->setGenero($decodeInfo[2]->value);
   $objEmpleado->setCargo($decodeInfo[3]->value);
   $objEmpleado->setTelefono($decodeInfo[4]->value);
   $objEmpleado->setEstadoEmpleado(1);
   $objEmpleado->setUsuario_idUsuario($idUsuario);
   $res = $objEmpleado->agregarEmpleado();
   echo $res;
}

function cargarDatosRes()
{
   $objUsuario = new Usuario();
   $res= $objUsuario->getUser();
   echo $res;
}

function solicitarInfo(){
   $objEmpleado = new Empleado();
      $idEmpleado = $_POST['idEmpleado'];
      $data = $objEmpleado->getEmpleado($idEmpleado);
      echo $data;
}
     

     function modificar()
   {
      $objEmpleado = new Empleado();
      $dataEmpleado = $_POST['info'];
      $decodeInfo = json_decode($dataEmpleado);
      $dui = $decodeInfo[1]->value;
      $nombre  = $decodeInfo[2]->value;
      $genero = $decodeInfo[3]->value;
      $cargo = $decodeInfo[4]->value;
      $telefono = $decodeInfo[5]->value;
      $idEmpleado = $decodeInfo[0]->value;

      $objEmpleado->setDui($dui);
      $objEmpleado->setNombre($nombre);
      $objEmpleado->setGenero($genero);
      $objEmpleado->setCargo($cargo);
      $objEmpleado->setTelefono($telefono);
      $res = $objEmpleado->updateEmpleado($idEmpleado);
      echo $res;
      
   } 

   function eliminar()
   {
      $objEmpleado = new Empleado();
      $idEmpleado = $_POST['idEmpleado'];
      $res = $objEmpleado->deleteEmpleado($idEmpleado);
      echo $res;
      
   }         
 ?>