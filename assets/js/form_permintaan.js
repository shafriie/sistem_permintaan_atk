$('document').ready(function(){
	
	$('body').on('click', '.btn-edit-data', function(event) {
		event.preventDefault();
		var id = this.id;
		$('#modal-form input[name="action"]').val('update');
		$.ajax({
			url: siteUrl + 'karyawan/edit',
			type: 'POST',
			dataType: 'JSON',
			data: {id: id},
		})
		.done(function(response) {
			$('#modal-form').modal('show');
			$('#modal-form input:eq(1)').attr('readonly', true);	
			$.each(response, function(index, val) {
				 $('input[name="'+index+'"], select[name="'+index+'"], textarea[name="'+index+'"]').val(val);
			});
		});
	});

	var numberS = 1;
	$('body').on('click', '.btn-add-form', function(event) {
		event.preventDefault();
		var num = numberS++;
		var table = '<tr id="rows_data'+num+'">' + 
						'<td>'+ num + '. ' + '</td>' + 
						'<td><select onchange="get_data_atk('+num+')" id="kode_atk' + num + '" name="kode_atk[' + num + ']" class="form-control"></select></td>' + 
						'<td><input type="text" id="nama_atk'+num+'" name="nama_atk['+num+']" class="form-control" readonly></td>' + 
						'<td><input type="text" class="form-control" readonly id="sisa_stok'+num+'" name="sisa_stok['+num+']"></td>' + 
						'<td><input type="number" class="form-control" name="stok_request['+num+']" id="stok_request'+num+'"></td>' + 
						'<td><input type="text" readonly name="satuan['+num+']" id="satuan'+num+'" class="form-control"></td>' + 
						'<td><button type="button" onclick="remove_rows('+num+')" class="btn btn-primary btn-xs"><i class="fa fa-trash"></i></button></td>' +
					'</tr>';
		load_kode_atk(num);
		$('#table-detail tbody').append(table);
	});

	get_data_atk = function(num){
		var kode_atk = $('#kode_atk'+num).val();
		$.ajax({
			url: siteUrl + 'permintaan/get_detail_atk',
			type: 'POST',
			dataType: 'JSON',
			data: {kode_atk: kode_atk},
		})
		.done(function(res) {
			console.log(res);
			$('#nama_atk'+num).val('');
			$('#sisa_stok'+num).val('');
			$('#satuan'+num).val('');
			
			$('#nama_atk'+num).val(res.nama_atk);
			$('#sisa_stok'+num).val(res.stok);
			$('#satuan'+num).val(res.satuan);
		});
	}

	remove_rows = function(num){
		if (confirm('apakah anda ingin menghapus baris?')){
			$('#rows_data'+num).remove();
		}
	}

	load_kode_atk = function(num){
		$.ajax({
			url: siteUrl + 'permintaan/get_data_atk',
			type: 'POST',
			dataType: 'JSON',
		})
		.done(function(a) {
			$('#kode_atk'+num).html('');
			var option = '<option value="">-- Pilih --</option>';
			$('#kode_atk'+num).append(option);
			$.each(a, function(index, val) {
				 var option2 = '<option value="'+val.kode_atk+'">'+val.kode_atk+'</option>';
				 $('#kode_atk'+num).append(option2);
			});
		});
	}

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
			url: siteUrl + 'karyawan/delete',
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
			url: siteUrl + 'karyawan/submit',
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