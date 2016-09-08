<script type="text/javascript">
    $(document).ready(function(){
      $(".nav__a").removeClass("nav__a--act");
      $('.box a:eq(1)').addClass("nav__a--act");
      /*экраны pgpartners*/
      var width=0,height=0;
      width = document.documentElement.clientWidth;
      height = document.documentElement.clientHeight;
      $(".pgpartners .slide_01").css({"height":height});
      $(".pgpartners .slide_02").css({"height":height});

      var all_height = $(document).outerHeight(true);
      //$(".pgpartners .footer").css({"top":all_height});
      //$(".pgpartners .slcont").css({"height":(height+all_height)});
      window.onresize = function () {
          width = document.documentElement.clientWidth;
          height = document.documentElement.clientHeight;
          $(".pgpartners .slide_01").css({"height":height});
          $(".pgpartners .slide_02").css({"height":height});
          $(".pgpartners .slcont").css({"height":(2*height)});
      }
      window.onscroll = function() {
        var scrolled = window.pageYOffset || document.documentElement.scrollTop;
        var slide_02=$(".pgpartners .slide_02").offset();
        if(scrolled==0){
          $(".pgpartners .head__nav").removeClass("sfonom");
        }else {
          if((scrolled+100)>slide_02.top) {
            $(".pgpartners .head__nav").addClass("sfonom");
            $(".pgpartners .footer").css({"display":"flex"});
            $(".head__nav .openschet").show();
          }else{
            $(".pgpartners .head__nav").removeClass("sfonom");
            $(".pgpartners .footer").hide();
            $(".head__nav .openschet").hide();
          }

        }
      }

/*=================================================*/
      $(".treelegend").css({"width":$(".tree").width()});
      var tree = ''; var bx=($(".tree").width()/2), by=($(".tree").height()-40),u;
      var l=50,l1=110,l2=75,l3=63,l4=50,l5=40;

      tree += tree_line(bx,by,bx,(by-l1),"l1",1);
      //второй уровень
      u = 38 * (Math.PI/180); l = l2;
      var x21=(bx),y21=(by-l1), x22=Math.sin(u)*l,y22=Math.cos(u)*l;
      tree += tree_line(x21,y21,(x21-x22),(y21-y22),"l2",2);
      tree += tree_line(x21,y21,(x21+x22),(y21-y22),"l2",2);

      //третий уровень
      u = 107 * (Math.PI/180); l = l3;
      var x31=(x21-x22),y31=(y21-y22), x321=Math.sin(u)*l, y321=Math.cos(u)*l;
      var x411=(x31-x321), y411=(y31+y321); tree += tree_line(x31,y31,x411,y411,"l3",3);

      u = 175 * (Math.PI/180);           var x322=Math.sin(u)*l,y322=Math.cos(u)*l;
      var x421=(x31-x322), y421=(y31+y322); tree += tree_line(x31,y31,x421,y421,"l3",3);

      u = 107 * (Math.PI/180); var x31=(x21+x22),y31=(y21-y22), x323=(x31+x322),y323=(y31+y322);
      var x431=x323, y431=y323; tree += tree_line(x31,y31,x431,y431,"l3",3);

      var x324=Math.sin(u)*l, y324=Math.cos(u)*l;
      var x441=(x31+x324), y441=(y31+y324); tree += tree_line(x31,y31,x441,y441,"l3",3);

      //четверты уровень
      u = 75 * (Math.PI/180); l = l4;  var x42=Math.sin(u)*l, y42=Math.cos(u)*l;
      var x511=(x411-x42), y511=(y411+y42); tree += tree_line(x411,y411,x511,y511,"l4",4);
      u = 140 * (Math.PI/180);         var x43=Math.sin(u)*l, y43=Math.cos(u)*l;
      var x521=(x411-x43), y521=(y411+y43); tree += tree_line(x411,y411,x521,y521,"l4",4);

      u = 36 * (Math.PI/180);         var x44=Math.sin(u)*l, y44=Math.cos(u)*l;
      var x531=(x421-x44), y531=(y421-y44); tree += tree_line(x421,y421,x531,y531,"l4",4);
      u = 26 * (Math.PI/180);         var x45=Math.sin(u)*l, y45=Math.cos(u)*l;
      var x541=(x421+x45), y541=(y421-y45); tree += tree_line(x421,y421,x541,y541,"l4",4);

      u = 27 * (Math.PI/180);         var x44=Math.sin(u)*l, y44=Math.cos(u)*l;
      var x551=(x431-x44), y551=(y431-y44); tree += tree_line(x431,y431,x551,y551,"l4",4);
      u = 35 * (Math.PI/180);         var x45=Math.sin(u)*l, y45=Math.cos(u)*l;
      var x561=(x431+x45), y561=(y431-y45); tree += tree_line(x431,y431,x561,y561,"l4",4);

      u = 40 * (Math.PI/180);         var x44=Math.sin(u)*l, y44=Math.cos(u)*l;
      var x571=(x441+x44), y571=(y441-y44); tree += tree_line(x441,y441,x571,y571,"l4",4);
      u = 75 * (Math.PI/180);         var x45=Math.sin(u)*l, y45=Math.cos(u)*l;
      var x581=(x441+x45), y581=(y441+y45); tree += tree_line(x441,y441,x581,y581,"l4",4);

      //пятый уровень
      u = 49 * (Math.PI/180); l = l5;  var xu=Math.sin(u)*l, yu=Math.cos(u)*l;
      var x611=(x511-xu), y611=(y511+yu); tree += tree_line(x511,y511,x611,y611,"l5",5);
      u = 103 * (Math.PI/180);         var xu=Math.sin(u)*l, yu=Math.cos(u)*l;
      var x621=(x511-xu), y621=(y511+yu); tree += tree_line(x511,y511,x621,y621,"l5",5);

      u = 108 * (Math.PI/180);          var xu=Math.sin(u)*l, yu=Math.cos(u)*l;
      var x631=(x521-xu), y631=(y521+yu); tree += tree_line(x521,y521,x631,y631,"l5",5);
      u = 163 * (Math.PI/180);         var xu=Math.sin(u)*l, yu=Math.cos(u)*l;
      var x641=(x521-xu), y641=(y521+yu); tree += tree_line(x521,y521,x641,y641,"l5",5);

      u = 116 * (Math.PI/180);          var xu=Math.sin(u)*l, yu=Math.cos(u)*l;
      var x651=(x531-xu), y651=(y531+yu); tree += tree_line(x531,y531,x651,y651,"l5",5);
      u = 169 * (Math.PI/180);         var xu=Math.sin(u)*l, yu=Math.cos(u)*l;
      var x661=(x531-xu), y661=(y531+yu); tree += tree_line(x531,y531,x661,y661,"l5",5);

      u = 3 * (Math.PI/180);          var xu=Math.sin(u)*l, yu=Math.cos(u)*l;
      var x671=(x541-xu), y671=(y541-yu); tree += tree_line(x541,y541,x671,y671,"l5",5);
      u = 50 * (Math.PI/180);         var xu=Math.sin(u)*(l-2), yu=Math.cos(u)*(l-2);//asd
      var x681=(x541+xu), y681=(y541-yu); tree += tree_line(x541,y541,x681,y681,"l5",5);

      u = 50 * (Math.PI/180);          var xu=Math.sin(u)*(l-2), yu=Math.cos(u)*(l-2);
      var x691=(x551-xu), y691=(y551-yu); tree += tree_line(x551,y551,x691,y691,"l5",5);//ads
      u = 3 * (Math.PI/180);         var xu=Math.sin(u)*l, yu=Math.cos(u)*l;//asd
      var x691_1=(x551+xu), y691_1=(y551-yu); tree += tree_line(x551,y551,x691_1,y691_1,"l5",5);

      u = 10 * (Math.PI/180);          var xu=Math.sin(u)*l, yu=Math.cos(u)*l;
      var x691_2=(x561+xu), y691_2=(y561-yu); tree += tree_line(x561,y561,x691_2,y691_2,"l5",5);
      u = 64 * (Math.PI/180);         var xu=Math.sin(u)*l, yu=Math.cos(u)*l;
      var x691_3=(x561+xu), y691_3=(y561-yu); tree += tree_line(x561,y561,x691_3,y691_3,"l5",5);

      u = 14 * (Math.PI/180);          var xu=Math.sin(u)*l, yu=Math.cos(u)*l;
      var x691_4=(x571+xu), y691_4=(y571-yu); tree += tree_line(x571,y571,x691_4,y691_4,"l5",5);
      u = 72 * (Math.PI/180);         var xu=Math.sin(u)*l, yu=Math.cos(u)*l;
      var x691_5=(x571+xu), y691_5=(y571-yu); tree += tree_line(x571,y571,x691_5,y691_5,"l5",5);

      u = 76 * (Math.PI/180);          var xu=Math.sin(u)*l, yu=Math.cos(u)*l;
      var x691_6=(x581+xu), y691_6=(y581-yu); tree += tree_line(x581,y581,x691_6,y691_6,"l5",5);
      u = 47 * (Math.PI/180);         var xu=Math.sin(u)*l, yu=Math.cos(u)*l;
      var x691_7=(x581+xu), y691_7=(y581+yu); tree += tree_line(x581,y581,x691_7,y691_7,"l5",5);

      tree +='<text class="l1_text" id="treetext_1" x="'+(bx-12)+'" y="'+(by+20)+'" fill="rgb(38,117,235)">100%</text>';
      tree +='<text class="l2_text" id="treetext_2" x="'+(bx-12)+'" y="'+(by-l1-25)+'" fill="rgb(104,164,235)">20%</text>';

      tree +='<text class="l3_text" id="treetext_3" x="'+(bx-l2-5)+'" y="'+(by-l1-l2-5)+'" fill="rgb(73,242,231)">15%</text>';
      tree +='<text class="l3_text" id="treetext_3" x="'+(bx+l2-18)+'" y="'+(by-l1-l2-5)+'" fill="rgb(73,242,231)">15%</text>';

      tree +='<text class="l4_text" id="treetext_4" x="'+(bx-l2-l3-15)+'" y="'+(by-l1-l2-5)+'" fill="rgb(233,79,134)">7%</text>';
      tree +='<text class="l4_text" id="treetext_4" x="'+(bx+l2+l3)+'" y="'+(by-l1-l2-5)+'" fill="rgb(233,79,134)">7%</text>';

      tree +='<text class="l5_text" id="treetext_5" x="'+(bx-l2-l3-l4-8)+'" y="'+(by-l1-l2+25)+'" fill="rgb(200,200,200)">3%</text> ';
      tree +='<text class="l5_text" id="treetext_5" x="'+(bx-l2-l3-l4+15)+'" y="'+(by-l1-l2-l3)+'" fill="rgb(200,200,200)">3%</text> ';
      tree +='<text class="l5_text" id="treetext_5" x="'+(bx-l2-35)+'" y="'+(by-l1-l2-l3-l4+5)+'" fill="rgb(200,200,200)">3%</text> ';
      tree +='<text class="l5_text" id="treetext_5" x="'+(bx-8)+'" y="'+(by-l1-l2-l3-l4-10)+'" fill="rgb(200,200,200)">3%</text> ';
      tree +='<text class="l5_text" id="treetext_5" x="'+(bx+l2+15)+'" y="'+(by-l1-l2-l3-l4+5)+'" fill="rgb(200,200,200)">3%</text> ';
      tree +='<text class="l5_text" id="treetext_5" x="'+(bx+l2+l3+15)+'" y="'+(by-l1-l2-l3)+'" fill="rgb(200,200,200)">3%</text> ';
      tree +='<text class="l5_text" id="treetext_5" x="'+(bx+l2+l3+38)+'" y="'+(by-l1-l2+25)+'" fill="rgb(200,200,200)">3%</text> ';

      function tree_line(x1,y1,x2,y2,cl,id){
        return '<line x1="'+x1+'" y1="'+y1+'" x2="'+x2+'" y2="'+y2+'" class="'+cl+'" id="levid_'+id+'" ></line>';
      }
      $(".tree").html("<svg>"+tree+"</svg>");
      $("text").hover(
        function() {
          var id = $(this).attr("id").split("_"); var text='';
          if(id[1]==1) {sw=8; text = "Партнёр 1-го уровня,<br>вознагрождение 100% с его оборота";}
          if(id[1]==2) {sw=8; text = "Партнёр 2-го уровня,<br>вознагрождение 20% с его оборота";}
          if(id[1]==3) {sw=6; text = "Партнёр 3-го уровня,<br>вознагрождение 15% с его оборота";}
          if(id[1]==4) {sw=6; text = "Партнёр 4-го уровня,<br>вознагрождение 7% с его оборота";}
          if(id[1]==5) {sw=4; text = "Партнёр 5-го уровня,<br>вознагрождение 3% с его оборота";}
          $(".treelegend__descrip").html(text);
          //$('[class ^= treelegend__level-lev_]').css({"font-weight":"normal"});
          $(".treelegend__level-lev_"+id[1]).css({"font-weight":"bold"});
          //$("line.l"+id[1]).css({"stroke-width":sw});
        }, function() {
          var id = $(this).attr("id").split("_");
          if(id[1]==1) { sw=4; }
          if(id[1]==2) { sw=4; }
          if(id[1]==3) { sw=3; }
          if(id[1]==4) { sw=3; }
          if(id[1]==5) { sw=2; }
          $(".treelegend__descrip").html("");
          $(".treelegend__level-lev_"+id[1]).css({"font-weight":"normal"});
          //$("line.l"+id[1]).css({"stroke-width":sw});
        }
      );
      $("line").hover(
        function() {
          var id = $(this).attr("id").split("_"); var text='';
          if(id[1]==1) { sw=8; text = "Партнёр 1-го уровня,<br>вознагрождение 100% с его оборота"; }
          if(id[1]==2) { sw=8; text = "Партнёр 2-го уровня,<br>вознагрождение 20% с его оборота"; }
          if(id[1]==3) { sw=6; text = "Партнёр 3-го уровня,<br>вознагрождение 15% с его оборота"; }
          if(id[1]==4) { sw=6; text = "Партнёр 4-го уровня,<br>вознагрождение 7% с его оборота"; }
          if(id[1]==5) { sw=4; text = "Партнёр 5-го уровня,<br>вознагрождение 3% с его оборота"; }
          $(".treelegend__descrip").html(text);
          //$('[class ^= treelegend__level-lev_]').css({"font-weight":"normal"});
          $(".treelegend__level-lev_"+id[1]).css({"font-weight":"bold"});
          $("line.l"+id[1]).css({"stroke-width":sw});
        }, function() {
          var id = $(this).attr("id").split("_");
          if(id[1]==1) { sw=4; }
          if(id[1]==2) { sw=4; }
          if(id[1]==3) { sw=3; }
          if(id[1]==4) { sw=3; }
          if(id[1]==5) { sw=2; }
          $(".treelegend__descrip").html("");
          $(".treelegend__level-lev_"+id[1]).css({"font-weight":"normal"});
          $("line.l"+id[1]).css({"stroke-width":sw});
        }
      );

    });
</script>
