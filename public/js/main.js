
$(document).ready( function ($){
	//Scroll Top
	var gotop = $('a.gotop');
	gotop.on('click', function(e){
		e.preventDefault();
		$("html, body").animate({
			scrollTop: 0,
		}, 400);
	})

	//Delete category confirmation
	var delete_category = $('.delete_category');

	delete_category.on('click', function(e){
		e.preventDefault();
		$('#deleteModal').modal();
		$('#category_id').val($(this).data('category_id'));
	});

	//Select 2 library
	$('#country').select2();

	$('.collapse').collapse({'toggle': false})
});