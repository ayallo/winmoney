<script type="text/javascript">

function initMobile () {
  var posSlide_02 = $('.slide_02').offset();
  if (posSlide_02.length > 0) {
    $('.pgindex').css({'height':'initial'});
    $('.slide_01').css({'height':+$(window).height()});
    $('.swiper-container_ind').css({'overflow':'auto'});
    window.onscroll = function() {
      var scrolled = window.pageYOffset || document.documentElement.scrollTop;
      if( scrolled > posSlide_02.top ){
        $(".head__nav").addClass("sfonom");
      }else {
        $(".head__nav").removeClass("sfonom");
      }
    }
  }
};

var calc = $('.fly__calculator.calc-fixed');
var chat = $('.fly__chat.chat-fixed');

function partButtonsUp() {
  calc.addClass('calc-act');
  chat.addClass('chat-act');
}

function partButtonsDown() {
  calc.removeClass('calc-act');
  chat.removeClass('chat-act');
}

var program_ind_Swiper = undefined;
function initSwiper() {
    var screenWidth = $(window).width();
    if(screenWidth > 979 && program_ind_Swiper == undefined) {
        program_ind_Swiper = new Swiper ('.swiper-container_ind', {
          direction: 'vertical', loop: false, mousewheelControl: true, slidesPerView: 1,
        });
        program_ind_Swiper.on('slideChangeStart', function (e) {
            $(".head__nav").removeClass("sfonom");
            $(".head__but").hide();
            $(".footer").hide();
            $(".main__menu").hide();
            if (e.activeIndex>=1) {
                $(".openschet").show();
                $(".head__nav").addClass("sfonom");
                $(".main__menu").show();
            }
            if(e.activeIndex==4){ $(".footer").css({"display":"flex"}); }
        });
    } else if (screenWidth <= 979 && program_ind_Swiper != undefined) {
        program_ind_Swiper.destroy();
        program_ind_Swiper = undefined;
        jQuery('.swiper-container_ind .swiper-wrapper').removeAttr('style');
        jQuery('.swiper-container_ind .swiper-slide').removeAttr('style');

        initMobile();
        // var posSlide_02 = $('.slide_02').offset();
        // $('.pgindex').css({'height':'initial'});
        // $('.slide_01').css({'height':+$(window).height()});
        // $('.swiper-container_ind').css({'overflow':'auto'});
        // window.onscroll = function() {
        //   var scrolled = window.pageYOffset || document.documentElement.scrollTop;
        //   if( scrolled > posSlide_02.top ){
        //     $(".head__nav").addClass("sfonom");
        //   }else {
        //     $(".head__nav").removeClass("sfonom");
        //   }
        // }
    }
}


//Swiper plugin initialization
if (($(".swiper-container_ind").length > 0)) {
  initSwiper();

  //Swiper plugin initialization on window resize
  $(window).on('resize', function(){
      initSwiper();
  });

  var screenWidth = $(window).width();
  if(screenWidth <= 979 ) {
    initMobile();
  };
}


  $(document).ready(function(){
    // if (($(".swiper-container_ind").length > 0)){
    //   // var ind_swiper;
    //   //
    //   // $(window).resize(function () {
    //   //   if ($( window ).width()>979){
    //   //     if (ind_swiper == undefined) {
    //   //       ind_swiper = new Swiper ('.swiper-container_ind', {
    //   //         direction: 'vertical', loop: false, mousewheelControl: true, slidesPerView: 1,
    //   //       });
    //   //     }
    //   //   } else {
    //   //     if (ind_swiper !== undefined) {
    //   //       ind_swiper.destroy();
    //   //     }
    //   //   }
    //   // });
    //   if ($( window ).width()>979){
    //     var program_ind_Swiper = new Swiper ('.swiper-container_ind', {
    //       direction: 'vertical', loop: false, mousewheelControl: true, slidesPerView: 1,
    //     });
    //     program_ind_Swiper.on('slideChangeStart', function (e) {
    //         $(".head__nav").removeClass("sfonom");
    //         $(".head__but").hide();
    //         $(".footer").hide();
    //         $(".main__menu").hide();
    //         if (e.activeIndex>=1) {
    //             $(".openschet").show();
    //             $(".head__nav").addClass("sfonom");
    //             $(".main__menu").show();
    //         }
    //         if(e.activeIndex==4){ $(".footer").css({"display":"flex"}); }
    //     });
    //   }else{
    //     var posSlide_02 = $('.slide_02').offset();
    //     $('.pgindex').css({'height':'initial'});
    //     $('.slide_01').css({'height':+$(window).height()});
    //     $('.swiper-container_ind').css({'overflow':'auto'});
    //     window.onscroll = function() {
    //       var scrolled = window.pageYOffset || document.documentElement.scrollTop;
    //       if( scrolled > posSlide_02.top ){
    //         $(".head__nav").addClass("sfonom");
    //       }else {
    //         $(".head__nav").removeClass("sfonom");
    //       }
    //     }
    //   }
    //     //
    //     // var swiper_container_ind_free = new Swiper('.swiper-container_ind_free', {
    //     //     scrollbar: '.swiper-scrollbar',
    //     //     direction: 'vertical',
    //     //     slidesPerView: 'auto',
    //     //     mousewheelControl: true,
    //     //     freeMode: true
    //     // });
    // }

    if (($(".swiper-container_abo").length > 0)){/*тут после последнего слайда идет текст*/
      //$('body,html').animate({scrollTop: 0}, 1);
      var program_abo_Swiper = new Swiper ('.swiper-container_abo', {
        direction: 'vertical',
        loop: false,
        mousewheelControl: true
      });
      //program_abo_Swiper.slideTo(0, 1);
      program_abo_Swiper.on('slideChangeStart', function (e) {
          $(".head__nav").removeClass("sfonom");
          $(".head__but").hide();
          //$(".footer").hide();
          //$(".main__menu").hide();
          if (e.activeIndex>=1) {
              $(".openschet").show();
              $(".head__nav").addClass("sfonom");
              //$(".main__menu").show();
          }

          /*
          if(e.activeIndex==4){
            program_abo_Swiper.disableMousewheelControl();
            $(".footer").css({'display':'flex'});
          }
          */
      });
      /*
      // возвращаем mousewheel слайдеру
      window.onscroll = function() {
        var scrolled = window.pageYOffset || document.documentElement.scrollTop;
        if(scrolled==0) program_abo_Swiper.enableMousewheelControl();
      }
      */
    }

    $('.about-lastslide-wrapper').perfectScrollbar({
      wheelSpeed: 0.3,
      suppressScrollX: true,
      wheelPropagation: true,
      swipePropagation: true
    });

    // if (($(".swiper-container_news").length > 0)){
    //   var swiper = new Swiper('.swiper-container_news', {
    //     pagination: '.swiper-pagination', paginationClickable: true,
    //     slidesPerView: 3
    //   });
    // }

    if (($(".swiper-container_reg").length > 0)){
      var program_reg_Swiper = new Swiper ('.swiper-container_reg', {
        direction: 'vertical', loop: false, mousewheelControl: true, slidesPerView: 1,
      });
      program_reg_Swiper.on('slideChangeStart', function (e) {
          $(".head__nav").removeClass("sfonom");
          $(".head__but").hide();
          $(".footer").hide();
          $(".main__menu").hide();
          if (e.activeIndex>=1) {
              $(".statpartner").show();
              $(".head__nav").addClass("sfonom");
              $(".main__menu").show();
          }
          if(e.activeIndex==4) { 
            $(".footer").css({"display":"flex"});
            partButtonsUp();
          } else {
            partButtonsDown();
          }
      });
    }
    if (($(".swiper-container_cpa").length > 0)){
      var program_cpa_Swiper = new Swiper ('.swiper-container_cpa', {
        direction: 'vertical', loop: false, mousewheelControl: true, slidesPerView: 1,
      });
      program_cpa_Swiper.on('slideChangeStart', function (e) {
          $(".head__nav").removeClass("sfonom");
          $(".head__but").hide();
          $(".footer").hide();
          if (e.activeIndex>=1) {
              $(".statpartner").show();
              $(".head__nav").addClass("sfonom");
          }
          if(e.activeIndex==2) {
            $(".footer").css({"display":"flex"});
            partButtonsUp();
          } else {
            partButtonsDown();
          }
      });
    }
    if (($(".swiper-container").length > 0)){
      var program_agent_Swiper = new Swiper ('.swiper-container', {
        direction: 'vertical',
        loop: false,
        mousewheelControl: true,
        slidesPerView: 1,
      });
      program_agent_Swiper.on('slideChangeStart', function (e) {
          $(".head__nav").removeClass("sfonom");
          $(".head__but").hide();
          $(".main__menu").hide();
          $(".footer").hide();
          //$(".myslide_nav > a").removeClass("act");
          if (e.activeIndex>=1) {
              $(".statpartner").show();
              $(".head__nav").addClass("sfonom");
              $(".main__menu").show();
          }
          if(e.activeIndex==1){ $("#myslideTo_1").addClass("act"); }
          if(e.activeIndex==4){ $(".footer").css({"display":"flex"}); }
      });
    }
  });
</script>
