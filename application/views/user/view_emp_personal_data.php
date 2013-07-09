                  <div id="des">
                  
                  </div><!-- end #description_div -->

                 

<script type="text/javascript">

 $.ajaxSetup ({
        cache: false
    });
    var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";

$(document).ready(function(){
  wait();
  show_data();

});

 function show_data(){
  wait();
       $.post("show_emp_personal_view_ctrl",
       function(data){ $("#des").html(data);
       });
   }

   function wait(){
       var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
       $("#message_showing_area").html(ajax_load);
    }
</script>
