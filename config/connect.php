<?php
	date_default_timezone_set('GMT');
	date_default_timezone_set('America/Mexico_City');
	$host="localhost";
	$user="root";
	$pass="";
	$name="suatlaxiaco"; 
	$connect=@new mysqli($host,$user,$pass,$name);
	if ($connect->connect_errno){
		?>
<style type="text/css">
</style>		
		<div class="container">
			<div class='col-md-12'>  
				<h1 class="page-header"></h1>
			</div>

			<div class="row">
				<div class="col-md-4">
					<div class="panel panel-defautl">
						<div class="panel-heading">
						<label class="control-label">SISTEMA</label>
						</div>
						<div class="panel-body"  style="text-align:center;color: red">
							Compatible con mysqli!!!!
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-defautl">
						<div class="panel-heading"> 
						<label class="control-label">INFORMACION DEL SISTEMA</label> 
						</div>
						<div class="panel-body" style="text-align: center;color: red">
							<label class="control-label">---Ha ocurrido un error en la conexion de base de datos---</label>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-defautl">
						<div class="panel-heading">
							<label class="control-label">SOPORTE TECNICO</label>
						</div>
						<div class="panel-body"  style="text-align: center;color: red">
							Contacte con el administrador del sistema
						</div>					
					</div>
				</div>						
			</div>
		</div>		
		<?php
		exit;
	}
?>
