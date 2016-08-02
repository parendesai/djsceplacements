/*
Edit Company Related JS 
*/
$(document).ready(function() { 
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
			url: '/admin/ajax/company/edit',
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

});