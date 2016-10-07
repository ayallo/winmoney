<script type="text/javascript">
    $(document).ready(function() {

      var bonus_Swiper = new Swiper ('.swiper-container', {
        direction: 'vertical',
        loop: false,
        mousewheelControl: true,
        slidesPerView: 1,
      });

      var calc = $('.fly__calculator.calc-fixed');
      var chat = $('.fly__chat.chat-fixed');

      bonus_Swiper.on('slideChangeStart', function (e) {
          $(".head__nav").removeClass("sfonom");
          $(".head__but").hide();
          $(".main__menu").hide();
          $(".footer").hide();
          //$(".myslide_nav > a").removeClass("act");
          if (e.activeIndex==0) {
            //$(".getbonus").show();
          }
          if (e.activeIndex>=1) {
              $(".getbonus").show();
              $(".head__nav").addClass("sfonom");
              $(".main__menu").show();
          }
          if(e.activeIndex==1){
              $("#myslideTo_1").addClass("act");
          }
          if(e.activeIndex==2){
              $(".footer").css({"display":"flex"});
              calc.addClass('calc-act');
              chat.addClass('chat-act');
          } else {
              calc.removeClass('calc-act');
              chat.removeClass('chat-act');
          }
      });
    });
</script>
