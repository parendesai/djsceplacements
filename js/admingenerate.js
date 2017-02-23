/*
Generate XLS related JS
*/
$(document).ready(function() { 
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
			method: "POST",
			url: '/administrator/ajax/company/generate',
			data: {
				company: $this.attr('data'),
				mincgpa: $('#mincgpa').val(),
				minssc: $('#minssc').val(),
				minhsc: $('#minhsc').val()
			},
			success: function(result){
				$this.button('reset');
				location.href = $.trim(result);
			}
		});
	});
});