<?php 	
require_once '../config/connect.php';
$Id = $_POST['Id'];
$sql = "SELECT * FROM tbls_puesto WHERE id_puesto = {$Id}";
$result = $connect->query($sql);
if($result->num_rows > 0) {
	$row = $result->fetch_array();
} 
$connect->close();
echo json_encode($row);
?>