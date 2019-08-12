<?php
include '../config/connect.php';
$valid['success'] = array('success' => false, 'messages' => array());
if($_POST) {  
  $depto=$_POST['e_depto'];
  $subdi=$_POST['e_subdi'];
  $nivel=$_POST['e_nivel'];
    $Id = $_POST['Id'];
  $sql= "UPDATE tbls_departamentos SET departamento ='$depto', fk_sub=$subdi,nivel=$nivel WHERE id_depto ={$Id}";
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