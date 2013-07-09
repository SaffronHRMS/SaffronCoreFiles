
  <div class="message_showing_area">
  </div>


 <div class="container-personal-detail well">
 
   <!--*****************************************************************-->
               <h4>My Attendance Record</h4>
                    <legend></legend>
                         <div class="row_content_left_for_user">
                             <input type="text" class="span4me" id="date_from" name="date_from" placeholder="Choose Date">                                                                           
                        </div><!--row_content_left_for_user-->

                        <div class="row_content_right_for_user">   
                        </div><!--row_content_right_for_user-->
     
       <legend></legend>
       <label>
             <button class="btn btn-success button_medium_width" id="search_btn" name="search_btn">
            <strong> Submit</strong></button>
             <button class="btn btn-success button_medium_width" id="show_all_btn" name="show_all_btn">
            <strong> Show All</strong></button>  
        </label>       

      

                  <div id="description_div">
                  </div><!-- end #description_div -->                 
  </div>



<script type="text/javascript">
  $(function()
  {
    // $('#apply_date').datepick();
    $('#date_from').datepick();
    //$('#date_to').datepick();


    $.ajaxSetup ({
        cache: false
    });
    var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
  

      $("#show_all_btn").click(function(){
         wait();
           if($("#message_showing_area").hide())
           {
            $("#message_showing_area").show();
           }          
              //show_data();

              $.post("show_attendance",function(data){ $("#description_div").html(data);
       });
          });     


        $("#search_btn").click(function(){
         wait();
           if($("#message_showing_area").hide())
           {
            $("#message_showing_area").show();
           }          
           if($("#date_from").val()!='')
           {
              $.post("show_attendance_for_date",{date:$("#date_from").val()},
              function(data){ $("#description_div").html(data);clearInput();
              });
            }
            else
            {
              document.getElementById("message_showing_area").innerHTML="Select a DATE First !!";
            }
    
    show_data();
          });     

    });

   function clearInput()
   {
    $("#date_from").val('');
   }

    
  function wait(){
       var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
       $("#message_showing_area").html(ajax_load);

    }

    </script>

