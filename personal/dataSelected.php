<?php 	
require_once '../conexion/conexion.php';
$Id = $_POST['Id'];
$sql = "SELECT * FROM personal WHERE idPersonal = {$Id}";
$result = $conexion->query($sql);
if($result->num_rows > 0) {
	$row = $result->fetch_array();
} 
$conexion->close();
echo json_encode($row);
?>