'use strict';

let basket = new Basket();


//////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////NAV///////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////

$('.products').on('click', function(){
  $('.product').toggleClass('hide');
});

$('.users').on('click', function(){
  $('.user').toggleClass('hide');
});

$('.contacts').on('click', function(){
  $('.contact').toggleClass('hide');
});

$('.contacts').on('click', function() {
  $('.contacts li').css('position','relative');
  $('.contacts li').css('animation-duration','500ms');
  $('.contacts li').css('animation-name','bounce');
  $('.contacts li').css('animation-direction','alternate');
});

$('.add i').on('click', function(){
  $('.add-element').toggleClass('move');
});

$('.passage').on('click', function(){
  $('#passagePopUp').removeClass('hide');
});

$('.annule').on('click', function(){
  $('#passagePopUp').addClass('hide');
});

$('#burger-button').on('click', function() {
	$('.nav-column').toggleClass('move-aside');
	console.log('ok');
});

//////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////BASKET/////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////

if(window.location.href.indexOf('/products') !== -1) {

  $('.addToBasket').on('click', function(event) {
    event.preventDefault();
    let id = $(this).data('id');
    let name = $(this).data('name');
    let quantity = $('#product-'+id).val();
    let price = $(this).data('price');

    if(isNaN(quantity) || quantity == '' || quantity <= 0) {
      $('#errorPopUp').removeClass('hide');
      $('#product-'+id).val('');
    }  else {
      basket.addToBasket(id, name, quantity, price);
      $('#productPopUp').removeClass('hide');
      $('#elementNumber').text(quantity);
      $('#product-'+id).val('');
    }
  });

  $('.closePopUp').on('click', function(event) {
    $('#productPopUp').addClass('hide');
    $('#errorPopUp').addClass('hide');
  });


}

if(window.location.href.indexOf('/basket') != -1) {
  basket.displayCompleteBasket();
  $(document).on('click', '.trash', function(event) {
    event.preventDefault();
    let id = $(this).data('index');
    basket.removeToBasket(id);
  })

}
if (window.location.href.indexOf('/payment') != -1) {
  basket.loadBasketInInput('#orders');
}
if (window.location.href.indexOf('/success') != -1) {
  basket.removeCompleteBasket();
}
