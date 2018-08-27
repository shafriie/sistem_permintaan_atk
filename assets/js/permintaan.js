$('document').ready(function(){
	
	$('body').on('click', '.btn-edit-data', function(event) {
		event.preventDefault();
		var id = this.id;
		$.ajax({
			url: siteUrl + 'permintaan/edit',
			type: 'POST',
			dataType: 'JSON',
			data: {id: id},
		})
		.done(function(response) {
			console.log(response);
			$('.modal').modal('hide');
			$('#modal-form').modal('show');
			$.each(response, function(index, val) {
				 $('input[name="'+index+'"], select[name="'+index+'"]').val(val);
			});
		});
	});

	$('body').on('submit', '#form-data', function(event) {
		event.preventDefault();
		$.ajax({
			url: siteUrl + 'permintaan/change_status',
			type: 'POST',
			dataType: 'JSON',
			data: $(this).serialize(),
		})
		.done(function(response) {
			console.log(response);
			if (response.status){
				$('.modal').modal('hide');
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
	                text: "Failed! Maybe server down",
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