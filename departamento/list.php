<?php   
require_once ('../config/connect.php');
$sql = "SELECT * FROM tbls_departamentos left join dependencia on dependencia.idDependencia=tbls_departamentos.fk_sub order by nivel ASC";
$result = $connect->query($sql);
$output = array('data' => array());
if($result->num_rows > 0) { 
  $button="";
 while($row = $result->fetch_array()) {
  $Id = $row[0];
  $depto =$row['departamento'];
  $sub =$row['subdireccion'];
  $nivel =$row['nivel'];
  if($row['subdireccion']==null){
    $sub ='<label class="label label-warning">Asigne una subdireccion a los departamentos</label>';
  }else{
    $sub =$row['subdireccion'];
  }  
  $button ='<button type="button" class="btn btn-sm btn-primary" title="Editar" data-toggle="modal" data-target="#editData" onclick="editar('.$Id.')"><i class="fa fa-edit"></i></button>     
      <button type="button" class="btn btn-sm btn-danger" title="Eliminar" data-toggle="modal" data-target="#removeData" onclick="eliminar('.$Id.')"><i class="fa fa-trash"></i></button>';
  $output['data'][] = array(  
    $depto,
    $sub,
    $nivel,
    $button 
    );  
 }

}
$connect->close();

echo json_encode($output);
?>