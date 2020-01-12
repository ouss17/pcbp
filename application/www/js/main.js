$('.products').on('click', function(){
  $('.product').removeClass('hide');
});

$('.users').on('click', function(){
  $('.user').removeClass('hide');
});

$('.contacts').on('click', function(){
  $('.contact').removeClass('hide');
});


$('.second-list').on('mouseleave', function(){
  $(this).addClass('hide');
});
