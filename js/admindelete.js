$(document).ready(function() { 
	$('#delete').click(function() {
		$this = $(this);
		$this.attr('disabled', 'true');
		$this.text('Deleting...');
		$.ajax({
			method: "POST",
			url:'/admin/ajax/company/delete',
			data: {
				company: $this.attr('data-company')
			},
			success: function (result) {
				location.reload();
			}
		});
	});

	$('#deleteUpdate').click(function() {
		$this = $(this);
		$this.button('loading');
		$.ajax({
			method: "POST",
			url:'/admin/ajax/update/delete',
			data: {
				updateid: $this.attr('data-company')
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
		$this.find('#deleteUpdate').attr('data-company',$button.parent().attr('data'));
		$this.find('#deleteConfirmLabel').text($button.parent().attr('data-name'));
	});
});