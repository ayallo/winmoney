<script type="text/javascript">
    $(document).ready(function(){
      /*var mySwiper = new Swiper ('.swiper-container', {
        direction: 'horizontal',
        loop: true,
        pagination: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        scrollbar: '.swiper-scrollbar',
      });*/
      $(".myslideNext").click(function(){
        var id=$(this).attr("id").split("_");
        $(".myslide_nav a").removeClass("act");
        $(".myslide_nav a#myslideTo_"+id[1]).addClass("act");
        mySwiper.slideNext();
      });
      $(".swiper-slide").css({'height':($(".content.main").height()-100)+"px"});
      var swiper = new Swiper('.swiper-container', {
          pagination: '.swiper-pagination',
          direction: 'vertical',
          slidesPerView: 1,
          paginationClickable: true,
          spaceBetween: 30,
          mousewheelControl: true,
          observer: true,
      });
      swiper.on('slideChangeStart', function (e) {
          $(".head__nav").removeClass("sfonom");
          $(".head__but").hide();
          $(".main__menu").hide();
          $(".myslide_nav > a").removeClass("act");
          //if ($(".slide_02").is(':visible')) {
          if (e.activeIndex>=1) {
              $(".getbonus").show();
              $(".head__nav").addClass("sfonom");
              $(".main__menu").show();
          }
          if(e.activeIndex==1){ $("#myslideTo_1").addClass("act"); }
          if(e.activeIndex==2){ $("#myslideTo_1").addClass("act"); }
          if(e.activeIndex==3){ $("#myslideTo_3").addClass("act"); }
          if(e.activeIndex==4){ $("#myslideTo_4").addClass("act"); }
          console.log(e.activeIndex);
      });

      $(".myslide_nav a").click(function(){
        var id=$(this).attr("id").split("_");
        $(".myslide_nav a").removeClass("act");
        $(this).addClass("act");
        swiper.slideTo(id[1]);
        return false;
      });
      /*внтуренний слайдер*/
      /*var swiper2 = new Swiper('.swiper-container2', {
          direction: 'vertical',
          slidesPerView: 1,
          paginationClickable: true,
          spaceBetween: 30,
          mousewheelControl: true,
      });*/
    });
</script>
