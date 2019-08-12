<?php 
require_once 'connect.php';
date_default_timezone_set('UTC'); 
date_default_timezone_set("America/Mexico_City");
setlocale(LC_ALL,"es_ES");
session_start();
if (isset($_SESSION['usuario'])==false or isset($_SESSION['userId'])==false) {
    header("Location:../index.php");
}
else {
  $consulta="SELECT * FROM usuario WHERE tipousuario_id='".$_SESSION['tipo']."' && idUsuario='".$_SESSION['userId']."'";
  $result = $connect->query($consulta);
  $row = $result->fetch_assoc();
  $idus=$row['idUsuario'];
  $user=$row['user'];
  $nivel=$row['tipousuario_id']; 
  $idperiodo=$_SESSION['idperiodo'];
  $periodo=$_SESSION['periodo'];        
    }
?>