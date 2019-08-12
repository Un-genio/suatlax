 <?php
require_once '../config/connect.php';
$result = $connect->query("SELECT * FROM dependencia");
$output = array('data' => array());  
if($result->num_rows > 0) { 
  $button="";
 while($row = $result->fetch_array()) {
  $Id = $row[0];
  $subd=$row['subdireccion'];
  $button ='<button type="button" class="btn btn-sm btn-primary" title="Editar" data-toggle="modal" data-target="#editDato" onclick="editar('.$Id.')"><i class="fa fa-edit"></i></button>';
  $output['data'][] = array(    
    $Id,
    $subd,
    $button
    );  
 }
}
$connect->close();
echo json_encode($output,JSON_UNESCAPED_UNICODE);
?> 