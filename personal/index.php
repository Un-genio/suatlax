<?php 
require_once '../config/seguridad.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SUA::Personal</title>
  <?php  include '../include/head.php' ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
<?php  include '../include/navbar-admin.php' ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../home/">Home</a></li>
              <li class="breadcrumb-item active">Personal</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#dataRegister"><i class='fa fa-plus'></i> Agregar</button>
              </div>              
              <div class="card-body">
                <div  class="table-responsive">
                  <div class="remove-messages"></div>
                    <table id="datos" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>RFC</th>
                          <th>NOMBRE COMPLETO</th>
                          <th>PUESTO</th>
                          <th>U/D</th>
                        </tr>
                      </thead>
                    </table>
                  </div>               
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0-beta.2
    </div>
  </footer>
</div>
<!-- ./wrapper -->
<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" id="submitForm" action="agregar.php" method="POST">
        <div class="modal-header">
          <h4 class="modal-title" style="font-size: 8pt"><i class="fa fa-plus"></i> Agregar personal</h4>
        </div>
        <div class="modal-body">
       <div class="alert alert-info" style="font-size: 8pt">
          <strong><i class="glyphicon glyphicon-info-sign"></i></strong>
          Su usuario y constraseña se genera con su RFC al guardar los datos.
        </div>            
          <div id="add-messages"></div>                                 
          <div class="form-group">
            <div class="col-sm-6">
              <label for="correo">RFC:</label>
              <input type="text" class="form-control" id="rfc" name="rfc" autocomplete="off" placeholder="RFC" onblur="this.value=this.value.toUpperCase()" maxlength="13" required="true" pattern="[A-ZÑ&]{3,4}\d{6}[A-V1-9][A-Z1-9][0-9A]">
            </div>
            <div class="col-sm-6">
              <label for="correo">CURP:</label>
              <input type="text" class="form-control" id="curp" name="curp" autocomplete="off" placeholder="CURP" onblur="this.value=this.value.toUpperCase()" maxlength="18" required="true"  pattern="([A-Z]{4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM](AS|BC|BS|CC|CL|CM|CS|CH|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[A-Z]{3}[0-9A-Z]\d)">
            </div>            
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <label for="correo">NOMBRE:</label>
              <input type="text" class="form-control" id="nombre" name="nombre" autocomplete="off" placeholder="Nombre" onblur="this.value=this.value.toUpperCase()">
            </div>
            <div class="col-sm-6">
              <label for="correo">APELLIDOS:</label>
              <input type="text" class="form-control" id="apellidos" name="apellidos" autocomplete="off" placeholder="Apellidos" onblur="this.value=this.value.toUpperCase()">
            </div>            
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <label for="correo">CORREO:</label>
              <input type="email" class="form-control" id="correo" name="correo" autocomplete="off" placeholder="Nombre" onblur="this.value=this.value.toUpperCase()">
            </div>
            <div class="col-sm-6">
              <label for="correo">PROFESION:</label>
              <input type="text" class="form-control" id="grado" name="grado" autocomplete="off" placeholder="Ingeniero" onblur="this.value=this.value.toUpperCase()">
            </div>            
          </div>          
          <div class="form-group">
             <div class="col-sm-6">
              <label for="correo">PUESTO:</label>
                  <select class="form-control" id="puesto" name="puesto" searchable="Buscar aqui..">
                    <option value="">Seleccione una opcion..</option>
                    <?php
                    $dat=$connect->query("SELECT * FROM tbls_puesto ORDER BY id_puesto");
                      while($row=$dat->fetch_array()){ ?> 
                        <option value="<?php echo $row['id_puesto']; ?>" ><?php echo $row['puesto'];?>
                        </option><?php } ?>
                  </select>              
            </div>
             <div class="col-sm-6">
              <label for="correo">DEPARTAMENTO:</label>
                  <select class="form-control" id="depto" name="depto" searchable="Buscar aqui..">
                    <option value="">Seleccione una opcion..</option>
                    <?php
                    $dat=$connect->query("SELECT * FROM tbls_departamentos INNER JOIN dependencia on dependencia.idDependencia=tbls_departamentos.fk_sub where nivel<>0  order by id_depto");
                    if($dat->num_rows>0){
                      while($row=$dat->fetch_array()){ ?> 
                        <option value="<?php echo $row['id_depto']; ?>" ><?php echo $row['departamento']?>
                        </option>
                        <?php }
                        }else{
                        echo '<option value="">Configure sus departamentos..</option>';
                        } ?>
                  </select>              
            </div>            
          </div>
          <div class="form-group">
             <div class="col-sm-12">
              <label for="correo">TIPO DE USUARIO:</label>
                  <select class="form-control" id="tipo" name="tipo" >
                  <option value="">Seleccione una opcion..</option>
                  <?php 
                  $sql="SELECT  * FROM tipo_usuario WHERE idtipo_usuario<>1"; 
                    $r=$connect->query($sql); 
                      while($row=$r->fetch_array()) { 
                  ?>
                  <option value="<?php echo $row['idtipo_usuario']; ?>" ><?php echo $row['tipousuario'];?></option><?php } ?>
                  </select>
            </div>
          </div>                                                   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-sm" id="closeBtn" data-dismiss="modal" data-loading-text="Espere..."> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>
          <button type="submit" class="btn btn-primary btn-sm" id="createBtn" data-loading-text="Cargando..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
        </div>      
      </form>    
    </div>
  </div>
</div>

<div class="modal fade" id="editData" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" id="editForm" action="update.php" method="POST">
        <div class="modal-header"> 
          <h4 class="modal-title"><i class="fa fa-edit"></i> Editar datos</h4>
        </div>
        <div class="modal-body">        
          <div id="update-messages"></div>
          <div class="edit-content">
          <div class="form-group">
            <div class="col-sm-6">
              <label for="correo">RFC:</label>
              <input type="text" class="form-control" id="e_rfc" name="e_rfc" autocomplete="off" placeholder="RFC" onblur="this.value=this.value.toUpperCase()" maxlength="13" minlength="13" required="true" pattern="[A-ZÑ&]{3,4}\d{6}[A-V1-9][A-Z1-9][0-9A]">
            </div>
            <div class="col-sm-6">
              <label for="correo">CURP:</label>
              <input type="text" class="form-control" id="e_curp" name="e_curp" autocomplete="off" placeholder="CURP" onblur="this.value=this.value.toUpperCase()" maxlength="18" required="true"  pattern="([A-Z]{4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM](AS|BC|BS|CC|CL|CM|CS|CH|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[A-Z]{3}[0-9A-Z]\d)">
            </div>            
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <label for="correo">NOMBRE:</label>
              <input type="text" class="form-control" id="e_nombre" name="e_nombre" autocomplete="off" placeholder="Nombre" onblur="this.value=this.value.toUpperCase()">
            </div>
            <div class="col-sm-6">
              <label for="correo">APELLIDOS:</label>
              <input type="text" class="form-control" id="e_apellidos" name="e_apellidos" autocomplete="off" placeholder="Apellidos" onblur="this.value=this.value.toUpperCase()">
            </div>            
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <label for="correo">CORREO:</label>
              <input type="email" class="form-control" id="e_correo" name="e_correo" autocomplete="off" placeholder="Nombre" onblur="this.value=this.value.toUpperCase()">
            </div>
            <div class="col-sm-6">
              <label for="correo">PROFESION:</label>
              <input type="text" class="form-control" id="e_grado" name="e_grado" autocomplete="off" placeholder="Apellidos" onblur="this.value=this.value.toUpperCase()">
            </div>            
          </div>          
          <div class="form-group">
             <div class="col-sm-6">
              <label for="correo">PUESTO:</label>
                  <select class="form-control" id="e_puesto" name="e_puesto" searchable="Buscar aqui..">
                    <option value="">Seleccione una opcion..</option>
                    <?php
                    $dat=$connect->query("SELECT * FROM tbls_puesto ORDER BY id_puesto");
                      while($row=$dat->fetch_array()){ ?> 
                        <option value="<?php echo $row['id_puesto']; ?>" ><?php echo $row['puesto'];?>
                        </option><?php } ?>
                  </select>              
            </div>
             <div class="col-sm-6">
              <label for="correo">DEPARTAMENTO:</label>
                  <select class="form-control" id="e_depto" name="e_depto" searchable="Buscar aqui..">
                    <option value="">Seleccione una opcion..</option>
                    <?php
                    $dat=$connect->query("SELECT * FROM tbls_departamentos INNER JOIN dependencia on dependencia.idDependencia=tbls_departamentos.fk_sub where nivel<>0  order by id_depto");
                      while($row=$dat->fetch_array()){ ?> 
                        <option value="<?php echo $row['id_depto']; ?>" ><?php echo $row['departamento']?>
                        </option><?php } ?>
                  </select>              
            </div>            
          </div>                                                                                              
          </div>             
        </div>
        <div class="modal-footer editFooter">
          <button type="button" class="btn btn-danger" id="closeBtn2" data-loading-text="Espere..." data-dismiss="modal"> <i class="fa fa-times"></i> Cerrar</button>
          <button type="submit" class="btn btn-success" id="editBtn" data-loading-text="Actualizando..." autocomplete="off"> <i class="glyphicon glyphicon-refresh"></i> Actualizar</button> 
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="removeData" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title titulo"><i class="fa fa-trash"></i>Eliminar</h6>
      </div>
      <div class="modal-body">
      <div class="otro-messages"></div>
      <p class="lead text-muted text-center" style="display: block;margin:10px;font-size: 10pt">Realmente deseas eliminar?</p>
      </div>
      <div class="modal-footer removeFooter">
        <button type="button" class="btn btn-outline-danger btn-sm"  id="closeBtn3" data-loading-text="Espere..." data-dismiss="modal"> <i class="fa fa-times"></i> Cerrar</button>
        <button type="button" class="btn btn-danger btn-sm" id="removeBtn" data-loading-text="Eliminando..."> <i class="fa fa-check"></i> Aceptar</button> 
      </div>
    </div>
  </div>
</div>

<!-- REQUIRED SCRIPTS -->
<?php  include '../include/footer.php' ?>
<script src="ajax.js"></script>
</body>
</html>