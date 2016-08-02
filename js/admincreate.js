/*
Create Compnay Related JS
*/
$(document).ready(function() { 
		$('#compsub').click(function () {
		$('#suminp').val();
		var $this = $(this);
		$this.text('Saving...');
		$this.attr('disabled', 'true');
		$.ajax({
			method: "POST",
			url: '/admin/ajax/company/create',
			data: {
				name: $('#sapInput').val(),
				descr: $('#descr').summernote('code'),
				fields: JSON.stringify($('#fields').val()),
				mincgpa: $('#mincgpaInput').val(),
				minssc: $('#minsscInput').val(),
				minhsc: $('#minhscInput').val()
			},
			success: function(result) {
				console.log(result);
				$this.removeAttr('disabled');
				$this.text('Create Company');
				$('#alert').removeClass('hide');
				$('#compsform').addClass('hide');
				$('#notify').attr('data-slug', result);
				$alert = $('#linktoregister');
				$alert.attr('href', '/register/'+result);
				var arr = $alert.text().split('/register/');
				$alert.text(arr[0]+'/register/'+result);
			}

		});
	});

	$('#reset').click(function() {
		location.reload();
	});

	$('#notify').click(function() {
		$this = $(this);
		$this.button('loading');
		$.ajax({
			method: "POST",
			url: '/admin/ajax/company/notify',
			data: {
				company: $this.attr('data-slug')
			},
			success: function(result) {
				$this.addClass('hidden');
				$('#notifiedAlert').removeClass('hidden');
			}
		});
	});

});