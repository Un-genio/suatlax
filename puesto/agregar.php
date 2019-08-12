<?php   
require_once '../config/connect.php';
$valid['success'] = array('success' => false, 'messages' => array());
if($_POST) {  
  $au = $_POST['puesto'];
    $sql = "SELECT puesto FROM tbls_puesto WHERE puesto='".$au."'";
  $resultado = $connect -> query($sql); 
  if($resultado->num_rows > 0) {
    $valid['success'] = false;
    $valid['messages'] = "Ya existe el puesto. Ingrese otro diferente!";
  } else {  
    $sql = "INSERT INTO tbls_puesto (puesto) VALUES ('".$au."')";
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