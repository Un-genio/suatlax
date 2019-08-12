<?php
include '../conexion/conexion.php';
$valid['success'] = array('success' => false, 'messages' => array(),'retorno' => array());
$Id = $_POST['Id'];
if($Id){ 
$igu="SELECT * FROM personal inner join usuario on usuario.Personal_idPersonal=personal.idPersonal where  idPersonal=$Id";
$res=$conexion->query($igu);
if($res->num_rows>0){
    $valid['success'] = false;
    $valid['messages'] = "Error! no esta permitido eliminar el personal. Debe eliminar el usuario asignado";
}else{    
 $sql = "DELETE FROM personal WHERE idPersonal='$Id'";
 if($conexion->query($sql) === TRUE){
    $result=$conexion->query("SHOW TABLE STATUS FROM $name LIKE 'personal' "); 
    $fila=$result->fetch_array();
    $ai=(int)$fila['Auto_increment'];
    $datos=$conexion->query("SELECT MAX(idPersonal) FROM personal");
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
        $sql =$conexion->query("ALTER TABLE personal AUTO_INCREMENT=".$comparar."");
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
  $valid['messages'] = "Error no se ha podido eliminar; Hay una relacion";
 }
}
 $conexion->close();
 echo json_encode($valid);
}
?>

