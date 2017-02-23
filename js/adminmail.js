$(document).ready(function() { 
	$('.email').click(function() {
		$this = $(this);
		$this.button('loading');
		$.ajax({
			method: "POST",
			url: '/administrator/ajax/company/notify',
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
			url: '/administrator/ajax/mail/send',
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
			url: "/administrator/ajax/mail/registered",
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