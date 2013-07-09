  <link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?php echo(base_url()); ?>css/jquery.autocomplete.css" />
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
     
      <script type="text/javascript" src="<?php echo(base_url()); ?>js/jquery-1.7.2.min.js"></script>
     <script type="text/javascript" src="<?php echo(base_url()); ?>js/jquery.autocomplete.js"></script>                   
                    <div class="rowme">
                          <?php
                              if(isset($records))
                              {
                              foreach($records as $row)
                                {?>

                          <div class="row_content_left">
                              <div class="row_content_left_left">
                                  <div class="name_field">
                                    <b>Organisation Name :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                
                                      <input type="text" class="span4me"  id="organisation_name" value="<?php echo $row->organisation_name;?>" placeholder="Organisation Name" >
                                      
                              </div>

                              <div class="row_content_left_left">
                                  <div class="name_field">
                                     <b>Number of Employees :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" class="span4me"  id="no_of_employee" value="<?php echo $row->no_of_employee;?>" placeholder="No of Employee">
                                      
                              </div>                  
                          </div><!--row_content_left-->

                          <div class="row_content_right">
                              <div class="row_content_left_left">
                                  <div class="name_field">
                                     <b>Tax ID :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" class="span4me"  id="tax_id" value="<?php echo $row->tax_id;?>" placeholder="Tax ID" >
                                      
                              </div>

                              <div class="row_content_left_left">
                                  <div class="name_field">
                                     <b>Registration Number :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" class="span4me"  id="registration_no" value="<?php echo $row->registration_no;?>" placeholder="Registration No" >
                                      
                              </div>
                          </div><!--row_content_right-->
                      <hr style="width:1130px; margin-left:80px">
                          <div class="row_content_left">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Phone :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" class="span4me"  id="phone" value="<?php echo $row->phone;?>" placeholder="Phone No">
                                      
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Email :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" class="span4me"  id="email" value="<?php echo $row->email;?>" placeholder="email" >
                                      
                              </div>                  
                          </div><!--row_content_left-->

                          <div class="row_content_right">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Fax :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" class="span4me"  id="fax" value="<?php echo $row->fax;?>" placeholder="Fax">
                                      
                              </div>

                              <div class="row_content_left_left">
                                  <div class="name_field">
                                     
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <div class="name_field_right">
                                      
                                  </div>    
                              </div>
                          </div><!--row_content_right-->  
                      <hr style="width:1130px; margin-left:80px">
                          <div class="row_content_left">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Address 1 :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" class="span4me"  id="address1" value="<?php echo $row->address1;?>" placeholder="Address1">
                                      
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>City :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" class="span4me"  id="city" value="<?php echo $row->city;?>" placeholder="City">
                                      
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Zipcode :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" class="span4me"  id="zipcode" value="<?php echo $row->zipcode;?>" placeholder="Zipcode">
                                      
                              </div>                  
                          </div><!--row_content_left-->

                          <div class="row_content_right">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Address2 :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" class="span4me"  id="address2" value="<?php echo $row->address2;?>" placeholder="Address2">
                                     
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>State/Province :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" class="span4me"  id="state" value="<?php echo $row->state;?>" placeholder="State">
                                      
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Nation :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" class="span4me"  id="country" value="<?php echo $row->country;?>" placeholder="Country Name">
                                      
                              </div>
                          </div><!--row_content_right-->
                          <?php } 
                              }
                              else  
                              {
                                echo "No Records Found";
                              }?>   
                 <!--    </div> -->
                    <!-- </div> -->
                    <!-- <div class="rowme"> -->
                    <hr style="width:1130px; margin-left:80px">
                        <div class="button_field">
                          <input type="submit" class="btn btn-success" value="UPDATE" id="update_button_for_organisation"> 
                          &nbsp;&nbsp;&nbsp;&nbsp;
                          <input type="submit" class="btn btn-info" value="CANCEL" id="cancel_button_for_organisation">
                        </div>    
                    </div>

                      

<script type="text/javascript">
    $(document).ready(function() {
        $("#country").autocomplete("index.php/admin_ctrl/show_autocomplete_for_country", { });
     });
  var IsEmailValid= /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  // var IsPhoneValid=/^([\+])+([0-9])/;
  var IsPhoneValid=/^([0-9])/;

$("#update_button_for_organisation").click(function(){
  wait();//alert ($("#customer_description").val());
          if($("#message_showing_area").hide())
         {
          $("#message_showing_area").show();
         }
  $("#container-login_edit").hide();
   $("#container-login_show").show();
   $("#edit_form_for_organisation").show();
   if( IsPhoneValid.test($("#no_of_employee").val()))
  {
  if($("#phone").val().length==10 && IsPhoneValid.test($("#phone").val()))
   // if(IsPhoneValid.test($("#phone").val()))
  {
   if( IsEmailValid.test($("#email").val()))
  {
    $.post("index.php/admin_ctrl/show_submit_data_for_updating_company_info",
      {organisation_name:$("#organisation_name").val(),
    tax_id:$("#tax_id").val(),
    no_of_employee:$("#no_of_employee").val(),
    registration_no:$("#registration_no").val(),    
    phone:$("#phone").val(),
    fax:$("#fax").val(),
    email:$("#email").val(),
    address1:$("#address1").val(),
    address2:$("#address2").val(),
    city:$("#city").val(),
    state:$("#state").val(),
    zipcode:$("#zipcode").val(),
    country:$("#country").val(),},
    function(data){ $("#message_showing_area").html(data);show_company_details();
    });
 }
  else
  {
   alert ("Enter Valid Email ID");
  }
    // }
  
  }
  else
  {    
      alert ("Enter Valid Phone Number");
  }
  }
  else
  {    
      alert ("Number of Employee in digits");
  }

    
});
  
$("#cancel_button_for_organisation").click(function(){
  show_company_details();
});


  function wait(){
       var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
       $("#message_showing_area").html(ajax_load);

    }
</script>                         