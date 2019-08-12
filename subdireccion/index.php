<?php 
require_once '../config/seguridad.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SUA::Subdirecciones</title>
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
            <h1 class="m-0 text-dark">Subdirecciones</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Subdirecciones</li>
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
              <div class="card-body">
          <div  class="table-responsive">
            <table id="datos" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>SUBDIRECCION</th>
                  <th>Acciones</th>
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
<div class="modal fade" id="editDato" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" id="editForm" action="update.php" method="POST">
        <div class="modal-header">
          <h4 class="modal-title"><i class="fa fa-edit"></i> Editar subdireccion</h4>
        </div>
        <div class="modal-body">
          <div id="edit-messages"></div>
          <div class="modal-loading" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
            <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
            <span class="sr-only">Cargando...</span>
          </div>
          <div class="edit-content">
              <div class="form-group">
                <input type="text" class="form-control" id="e_subdireccion" name="e_subdireccion" autocomplete="off" placeholder="Subdireccion" onblur="this.value=this.value.toUpperCase()">             
              </div>                         
          </div>                  
        </div>
        <div class="modal-footer editFooter">
          <button type="button" class="btn btn-default" id="closeEdt" data-loading-text="Espere..." data-dismiss="modal"> <i class="fa fa-times-circle"></i> Cerrar</button>
          <button type="submit" class="btn btn-success" id="editBtn" data-loading-text="Actualizando..." autocomplete="off"> <i class="fa fa-sync-alt"></i> Actualizar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- REQUIRED SCRIPTS -->
<?php  include '../include/footer.php' ?>
<script src="ajax.js"></script>
</body>
</html>


