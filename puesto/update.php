<?php
include '../config/connect.php';
$valid['success'] = array('success' => false, 'messages' => array());
if($_POST) {  
  $au= $_POST['e_puesto'];
    $Id = $_POST['Id'];
  $sql= "UPDATE tbls_puesto SET puesto = '$au' WHERE id_puesto ={$Id}";
  if($connect->query($sql) === TRUE) {
    $valid['success'] = true;
    $valid['messages'] = "Actualizado exitosamente";  
  } else {
    $valid['success'] = false;
    $valid['messages'] = "Error no se ha podido actualizar";
  }
  $connect->close();
  echo json_encode($valid);
}
?>