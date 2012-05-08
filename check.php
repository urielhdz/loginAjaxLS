<?PHP
	$host = "localhost";
	$usuarioHost = "*aqui va tu usuario de base de datos*";

	$password = "*aqui va tu contraseña*";	
	$usuario= $_POST['name'];
	$pswd = $_POST['pswd'];
	$baseDatos = "aquí va el nombre de tu base de datos";
	$answer = array();
	mysql_connect($host,$usuarioHost,$password)or die("Algo paso que no pudimos conectar a la base :S");
	mysql_select_db($baseDatos) or die("No conectamos con la BD :/");
	//La siguiente línea tienes que modificarla con los datos de tu Base De Datos!!!!!
	$queryDos = mysql_query("SELECT idUsuario,nombreUsuario FROM usuariosdb WHERE nombreUsuario = '$usuario' AND contrasenaUsuario = '$pswd' ") or die("Algo ha pasado O: avísanos e intentaremos arreglarlo");
	if($resp = mysql_fetch_row($queryDos))
	{
		$idUsuario = $resp[0];
		$nombreUsuario = $resp[1];
		$answer["id"] = $idUsuario;
		$answer["name"] = $nombreUsuario;
	}
	else
	{
		$answer = "error";
	}
	echo json_encode($answer);
	
?>