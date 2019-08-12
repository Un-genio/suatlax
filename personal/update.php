<?php
include '../conexion/conexion.php';
$valid['success'] = array('success' => false, 'messages' => array());
if($_POST) {  
  $rfc = $_POST['e_rfc'];
  $curp= $_POST['e_curp'];
  $nombre = $_POST['e_nombre'];
  $apellidos = $_POST['e_apellidos'];
  $correo = $_POST['e_correo'];
  $grado = $_POST['e_grado'];
  $puesto = $_POST['e_puesto'];
  $depto = $_POST['e_depto'];
    $Id = $_POST['Id'];
  $sql= "UPDATE personal SET RFC='".$rfc."',CURP='".$curp."',puestoid='".$puesto."' ,deptoid='".$depto."',nombre='".$nombre."',apellidos='".$apellidos."',correo='".$correo."',profesion='".$grado."' WHERE idPersonal ={$Id}";
  if($conexion->query($sql) === TRUE) {
    $valid['success'] = true;
    $valid['messages'] = "Actualizado exitosamente";  
  } else {
    $valid['success'] = false;
    $valid['messages'] = "Error no se ha podido actualizar";
  }
  $conexion->close();
  echo json_encode($valid);
}
?>