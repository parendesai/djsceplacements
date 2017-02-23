$(document).ready(function () {
	$('#loginpopover').popover({
		html:true,  
		content: function() {
      		return $("#popover-content").html();
	    }
	});
	$('[data-toggle="popover"]').popover({html:true, container:'body'});

	$('.select2').select2();

	$('.descr').summernote({
		height:400,
		toolbar: [
			['style', ['bold', 'italic', 'underline']],
			['font', ['strikethrough', 'superscript', 'subscript']],
			['para', ['ul', 'ol', 'paragraph']],
			['insert', ['hr','table', 'link']]
		]
	});

	$('#addBlog').click( function () {
		$.ajax({
			method: "POST",
			url: "/experiences/ajax/add",
			data: {
				company: $('.select2').val(),
				blog: $('.descr').summernote('code'),
				user: $('#sap').val(),
				title: $('#title').val()
			}, 
			success: function(result) {
				location.href = $.trim(result);
			}
		})
	});
});