<?php 
require_once '../model/Usuario.php';

	if(isset($_POST['login']))
	{
		login();
	}
	function login()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$objUsuario = new Usuario();
		$objUsuario->login($username, $password);

	}
	if (isset($_POST['key'])) {
		$key = $_POST['key'];
			switch ($key) {
				case 'login':
					login();
				break;

				case 'agregar':
					agregar();
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
				case 'estadistica':
					estadistica();
				break;
				
				default:
					
				break;
			}
	}
	
	function estadistica()
	{
		$objUsuario = new Usuario();
		$res = $objUsuario->estadistica();
		echo $res;

	}
	

	function agregar()
	{
		$objUsuario = new Usuario();
		$dataUsuario = $_POST['info'];
		$decodeInfo = json_decode($dataUsuario);
		$username = $decodeInfo[0]->value;
		$password  = $decodeInfo[1]->value;
		$rol = $decodeInfo[3]->value;

		$objUsuario->setUsername($username);
		$objUsuario->setPassword($password);
		$objUsuario->setSalt();
		$objUsuario->setRol($rol);
		$objUsuario->setEstado(1);
		
		$res = $objUsuario->saveUser();
		$data = array();
		if ($res) {
			$data['estado']=true;
			$data['descripcion']= 'Datos ingresados exitosamente.';
		}else{
			$data['estado']=false;
			$data['descripcion']= 'Error al ingresar los datos.';
		}

		echo json_encode($data);
	}


	function solicitarInfo()
	{
		$objUsuario = new Usuario();
		$idUsuario = $_POST['idUsuario'];
		$data = $objUsuario->getUsuario($idUsuario);
		echo $data;

	}

	function modificar()
	{
		$objUsuario = new Usuario();
		$dataUsuario = $_POST['info'];
		$decodeInfo = json_decode($dataUsuario);
		$username = $decodeInfo[1]->value;
		$password  = $decodeInfo[2]->value;
		$rol = $decodeInfo[4]->value;
		$idUsuario = $decodeInfo[0]->value;

		$objUsuario->setUsername($username);
		$objUsuario->setPassword($password);
		$objUsuario->setSalt();
		$objUsuario->setRol($rol);
		$res = $objUsuario->updateUser($idUsuario);
		echo $res;
		
	}

	function eliminar()
	{
		$objUsuario = new Usuario();
		$idUsuario = $_POST['idUsuario'];
		$res = $objUsuario->deleteUser($idUsuario);
		echo $res;
		
	}

 ?>