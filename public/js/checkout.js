Stripe.setPublishableKey('pk_test_UmHzIoZyLjBwHNVrb1zYJ1yA');



var $form = $('#checkout-form'); 


$form.submit(function(event){


	$('#charge-error').addClass('hidden');

	$form.find('button').prop('disabled',true);

	Stripe.card.createToken({
  	number: $('#card-number').val(),
    cvc: $('#cvc').val(),
    exp_month: $('#month-expire').val(),
    exp_year: $('#year-expire').val(),
    name: $('#card-name').val()
}, stripeResponseHandler);

	return false ; 

});


function stripeResponseHandler(status,response){

	if(response.error){
		$('#charge-error').removeClass('hidden');
		$('#charge-error').text(response.error.message);
		$form.find('button').prop('disabled',false);


	}else {


		   // Get the token ID:
    		var token = response.id;

    		// Insert the token into the form so it gets submitted to the server:
    		$form.append($('<input type="hidden" name="stripeToken" />').val(token));

    		// Submit the form:
    		$form.get(0).submit();


	}

}


