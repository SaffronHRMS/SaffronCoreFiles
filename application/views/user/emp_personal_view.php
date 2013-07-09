

<div class="container-personal-detail well" id="right" name="right">

               <h4>Personal Details</h4>
                    <legend></legend>
                         <div class="row_content_left_for_user">
                              <div class="row_content_left_left_less_for_user_view">
                                    <b> Name :</b>
                              </div> 
                               <div class="row_content_left_right_for_user_view">
                                         <?php echo $emp_first_name;?> <?php echo $emp_middle_name; ?> <?php echo $emp_last_name; ?>
                              </div> 

                               <div class="row_content_left_left_less_for_user_view">
                                     <b>Gender :</b>
                              </div>
                              <div class="row_content_left_right_for_user_view">
                                        <?php 
                                    if($emp_gender==1) 
                                    { echo "Male"; }
                                    elseif ($emp_gender == 2) 
                                    { echo "Female"; } 
                                    else { echo "Other"; } 
                                    ?>
                              </div>
                              <div class="row_content_left_left_less_for_user_view">
                                     <b>Nationality :</b>
                              </div>
                              <div class="row_content_left_right_for_user_view">
                                   <?php echo $emp_nationality; ?>
                              </div>
                               <div class="row_content_left_left_less_for_user_view">
                                    <b>Nick Name :</b>
                              </div>
                              <div class="row_content_left_right_for_user_view">
                                      <?php echo $emp_nick_name; ?>  
                              </div>
                              <div class="row_content_left_left_less_for_user_view">
                                    <b>Driving Licence Number :</b>
                              </div>
                              <div class="row_content_left_right_for_user_view">
                                      <?php echo $emp_dri_lice_num; ?>
                              </div>                                                                            
                        </div><!--row_content_left_for_user-->

                        <div class="row_content_right_for_user">
                              <div class="row_content_left_left_less_for_user_view">
                                     <b>Date of Birth :</b>
                              </div>
                              <div class="row_content_left_right_for_user_view">
                                       <?php echo $emp_dob; ?>   
                              </div> 
                              <div class="row_content_left_left_less_for_user_view">
                                    <b>Marital Status :</b>
                              </div>
                              <div class="row_content_left_right_for_user_view">
                                  <?php if($emp_marital_status == 1)
                                       { echo "Single"; }
                                       elseif($emp_marital_status == 2)
                                       { echo "Married"; } 
                                       else { echo "Other"; } 
                                  ?>
                              </div>
                              <div class="row_content_left_left_less_for_user_view">
                                     <b>Military Service :</b> 
                              </div>
                              <div class="row_content_left_right_for_user_view">
                                    <?php echo $emp_military_service;?> 
                              </div>
                              <div class="row_content_left_left_less_for_user_view">
                                    <b>Pancard No :</b>
                              </div>
                              <div class="row_content_left_right_for_user_view">
                                       <?php echo $emp_pancard_num; ?>
                              </div>
                              <div class="row_content_left_left_less_for_user_view">
                                    <b>Driving Licence Expiry Date:</b>
                              </div>
                              <div class="row_content_left_right_for_user_view">
                                     <?php echo $emp_dri_lice_exp_date; ?>
                              </div>                                                   
                        </div><!--row_content_right_for_user-->

          <legend></legend>
    <button class="btn btn-primary button_medium_width " id="personal_editbtn">
    <i class="icon-edit icon-white"></i><strong> Edit</strong></button>

  </div>


   <div class="container-personal-detail well" id="personal_edit" name="personal_edit">
</div>


<script type="text/javascript">

 $.ajaxSetup ({
        cache: false
    });
    var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";

$(document).ready(function(){
  wait();  
  $("#personal_edit").hide();
});

$("#personal_editbtn").click(function(){
  wait();
  $("#right").hide();
  $("#personal_edit").show();

       $.post("emp_profile_edit",
       function(data){ $("#personal_edit").html(data);
       });
     });

   function wait(){
       var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
       $("#message_showing_area").html(ajax_load);
    }
</script>