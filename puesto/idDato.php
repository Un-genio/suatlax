<?php 	
require_once '../config/connect.php';
$Id = $_POST['Id'];
$Op=$_POST['op'];
switch($Op){
	case 1:
	$sql = "SELECT * FROM tbls_puesto WHERE id_puesto = {$Id}";
	$result = $connect->query($sql);
	if($result->num_rows > 0) {
		$row = $result->fetch_array();
		echo '<input type="hidden" class="form-control" id="Id" name="Id" value="'. $row[0].'">
		<input type="text" class="form-control" id="e_puesto" name="e_puesto" value="'.$row['puesto'].'" onblur="this.value=this.value.toUpperCase()">';
	}
	$connect->close(); 
	break;
	case 2:
	$sql = "SELECT * FROM tbls_puesto WHERE id_puesto = {$Id}";
	$result = $connect->query($sql);
	if($result->num_rows > 0) {
		$row = $result->fetch_array();
		echo '<input type="hidden" id="Id" name="Id" value="'. $row[0].'">
		<i class="fa fa-trash"></i> ELIMINAR: <label>'.$row['puesto'].'</label>';
	}
	$connect->close(); 
	break;
    default:
    echo "";
    break;   
}
?>