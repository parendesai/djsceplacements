$(document).ready(function() {
	$('.approve').click(function() {
		$this = $(this);
		$this.button('loading');
		$.ajax({
			method: "POST",
			url: "/admin/ajax/blog/approve",
			data: {
				id: $this.attr('data-id')
			},
			success: function(result) {
				$this.parent().remove();
				$('#blog-count').text($('#blog-count').text()-1);
			}
		})
	});

	$('.disapprove').click(function() {
		$this = $(this);
		$this.button('loading');
		$.ajax({
			method: "POST",
			url: "/admin/ajax/blog/disapprove",
			data: {
				id: $this.attr('data-id')
			},
			success: function(result) {
				$this.parent().remove();
				$('#blog-count').text($('#blog-count').text()-1);
			}
		})
	});
});