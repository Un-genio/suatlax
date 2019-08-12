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
		var depto = $("#depto").val();
		var subdi = $("#subdi").val();
		var nivel = $("#nivel").val();
		if(depto == "") {
			$("#depto").after('<p class="text-danger">Este campo es obligatorio</p>');
			$('#depto').closest('.form-group').addClass('has-error');
		} else {
			$("#depto").find('.text-danger').remove();
			$("#depto").closest('.form-group').addClass('has-success');	   	
		}

		if(subdi == "") {
			$("#subdi").after('<p class="text-danger">Este campo es obligatorio</p>');
			$('#subdi').closest('.form-group').addClass('has-error');
		} else {
			$("#subdi").find('.text-danger').remove();
			$("#subdi").closest('.form-group').addClass('has-success');	   	
		}

		if(nivel == "") {
			$("#nivel").after('<p class="text-danger">Este campo es obligatorio</p>');
			$('#nivel').closest('.form-group').addClass('has-error');
		} else {
			$("#nivel").find('.text-danger').remove();
			$("#nivel").closest('.form-group').addClass('has-success');	   	
		}
																				
		if(depto && subdi && nivel) {
			var form = $(this);
			//$('#createBtn').button('loading');
			$('#createBtn').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').addClass('disabled');
			$.ajax({
				url : form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
					//$('#createBtn').button('reset');
					$('#createBtn').html('<i class="fa fa-paper-plane"></i> Guardar').removeClass('disabled');
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
				$('#e_depto').val(response.departamento);
				$('#e_nivel').val(response.nivel);
				$('#e_subdi').val(response.fk_sub);

				$(".editFooter").after('<input type="hidden" name="Id" id="Id" value="'+response.id_depto+'" />');
				$('#editForm').unbind('submit').bind('submit', function() {
					$(".text-danger").remove();		
					var depto = $("#e_depto").val();
					var subdi = $("#e_subdi").val();
					var nivel = $("#e_nivel").val();
					if(depto == "") {
						$("#e_depto").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#e_depto').closest('.form-group').addClass('has-error');
					} else {
						$("#e_depto").find('.text-danger').remove();
						$("#e_depto").closest('.form-group').addClass('has-success');	   	
					}

					if(subdi == "") {
						$("#e_subdi").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#e_subdi').closest('.form-group').addClass('has-error');
					} else {
						$("#e_subdi").find('.text-danger').remove();
						$("#e_subdi").closest('.form-group').addClass('has-success');	   	
					}

					if(nivel == "") {
						$("#e_nivel").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#e_nivel').closest('.form-group').addClass('has-error');
					} else {
						$("#e_nivel").find('.text-danger').remove();
						$("#e_nivel").closest('.form-group').addClass('has-success');	   	
					}																								
					if(depto && subdi && nivel) {
						var form = $(this);
						//$('#editBtn').button('loading');
						//$('#closeBtn2').button('loading');
						$('#editBtn').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').addClass('disabled');
						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {
								//$('#editBtn').button('reset');
								//$('#closeBtn2').button('reset');
								$('#editBtn').html('<i class="fa fa-sync-alt"></i> Actualizar').removeClass('disabled');								
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
			type: 'post',
			data: {Id : Id}, 
			dataType: 'json',
			success:function(response) {
				$('.removeFooter').after('<input type="hidden" name="Id" id="Id" value="'+response.id_depto+'" /> ');
				$('.titulo').text('Eliminar departamento: '+response.departamento);
				$("#removeBtn").unbind('click').bind('click', function() {
					//$('#removeBtn').button('loading');
					//$('#closeBtn3').button('loading');
					$('#removeBtn').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').addClass('disabled');
					$.ajax({
						url: 'delete.php', 
						type: 'POST',
						data: {Id : Id},
						dataType: 'json',
						success:function(response) {
							//$('#removeBtn').button('reset');
							//$('#closeBtn3').button('reset');
							$('#editBtn').html('<i class="fa fa-trash"></i> Eliminar').removeClass('disabled');
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
							} else {

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