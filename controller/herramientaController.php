<?php
require_once '../app/validacionGeneral.php';
require_once '../model/Herramienta.php';



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
   $objHerramienta = new Herramienta();
  
   $dataHerramienta = $_POST['info'];
   $decodeInfo = json_decode($dataHerramienta);
   
   $objHerramienta->setNombreHerramienta($decodeInfo[0]->value);
   $objHerramienta->setEstado(1);
   $objHerramienta->setCategoriaHerramienta_idCategoriaHerramienta($decodeInfo[1]->value);
   $objHerramienta->setEstadoHerramienta_idEstadoHerramienta($decodeInfo[2]->value);
   $res = $objHerramienta->agregarHerramienta();
   echo $res;
}

function cargarDatosRes()
{
   $objUsuario = new Usuario();
   $res= $objUsuario->getUser();
   echo $res;
}

function solicitarInfo(){
      $objHerramienta = new Herramienta();
      $idHerramienta = $_POST['idHerramienta'];
      $data = $objHerramienta->getHerramienta($idHerramienta);
      echo $data;
}
     

     function modificar()
   {
      $objHerramienta = new Herramienta();
      $dataHerramienta = $_POST['info'];
      $idHerramienta = $_POST['idHerramienta'];
      $decodeInfo = json_decode($dataHerramienta);
      $nombreHerramienta = $decodeInfo[1]->value;
      $categoria  = $decodeInfo[2]->value;
      $estado  = $decodeInfo[3]->value;

     $objHerramienta->setNombreHerramienta($nombreHerramienta);
      $objHerramienta->setEstado(1);
      $objHerramienta->setCategoriaHerramienta_idCategoriaHerramienta($categoria);
      $objHerramienta->setEstadoHerramienta_idEstadoHerramienta($estado);
      $res = $objHerramienta->updateHerramienta($idHerramienta);

      echo $res;
      
   } 

   function eliminar()
   {
      $objHerramienta = new Herramienta();
      $idHerramienta = $_POST['idHerramienta'];
      $res = $objHerramienta->deleteHerramienta($idHerramienta);
      echo $res;
      
   }         
