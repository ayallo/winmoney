<script type="text/javascript">
    $(document).ready(function(){
      if (($(".swiper-container_re").length > 0)){
        var reward_Swiper = new Swiper ('.swiper-container_re', {
          direction: 'vertical', loop: false, mousewheelControl: true, slidesPerView: 1,
        });
        reward_Swiper.on('slideChangeStart', function (e) {
          //$(".statpartner").show();
          $(".footer").css({"display":"none"});
          //$(".main__menu").hide();
          //if (e.activeIndex==0) { $(".main__menu").show(); }
          if (e.activeIndex==2){ $(".footer").css({"display":"flex"}); }
      });
      }
      if (($(".swiper-container_pi1").length > 0)){
        var bonus_Swiper = new Swiper ('.swiper-container_pi1', {
          direction: 'vertical',loop: false,
          mousewheelControl: true,slidesPerView: 1,
        });
        bonus_Swiper.on('slideChangeStart', function (e) {
          $(".head__nav").removeClass("sfonom");
          $(".head__but").hide();
          $(".main__menu").hide();
          $(".footer").hide();
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
