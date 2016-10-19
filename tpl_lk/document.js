<script type="text/javascript">
    $(document).ready(function() {
      var countClick = 0
      $('.document-table .main__right--table--head .col-03, .document-table .main__right--table--head .col-02').on('click', function () {
        countClick = countClick+1;
        if(countClick == 1){
          $(this).addClass('one-click')
        }
        if(countClick == 2){
          $(this).addClass('double-click')
        }
        if(countClick > 2){
          $(this).removeClass('double-click one-click')
          countClick= 0
        }
      })
    });
</script>
