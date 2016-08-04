$(document).ready(function () {
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

	$('#addUserForm').on('submit', function(e) { 
		e.preventDefault();
		var $this = $(this);
		var $addButton = $('#addButton');
		$addButton.button('loading');
		$.ajax({
			method: "post",
			url: '/admin/ajax/users/add',
			data: $this.serialize(),
			success: function(result) { 
				location.reload();
			} 
		});
	});

	$('.reset').click(function() {
		$this = $(this);
		$this.button('loading');
		$.ajax({
			method: "POST",
			url: '/admin/ajax/users/resetpass',
			data: {
				sap: $this.attr('data-sap')
			},
			success: function(result) {
				$this.button('reset');
			}
		});
	});

});