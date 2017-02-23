$(document).ready(function() {
	$('#queriesAnswerModal').on('show.bs.modal', function(event) {
		var $button = $(event.relatedTarget);
		$this = $(this);
		$this.find('#company').val($button.parent().attr('data-name'));
		$this.find('#updateEditor').val($button.parent().attr('data-querytext'));
		$this.find('#answer').val($button.parent().attr('data-answer'));
		$this.find('#by').val($button.parent().attr('data-by'));
		$this.find('#id').val($button.parent().attr('data'));
		$this.find('#type').val($button.attr('data-type'));
		$this.find('#mail').val($button.parent().attr('data-mail'));
		$this.find('#status').val($button.attr('data-status'));
	});

	$('.mark').click(function() {
		$this = $(this);
		$this.button('loading');
		$.ajax({
			method: "POST",
			url: '/administrator/ajax/query/mark',
			data: {
				id: $this.parent().attr('data')
			},
			success: function(result) {
				location.reload();
			}
		}) 
	});

	$('#queryAnswerForm').on('submit', function(e) {
		e.preventDefault();
		$this = $(this);
		$button = $('#queryAnswer');
		$button.button('loading');
		$.ajax({
			method: "POST", 
			url: '/administrator/ajax/query/answer',
			data: $this.serialize(),
			success: function(result) {
				location.reload();
			}
		});
	});
});