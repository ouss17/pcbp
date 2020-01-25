'use strict';

//////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////SLIDER///////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////

let slideCount = $('#slider ul li').length;
let slideWidth = $('#slider ul li').width();
let slideHeight = $('#slider ul li').height();
let sliderUlWidth = slideCount * slideWidth;

$('#slider').css({ width: slideWidth, height: slideHeight });

$('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });

$('#slider ul li:last-child').prependTo('#slider ul');

function moveRight() {
  $('#slider ul').animate({
    left: - slideWidth
  }, 200, function () {
    $('#slider ul li:first-child').appendTo('#slider ul');
    $('#slider ul').css('left', '');
  });
};
function play(){
  setInterval(moveRight, 6000);};
  play();
