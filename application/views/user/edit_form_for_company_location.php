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
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Name :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                      <input type="text" value="<?php echo $row->name;?>" id="add_location_name_field" class="span4me" name="add_location_name" placeholder="Name">    
                              </div>
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Address1 :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                      <input type="text" value="<?php echo $row->address1;?>" id="address1_field" class="span4me" name="address1" placeholder="Address">    
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>City :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                      <input type="text" value="<?php echo $row->city;?>" id="city_field" class="span4me" name="city" placeholder="City">    
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Pincode :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                      <input type="text" value="<?php echo $row->pincode;?>" id="pincode_field" class="span4me" name="pincode" placeholder="Pincode">    
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Phone :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                      <input type="text" value="<?php echo $row->phone;?>"id="phone_field" class="span4me" name="phone" placeholder="Phone">    
                              </div>               
                        </div><!--row_content_left-->

                        <div class="row_content_right">
                              <div class="row_content_left_left">
                                  <div class="name_field">
                                     <b>Number of Employees :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                      <input type="text" value="<?php echo $row->no_of_employee;?>" id="no_of_employee_field" class="span4me" name="no_of_employee" placeholder="No of Employee">    
                              </div>

                              <div class="row_content_left_left">
                                  <div class="name_field">
                                     <b>Address2 :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                      <input type="text" value="<?php echo $row->address2;?>" id="address2_field" class="span4me" name="address2" placeholder="Address">    
                              </div>

                              <div class="row_content_left_left">
                                  <div class="name_field">
                                     <b>State :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                      <input type="text" value="<?php echo $row->state;?>" id="state_field" class="span4me" name="state" placeholder="State">    
                              </div>

                              <div class="row_content_left_left">
                                  <div class="name_field">
                                     <b>Country :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                      <input type="text" value="<?php echo $row->country;?>"id="country_field" class="span4me" name="country" placeholder="Country Name">    
                              </div>

                              <div class="row_content_left_left">
                                  <div class="name_field">
                                     <b>Fax :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                      <input type="text" value="<?php echo $row->fax;?>" id="fax_field" class="span4me" name="fax" placeholder="Fax no">     
                              </div>

                        </div><!--row_content_right-->    
          <hr style="width:1130px; margin-left:80px">
                        <div class="button_field">
                            <input type="button" class="btn btn-success" value="Update" id="update_button_for_organisation_location"> &nbsp;&nbsp;
                            <input type="button" class="btn btn-info" value="Cancel" id="cancel_button_for_organisation_location">&nbsp;&nbsp;     
                            <button type="button" class="btn btn-danger " id="delete_data">Delete</button>      
                            <?php } 
                              }
                              else  
                              {
                                echo "No Records Found";
                              }?>     
                        </div>                             
                    </div>
                  

<script type="text/javascript">
    $(document).ready(function() {
       $("#country_field").autocomplete("index.php/admin_ctrl/show_autocomplete_for_country", {});
  });

  var IsEmailValid= /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  // var IsPhoneValid=/^([\+])+([0-9])/;
  var IsPhoneValid=/^([0-9])/;

$("#update_button_for_organisation_location").click(function(){
          if($("#message_showing_area").hide())
         {
          $("#message_showing_area").show();
         }
  $("#container-login_edit").hide();
   $("#container-login_show").show();
   $("#edit_form_for_organisation").show();
   if($("#add_location_name_field").val().length>1)
   {
        if($("#phone_field").val().length==10 && IsPhoneValid.test($("#phone_field").val()))
          {
            $.post("index.php/admin_ctrl/show_submit_data_for_updating_company_location",
              {
                id:$("#id_field").val(),
              add_location_name_field:$("#add_location_name_field").val(),
              address1_field:$("#address1_field").val(),
              address2_field:$("#address2_field").val(),
              city_field:$("#city_field").val(),    
              phone_field:$("#phone_field").val(),
              fax_field:$("#fax_field").val(),
              state_field:$("#state_field").val(),
              country_field:$("#country_field").val(),
              pincode_field:$("#pincode_field").val(),
              no_of_employee_field:$("#no_of_employee_field").val(),
              // note_field:$("#note_field").val(),
              },
            function(data){ $("#update_div").html(data);location_detail();
            });
         }
         else
         {
           alert ("Enter Valid Phone Number !");
         } 
   }
    else
   {
     alert ("Name Field Should not be Blank");
   }         
});
  
$("#cancel_button_for_organisation_location").click(function(){
  if($("#update_div").show())
         {
          $("#update_div").hide();
         }
  location_detail();
  // alert('hi');
});
  function wait(){
       var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
       $("#message_showing_area").html(ajax_load);

    }

 $("#delete_data").click(function(){
     if($("#message_showing_area").show())
         {
          $("#message_showing_area").hide();
         }
      $.post("index.php/admin_ctrl/delete_data_for_organisation_location",
        {id:$("#id_field").val()},
      function(data){ $("#update_div").html(data);location_detail();
       });
   });   
</script>                         