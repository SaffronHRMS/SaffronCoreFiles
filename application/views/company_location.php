<!DOCTYPE html>
<html>
<head>
    <title></title>
  <link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?php echo(base_url()); ?>css/jquery.autocomplete.css" />
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
     
      <script type="text/javascript" src="<?php echo(base_url()); ?>js/jquery-1.7.2.min.js"></script>
     <script type="text/javascript" src="<?php echo(base_url()); ?>js/jquery.autocomplete.js"></script>
    
     
</head>
<body>
<h3 style="font-family: Steinem;"><center>LOCATIONS</center></h3>
<div id="inside_middle">
    <div id="message_showing_area">
    </div>
    <div id="menu_div">
     
                
              <div class="container-login" id="container-login">
                    <div class="rowme">
                        <div class="row_content_left">
                              <div class="row_content_left_left">
                                  <div class="name_field">
                                    <b>Name :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                      <input type="text" id="add_location_name" class="span4me" name="add_location_name" placeholder="Name">    
                              </div>
                              <div class="row_content_left_left">
                                  <div class="name_field">
                                     <b>Address1 :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                      <input type="text" id="address1" class="span4me" name="address1" placeholder="Address1">  
                              </div>
                              <div class="row_content_left_left">
                                  <div class="name_field">
                                     <b>City :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                      <input type="text" id="city" class="span4me" name="city" placeholder="City">  
                              </div>
                              <div class="row_content_left_left">
                                  <div class="name_field">
                                     <b>Pincode :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                      <input type="text" id="pincode" class="span4me" name="pincode" placeholder="Pincode">   
                              </div>
                              <div class="row_content_left_left">
                                  <div class="name_field">
                                     <b>Phone :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                      <input type="text" id="phone" class="span4me" name="phone" placeholder="Phone"> 
                              </div>                  
                        </div><!--row_content_left-->

                        <div class="row_content_right">
                              <div class="row_content_left_left">
                                  <div class="name_field">
                                     <b>Number of Employees :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                      <input type="text" id="no_of_employee" class="span4me" name="no_of_employee" placeholder="No of Employee">
                              </div>
                              <div class="row_content_left_left">
                                  <div class="name_field">
                                     <b>Address2 :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                      <input type="text" id="address2" class="span4me" name="address2" placeholder="Address2">   
                              </div>
                              <div class="row_content_left_left">
                                  <div class="name_field">
                                     <b>State :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                      <input type="text" id="state" class="span4me" name="state" placeholder="State"><br>
                              </div>

                              <div class="row_content_left_left">
                                  <div class="name_field">
                                     <b>Country :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                      <input type="text" id="country" class="span4me" name="country" placeholder="Country Name"> 
                              </div>
                              <div class="row_content_left_left">
                                  <div class="name_field">
                                     <b>Fax :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                      <input type="text" id="fax" class="span4me" name="fax" placeholder="Fax no"> 
                              </div>
                        </div><!--row_content_right-->  
                      <hr style="width:1130px; margin-left:80px">

                            <div id="create_location_button" class="button_field">
                            <button type="button" class="btn btn-success " id="create_location">Create</button>&nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn btn-info" id="cancel_location">Cancel</button>
                             
                             </div><!--end #create_employee_button-->
                    </div>
                </div>
            <input type="submit" class="btn btn-success" value="ADD" id="add_location_form">
                    
                
    </div><!-- end #menu_div -->
                 <div id="update_div">
                   <!--  <h1>Update div</h1> -->
                  </div><!-- end #update_div -->
                  <!-- <h3 style="font-family: Steinem;">Description</h3>  -->       
                  <div id="description_div">
                  </div><!-- end #description_div -->
</div> <!-- end #inside_middle -->

<script type="text/javascript">
    $.ajaxSetup ({
        cache: false
    });
    var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
    

    $(document).ready(function() {
        $("#create_location_button").hide();
        $("#container-login").hide();
       $("#country").autocomplete("index.php/admin_ctrl/show_autocomplete_for_country", {});
        location_detail();
  });

  var IsEmailValid= /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  // var IsPhoneValid=/^([\+])+([0-9])/;
  var IsPhoneValid=/^([0-9])/;

      $("#add_location_form").click(function(){
         if($("#message_showing_area").hide())
         {
          $("#message_showing_area").show();
         }
        if($("#update_div").show())
         {
          $("#update_div").hide();
         }           
        $("#add_location_form").hide();

        $("#create_location_button").show();
        $("#container-login").show();
      });


      $("#create_location").click(function(){
        wait();//alert ($("#location_description").val());
          if($("#message_showing_area").hide())
         {
          $("#message_showing_area").show();
         } 
         if($("#add_location_name").val()!='')
         {
            if($("#address1").val()!='')
            {
               if($("#city").val()!='')
               {
	               	if($("#state").val()!='')
	               {
		               	if($("#pincode").val()!='')
		               {
			               	if($("#phone").val().length==10 && IsPhoneValid.test($("#phone").val()))
			               {
				               	if($("#country").val()!='')
				               {
					               	if($("#no_of_employee").val()!='' && IsPhoneValid.test($("#phone").val()))
					               {//alert($(#location_description).val());
					                  $.post("index.php/admin_ctrl/show_submit_data_for_adding_location",
					                  	{
					                  		add_location_name:$("#add_location_name").val(),
					                        address1:$("#address1").val(),
					                        address2:$("#address2").val(),
					                        city:$("#city").val(),
					                        state:$("#state").val(),
					                        pincode:$("#pincode").val(),
					                        country:$("#country").val(),
					                        phone:$("#phone").val(),
					                        fax:$("#fax").val(),
					                        no_of_employee:$("#no_of_employee").val(),
					                        // note:$("#note").val(),
					                    },
					                 function(data){ $("#message_showing_area").html(data);clearInput();location_detail();
					                 });
					                }
					                else
					                {
					                  alert ("Enter no of Employees");
					                }
				                }
				                else
				                {
				                  alert ("Country Name required !");
				                }
			                }
			                else
			                {
			                  alert ("Enter Valid Phone Number");
			                }
		                }
		                else
		                {
		                  alert ("Enter Pincode !");
		                }
	                }
	                else
	                {
	                  alert ("Enter name of the State");
	                }  
                }
                else
                {
                  alert ("Enter name of the City");
                }
            }
            else
             {
                alert ("Address Required !");    
             }
         
         }
         else
         {    
            alert ("Name Should not be Blank !");
         }   

      });     


      $("#cancel_location").click(function(){
         clearInput();
         $("#create_location_button").hide();
        $("#container-login").hide();
        $("#add_location_form").show();

      });     

   function clearInput()
   {
    $("#add_location_name").val('');
    $("#address1").val('');
    $("#address2").val('');
    $("#city").val('');
    $("#state").val('');
    $("#pincode").val('');
    $("#country").val('');
    $("#phone").val('');
    $("#fax").val('');
    $("#no_of_employee").val('');
    $("#note").val('');
   }
   
  function location_detail(){
   // wait();
      $.post("index.php/admin_ctrl/show_data_from_database_for_location",
      function(data){ $("#description_div").html(data);
      });
   }
        
  function wait(){
       var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
       $("#message_showing_area").html(ajax_load);

    }

    </script>
</body>
</html>