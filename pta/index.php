<?php 
require_once '../config/seguridad.php';
$res1=$connect->query("SELECT * FROM objetivo");
$res3=$connect->query("SELECT * FROM proyecto");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Dashboard 3</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
              <li class="breadcrumb-item active">Catalogo</li>
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <table id="datos" class="table table-bordered" cellspacing="0" width="100%">
                        <thead class="black white-text">
                            <tr>
                                <th>Objetivos (6)</th>
                                <th>Programas (9)</th>
                                <th>Proyectos (42)</th>
                            </tr>
                        </thead>
                        <tbody style="border-spacing: 5px;">
                            <tr>
                                <td rowspan="8">1. FORTALECER LA CALIDAD DE LOS SERVICIOS EDUCATIVOS.</td>
                                <td rowspan="3">1. FORTALECIMIENTO DEL DESARROLLO PROFESIONAL DOCENTE.</td>
                                <td>1. PROYECTO DE IMPULSO AL DESARROLLO DEL PROFESORADO</td>
                            </tr>
                            <tr>
                                <td>2. PROYECTO DE FORMACIÓN DOCENTE.</td>
                            </tr>
                            <tr>
                                <td>3. PROYECTO DE ACTUALIZACIÓN PROFESIONAL.</td>
                            </tr>
                            <tr>
                                <td rowspan="3">2. FORTALECIMIENTO DE LA CALIDAD EDUCATIVA. </td>
                                <td>4. PROYECTO DE DISEÑO E INNOVACIÓN CURRICULAR PARA LA FORMACIÓN Y DESARROLLO DE COMPETENCIAS PROFESIONALES</td>
                            </tr>
                            <tr>
                                <td>5. PROYECTO DE EVALUACIÓN Y ACREDITACIÓN DE LOS PLANES Y PROGRAMAS DE LICENCIATURA</td>
                            </tr>
                            <tr> 
                                <td>6. PROYECTO DE IMPULSO AL POSGRADO</td>
                            </tr>
                            <tr>
                                <td rowspan="2">3. APROVECHAMIENTO DE LAS TIC EN EL PROCESO EDUCATIVO. </td>
                                <td>7. DISEÑO, ACTUALIZACIÓN Y PRODUCCIÓN DE MATERIAL EDUCATIVO Y RECURSOS DIGITALES</td>
                            </tr>
                            <tr>
                                <td>8. MEJORAR LA CONECTIVIDAD A INTERNET DE LOS TECNOLÓGICOS Y CENTRO DEL TECNM.</td>
                            </tr>
                            <tr>
                                <td rowspan="7">2. INCREMENTAR LA COBERTURA, PROMOVER LA INCLUSIÓN Y LA EQUIDAD EDUCATIVA.</td> 
                                <td rowspan="7">4. COBERTURA, PERMANENCIA Y EQUIDAD EDUCATIVA. </td>
                                <td>9. AMPLIACIÓN DE LA OFERTA EDUCATIVA </td>
                            </tr>
                            <tr>
                                <td>10. FORTALECIMIENTO DE LA INFRAESTRUCTURA EDUCATIVA, CIENTÍFICA Y TECNOLÓGICA</td>
                            </tr>
                            <tr>
                                <td>11. PROYECTO INSTITUCIONAL DE ACOMPAÑAMIENTO Y TUTORÍA A ESTUDIANTES</td>
                            </tr>
                            <tr>
                                <td>12. PROYECTO DE BECAS PARA LA PERMANENCIA ESTUDIANTIL</td>
                            </tr>
                            <tr>
                                <td>13. PROYECTO DE DIFUSIÓN DE LA OFERTA EDUCATIVA.</td>
                            </tr>
                            <tr>
                                <td>14. 1000 JÓVENES EN LA CIENCIA </td>
                            </tr>
                            <tr>
                                <td>15. PROYECTO DE INCLUSIÓN EN LA ATENCIÓN A ESTUDIANTES Y GRUPOS VULNERABLES</td>
                            </tr>
                            <tr>
                                <td rowspan="8">3. FORTALECER LA FORMACIÓN INTEGRAL DE LOS ESTUDIANTES.</td>
                                <td rowspan="8">5. PROGRAMA DE FORMACIÓN INTEGRAL. </td>
                                <td>16. DEPORTE PARA LA EXCELENCIA.</td> 
                            </tr>
                            <tr>
                                <td>17. CULTIVANDO ARTE</td>
                            </tr>
                            <tr>
                                <td>18. PROYECTO DE FORMACIÓN CÍVICA.</td>
                            </tr>
                            <tr>
                                <td>19. PROYECTO DE FOMENTO A LA LECTURA</td>
                            </tr>
                            <tr>
                                <td>20. PROYECTO DE ORIENTACIÓN Y PREVENCIÓN</td>
                            </tr> 
                            <tr>
                                <td>21. PROYECTO DE PROTECCIÓN CIVIL</td>
                            </tr>
                            <tr>
                                <td>22. PROYECTO SEGURIDAD Y CUIDADO DEL MEDIO AMBIENTE </td>
                            </tr>
                            <tr>
                                <td>23. PROYECTO DE PROMOCIÓN AL RESPETO DE LOS DERECHOS HUMANOS</td>
                            </tr>                           
                            <tr>
                                <td rowspan="6">4. IMPULSAR LA CIENCIA, LA TECNOLOGIA Y LA INNOVACIÓN.</td>
                                <td rowspan="6">6. IMPULSO A LA INVESTIGACIÓN CIENTÍFICA Y DESARROLLO TECNOLÓGICO.</td>
                                <td>24. FORTALECIMIENTO DE LAS VOCACIONES PRODUCTIVAS DE LAS REGIONES</td>
                            </tr>
                            <tr>
                                <td>25. EVENTOS ACADÉMICOS</td>
                            </tr>
                            <tr>
                                <td>26. FORMACIÓN DE JÓVENES INVESTIGADORES</td>
                            </tr>
                            <tr>
                                <td>27. IMPULSO A LA INCORPORACIÓN Y PERMANENCIA EN EL SISTEMA NACIONAL DE INVESTIGADORES </td>
                            </tr>
                            <tr>
                                <td>28. PROYECTO DE DIFUSIÓN DE LA CIENCIA Y TECNOLOGÍA</td>
                            </tr>
                            <tr>
                                <td>29. FOMENTO A LA PRODUCCIÓN CIENTÍFICA, TECNOLÓGICA Y DE INNOVACIÓN</td>
                            </tr>
                            <tr>
                                <td rowspan="7">5. FORTALECER LA VINCULACIÓN CON LOS SECTORES PÚBLICO, SOCIAL Y PRIVADO.</td>
                                <td rowspan="5">
                                    7. VINCULACIÓN PARA LA INNOVACIÓN E INTERNACIONALIZACIÓN.  
                                </td>
                                <td>30. TECNOLÓGICO EMPRENDEDOR E INNOVADOR</td>
                            </tr>
                            <tr>
                                <td>31. FORMACIÓN DUAL</td>
                            </tr>
                            <tr>
                                <td>32. CERTIFICACIÓN DE COMPETENCIAS LABORALES Y PROFESIONALES DE ESTUDIANTES</td>
                            </tr>
                            <tr>
                                <td>33. COOPERACIÓN E INTERNACIONALIZACIÓN </td>
                            </tr>
                            <tr>
                                <td>34. VINCULACIÓN EMPRESARIAL.</td>
                            </tr>
                            <tr>
                                <td rowspan="2">8. EDUCACIÓN PARA LA VIDA BILINGUE</td>
                                <td>35. EDUCACIÓN CONTINUA</td>
                            </tr>
                            <tr>
                                <td>36. TECNOLÓGICO NACIONAL DE MÉXICO BILINGUE</td>
                            </tr>
                            <tr>
                                <td rowspan="7">6. MODERNIZAR LA GESTIÓN INSTITUCIONAL, FORTALECER LA TRANSPARENCIA Y LA RENDICIÓN DE CUENTAS</td>
                                <td rowspan="7">
                                    9. GESTIÓN INSTITUCIONAL.
                                </td>
                                <td>37. CERTIFICACIÓN DE SISTEMAS DE GESTIÓN Y RESPONSABILIDAD SOCIAL.</td>
                            </tr>
                            <tr>
                                <td>38. CAPACITACIÓN Y DESARROLLO DE PERSONAL DIRECTIVO Y DE APOYO Y ASISTENCIA A LA EDUCACIÓN.</td>
                            </tr>
                            <tr>
                                <td>39. REGULARIZACIÓN DE PREDIOS.</td>
                            </tr>
                            <tr>
                                <td>40. PROYECTO DE SISTEMA DE INFORMACIÓN ACTUALIZADO</td>
                            </tr>
                            <tr>
                                <td>41. TRANSPARENCIA, RENDICIÓN DE CUENTAS Y ACCESO A LA INFORMACIÓN.</td>
                            </tr>
                            <tr>
                                <td>42. LEVANTAMIENTO DE INVENTARIOS </td>
                            </tr>                            
                        </tbody>
                    </table>
                </div>
                </div>                
            </div>
        </div>
        <!-- /.row -->
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

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="../dist/js/adminlte.js"></script>
</body>
</html>