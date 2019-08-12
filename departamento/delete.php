<?php
include '../config/connect.php';
$valid['success'] = array('success' => false, 'messages' => array(),'retorno' => array());
$Id = $_POST['Id'];
if($Id){ 
 $sql = "DELETE FROM tbls_departamentos WHERE id_depto={$Id}";
 if($connect->query($sql) === TRUE){
    $result=$connect->query("SHOW TABLE STATUS FROM $name LIKE 'tbls_departamentos' "); 
    $fila=$result->fetch_array();
    $ai=(int)$fila['Auto_increment'];
    $datos=$connect->query("SELECT MAX(id_depto) FROM tbls_departamentos");
    $fila2=$datos->fetch_array();
    $last_id=(int)$fila2[0];
    if($last_id==0){
       $comparar=0;
    }else{
        $comparar=$ai-$last_id;
    }
    if($comparar==1){
        $valid['success'] = true;
        $valid['retorno']= "valor AUTO_INCREMENT correcto";
    }else{
        $valid['success'] = false;
        $sql =$connect->query("ALTER TABLE tbls_departamentos AUTO_INCREMENT=".$comparar."");
        if($sql === TRUE){
            $valid['success'] = true;
            $valid['retorno']="valor AUTO_INCREMENT restablecido";
        }else{
            $valid['success'] = false;
            $valid['retorno'] = "Error al reestablecer el valor AUTO_INCREMENT";
        }
    }
  $valid['success'] = true;
  $valid['messages'] = "Eliminado exitosamente";    
 } else {
  $valid['success'] = false;
  $valid['messages'] = "Error no se ha podido eliminar";
 }
 $connect->close();
 echo json_encode($valid);
}
?>

