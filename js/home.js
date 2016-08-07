$(document).ready(function () {
	$('#changeForm').on('submit', function(e) {
		e.preventDefault();
		var $this = $(this);
		var $changeButton = $('#changeButton');
		$changeButton.button('loading');
		$.ajax({
			method: "post",
			url: '/user/ajax/change',
			data: $this.serialize(),
			success: function(result) {
				if($.trim(result) == "true"){
					$('#updateAlert').removeClass('hidden');
					$('#errorAlert').addClass('hidden');
				}
				else{
					$('#updateAlert').addClass('hidden');
					$('#errorAlert').removeClass('hidden');
				}
				$changeButton.button('reset');
			}
		});
	});

	$('#registerForm').on('submit', function(e) {
		e.preventDefault();
		var $this = $(this);
		var $registerButton = $('#registerButton');
		$registerButton.button('loading');
		$.ajax({
			method: "POST",
			url: '/user/ajax/register',
			data: $this.serialize(),
			success: function(result) {
				location.reload();

			}
		});
	});

	$('#queryAddForm').on('submit', function(e) {
		e.preventDefault();
		var $this = $(this);
		var $addButton = $('#queryAdd');
		console.log($('#updateEditor').val());
		if(name_check($('#updateEditor').val())) {
			$('#updateEditor').parent().removeClass('has-error').addClass('has-success');
			$addButton.button('loading');
			$.ajax({
				method: 'POST',
				url: '/user/ajax/query/add',
				data: $this.serialize(),
				success: function(result) {
					location.reload();
				}
			});
		} else {
			$('#updateEditor').parent().addClass('has-error').removeClass('has-success');			
		}
	});
});