/*
Edit details Related JS
*/
$(document).ready(function () {
	$('#editForm').on('submit', function(e) {
		e.preventDefault();
		var $this = $(this);
		var $editButton = $('#editButton');
		var emailc = email_check($('#emailInput').val());
		var phonec = phone_check($('#phoneInput').val());
		var fnamec = name_check($('#fnameInput').val());
		var lnamec = name_check($('#lnameInput').val());
		var sscc = percent_check($('#sscInput').val());
		var hscc = percent_check($('#hscInput').val());
		var cgpac = point_check($('#cgpaInput').val());
		var addressc = name_check($('#addrInput').val());
		if(!emailc){
			$('#emailInput').parent().addClass('has-error').removeClass('has-success');
		} else {
			$('#emailInput').parent().addClass('has-success').removeClass('has-error');
		}
		if(!phonec){
			$('#phoneInput').parent().addClass('has-error').removeClass('has-success');
		} else {
			$('#phoneInput').parent().addClass('has-success').removeClass('has-error');
		}
		if(!fnamec){
			$('#fnameInput').parent().addClass('has-error').removeClass('has-success');
		} else {
			$('#fnameInput').parent().addClass('has-success').removeClass('has-error');
		}
		if(!lnamec){
			$('#lnameInput').parent().addClass('has-error').removeClass('has-success');
		} else {
			$('#lnameInput').parent().addClass('has-success').removeClass('has-error');
		}
		if(!sscc){
			$('#sscInput').parent().addClass('has-error').removeClass('has-success');
		} else {
			$('#sscInput').parent().addClass('has-success').removeClass('has-error');
		}
		if(!hscc){
			$('#hscInput').parent().addClass('has-error').removeClass('has-success');
		} else {
			$('#hscInput').parent().addClass('has-success').removeClass('has-error');
		}
		if(!cgpac){
			$('#cgpaInput').parent().addClass('has-error').removeClass('has-success');
		} else {
			$('#cgpaInput').parent().addClass('has-success').removeClass('has-error');
		}
		if(!addressc){
			$('#addrInput').parent().addClass('has-error').removeClass('has-success');
		} else {
			$('#addrInput').parent().addClass('has-success').removeClass('has-error');
		}
		if(emailc && phonec && fnamec && lnamec && sscc && hscc && cgpac && addressc) {
			$editButton.button('loading');
			$.ajax({
				method: "post",
				url: '/user/ajax/edit',
				data: $this.serialize(),
				success: function(result) {
					if(result=="reload") {
						location.reload();
					}
					$('#alertComplete').removeClass('hidden');
					$('#alertError').addClass('hidden');
					$editButton.button('reset');
				}
			});
		} else {
			$('#alertError').removeClass('hidden');
		}
	});
});