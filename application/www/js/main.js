$('.products').on('click', function(){
  $('.product').removeClass('hide');
  $('.product').addClass('unhide');
});

$('.users').on('click', function(){
  $('.user').removeClass('hide');
  $('.user').addClass('unhide');
});

$('.contacts').on('click', function(){
  $('.contact').removeClass('hide');
  $('.contact').addClass('unhide');
});


$('.second-list').on('mouseleave', function(){
  $(this).removeClass('unhide');
  $(this).addClass('hide');
});
