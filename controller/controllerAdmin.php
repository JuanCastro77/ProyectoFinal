<?php 
require_once '../model/Usuario.php';
if (isset($_POST['key'])) {
	$key = $_POST['key'];
	switch ($key) {
		case 'agregar':
			agregar();
			break;

		case 'findUser':
			findUser();
			break;
		
		case 'getUser':
			getUser();
			break;

		case 'modificar':
			modificar();
			break;

		case 'deleteUser':
					deleteUser();
					break;

		default:
			# code...
			break;
			//Fin del Switch
	}
}//Fin del isset

function agregar()
{
	$info = $_POST['dataUsuario'];
	$decodeInfo = json_decode($info);

	$objUsuario = new Usuario();
	$objUsuario->setNombreUsuario($decodeInfo[0]->value);
	$objUsuario->setContrasenha($decodeInfo[1]->value);
	$objUsuario->setIdTipoUsuario($decodeInfo[3]->value);
	$objUsuario->setEstado(1);
	$res = $objUsuario->saveUser();
	echo $res;
}

function findUser()
{
	$nombreUsuario = $_POST['valor'];//dato obtenido del ajax en data
	$objUsuario = new Usuario();
	$res = $objUsuario->findUser($nombreUsuario);
	echo $res;
}

function getUser()
{
	$idUsuario = $_POST['idUsuario'];//Dato obtenido del ajax en data
	$objUsuario = new Usuario();
	$res = $objUsuario->getUser($idUsuario);
	
	echo $res;
}

function modificar()
{
	$idUsuario = $_POST['idUsuario'];
	$info = $_POST['dataUsuario'];
	$decodeInfo = json_decode($info);

	$objUsuario = new Usuario();
	$objUsuario->setUsername($decodeInfo[1]->value);
	$objUsuario->setPassword($decodeInfo[2]->value);
	$objUsuario->setRol($decodeInfo[4]->value);
	$res = $objUsuario->modifyUser($idUsuario);
	echo $res;
}
function deleteUser()
{
	$idUsuario = $_POST['idUsuario'];
	$objUsuario = new Usuario();
	$res= $objUsuario->deleteUser($idUsuario);
	echo $res;
}



 ?>