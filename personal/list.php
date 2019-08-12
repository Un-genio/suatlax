<?php   
require_once ('../config/connect.php');
//mb_internal_encoding ('UTF-8');
$sql = "SELECT * FROM tbls_personal inner join tbls_puesto on tbls_puesto.id_puesto=tbls_personal.fk_puesto inner join tbls_departamentos on tbls_departamentos.id_depto=tbls_personal.fk_depto";
$result = $connect->query($sql);
$output = array('data' => array());
if($result->num_rows > 0) { 
  $button="";
 while($row = $result->fetch_array()) {
  $Id = $row[0];
  $rf = $row['rfc'];
  $nombre = $row['nombre']." ".$row['apellidos'];
  $puesto = $row['fk_puesto'];
  $button ='<button type="button" class="btn btn-sm btn-primary" title="Editar" data-toggle="modal" data-target="#editData" onclick="editar('.$Id.')"><i class="fa fa-edit"></i></button>     
      <button type="button" class="btn btn-sm btn-danger" title="Eliminar" data-toggle="modal" data-target="#removeData" onclick="eliminar('.$Id.')"><i class="fa fa-trash"></i></button>';
  $output['data'][] = array( 
    $rf,
    $nombre,
    $puesto,   
    $button 
    );  
 }
}
$connect->close();
echo json_encode($output);
?>