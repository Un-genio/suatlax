<?php   
require_once '../config/connect.php';
$valid['success'] = array('success' => false, 'messages' => array());
if($_POST) {  
  $au = $_POST['depto'];
  $sub = $_POST['subdi'];
  $nivel = $_POST['nivel'];
  $sql2 = "SELECT departamento FROM tbls_departamentos WHERE departamento='".$au."'";
  $resultado = $connect -> query($sql);
  if($resultado->num_rows > 0) {
    $valid['success'] = false;
    $valid['messages'] = "Ya existe la depto. Ingrese otro diferente!";
  } else {  
    $sql = "INSERT INTO tbls_departamentos (departamento,fk_sub,nivel) VALUES ('".$au."','".$sub."','".$nivel."')";
  if($connect->query($sql) === TRUE) {
    $valid['success'] = true;
    $valid['messages'] = "Los datos han sido registrados";  
  } else {
    $valid['success'] = false;
    $valid['messages'] = "Error no se ha podido guardar";
  }
}
  $connect->close();
  echo json_encode($valid);
}
?>