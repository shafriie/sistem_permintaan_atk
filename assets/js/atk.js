$('document').ready(function(){
	
	$('body').on('click', '.btn-edit-data', function(event) {
		event.preventDefault();
		var id = this.id;
		$('#modal-form input[name="action"]').val('update');
		$.ajax({
			url: siteUrl + 'atk/edit',
			type: 'POST',
			dataType: 'JSON',
			data: {id: id},
		})
		.done(function(response) {
			$('#modal-form').modal('show');
			$('#modal-form input:eq(1)').attr('readonly', true);	
			$.each(response, function(index, val) {
				 $('input[name="'+index+'"]').val(val);
			});
		});
	});

	$('body').on('click', '.btn-add-form', function(event) {
		event.preventDefault();
		$('#modal-form input[name="action"]').val('insert');
		$('#modal-form').modal('show');
		$('#modal-form input').not('input[name="action"]').val('');
		$('#modal-form input:eq(1)').attr('readonly', false);
	});

	$('body').on('click', '.btn-delete-data', function(event) {
		event.preventDefault();
		var id = this.id;
		$('.modal').modal('hide');
		$('#modal-delete').modal('show');
		$('#modal-delete .btn-yes-delete').removeAttr('id');
		$('#modal-delete .btn-yes-delete').attr('id', id);
	});

	$('body').on('click', '.btn-yes-delete', function(event) {
		event.preventDefault();
		var id = this.id;
		$.ajax({
			url: siteUrl + 'atk/delete',
			type: 'POST',
			dataType: 'JSON',
			data: {id: id},
		})
		.done(function(response) {
			console.log(response);
			if (response.status){
				swal({
					type: 'success',
	                title: 'Good',
	                text: response.msg,
	                timer: 2000,
	                showConfirmButton: false
	            }).then(
	                function () {
	                	location.reload();
	                },
	                // handling the promise rejection
	                function (dismiss) {
	                    if (dismiss === 'timer') {
	                        console.log('I was closed by the timer')
	                    }
	            });
			}
			else
			{
				swal({
					type: 'error',
	                title: 'Error',
	                text: 'Maybe server down!',
	                timer: 2000,
	                showConfirmButton: false
	            }).then(
	                function () {
	                	location.reload();
	                },
	                // handling the promise rejection
	                function (dismiss) {
	                    if (dismiss === 'timer') {
	                        console.log('I was closed by the timer')
	                    }
	            });
			}
		});
	});

	$('body').on('submit', '#form-atk', function(event) {
		event.preventDefault();
		$('.btn-submit-form').html('<i class="fa fa-circle-o-notch fa-spin"></i> Please Wait...');
		$('.btn-submit-form').attr('disabled', true);
		$.ajax({
			url: siteUrl + 'atk/submit',
			type: 'POST',
			dataType: 'JSON',
			data: $(this).serialize(),
		})
		.done(function(respond) {
			console.log(respond);
			if (respond.status){
				$('.btn-submit-form').html('Save');
				$('.btn-submit-form').attr('disabled', false);
				$('.modal').modal('hide');
				swal({
					type: 'success',
	                title: 'Good',
	                text: respond.msg,
	                timer: 2000,
	                showConfirmButton: false
	            }).then(
	                function () {
	                	location.reload();
	                },
	                // handling the promise rejection
	                function (dismiss) {
	                    if (dismiss === 'timer') {
	                        console.log('I was closed by the timer')
	                    }
	            });
	        }
			else
			{
				$('.btn-submit-form').html('Save');
				$('.btn-submit-form').attr('disabled', false);
				swal({
                    type: 'error',
                    title: 'Oops...',
                    html:respond.msg,
                });
			}
		});
		
	});

	$('.data-table-export').DataTable({
		scrollCollapse: true,
		autoWidth: false,
		responsive: true,
		columnDefs: [{
			targets: "datatable-nosort",
			orderable: false,
		}],
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		"language": {
			"info": "_START_-_END_ of _TOTAL_ entries",
			searchPlaceholder: "Search"
		},
		dom: 'Bfrtip',
		buttons: [
		'copy', 'csv', 'pdf', 'print'
		]
	});
});