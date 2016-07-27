$(document).ready(function() {
	$('.email-select').select2();


	$('#descr, #mail-editor').summernote({
		height:200,
		toolbar: [
			['style', ['bold', 'italic', 'underline']],
			['font', ['strikethrough', 'superscript', 'subscript']],
			['para', ['ul', 'ol', 'paragraph']],
			['insert', ['hr','table', 'link']]
		]
	});

	$(".btn-cl").click(function() {
		var $this = $(this);
		var stat = $(this).parent().attr('status')
		$this.attr('disabled', 'true');
		$this.text('Loading...');
		var $label = $this.parent().parent().parent().parent().find('.label');
		$.ajax({
			url: '/admin/ajax/companies/closeoropen',
			data: {
				company: $(this).parent().attr('data'),
				status: stat.toLowerCase(),
			},
			success: function (result) {
				if(stat == "open") { 
					$this.text("Open").addClass('btn-info').removeClass('btn-warning'); 
					$this.parent().attr('status', 'close');
					$label.text('close').addClass('label-danger').removeClass('label-success');
				} else { 
					$this.text("Close").addClass('btn-warning').removeClass('btn-info'); 
					$this.parent().attr('status', 'open');
					$label.text('open').addClass('label-success').removeClass('label-danger');
				}
				$this.removeAttr('disabled');
			}
		});
	});

	$('#delete').click(function() {
		$this = $(this);
		$this.attr('disabled', 'true');
		$this.text('Deleting...');
		$.ajax({
			url:'/admin/ajax/companies/delete',
			data: {
				company: $this.attr('data-company')
			},
			success: function (result) {
				location.reload();
			}
		});
	});

	$('#deleteConfirm').on('show.bs.modal', function(event) {
		var $button = $(event.relatedTarget);
		$this = $(this);
		$this.find('#delete').attr('data-company',$button.parent().attr('data'));
		$this.find('#deleteConfirmLabel').text($button.parent().attr('data-name'));
	});

	$('#generateModal').on('show.bs.modal', function(event) {
		var $button = $(event.relatedTarget).parent();
		$this = $(this);
		$this.find('#generate').attr('data', $button.attr('data'));
		$this.find('#mincgpa').val($button.attr('data-mincgpa'));
		$this.find('#minssc').val($button.attr('data-minssc'));
		$this.find('#minhsc').val($button.attr('data-minhsc'));
		
	});

	$('#generate').click(function() {
			var $this = $(this);
			$this.button('loading');
			$.ajax({
			url: '/admin/ajax/company/generate',
			data: {
				company: $this.attr('data'),
				mincgpa: $('#mincgpa').val(),
				minssc: $('#minssc').val(),
				minhsc: $('#minhsc').val()
			},
			success: function(result){
				$this.button('reset');
				location.href = result;
			}
		});
	});

	$('#editModal').on('show.bs.modal', function(event) {
		var $button = $(event.relatedTarget).parent();
		$this = $(this);
		$this.find('#name').val($button.attr('data-name'));
		$this.find('#slug').val($button.attr('data-slug'));
		$this.find('#descr').summernote('code', $button.attr('data-desc'));
		$.each($.parseJSON($button.attr('data-det')), function(i,e) {
			$('#det option[value="'+e+'"]').prop('selected','true');
		});
		$this.find('#save').attr('data', $button.attr('data'));
		$this.find('#mincgpaInput').val($button.attr('data-mincgpa'));
		$this.find('#minsscInput').val($button.attr('data-minssc'));
		$this.find('#minhscInput').val($button.attr('data-minhsc'));
	});

	$('#save').click(function () {
		var $this = $(this);
		$this.attr('disabled', 'true');
		$this.text('Saving...');
		$.ajax({
			method: "POST",
			url: '/admin/ajax/companies/edit',
			data: {
				id: $this.attr('data'),
				company: $('#slug').val(),
				name: $('#name').val(),
				descr: $('#descr').summernote('code'),
				fields: JSON.stringify($('#det').val()),
				mincgpa: $('#mincgpaInput').val(),
				minssc: $('#minsscInput').val(),
				minhsc: $('#minhscInput').val()
			},
			success: function(result) { 
				location.reload();
			}
		});
	});

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

	$('.admin').click(function() {
		$this = $(this);
		$this.button('loading');
		$.ajax({
			method: "POST",
			url: '/admin/ajax/users/makeadmin',
			data: {
				sap: $this.attr('data-sap')
			},
			success: function(result) {
				location.reload();
			}
		});
	});

	$('.email').click(function() {
		$this = $(this);
		$this.button('loading');
		$.ajax({
			url: '/admin/ajax/company/notify',
			data: {
				company: $this.parent().attr('data-slug')
			},
			success: function(result) {
				$this.button('reset');
			}
		});
	});

	$('#send-mail').click(function() {
		$this = $(this);
		$this.button('loading');
		$.ajax({
			method: "POST",
			url: '/admin/ajax/send/mail',
			data: {
				to: JSON.stringify($('#email-select').val()),
				subject: $('#subject').val(),
				message: $('#descr').summernote('code')
			},
			success: function(result) {
				$this.button('reset');
			}
		})
	});

	$('#mailModal').on('show.bs.modal',function(event){
		var $button = $(event.relatedTarget).parent();
		$this = $(this);
		$this.find('#mailLabel').text($button.attr('data-name'));
		$this.find('#notify-mail').attr('data', $button.attr('data'));
	});

	$('#notify-mail').click(function () {
		$this = $(this);
		$this.button('loading');
		$.ajax({
			method: "POST",
			url: "/admin/ajax/mail/registered",
			data: {
				company: $this.attr('data'),
				subject: $('#mail-subject').val(),
				message: $('#mail-editor').summernote('code')
			},
			success: function(result){
				$this.button('reset');
			}
		})
	});
});