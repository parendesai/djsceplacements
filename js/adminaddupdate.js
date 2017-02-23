$(document).ready(function() { 
	$('#updateModal').on('show.bs.modal', function(event) {
		var $button = $(event.relatedTarget).parent();
		$this = $(this);
		$this.find('#compInput').val($button.attr('data-name'));
		$this.find('#updateAdd').attr('data', $button.attr('data'));
	});
	$('#updateEditModal').on('show.bs.modal', function(event) {
		var $button = $(event.relatedTarget).parent();
		$this = $(this);
		$this.find('#compEditInput').val($button.attr('data-name'));
		$this.find('#updateEdit').attr('data', $button.attr('data'));
		$this.find('#updateEditEditor').summernote('code', $button.attr('data-updts'));
	});

	$('#updateAdd').click(function() {
		$this = $(this);
		$this.button('loading');
		$.ajax({
			method: "POST",
			url: '/administrator/ajax/update/add',
			data: {
				company: $this.attr('data'),
				descr: $('#updateEditor').summernote('code') 
			},
			success: function(result) {
				$this.button('reset');
				$('#updateEditor').summernote('reset');
				$('#updateAddedAlert').removeClass('hidden');
			}
		});
	});

	$('#updateEdit').click(function() {
		$this = $(this);
		$this.button('loading');
		$.ajax({
			method: "POST",
			url: '/administrator/ajax/update/edit',
			data: {
				id: $this.attr('data'),
				descr: $('#updateEditEditor').summernote('code') 
			},
			success: function(result) {
				location.reload();
			}
		});
	});
});