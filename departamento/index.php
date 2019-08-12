<?php 
require_once '../config/seguridad.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SUA::Departamentos</title>
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
            <h1 class="m-0 text-dark">Departamentos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../home/">Home</a></li>
              <li class="breadcrumb-item active">Departamentos</li>
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
                          <th>DEPARTAMENTOS</th>
                          <th>SUBDIRECCION</th>
                          <th>NIVEL</th>
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
          <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar departamento</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="alert alert-info">
          <strong><i class="glyphicon glyphicon-info-sign"></i></strong>
          Niveles:  Direccion=1, Subdirecciones=2, Otros:3
        </div>

        <div class="modal-body">
          <div id="add-messages"></div>                                 
          <div class="form-group">
            <div class="col-sm-12">
              <label for="correo">DEPARTAMENTO</label>
              <input type="text" class="form-control" id="depto" name="depto" autocomplete="off" placeholder="Nombre departamento" onblur="this.value=this.value.toUpperCase()">
            </div>
          </div>
          <div class="form-group">
             <div class="col-sm-12">
              <label for="correo">AREA DE ADSCRIPCIÓN</label>
                  <select class="form-control" id="subdi" name="subdi" searchable="Buscar aqui..">
                    <?php
                    $dat=$connect->query("SELECT * FROM dependencia");
                      while($row=$dat->fetch_array()){ ?> 
                        <option value="<?php echo $row['idDependencia']; ?>" ><?php echo $row['idDependencia'].'-'.$row['subdireccion']?>
                        </option><?php } ?>
                  </select>              
            </div>
          </div>
          <div class="form-group">
             <div class="col-sm-12">
              <label for="correo">NIVEL</label>
              <select class="form-control" id="nivel" name="nivel" searchable="Buscar aqui..">
                <option value="">--Selecciona--</option>
                <option value="1">Nivel 1 (Direcciones)</option>
                <option value="2">Nivel 2 (Subdirecciones)</option>
                <option value="3">Nivel 3 (otros departamentos)</option>
              </select>
            </div>
          </div>                                                   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-sm" id="closeBtn" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cerrar</button>
          <button type="submit" class="btn btn-primary btn-sm" id="createBtn"> <i class="fa fa-paper-plane"></i> Guardar</button>
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
        <div class="alert alert-info">
          <strong><i class="glyphicon glyphicon-info-sign"></i></strong>
          Nivel:  Direccion=1, Subdirecciones=2, Otros:3
        </div>          
          <div id="update-messages"></div>
          <div class="edit-content">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="username" class="control-label ">DEPARTAMENTO</label>
                    <input type="text" class="form-control" id="e_depto" name="e_depto" onblur="this.value=this.value.toUpperCase()">
                </div>                 
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="correo">NIVEL</label>
                  <select class="form-control" id="e_nivel" name="e_nivel">
                      <option value="">--Selecciona--</option>
                      <option value="1">Nivel 1 (Direccion)</option>
                      <option value="2">Nivel 2 (Subdirecciones)</option>
                      <option value="3">Nivel 3 (otros departamentos)</option>
                  </select>
                </div>                
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="username" class="control-label">AREA DE ADSCRIPCIÓN:</label>
                  <select class="form-control" id="e_subdi" name="e_subdi" searchable="Buscar aqui..">
                    <option value="">---Selecciona---</option>
                    <?php
                    $dat=$connect->query("SELECT * FROM dependencia");
                      while($row=$dat->fetch_array()){ ?> 
                        <option value="<?php echo $row['idDependencia']; ?>" ><?php echo $row['idDependencia'].'-'.$row['subdireccion']?>
                        </option><?php } ?>
                  </select>
                </div>                
              </div>
            </div>                                                                                               
          </div>             
        </div>
        <div class="modal-footer editFooter">
          <button type="button" class="btn btn-danger" id="closeBtn2" data-loading-text="Espere..." data-dismiss="modal"> <i class="fa fa-times-circle"></i> Cerrar</button>
          <button type="submit" class="btn btn-success" id="editBtn" data-loading-text="Actualizando..." autocomplete="off"> <i class="fa fa-sync-alt"></i> Actualizar</button> 
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
      <p class="text-center" style="display: block;margin:10px;font-size: 10pt">Realmente deseas eliminar?</p>
      </div>
      <div class="modal-footer removeFooter">
        <button type="button" class="btn btn-outline-danger btn-sm"  id="closeBtn3" data-loading-text="Espere..." data-dismiss="modal"> <i class="fa fa-times-circle"></i> Cerrar</button>
        <button type="button" class="btn btn-danger btn-sm" id="removeBtn" data-loading-text="Eliminando..."> <i class="fa fa-trash"></i> Eliminar</button> 
      </div>
    </div>
  </div>
</div>

<!-- REQUIRED SCRIPTS -->
<?php  include '../include/footer.php' ?>
<script src="ajax.js"></script>
</body>
</html>