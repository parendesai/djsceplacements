/*
Login Related JS
*/
$(document).ready(function () {
	$('#loginForm').on('submit', function(e) {
		e.preventDefault();
		var $this = $(this);
		var $loginButton = $('#loginButton');
		$loginButton.button('loading');
		$.ajax({
			method: "post",
			url: '/user/ajax/login',
			data: $this.serialize(),
			success: function(result) {
				console.log(result);
				if(result == "true"){
					location.reload();
				} else {
					$('#alertInvalid').removeClass("hide");
					$("#passwordInput").val('');
					$loginButton.button('reset');
					
				}
			}
		});
	});
});