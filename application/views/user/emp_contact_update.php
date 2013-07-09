

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
                                         <input type="text" id="street1" name="street1" class="span4me" value="<?php echo $street1; ?>" placeholder="Street 1" />
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                     <b>City :</b>
                              </div>
                              </div>
                              <div class="row_content_left_right">
                                       <input type="text" id="city" name="city" class="span4me" value="<?php echo $city; ?>" placeholder="Your City" />
                              </div>
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user"> 
                                      <b>Pincode :</b> 
                              </div>
                              </div>
                              <div class="row_content_left_right">
                                   <input type="text" id="postal" name="postal" class="span4me" value="<?php echo $postal; ?>" placeholder="Pincode or Postal Code" />    
                              </div>                                                                             
                        </div><!--row_content_left_for_user-->

                        <div class="row_content_right_for_user">
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                     <b>Street 2 :</b> 
                              </div>
                              </div>
                              <div class="row_content_left_right">
                                       <input type="text" id="street2" name="street2" class="span4me" value="<?php echo $street2; ?>" placeholder="Street 2" />    
                              </div> 
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                    <b>State:</b>
                              </div>
                              </div>
                              <div class="row_content_left_right">
                                  <input type="text" id="state" name="state" class="span4me" value="<?php echo $state; ?>" placeholder="Your State or Province" />     
                              </div>
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                   <!--  <b>State:</b> --> 
                              </div>
                              </div>
                              <div class="row_content_left_right">
                                        
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
                                         <input type="text" id="hometele" name="hometele" class="span4me" value="<?php echo $hometele; ?>" placeholder="Home Telephone with STD code" />
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                     <b>Work Telephone :</b>
                              </div>
                              </div>
                              <div class="row_content_left_right">
                                       <input type="text" id="wrktele" name="wrktele" class="span4me" value="<?php echo $wrktele; ?>" placeholder="Work Telephone with STD code" />
                              </div>                                                                         
                        </div><!--row_content_left_for_user-->

                        <div class="row_content_right_for_user">
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                     <b>Mobile :</b>
                              </div>
                              </div>
                              <div class="row_content_left_right">
                                       <input type="text" id="mobile" name="mobile" class="span4me" value="<?php echo $mobile; ?>" placeholder="Mobile Number" />
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
                                           <input type="text" id="work_email" name="work_email" class="span4me" value="<?php echo $wmail; ?>" placeholder="Work Email" />
                              </div>
                                                                        
                        </div><!--row_content_left_for_user-->

                        <div class="row_content_right_for_user">
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                     <b>Other Email:</b>
                              </div>
                              </div>
                              <div class="row_content_left_right">
                                       <input type="text" id="other_email" name="other_email" class="span4me" value="<?php echo $omail; ?>" placeholder="Other Email" />     
                              </div>                                                
                        </div><!--row_content_right_for_user-->                        
          <legend></legend>
    <label>
                 <button class="btn btn-success button_medium_width " id="contact_updatebtn">
              <i class="icon-eye-open icon-white"></i><strong> Save</strong></button>  
        </label>
         

<script type="text/javascript">
  


   $("#contact_updatebtn").click(function(){
      wait();

        $.post("emp_contact_update_ctrl",{street1:$("#street1").val(),city:$("#city").val(),postal:$("#postal").val(),street2:$("#street2").val(),state:$("#state").val(),
          hometele:$("#hometele").val(),
          wrktele:$("#wrktele").val(),
          mobile:$("#mobile").val(),
          work_email:$("#work_email").val(),other_email:$("#other_email").val()},
          function(data){ $("#message_showing_area").html(data);show_data();
        });


    });

</script>         