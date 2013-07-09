<div id="message_showing_area"></div>

 <div class="container-personal-detail well">
 
                            <?php
                              date_default_timezone_set('UTC');
                              $date=date("d/m/Y"); 
                            ?>

               <h4>Apply for Leave</h4>
                    <legend></legend>
                         <div class="row_content_left_for_user">
                            <div class="row_content_left_left">
                              <select id="leave_type" name="leave_type">
                                <?php if(isset($leave_type)){ foreach($leave_type as $row) { ?>
                                  <option value="<?php echo $row->leave_type_name; //echo $row->leave_type_id; ?> "><?php echo $row->leave_type_name; ?></option> <?php } }?> 
                              </select>  
                            </div>
                            <div class="row_content_left_right">
                              <input type="hidden" id="apply_date" name="apply_date" value="<?php echo $date;?>">
                            </div>
                            <div class="row_content_left_left">
                              <input type="text" class="span4me" id="date_from" name="date_from" placeholder="date_from dd/mm/YYYY">  
                            </div>
                            <div class="row_content_left_right">
                            </div>   
                            <div class="row_content_left_left">
                              <input type="text" class="span4me" id="date_to" name="date_to" placeholder="date_to dd/mm/YYYY">  
                            </div>
                            <div class="row_content_left_right">  
                            </div>                                                                              
                        </div><!--row_content_left_for_user-->

                        <div class="row_content_right_for_user">   
                        </div><!--row_content_right_for_user-->
     
       <legend></legend>
          <button class="btn btn-primary button_medium_width " id="leave_applybtn">
          <i class="icon-eye-open icon-white"></i><strong> Apply</strong></button>     

<legend></legend>

          <div class="rowme_heading_for_details_from_database">
              <b>
                <div class="div_for_heading_of_showing_details">Leave type</div>
                <div class="div_for_heading_of_showing_details">Leave Entitle(days)</div>
                <div class="div_for_heading_of_showing_details_for_description">Leave Scheduled(days)</div>
                <div class="div_for_heading_of_showing_details">Leave Taken(days)</div>
                <div class="div_for_heading_of_showing_details">Leave Balance(days)</div>
              </b>
          </div>
          <?php if(isset($leave_list))
                { ?>
          <?php foreach($leave_list as $row)
                  { ?>          
          <div class="rowme_for_details_from_database_for_job_title">
                    <div class="div_for_showing_details_for_job_title"><?php echo $row->leave_type; ?></div> 
                    <div class="div_for_showing_details_for_job_title"><?php echo $row->leave_entitle; ?> </div> 
                    <div class="div_for_showing_details_for_description"><?php echo $row->leave_scheduled; ?> </div>
                    <div class="div_for_showing_details_for_job_title"><?php echo $row->leave_taken; ?></div>  
                    <div class="div_for_showing_details_for_job_title"> <?php echo $row->leave_balance; ?></div>
          </div>
    <?php 
                  }
          }
     ?>                 
  </div>


<script type="text/javascript">
  $(function()
  {
    $('#date_from').datepick();
    $('#date_to').datepick();
  });


 $.ajaxSetup ({
        cache: false
    });
    var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";

 $("#leave_applybtn").click(function(){
  //clearInput();
      wait();

        // var test = $("#apply_date").val();
        // alert("date choosen"+test);
        
        if($("#date_from").val()!='')
        { 
          if($("#date_to").val()!='')
          {

        $.post("leave_apply",{leave_type:$("#leave_type").val(),apply_date:$("#apply_date").val(),date_from:$("#date_from").val(),date_to:$("#date_to").val()},
          function(data){ $("#message_showing_area").html(data);clearInput();
        });

          }
          else
          {
            // alert("Please !!")
            $("#date_to").focus();
          }
        }
        else
        {
          // alert("Please Fill Your Relationship With Given Name By You !!")
          $("#date_from").focus();
        }
    });

 function clearInput()
   {
    $("#date_from").val('');
    $("#date_to").val('');
   } 


   function wait(){
       var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
       $("#message_showing_area").html(ajax_load);
    }
</script>



