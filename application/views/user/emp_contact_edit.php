
<div class="container-personal-detail well" id="right" name="right">
  <?php echo form_open('user_profile_update/emp_contact_update_ctrl'); ?>
    <!--******************** write edit view navbar *********************-->
  <div class="span1 container-contact-detail-btn-view">
    <input type="hidden" id="emp_id" name="emp_id" value="<?php echo $emp_id; ?>">
    <input type="hidden" id="emp_num" name="emp_num" value="<?php echo $emp_num; ?>">
  </div>
          
          <!--*****************************************************************-->
          <h4>Contact Details</h4>
                    <legend></legend>
<h5>Address</h5>
                                  <legend></legend>
                         <div class="row_content_left_for_user">
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                    <b> Street 1 :</b>
                              </div>
                              </div>
                              <div class="row_content_left_right">
                                         <input type="text" id="street1" name="street1" class="input-xlarge" placeholder="Street 1" />
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                     <b>City :</b>
                              </div>
                              </div>
                              <div class="row_content_left_right">
                                       <input type="text" id="city" name="city" class="input-xlarge" placeholder="Your City" />
                              </div>
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user"> 
                                      <b>Pincode :</b> 
                              </div>
                              </div>
                              <div class="row_content_left_right">
                                   <input type="text" id="postal" name="postal" class="input-xlarge" placeholder="Pincode or Postal Code" />    
                              </div>                                                                             
                        </div><!--row_content_left_for_user-->

                        <div class="row_content_right_for_user">
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                     <b>Street 2 :</b> 
                              </div>
                              </div>
                              <div class="row_content_left_right">
                                       <input type="text" id="street2" name="street2" class="input-xlarge" placeholder="Street 2" />    
                              </div> 
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                    <b>State:</b>
                              </div>
                              </div>
                              <div class="row_content_left_right">
                                  <input type="text" id="state" name="state" class="input-xlarge" placeholder="Your State or Province" />     
                              </div>
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                   <!--  <b>State:</b> --> 
                              </div>
                              </div>
                              <div class="row_content_left_right">
                                 <!--  <?php //echo $state; ?> -->       
                              </div>                                                                                
                        </div><!--row_content_right_for_user-->
                        <br>
<h5>Contact Numbers</h5>
                                  <legend></legend>
                         <div class="row_content_left_for_user">
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                    <b> Home Telephone :</b>
                              </div>
                              </div>
                              <div class="row_content_left_right">
                                         <input type="text" id="hometele" name="hometele" class="input-xlarge" placeholder="Home Telephone with STD code" />
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                     <b>Work Telephone :</b>
                              </div>
                              </div>
                              <div class="row_content_left_right">
                                       <input type="text" id="wrktele" name="wrktele" class="input-xlarge" placeholder="Work Telephone with STD code" />
                              </div>                                                                         
                        </div><!--row_content_left_for_user-->

                        <div class="row_content_right_for_user">
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                     <b>Mobile :</b>
                              </div>
                              </div>
                              <div class="row_content_left_right">
                                       <input type="text" id="mobile" name="mobile" class="input-xlarge" placeholder="mobile number" />
                              </div>
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                    <!--  <b>Mobile :</b> -->
                              </div>
                              </div>
                              <div class="row_content_left_right">
                                      <!--  <?php //echo $mobile; ?> -->     
                              </div>                                                                               
                        </div><!--row_content_right_for_user-->
                        <br>
<h5>Email Contacts</h5>
                                  <legend></legend>
                         <div class="row_content_left_for_user">
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                    <b> Work Email :</b>
                              </div>
                              </div>
                              <div class="row_content_left_right">
                                           <input type="text" id="work-email" name="work-email" class="input-xlarge" placeholder="Work Email" />
                              </div>
                                                                        
                        </div><!--row_content_left_for_user-->

                        <div class="row_content_right_for_user">
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                     <b>Other Email:</b>
                              </div>
                              </div>
                              <div class="row_content_left_right">
                                       <input type="text" id="other-email" name="other-email" class="input-xlarge" placeholder="Other Email" />     
                              </div>                                                
                        </div><!--row_content_right_for_user-->                        
          <legend></legend>
    <button class="btn btn-primary btn-block btn-edit " id="edit-btn">
    <i class="icon-edit icon-white"></i><strong> Save</strong></button>
          <?php echo form_close(); ?>
  </div>