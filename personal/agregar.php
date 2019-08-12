<?php   
require_once '../conexion/conexion.php';
$valid['success'] = array('success' => false, 'messages' => array());
if($_POST) {  
  $rfc = $_POST['rfc'];
  $curp= $_POST['curp'];
  $nombre = $_POST['nombre'];
  $apellidos = $_POST['apellidos'];
  $correo = $_POST['correo'];
  $grado = $_POST['grado'];
  $puesto = $_POST['puesto'];
  $depto = $_POST['depto'];
  $tipo = $_POST['tipo'];
  $pass= md5($_POST['rfc']);
   
  $sql = "SELECT RFC FROM personal WHERE RFC='".$rfc."'";
  $resultado = $conexion -> query($sql); 
  if($resultado->num_rows > 0) {
    $valid['success'] = false;
    $valid['messages'] = "Ya existe el un dato igual. Ingrese otro diferente!";
  } else {  
    $sql = "INSERT INTO personal (RFC,CURP,puestoid,deptoid,nombre,apellidos,correo,profesion) VALUES ('".$rfc."','".$curp."','".$puesto."','".$depto."','".$nombre."','".$apellidos."','".$correo."','".$grado."')";
  if($conexion->query($sql) === TRUE) {
    $mas=$conexion->query("SELECT MAX(idPersonal) as id FROM personal");
    $fila=$mas->fetch_array();
    $fkid=$fila['id'];
    
    $r=$conexion->query("SELECT * FROM periodo where estado='Activado'");
    $roww=$r->fetch_array();
    $perio=$roww['idPeriodo'];

    $conexion->query("INSERT INTO usuario(user,password,Personal_idPersonal,tipousuario_id,Periodo_idPeriodo)VALUES('".$rfc."','".$pass."','".$fkid."','".$tipo."','".$perio."')");

    $valid['success'] = true;
    $valid['messages'] = "Los datos han sido registrados";  
  } else {
    $valid['success'] = false;
    $valid['messages'] = "Error no se ha podido guardar";
  }
}
  $conexion->close();
  echo json_encode($valid);
}
?>