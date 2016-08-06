$(document).ready(function() {
	$('.email-select').select2();

	$('#descr, #mail-editor, .updateEditor').summernote({
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
			method: "POST",
			url: '/admin/ajax/company/closeoropen',
			data: {
				company: $(this).parent().attr('data'),
				status: stat.toLowerCase(),
			},
			success: function (result) {
				console.log(result);
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
});