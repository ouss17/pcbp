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


  $('.contacts').on('click', function() {
    $('.contacts li').css('position','relative');
    $('.contacts li').css('animation-duration','500ms');
    $('.contacts li').css('animation-name','bounce');
    $('.contacts li').css('animation-direction','alternate');
    $('.contacts li').css('animation-iteration-count','1');
  });
