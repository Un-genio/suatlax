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
		var puesto = $("#puesto").val();
		if(puesto == "") {
			$("#puesto").after('<p class="text-danger">Este campo es obligatorio</p>');
			$('#puesto').closest('.form-group').addClass('has-error');
		} else {
			$("#puesto").find('.text-danger').remove();
			$("#puesto").closest('.form-group').addClass('has-success');	   	
		}														
		if(puesto) {
			var form = $(this);
			//$('#createBtn').button('loading');
			$('#createBtn').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').addClass('disabled');
			$.ajax({
				url : form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
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
						$(".alert-success").delay(1000).show(10, function() {
							$(this).delay(1000).hide(10, function() {
								$(this).remove();
							});
						});
					}else{
						$('#add-messages').html('<div class="alert alert-warning">'+
							'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
							'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
							'</div>');
						$(".alert-warning").delay(1000).show(10, function() {
							$(this).delay(1000).hide(10, function() {
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
			url: 'idDato.php',
			type: 'POST', 
			data: {op:1,Id : Id},
			success:function(response) { 	
				$('.modal-loading').hide();	
				$('.edit-content').show();
				$(".editFooter").show();					
				$('.edit-content').html(response);
				$('#editForm').unbind('submit').bind('submit', function() {
					$(".text-danger").remove();
					///alert('hOLA hOLA');		
					var  e_puesto= $('#e_puesto').val();
					if(e_puesto == ""){
						$("#e_puesto").after('<p class="text-danger">Este campo es obligatorio</p>');
					} else {
						$("#e_puesto").find('.text-danger').remove();  	
					}																							
					if(e_puesto) {
						var form = $(this);
						//$('#editBtn').button('loading');
						//$('#closeEdt').button('loading');
						$('#editBtn').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').addClass('disabled');
						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {
								//$('#editBtn').button('reset');
								//$('#closeEdt').button('reset');
								$('#editBtn').html('<i class="fa fa-sync-alt"></i> Actualizar').removeClass('disabled');								
								if(response.success == true) {
									datosTabla.ajax.reload(null, false);								  	  										
									$(".text-danger").remove();
									$('#edit-messages').html('<div class="alert alert-success">'+
										'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
										'<strong><i class="fa fa-check"></i></strong> '+ response.messages +
										'</div>');

									$(".alert-success").delay(1000).show(10, function() {
										$(this).delay(1000).hide(10, function() {
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

function remove(Id = null) {
	if(Id) {
		$('#Id').remove();
		$.ajax({
			url: 'idDato.php',
			type: 'post',
			data: {op:2,Id : Id}, 
			success:function(response) {
				//$('.removeFooter').after('<input type="hidden" name="Id" id="Id" value="'+response.idPuesto+'" /> ');
				$('.titulo').html(response);
				$("#removeBtn").unbind('click').bind('click', function() {
					//$('#removeBtn').button('loading');
					//$('#closeDel').button('loading');
					$('#removeBtn').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').addClass('disabled');					
					$.ajax({
						url: 'delete.php', 
						type: 'POST',
						data: {Id : Id},
						dataType: 'json',
						success:function(response) {
							//$('#removeBtn').button('reset');
							//$('#closeDel').button('reset');
							$('#editBtn').html('<i class="fa fa-trash"></i> Eliminar').removeClass('disabled');															
							if(response.success == true) {
								$('#removeData').modal('hide');
								datosTabla.ajax.reload(null, false);
								$('.remove-messages').html('<div class="alert alert-danger">'+
									'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
									'<strong><i class="fa fa-check"></i></strong> '+ response.messages+
									' y '+ response.retorno+'</div>');
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