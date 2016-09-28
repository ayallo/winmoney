<script type="text/javascript">
  $(document).ready(function(){
    if (($(".swiper-container_ind").length > 0)){
      if ($( window ).width()>700){
        var program_ind_Swiper = new Swiper ('.swiper-container_ind', {
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
      }else{
        var posSlide_02 = $('.slide_02').offset();
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
        //
        // var swiper_container_ind_free = new Swiper('.swiper-container_ind_free', {
        //     scrollbar: '.swiper-scrollbar',
        //     direction: 'vertical',
        //     slidesPerView: 'auto',
        //     mousewheelControl: true,
        //     freeMode: true
        // });
    }

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
              $(".statpartner").show();
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
          if(e.activeIndex==4){ $(".footer").css({"display":"flex"}); }
          console.log(e.activeIndex);
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
          if(e.activeIndex==2){ $(".footer").css({"display":"flex"}); }
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
