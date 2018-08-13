$('#deps-caret').on('click',function(){

	if($(this).hasClass('fa-caret-up')){

		$(this).removeClass('fa-caret-up');
		$(this).addClass('fa-caret-down');

	}
	else{
		$(this).removeClass('fa-caret-down');
		$(this).addClass('fa-caret-up');

	}
	$('#departments-list').slideToggle();
});

$('.card-header').hover(function(){


	$(this).find('.card-img-top').addClass('dim');
	$(this).find('.buy-button').slideDown();


},function(){

	$(this).find('.card-img-top').removeClass('dim');
	$(this).find('.buy-button').slideUp();
 
});


$('#plus-qty-control').click(function(){



	var quantity = parseInt($('#qty-control').val()) + 1 ; 


	if(quantity > 0){

		$('#qty-status').removeClass('badge-danger');
		$('#qty-status').addClass('badge-success');
		$('#qty-status').text('In Stock');

	}

	if(quantity < 0){

		$('#qty-status').removeClass('badge-success');
		$('#qty-status').addClass('badge-danger');
		$('#qty-status').text('Out of Stock');

	}

	$('#qty-control').val(quantity); 
});

$('#minus-qty-control').click(function(){



	var quantity = parseInt($('#qty-control').val()) - 1 ;

	if(quantity > 0){

		$('#qty-status').removeClass('badge-danger');
		$('#qty-status').addClass('badge-success');
		$('#qty-status').text('In Stock');

	}

	if(quantity <= 0){

		$('#qty-status').removeClass('badge-success');
		$('#qty-status').addClass('badge-danger');
		$('#qty-status').text('Out of Stock');

	}




	if(quantity >= 0 ) $('#qty-control').val(quantity); 
});


