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
		var subdireccion = $("#subdireccion").val();
		if(subdireccion == "") {
			$("#subdireccion").after('<p class="text-danger">Este campo es obligatorio</p>');
			$('#subdireccion').closest('.form-group').addClass('has-error');
		} else {
			$("#subdireccion").find('.text-danger').remove();
			$("#subdireccion").closest('.form-group').addClass('has-success');	   	
		}														
		if(subdireccion) {
			var form = $(this);
			$('#createBtn').button('loading');
			$.ajax({
				url : form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
					$('#createBtn').button('reset');
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
			url: 'dataSelected.php',
			type: 'POST', 
			data: {Id : Id},
			dataType: 'json',
			success:function(response) { 	
				$('.modal-loading').hide();	
				$('.edit-content').show();
				$(".editFooter").show();					
				$('#e_subdireccion').val(response.subdireccion);
				$(".editFooter").after('<input type="hidden" name="Id" id="Id" value="'+response.idDependencia+'" />');
				$('#editForm').unbind('submit').bind('submit', function() {
					$(".text-danger").remove();	
					var  e_subdireccion= $('#e_subdireccion').val();
					var  e_persona= $('#e_persona').val();
					if(e_subdireccion == ""){
						$("#e_subdireccion").after('<p class="text-danger">Este campo es obligatorio</p>');
					} else {
						$("#e_subdireccion").find('.text-danger').remove();  	
					}																							
					if(e_subdireccion) {
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