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
        useCurrent: false
         //Important! See issue #1075
    });
    $('#beYearInput').datetimepicker({
    	format: "YYYY",
    	inline: true,
        useCurrent: false
         //Important! See issue #1075
    });
    $('#beStartYearInput').datetimepicker({
    	format: "YYYY",
    	inline: true,
        useCurrent: false
         //Important! See issue #1075
    });
    $('#dobInput').datetimepicker({
    	format: "DD/MM/YYYY",
    	inline: true,
        useCurrent: false,
        viewMode: 'years' //Important! See issue #1075
    });
    // $("#sscYearInput").on("dp.change", function (e) {
    //     $('#hscYearInput').data("DateTimePicker").minDate(e.date);
    // });
    // $("#hscYearInput").on("dp.change", function (e) {
    //     $('#sscYearInput').data("DateTimePicker").maxDate(e.date);
    // });


});

var validatePersonal = function () {
	var emailc = email_check($('#emailInput').val());
	var phonec = phone_check($('#phoneInput').val());
	var fnamec = name_check($('#fnameInput').val());
	var lnamec = name_check($('#lnameInput').val());
	var mnamec = name_check($('#mnameInput').val());
	var qnamec = name_check($('#qnameInput').val());
	var addressc = name_check($('#addrInput').val());
	var addressac = name_check($('#addrAInput').val());
	var addresscc = name_check($('#addrCInput').val());
	var addresspc = pin_check($('#addrPInput').val());
	var dobc = dob_check($('#dobInput').val());

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
	if(!mnamec){
		$('#mnameInput').parent().addClass('has-error').removeClass('has-success');
	} else {
		$('#mnameInput').parent().addClass('has-success').removeClass('has-error');
	}
	if(!qnamec){
		$('#qnameInput').parent().addClass('has-error').removeClass('has-success');
	} else {
		$('#qnameInput').parent().addClass('has-success').removeClass('has-error');
	}
	if(!addressc){
		$('#addrInput').parent().addClass('has-error').removeClass('has-success');
	} else {
		$('#addrInput').parent().addClass('has-success').removeClass('has-error');
	}
	if(!addressac){
		$('#addrAInput').parent().addClass('has-error').removeClass('has-success');
	} else {
		$('#addrAInput').parent().addClass('has-success').removeClass('has-error');
	}
	if(!addresscc){
		$('#addrCInput').parent().addClass('has-error').removeClass('has-success');
	} else {
		$('#addrCInput').parent().addClass('has-success').removeClass('has-error');
	}
	if(!addresspc){
		$('#addrPInput').parent().addClass('has-error').removeClass('has-success');
	} else {
		$('#addrPInput').parent().addClass('has-success').removeClass('has-error');
	}
	if(!dobc){
		$('#dobInput').parent().addClass('has-error').removeClass('has-success');
	} else {
		$('#dobInput').parent().addClass('has-success').removeClass('has-error');
	}
	$('#genderInput').parent().addClass('has-success');

	return (emailc && phonec && fnamec && lnamec && mnamec && qnamec && addressc && addressac && addresscc && addresspc && dobc);
}

var validateSchool = function () {
	var sscc = percent_check($('#sscInput').val());
	var hscc = percent_check($('#hscInput').val());
	var sscYearc = year_check($('#sscYearInput').val());
	var hscYearc = year_check($('#hscYearInput').val());
	var sscNamec = name_check($('#sscNameInput').val());
	var hscNamec = name_check($('#hscNameInput').val());

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
	if(!sscNamec){
		$('#sscNameInput').parent().addClass('has-error').removeClass('has-success');
	} else {
		$('#sscNameInput').parent().addClass('has-success').removeClass('has-error');
	}
	if(!hscNamec){
		$('#hscNameInput').parent().addClass('has-error').removeClass('has-success');
	} else {
		$('#hscNameInput').parent().addClass('has-success').removeClass('has-error');
	}
	$('#sscBoardInput').parent().addClass('has-success');
	$('#hscBoardInput').parent().addClass('has-success');

	return (sscc && hscc && sscYearc && hscYearc && sscNamec && hscNamec);	
}

var validateCollege = function () {
	var cgpac = point_check($('#cgpaInput').val());
	var beStartYearc = year_check($('#beStartYearInput').val());
	var beYearc = year_check($('#beYearInput').val());
	if(!cgpac){
		$('#cgpaInput').parent().addClass('has-error').removeClass('has-success');
	} else {
		$('#cgpaInput').parent().addClass('has-success').removeClass('has-error');
	}
	if(!beStartYearc){
		$('#beStartYearInput').parent().addClass('has-error').removeClass('has-success');
	} else {
		$('#beStartYearInput').parent().addClass('has-success').removeClass('has-error');
	}
	if(!beYearc){
		$('#beYearInput').parent().addClass('has-error').removeClass('has-success');
	} else {
		$('#beYearInput').parent().addClass('has-success').removeClass('has-error');
	}
	$('#curBacklogInput').parent().addClass('has-success');
	$('#pastBacklogInput').parent().addClass('has-success');
	$('#yeardropInput').parent().addClass('has-success');

	return (cgpac && beStartYearc && beYearc);
}

$(document).ready(function () {

	validateSchool();
	validatePersonal();
	validateCollege();
	
	$('.editNextTab').click(function(){
	  var result = window[$(this).attr('data-validate')]();
	  if(result) {
	  	$('.nav-tabs > .active').next('li').removeClass('disabled');
		$('.nav-tabs > .active').next('li').find('a').attr('data-toggle', 'tab');
	  	$('.nav-tabs > .active').next('li').find('a').trigger('click');
	  	$(window).scrollTop(0);
	  } else {
		$(window).scrollTop(0);
	  }
	});

	$('.editPrevTab').click(function(){
	  	$('.nav-tabs > .active').prev('li').find('a').trigger('click');
	  	$(window).scrollTop(0);
	});

	$('#cgpaInput').on('change blur keyup keypress', function() {
		$('#beperInput').val(getBeper($('#cgpaInput').val()).toFixed(2));
	});

	$('#editForm').on('submit', function(e) {
		e.preventDefault();
		var $this = $(this);
		var $editButton = $('#editButton');
		
		$('#langInput').parent().addClass('has-success');
		if(validateCollege() && validateSchool() && validatePersonal()) {
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

var getBeper = function (cgpa) {
	if(cgpa >= 7) return cgpa*7.4+12;
	return cgpa*7.1+12;
}