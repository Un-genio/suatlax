<?php 
require_once 'config/connect.php';
session_start();
if(isset($_SESSION['userId'])) {
   header('location: index.php');  
}

$errors = array();
if($_POST) {        
    $username = $connect->real_escape_string($_POST['username']); // Escapando caracteres especiales
    $password = $connect->real_escape_string($_POST['password']);
    $periodo= $_POST['idperiodo'];
    if(empty($username) || empty($password) || empty($periodo)) {
        if($username == "") {
            $errors[] = "Se requiere nombre de usuario.";
        } 
        if($password == "") {
            $errors[] = "Se requiere contraseña.";
        }
        if ($periodo=="") {
            $errors[]="Seleeciona un periodo.";      
        }
    } else {
        $sql = "SELECT * FROM usuario WHERE user='$username'";
        $result = $connect->query($sql);
        if($result->num_rows == 1) {
            $password = md5($password);
            $consulta = "SELECT * FROM usuario WHERE user='$username' AND password='$password'";
            $perio=$connect->query("SELECT * FROM periodo WHERE idPeriodo=$periodo");
            $result2 = $connect->query($consulta);
            if($result2->num_rows == 1 && $perio->num_rows == 1) {
                $fila = $result2->fetch_assoc();
                $fila2 = $perio->fetch_assoc();
                if($fila['tipousuario_id']==1){
                    $_SESSION['userId'] = $fila['idUsuario'];
                    $_SESSION['usuario']=$fila['user'];
                    $_SESSION['tipo']=$fila['tipousuario_id'];
                    $_SESSION['periodo']=$fila2['periodo'];
                    $_SESSION['idperiodo']=$fila2['idPeriodo'];
                    header('location: home/'); 
                }
                if($fila['tipousuario_id']==2){
                    $_SESSION['userId'] = $fila['idUsuario'];
                    $_SESSION['usuario']=$fila['user'];
                    $_SESSION['tipo']=$fila['tipousuario_id'];
                    $_SESSION['periodo']=$fila2['periodo'];
                    $_SESSION['idperiodo']=$fila2['idPeriodo'];
                    header('location: users.php'); 
                }
                if($fila['tipousuario_id']==3){
                    $_SESSION['userId'] = $fila['idUsuario'];
                    $_SESSION['usuario']=$fila['user'];
                    $_SESSION['tipo']=$fila['tipousuario_id'];
                    $_SESSION['periodo']=$fila2['periodo'];
                    $_SESSION['idperiodo']=$fila2['idPeriodo'];
                    header('location: direccion.php'); 
                }
                if($fila['tipousuario_id']==4){
                    $_SESSION['userId'] = $fila['idUsuario'];
                    $_SESSION['usuario']=$fila['user'];
                    $_SESSION['tipo']=$fila['tipousuario_id'];
                    $_SESSION['periodo']=$fila2['periodo'];
                    $_SESSION['idperiodo']=$fila2['idPeriodo'];
                    header('location: rmat.php'); 
                }                                                            
            } else{
                
                $errors[] = "Combinación incorrecta de nombre de usuario y/o contraseña";
            } // /else
        }  
    else {      
            $errors[] = "El nombre de usuario no existe";       
        } // /else
    } // /else not empty username // password
} // /if $_POST

$sql="SELECT * FROM pta_plantel";
$result=$connect->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>SUA</b>TEC</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Inicia sesion para comenzar!!</p>
      <div class="messages">
        <?php if($errors) {
          foreach ($errors as $key => $fila) {
            echo '<div class="alert alert-danger" alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="glyphicon glyphicon-exclamation-sign"></i> '.$fila.'</div>';    
          }
        }?> 
      </div>
      <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Usaurio" id="username" name="username" autofocus="true">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" id="password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="form-group mb-3">
            <select class="form-control" id="idperiodo" name="idperiodo" >
                <?php 
                    include 'connect/connect.php';
                    $sql="SELECT * FROM periodo where estado='Activado'";
                    $result=$connect->query($sql);
                        while($row=$result->fetch_array()){ ?>
                            <option value="<?php echo $row[0]; ?>" ><?php echo $row['periodo'];?></option>
                <?php } ?>
            </select>          
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In <i class="fa fa-sign-in-alt"></i></button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
    <footer class="page-footer pt-0 mt-5 rgba-stylish-light">
    <div class="footer-copyright py-3 text-center">
        <div class="container-fluid">
            <p> Boulevard Tecnológico Km. 2.5, Llano Yosovee C.P. 69800. Tlaxiaco. Oax. Tels. Dir. (953) 55 20788, (953) 55 21322, fax: (953) 55 20405 e-mail: dir_tlaxiaco@tecnm.mx <br><a href="http://www.tlaxiaco.tecnm.mx/" target="_blank">www.tlaxiaco.tecnm.mx</a>. © 2018 Derechos Reservados </p>
        </div>
    </div>
    </footer>
<!-- /.login-box -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
