$('.tickets-form__select').select2();

function blocks_visible_controller(){
  if ($('.ticket-messages').hasClass('ticket-messages_show')){
    $('.main-form').addClass('main-form_hide');
    if( !$('.main-form').hasClass('main-form_visible')){
      $('.tickets-header').addClass('main-form_hide');
    }
    $('.th1').addClass('header-wrapper_hide');
    $('.th2').removeClass('header-wrapper_hide');
  }
  else{
    doc_w = $(document).width();
    $('.main-form').removeClass('main-form_hide');
    if( !$('.main-form').hasClass('main-form_visible')){
      $('.tickets-header').removeClass('main-form_hide');
    }
    $('.th1').removeClass('header-wrapper_hide');
    $('.th2').addClass('header-wrapper_hide');

  }

}

$('.ticket .ticket__wrapper, btn_close').click(function(e){
  if($(this).siblings('.ticket-messages').hasClass('ticket-messages_show')){
    $(this).siblings('.ticket-messages').removeClass('ticket-messages_show')
    $($(this).parents('.ticket')[0]).removeClass('shadow_strong');
  }
  else{
    $('.ticket-messages').removeClass('ticket-messages_show');
    $('.ticket').removeClass('shadow_strong');
    $(this).siblings('.ticket-messages').addClass('ticket-messages_show');
    $($(this).parents('.ticket')[0]).addClass('shadow_strong');
  }
  blocks_visible_controller();
  var destination = $(this).offset().top;
  destination -= 100;
  jQuery("html:not(:animated),body:not(:animated)").animate({
    scrollTop: destination
  }, 800);
})

$('.tickets-filter').click(function(){
  $(this).toggleClass('tickets-filter_open');
  $(this).children('.tickets-filter__type').toggleClass('type_open');
})
$('.th-create').click(function(){
  $('.main-form').toggleClass('main-form_visible');
})
$('.main-form .btn_cancel').click(function(){
  $('.main-form').removeClass('main-form_visible');
  if ($('.ticket-messages').hasClass('ticket-messages_show')){
    $('.tickets-header').addClass('main-form_hide');
  }
})

$('.write-message .btn_close').click(function ticketClose(e){
  $('.ticket-messages').removeClass('ticket-messages_show');
  $($(this).parents('.ticket')[0]).removeClass('shadow_strong');
  blocks_visible_controller();
  var destination = $(this).parents('.ticket').offset().top;
  destination -= 100;
  jQuery("html:not(:animated),body:not(:animated)").animate({
    scrollTop: destination
  }, 800);
})
