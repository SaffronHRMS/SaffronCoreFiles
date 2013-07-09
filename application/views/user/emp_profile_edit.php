
               <h4>Personal Details</h4>
                    <legend></legend>
                         <div class="row_content_left_for_user">
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                    <b>First Name :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                       <input type="text" class="span4me" id="fname" name="fname" value="<?php echo $emp_first_name; ?>" placeholder="" />  
                              </div>
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                     <b>Last Name :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                     <input type="text" id="lname" class="span4me" name="lname" value="<?php echo $emp_last_name; ?>" /></div>
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                     <b>Gender :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                <?php $gender = $emp_gender; ?>
                                    <select name="gender" id="gender">
                                          <option value="1" <?php if ($gender==1) echo 'selected="selected"';?>>Male</options>
                                          <option value="2" <?php if ($gender==2) echo 'selected="selected"';?>>Female</options>
                                          <option value="3" <?php if ($gender==3) echo 'selected="selected"';?>>Other</options>
                                    </select>
                                  </div>   
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                     <b>Nation :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <select name="clist" id="clist">
                                      <option value="-1">Please select...</option>
                                          <?php foreach($records as $row) { ?>
                                        <option value="<?php echo $row->cou_name; ?>"><?php echo $row->cou_name; } ?></option>
                                      </select>    
                              </div>
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                    <b>Nick Name :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                       <input type="text" class="span4me" id="nick_name" name="nick_name" value="<?php echo $emp_nick_name; ?>" />  
                              </div>
                              <div class="row_content_left_left">
                                  <div class="name_field_for_user">
                                    <b>Driving Licence Number :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                       <input type="text" class="span4me" id="dl_num" name="dl_num" value="<?php echo $emp_dri_lice_num; ?>" /> 
                              </div>                                                                              
                        </div><!--row_content_left_for_user-->

                        <div class="row_content_right_for_user">
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                     <b>Middle Name :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                     <input type="text" id="mname" class="span4me" name="mname" value="<?php echo $emp_middle_name; ?>" />
                              </div>
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                     <b>Date of Birth :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                     <input type="text" class="picupdate span4me" id="emp_dob"  name="emp_dob" value="<?php echo $emp_dob; ?>">   
                              </div> 
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                    <b>Marital Status :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                       <?php $marital = $emp_marital_status; ?>
                                  <select name="marital" id="marital">
                                          <option value="">Select</option>
                                          <option value="1" <?php if ($marital==1) echo 'selected="selected"';?>>Single</option>
                                          <option value="2" <?php if ($marital==2) echo 'selected="selected"';?>>Married</option>
                                          <option value="3" <?php if ($marital==3) echo 'selected="selected"';?>>Other</option>
                                  </select>  
                              </div> 
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                     <b>Military Service :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                     <input type="text" class="span4me" id="military_service"  name="military_service" value="<?php echo $emp_military_service;?>">    
                              </div>
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                    <b>Pancard No :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                       <input type="text" class="span4me" id="pan_number" name="pan_number" value="<?php echo $emp_pancard_num; ?>" />
                              </div>
                              <div class="row_content_left_left">
                                  <div class="name_field_for_user">
                                    <b>Driving Licence Expiry Date:</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                       <input type="text" class="span4me" id="dl_exp_date" name="dl_exp_date" value="<?php echo $emp_dri_lice_exp_date; ?>" />
                              </div>                                                             
                        </div><!--row_content_right_for_user-->
     
       <legend></legend>
       <label>
                 <button class="btn btn-success button_medium_width " id="personal_updatebtn">
              <i class="icon-eye-open icon-white"></i><strong> Save</strong></button>  
        </label>       
 


<script type="text/javascript">
  $(function()
  {
    $("#emp_dob").datepick();
    $("#dl_exp_date").datepick();
  });


   $("#personal_updatebtn").click(function(){
      wait();
   if($("#clist").val()!= -1)
              {

        $.post("emp_profile_update",{
          fname:$("#fname").val(),
          lname:$("#lname").val(),
          mname:$("#mname").val(),
          gender:$("#gender").val(),
          clist:$("#clist").val(),
          nick_name:$("#nick_name").val(),
          dl_num:$("#dl_num").val(),
          emp_dob:$("#emp_dob").val(),
          marital:$("#marital").val(),
          military_service:$("#military_service").val(),
          pan_number:$("#pan_number").val(),
          dl_exp_date:$("#dl_exp_date").val()},
          function(data){ $("#message_showing_area").html(data);show_data();
        });
      }
      else
      {
        alert("Please select your country !!");
        $("#clist").focus();
      }
      

    });

</script>