<?php 
require_once '../model/Usuario.php';
require_once '../model/Restaurante.php';
require_once '../model/Cliente.php';

if (isset($_POST['key'])) {
	$key = $_POST['key'];
	switch ($key) {
		case 'agregar':
			agregarUsuarioRestaurante();
			break;

		case 'cargarDatos':
			cargarDatosRes();
			break;

		case 'agregarC':
			agregarUsuarioCliente();
			break;

		case 'findUser':
			findUser();
			break;

		case 'modificarRes':
			moficarRestaurante();
			break;

		case 'modificarPass':
			moficarRestaurantePass();
			break;

		case 'eliminarRes':
			eliminarRestaurante();
			break;
		
		default:
			break;
	}
}


function agregarUsuarioRestaurante()
{
	$info = $_POST['dataUsuario'];
	$decodeInfo = json_decode($info);

	$objUsuario = new Usuario();
	$objUsuario->setNombreUsuario($decodeInfo[1]->value);
	$objUsuario->setContrasenha($decodeInfo[2]->value);
	$objUsuario->setSalt();
	$objUsuario->setEstado(1);
	$objUsuario->setIdTipoUsuario(3);
	$objUsuario->registrarUsuario();

	$WARD = $objUsuario->ultimoID();

	$objRestaurante = new Restaurante();
	$objRestaurante->setIdUsuario($WARD);
	$objRestaurante->setCodigoTributario($decodeInfo[10]->value);
	$objRestaurante->setNombreRestaurante($decodeInfo[4]->value);
	$objRestaurante->setDireccionRestuarante($decodeInfo[7]->value);
	$objRestaurante->setTelefonoRestaurante($decodeInfo[6]->value);
	$objRestaurante->setEmail($decodeInfo[5]->value);
	$objRestaurante->setCantidadSucursales($decodeInfo[9]->value);
	$objRestaurante->setCiudad($decodeInfo[8]->value);
	$objRestaurante->setLogo(0);
	$res = $objRestaurante->agregarRestaurante();
	echo $res;


}

function agregarUsuarioCliente()
{
	$info = $_POST['dataCliente'];
	$decodeInfo = json_decode($info);
	$objUsuario = new Usuario();
	$objUsuario->setNombreUsuario($decodeInfo[0]->value);
	
	$objUsuario->setContrasenha($decodeInfo[1]->value);
	$objUsuario->setSalt();
	$objUsuario->setEstado(1);
	$objUsuario->setIdTipoUsuario(2);
	
	$objUsuario->registrarUsuario();

	$WARD = $objUsuario->ultimoID();
	
	$objClie = new Cliente();
	$objClie->setIdUsuario($WARD);
	$objClie->setNombre($decodeInfo[3]->value);
	$objClie->setApellido($decodeInfo[4]->value);
	$objClie->setEdad($decodeInfo[5]->value);
	$objClie->setDui($decodeInfo[6]->value);
	$objClie->setDireccion($decodeInfo[7]->value);
	$objClie->setTelefonoCliente($decodeInfo[8]->value);
	$objClie->setCorreo($decodeInfo[9]->value);
	$objClie->setLogo(0);

	$res = $objClie->agregarCliente();
	echo $res;


}

function findUser()
{
	$nombreUsuario = $_POST['valor'];//dato recibido del ajax en data
	$objUsuario = new Usuario();
	$res = $objUsuario->findUser($nombreUsuario);
	echo $res;
}

function cargarDatosRes()
{
	$objUsuario = new Usuario();
	$res= $objUsuario->getUser();
	echo $res;
}

function eliminarRestaurante()
{
	$objRestaurante = new Restaurante();
	$res= $objRestaurante->eliminarRes();
	echo $res;
}


function moficarRestaurante()
{
	$info = $_POST['dataUsuarioModi'];
	$decodeInfo = json_decode($info);


	$objUsuario = new Usuario();
	$objUsuario->setNombreUsuario($decodeInfo[0]->value);
	
	$objUsuario->updateUser();

	$objRestaurante = new Restaurante();
	$objRestaurante->setCodigoTributario($decodeInfo[7]->value);
	$objRestaurante->setNombreRestaurante($decodeInfo[1]->value);
	$objRestaurante->setDireccionRestuarante($decodeInfo[4]->value);
	$objRestaurante->setTelefonoRestaurante($decodeInfo[3]->value);
	$objRestaurante->setEmail($decodeInfo[2]->value);
	$objRestaurante->setCantidadSucursales($decodeInfo[6]->value);
	$objRestaurante->setCiudad($decodeInfo[5]->value);
	$objRestaurante->setLogo(0);
	$res = $objRestaurante->updateRes();
	echo $res;


}

function moficarRestaurantePass()
{
	$info = $_POST['dataPassModi'];
	$decodeInfo = json_decode($info);

	$objUsuario = new Usuario();
	$objUsuario->setContrasenha($decodeInfo[0]->value);
	$objUsuario->setSalt();
	
	$res = $objUsuario->updatePass();

	echo $res;


}
		/*$objRestaurante = new Restaurante();
		$objRestaurante->agregarRestaurante($idUsuario, $idCodigo, $nombreRestaurante, $direccionRestaurante, $telefonoRestaurante, $ciudad, $email, $cantidadSucursales);*/


	/*function registrarUsuarioYCliente()
	{
		$nombreUsuario = $_POST['nombreUsuario'];
		$contrasenha = $_POST['repeatPassword'];
		$idTipoUsuario = 2;

		$nombre = $_POST['nombreCliente'];
		$apellido = $_POST['apellidoCliente'];
		$edad = $_POST['edadCliente'];
		$dui = $_POST['dui'];
		$telefonoCliente = $_POST['telefonoCliente'];
		$direccion = $_POST['direccionCliente'];
		$correo = $_POST['emailCliente'];

		$objUs = new Usuario();
		$objUs->registrarCliente($nombreUsuario, $contrasenha, $idTipoUsuario, $nombre, $apellido, $edad, $dui, $telefonoCliente, $direccion, $correo);
	}*/
	


 ?>