/*
Edit details Related JS
*/
$(function(){
	$('#sscYearInput').datetimepicker({
		format: "YYYY",
		inline: true,
        useCurrent: false
	});
    $('#hscYearInput').datetimepicker({
    	format: "YYYY",
    	inline: true,
        useCurrent: false //Important! See issue #1075
    });
    // $("#sscYearInput").on("dp.change", function (e) {
    //     $('#hscYearInput').data("DateTimePicker").minDate(e.date);
    // });
    // $("#hscYearInput").on("dp.change", function (e) {
    //     $('#sscYearInput').data("DateTimePicker").maxDate(e.date);
    // });
});

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
		var sscYearc = year_check($('#sscYearInput').val());
		var hscYearc = year_check($('#hscYearInput').val());

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
		if(!sscYearc){
			$('#sscYearInput').parent().addClass('has-error').removeClass('has-success');
		} else {
			$('#sscYearInput').parent().addClass('has-success').removeClass('has-error');
		}
		if(!hscYearc){
			$('#hscYearInput').parent().addClass('has-error').removeClass('has-success');
		} else {
			$('#hscYearInput').parent().addClass('has-success').removeClass('has-error');
		}
		$('#curBacklogInput').parent().addClass('has-success');
		$('#pastBacklogInput').parent().addClass('has-success');
		$('#genderInput').parent().addClass('has-success');
		$('#langInput').parent().addClass('has-success');
		if(emailc && phonec && fnamec && lnamec && sscc && hscc && cgpac && addressc && hscYearc && sscYearc) {
			$editButton.button('loading');
			$.ajax({
				method: "post",
				url: '/user/ajax/edit',
				data: $this.serialize(),
				success: function(result) {
					if($.trim(result) =="reload") {
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