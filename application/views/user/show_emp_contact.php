

<div class="container-personal-detail well" id="right" name="right">
      <?php //echo form_open('user_profile_edit/emp_contact_edit_ctrl'); ?>

          <h4>Contact Details</h4>
                    <legend></legend>
<h5>Address</h5>
                                  <legend></legend>
                         <div class="row_content_left_for_user">
                              <div class="row_content_left_left_less_for_user_view">
                                    <b> Street 1 :</b>
                              </div>
                              <div class="row_content_left_right_for_user_view">
                                         <?php echo $street1; ?>
                              </div>

                              <div class="row_content_left_left_less_for_user_view">
                                     <b>City :</b>
                              </div>
                              <div class="row_content_left_right_for_user_view">
                                       <?php echo $city; ?>
                              </div>
                              <div class="row_content_left_left_less_for_user_view"> 
                                      <b>Pincode :</b> 
                              </div>
                              <div class="row_content_left_right_for_user_view">
                                   <?php echo $postal; ?>    
                              </div>                                                                             
                        </div><!--row_content_left_for_user-->

                        <div class="row_content_right_for_user">
                              <div class="row_content_left_left_less_for_user_view">
                                     <b>Street 2 :</b> 
                              </div>
                              <div class="row_content_left_right_for_user_view">
                                       <?php echo $street2; ?>     
                              </div> 
                              <div class="row_content_left_left_less_for_user_view">
                                    <b>State:</b>
                              </div>
                              <div class="row_content_left_right_for_user_view">
                                  <?php echo $state; ?>     
                              </div>
                              <div class="row_content_left_left_less_for_user_view">
                                   <!--  <b>State:</b> --> 
                              </div>
                              <div class="row_content_left_right_for_user_view">
                                 <!--  <?php //echo $state; ?> -->       
                              </div>                                                                                
                        </div><!--row_content_right_for_user-->
                        <br>
<h5>Contact Numbers</h5>
                                  <legend></legend>
                         <div class="row_content_left_for_user">
                              <div class="row_content_left_left_less_for_user_view">
                                    <b> Home Telephone :</b>
                              </div>
                              <div class="row_content_left_right_for_user_view">
                                         <?php echo $hometele; ?>
                              </div>

                              <div class="row_content_left_left_less_for_user_view">
                                     <b>Work Telephone :</b>
                              </div>
                              <div class="row_content_left_right_for_user_view">
                                       <?php echo $wrktele; ?>
                              </div>                                                                         
                        </div><!--row_content_left_for_user-->

                        <div class="row_content_right_for_user">
                              <div class="row_content_left_left_less_for_user_view">
                                     <b>Mobile :</b>
                              </div>
                              <div class="row_content_left_right_for_user_view">
                                       <?php echo $mobile; ?> 
                              </div>
                              <div class="row_content_left_left_less_for_user_view">
                                    <!--  <b>Mobile :</b> -->
                              </div>
                              <div class="row_content_left_right_for_user_view">
                                      <!--  <?php //echo $mobile; ?> -->     
                              </div>                                                                               
                        </div><!--row_content_right_for_user-->
                        <br>
<h5>Email Contacts</h5>
                                  <legend></legend>
                         <div class="row_content_left_for_user">
                              <div class="row_content_left_left_less_for_user_view">
                                    <b> Work Email :</b>
                              </div>
                              <div class="row_content_left_right_for_user_view">
                                         <?php echo $wmail; ?>
                              </div>
                                                                        
                        </div><!--row_content_left_for_user-->

                        <div class="row_content_right_for_user">
                              <div class="row_content_left_left_less_for_user_view">
                                     <b>Other Email:</b>
                              </div>
                              <div class="row_content_left_right_for_user_view">
                                       <?php echo $omail; ?>     
                              </div>                                                
                        </div><!--row_content_right_for_user-->                        
          <legend></legend>

    <button class="btn btn-primary button_medium_width " id="contact_editbtn">
    <i class="icon-edit icon-white"></i><strong> Edit</strong></button>
          <?php //echo form_close(); ?>
  </div>


 <div class="container-personal-detail well" id="contact_edit" name="contact_edit">
</div>



  <script type="text/javascript">

 $.ajaxSetup ({
        cache: false
    });
    var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";

$(document).ready(function(){
  wait();  
  $("#contact_edit").hide();
});

$("#contact_editbtn").click(function(){
  wait();
  $("#right").hide();
  $("#contact_edit").show();

       $.post("emp_contact_edit_ctrl",
       function(data){ $("#contact_edit").html(data);
       });
     });

   function wait(){
       var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
       $("#message_showing_area").html(ajax_load);
    }
</script>