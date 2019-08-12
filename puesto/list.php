<?php   
require_once ('../config/connect.php');
$sql = "SELECT * FROM tbls_puesto";
$result = $connect->query($sql);
$output = array('data' => array());
if($result->num_rows > 0) { 
  $button="";
 while($row = $result->fetch_array()) {
  $Id = $row[0];
  $puesto = $row[1];
  $button ='<button type="button" class="btn btn-sm btn-primary" title="Editar" data-toggle="modal" data-target="#editDato" onclick="editar('.$Id.')"><i class="fa fa-edit"></i></button>     
      <button type="button" class="btn btn-sm btn-danger" title="Eliminar" data-toggle="modal" data-target="#removeData" onclick="remove('.$Id.')"><i class="fa fa-trash"></i></button>';
  $output['data'][] = array(  
    $puesto,
    $button 
    );  
 }

}
$connect->close();

echo json_encode($output);
?>