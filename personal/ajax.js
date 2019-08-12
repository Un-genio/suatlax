var datosTabla;
$(document).ready(function(){
	datosTabla = $("#datos").DataTable({
		'processing':true,
		'ajax': 'list.php',
		'order': [],
		responsive: true,   
	});
	$("#submitForm").unbind('submit').bind('submit', function(){
		$(".text-danger").remove();		
		var rfc = $("#rfc").val();
		var curp = $("#curp").val();
		var nombre = $("#nombre").val();
		var apellidos = $("#apellidos").val();
		var correo = $("#correo").val();
		var grado = $("#grado").val();
		var puesto = $("#puesto").val();
		var depto = $("#depto").val();
		var tipo = $("#tipo").val();
		if(rfc == "") {
			$("#rfc").after('<p class="text-danger">Este campo es obligatorio</p>');
			$('#rfc').closest('.form-group').addClass('has-error');
		} else {
			$("#rfc").find('.text-danger').remove();
			$("#rfc").closest('.form-group').addClass('has-success');	   	
		}
		if(curp == "") {
			$("#curp").after('<p class="text-danger">Este campo es obligatorio</p>');
			$('#curp').closest('.form-group').addClass('has-error');
		} else {
			$("#curp").find('.text-danger').remove();
			$("#curp").closest('.form-group').addClass('has-success');	   	
		}

		if(nombre == "") {
			$("#nombre").after('<p class="text-danger">Este campo es obligatorio</p>');
			$('#nombre').closest('.form-group').addClass('has-error');
		} else {
			$("#nombre").find('.text-danger').remove();
			$("#nombre").closest('.form-group').addClass('has-success');	   	
		}
		if(apellidos == "") {
			$("#apellidos").after('<p class="text-danger">Este campo es obligatorio</p>');
			$('#apellidos').closest('.form-group').addClass('has-error');
		} else {
			$("#apellidos").find('.text-danger').remove();
			$("#apellidos").closest('.form-group').addClass('has-success');	   	
		}
		if(correo == "") {
			$("#correo").after('<p class="text-danger">Este campo es obligatorio</p>');
			$('#correo').closest('.form-group').addClass('has-error');
		} else {
			$("#correo").find('.text-danger').remove();
			$("#correo").closest('.form-group').addClass('has-success');	   	
		}
		if(grado == "") {
			$("#grado").after('<p class="text-danger">Este campo es obligatorio</p>');
			$('#grado').closest('.form-group').addClass('has-error');
		} else {
			$("#grado").find('.text-danger').remove();
			$("#grado").closest('.form-group').addClass('has-success');	   	
		}
		if(puesto == "") {
			$("#puesto").after('<p class="text-danger">Este campo es obligatorio</p>');
			$('#puesto').closest('.form-group').addClass('has-error');
		} else {
			$("#puesto").find('.text-danger').remove();
			$("#puesto").closest('.form-group').addClass('has-success');	   	
		}
		if(depto == "") {
			$("#depto").after('<p class="text-danger">Este campo es obligatorio</p>');
			$('#depto').closest('.form-group').addClass('has-error');
		} else {
			$("#depto").find('.text-danger').remove();
			$("#depto").closest('.form-group').addClass('has-success');	   	
		}
		if(tipo == "") {
			$("#tipo").after('<p class="text-danger">Este campo es obligatorio</p>');
			$('#tipo').closest('.form-group').addClass('has-error');
		} else {
			$("#tipo").find('.text-danger').remove();
			$("#tipo").closest('.form-group').addClass('has-success');	   	
		}																														
		if(rfc && curp && nombre && apellidos && correo && grado && puesto && depto && tipo) {
			var form = $(this);
			$('#createBtn').button('loading');
			$('#closeBtn').button('loading');
			$.ajax({
				url : form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
					$('#createBtn').button('reset');
					$('#closeBtn').button('reset');
					if(response.success == true) {
						datosTabla.ajax.reload(null, false);						
						$("#submitForm")[0].reset();
						$(".text-danger").remove();
						$('.form-group').removeClass('has-error').removeClass('has-success');
						$('#add-messages').html('<div class="alert alert-success">'+
							'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
							'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
							'</div>');
						$(".alert-success").delay(2000).show(10, function() {
							$(this).delay(2000).hide(10, function() {
								$(this).remove();
							});
						});
					}else {
						$('#add-messages').html('<div class="alert alert-warning">'+
							'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
							'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
							'</div>');
						$(".alert-warning").delay(2000).show(10, function() {
							$(this).delay(2000).hide(10, function() {
								$(this).remove();
							});
						});
					}					
				}
			});	
		}
		return false;
	});		
});

function editar(Id= null) {
	if(Id) {
		$('#Id').remove();
		$('.text-danger').remove();
		$("#editForm")[0].reset();	
		$('.form-group').removeClass('has-error').removeClass('has-success');
		$('.modal-loading').show();
		$('.edit-content').hide();
		$(".editFooter").hide();
		$.ajax({
			url: 'dataSelected.php',
			type: 'post', 
			data: {Id : Id},
			dataType: 'json',
			success:function(response) { 
				$('.modal-loading').hide();	
				$('.edit-content').show();
				$(".editFooter").show();				
				$('#e_rfc').val(response.RFC);
				$('#e_curp').val(response.CURP);
				$('#e_nombre').val(response.nombre);
				$("#e_apellidos").val(response.apellidos);
				$("#e_correo").val(response.correo);
				$("#e_grado").val(response.profesion);
				$("#e_puesto").val(response.puestoid);
				$("#e_depto").val(response.deptoid);
				$(".editFooter").after('<input type="hidden" name="Id" id="Id" value="'+response.idPersonal+'" />');
				$('#editForm').unbind('submit').bind('submit', function() {
					$(".text-danger").remove();		
					var rfc = $("#e_rfc").val();
					var curp = $("#e_curp").val();
					var nombre = $("#e_nombre").val();
					var apellidos = $("#e_apellidos").val();
					var correo = $("#e_correo").val();
					var grado = $("#e_grado").val();
					var puesto = $("#e_puesto").val();
					var depto = $("#e_depto").val();
					if(rfc == "") {
						$("#e_rfc").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#e_rfc').closest('.form-group').addClass('has-error');
					} else {
						$("#e_rfc").find('.text-danger').remove();
						$("#e_rfc").closest('.form-group').addClass('has-success');	   	
					}
					if(curp == "") {
						$("#e_curp").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#e_curp').closest('.form-group').addClass('has-error');
					} else {
						$("#e_curp").find('.text-danger').remove();
						$("#e_curp").closest('.form-group').addClass('has-success');	   	
					}

					if(nombre == "") {
						$("#e_nombre").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#e_nombre').closest('.form-group').addClass('has-error');
					} else {
						$("#e_nombre").find('.text-danger').remove();
						$("#e_nombre").closest('.form-group').addClass('has-success');	   	
					}
					if(apellidos == "") {
						$("#e_apellidos").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#e_apellidos').closest('.form-group').addClass('has-error');
					} else {
						$("#e_apellidos").find('.text-danger').remove();
						$("#e_apellidos").closest('.form-group').addClass('has-success');	   	
					}
					if(correo == "") {
						$("#correo").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#correo').closest('.form-group').addClass('has-error');
					} else {
						$("#correo").find('.text-danger').remove();
						$("#correo").closest('.form-group').addClass('has-success');	   	
					}
					if(grado == "") {
						$("#e_grado").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#e_grado').closest('.form-group').addClass('has-error');
					} else {
						$("#e_grado").find('.text-danger').remove();
						$("#e_grado").closest('.form-group').addClass('has-success');	   	
					}
					if(puesto == "") {
						$("#e_puesto").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#e_puesto').closest('.form-group').addClass('has-error');
					} else {
						$("#e_puesto").find('.text-danger').remove();
						$("#e_puesto").closest('.form-group').addClass('has-success');	   	
					}
					if(depto == "") {
						$("#e_depto").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#e_depto').closest('.form-group').addClass('has-error');
					} else {
						$("#e_depto").find('.text-danger').remove();
						$("#e_depto").closest('.form-group').addClass('has-success');	   	
					}																								
					if(rfc && curp && nombre && apellidos && correo && grado && puesto && depto) {
						var form = $(this);
						$('#editBtn').button('loading');
						$('#closeBtn2').button('loading');
						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {
								$('#editBtn').button('reset');
								$('#closeBtn2').button('reset');								
								if(response.success == true) {
									datosTabla.ajax.reload(null, false);								  	  										
									$(".text-danger").remove();
									$('#update-messages').html('<div class="alert alert-success">'+
										'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
										'<strong><i class="fa fa-check"></i></strong> '+ response.messages +
										'</div>');

									$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									});						
								}
							}
						});												
					}
					return false;
				});
			}
		});
	} else {
		alert('error!! Refresh the page again');
	}
}
function eliminar(Id = null) {
	if(Id) {
		$('#Id').remove();
		$.ajax({
			url: 'dataSelected.php',
			type: 'POST',
			data: {Id : Id}, 
			dataType: 'json',
			success:function(response) {
				$('.removeFooter').after('<input type="hidden" name="Id" id="Id" value="'+response.idPersonal+'" /> ');
				$('.titulo').text('Eliminar personal: '+response.nombre+' '+response.apellidos );
				$("#removeBtn").unbind('click').bind('click', function() {
					$('#removeBtn').button('loading');
					$('#closeBtn3').button('loading');
					$.ajax({
						url: 'delete.php', 
						type: 'POST',
						data: {Id : Id},
						dataType: 'json',
						success:function(response) {
							$('#removeBtn').button('reset');
							$('#closeBtn3').button('reset');
							if(response.success == true) {
								$('#removeData').modal('hide');
								datosTabla.ajax.reload(null, false);
								$('.remove-messages').html('<div class="alert alert-danger">'+
									'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
									'<strong><i class="fa fa-check"></i></strong> '+ response.messages+
									'  '+ response.retorno+'</div>');
								$(".alert-danger").delay(2000).show(10, function() {
										$(this).delay(2000).hide(10, function() {
											$(this).remove();
										});
									});
							} else if(response.success == false) {
								$('.otro-messages').html('<div class="alert alert-warning">'+
									'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
									'<strong><i class="fa fa-check"></i></strong> '+ response.messages+'</div>');
								$(".alert-warning").delay(2000).show(10, function() {
										$(this).delay(2000).hide(10, function() {
											$(this).remove();
										});
									});
							}
						}
					});
				});
			}
		});
		$('.removeFooter').after();
	} else {
		alert('error!! Refresh the page again');
	}
}