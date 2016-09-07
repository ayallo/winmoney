<script type="text/javascript">
    $(document).ready(function(){
      var bonus_Swiper = new Swiper ('.swiper-container', {
        direction: 'vertical',
        loop: false,
        mousewheelControl: true,
        slidesPerView: 1,
      });

      bonus_Swiper.on('slideChangeStart', function (e) {
          $(".head__nav").removeClass("sfonom");
          $(".head__but").hide();
          $(".main__menu").hide();
          $(".footer").hide();
          //$(".myslide_nav > a").removeClass("act");
          if (e.activeIndex>=1) {
              $(".getbonus").show();
              $(".head__nav").addClass("sfonom");
              $(".main__menu").show();
          }
          if(e.activeIndex==1){ $("#myslideTo_1").addClass("act"); }
          if(e.activeIndex==2){ $(".footer").css({"display":"flex"}); }
      });
    });
</script>
