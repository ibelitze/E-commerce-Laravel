
Stripe.setPublishableKey('pk_test_u0ynWqF62CC7nPoqxeRVfeGU');

$(function() {
  var form = $('#payment-form');

  form.submit(function(event) {

    $('#charge-error').addClass('hidden');
    // Disable the submit button to prevent repeated clicks:
    form.find('#submit').prop('disabled', true);

    // Request a token from Stripe:
    Stripe.card.createToken({
      number: $('#card_number').val(),
      cvc: $('#cvc').val(),
      exp_month: $('#expiry_month').val(),
      exp_year: $('#expiry_year').val()
      }, stripeResponseHandler);

    // Prevent the form from being submitted:
    return false;
  });
});  

//------------------------------------------------------------------------------

  function stripeResponseHandler(status, response) {
    // Grab the form:
    var form = $('#payment-form');

    if (response.error) { // Problem!

      // Show the errors on the form:
      form.find('.payment-errors').text(response.error.message);
      form.find('#submit').prop('disabled', false); // Re-enable submission

    } else { // Token was created!

      // Get the token ID:
      var token = response.id;

      // Insert the token ID into the form so it gets submitted to the server:
      form.append($('<input type="hidden" id="stripeToken" name="stripeToken">').val(token));

      // Submit the form:
      form.submit();
    }

  };
