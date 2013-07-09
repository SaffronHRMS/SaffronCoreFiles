<html>
<head>
	<title></title>
	<link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo(base_url()); ?>css/jquery.autocomplete.css" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
     
      <script type="text/javascript" src="<?php echo(base_url()); ?>js/jquery-1.7.2.min.js"></script>
     <script type="text/javascript" src="<?php echo(base_url()); ?>js/jquery.autocomplete.js"></script>
     <script type="text/javascript" src="<?php echo base_url('bootstrap/js/jquery.datepick.js'); ?>"></script>
</head>
<body>
<h3 style="font-family: Steinem;"><center>VIEW ATTENDANCE RECORD</center></h3>
<div id="inside_middle">
   <div id="message_showing_area">
    </div>
	<div id="menu_div">

         <div class="container-login" id="container-login">
                <div class="rowme">
                        <div class="row_content_left">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Name:</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                      <input type="text" id="employee_id" class="span4me" name="employee_id" placeholder="Name" >                                  
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Date From:</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                <!-- <div class="text_area_field1"> -->
                                    <input type="text" id="from_datepicker" class="span4me" name="from_datepicker" placeholder="Choose Date from">
                                <!-- </div>  -->                              
                              </div>                  
                        </div><!--row_content_left-->

                        <div class="row_content_right">
                              <div class="row_content_left_left_less">
                                  <!-- <div class="name_field">
                                     <b>Middle Name :</b>
                                  </div> -->  
                              </div>
                              <div class="row_content_left_right">
                                <!--  <input type="text" id="middlename" class="span4me" name="middlename" placeholder="Middle name"> -->        
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Date To :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                <!-- <div class="text_area_field1"> -->
                                    <input type="text" id="to_datepicker" class="span4me" name="to_datepicker" placeholder="Choose Date to">
                                <!-- </div>  -->                            
                              </div> 
                        </div><!--row_content_right-->
                <!--     </div>
                    <div class="rowme_for_button"> -->
                      <hr style="width:1130px; margin-left:80px">
                            <div id="create_search_attendance_button" class="button_field">
                                <button type="button" class="btn btn-success " id="create_attendance">Search</button>&nbsp;&nbsp;
                                <button type="button" class="btn btn-info" id="cancel_attendance">Cancel</button>
                             </div><!--end #create_employee_button-->
                    </div>

         </div>

			<!-- <input type="submit" class="btn btn-success" value="SEARCH" id="add_attendance_form"> -->
			
					
			 
    </div><!-- end #menu_div -->

    
                 <div id="update_div">
                   <!--  <h1>Update div</h1> -->
                  </div><!-- end #update_div -->
                  <!-- <h3 style="font-family: Steinem;">Description</h3>  -->       
                  <div id="description_div">
                  </div><!-- end #description_div -->
    

</div> <!-- end #inside_middle -->

<script type="text/javascript">

  $(function() {
    $( "#from_datepicker" ).datepick();
    $( "#to_datepicker" ).datepick();
     $("#employee_id").autocomplete("index.php/admin_ctrl/show_autocomplete_for_name", {});
     // 
     //     $("#employee_id").autocomplete({
     //  source: "index.php/admin_ctrl/show_autocomplete_for_name"
     // });
  });

// $(function(){
//   $("#birds").autocomplete({
//     source: "birds/get_birds" // path to the get_birds method
//   });
// });


    $.ajaxSetup ({
        cache: false
    });
    var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
    

    $(document).ready(function() {
        // $("#create_search_attendance_button").hide();
        // $("#container-login").hide();
        // attendance_detail();
  });


         $("#add_attendance_form").click(function(){
 
        $("#add_attendance_form").hide();
        $("#create_search_attendance_button").show();
        $("#container-login").show();
      });


     $("#create_attendance").click(function(){
      //alert($("#to_datepicker").val());
      if($("#message_showing_area").hide())
         {
          $("#message_showing_area").show();
         }
      if($("#update_div").show())
         {
          $("#update_div").hide();
         }   
         if($("#employee_id").val()!='')
               {    wait();
	               if($("#from_datepicker").val()!='')
	               {
                    if($("#to_datepicker").val()!='')
                     {
                        $.post("index.php/admin_ctrl/show_submit_data_for_attendance_record_from_to",
                          {datepicker:$("#from_datepicker").val(),to_datepicker:$("#to_datepicker").val(),
                          employee_id:$("#employee_id").val(),},
                       function(data){ $("#description_div").html(data);clearInput();
                       });
                     }
                     else
                     {
    	                  $.post("index.php/admin_ctrl/show_submit_data_for_attendance_record",
    	                    {datepicker:$("#from_datepicker").val(),employee_id:$("#employee_id").val(),},
    	                 function(data){ $("#description_div").html(data);clearInput();
    	                 });
                     }
	                }
	                else
	                {

                    $.post("index.php/admin_ctrl/show_submit_data_for_attendance_record_by_name",
	                    {employee_id:$("#employee_id").val(),},
	                 function(data){ $("#description_div").html(data);clearInput();
	                 });
	                }
               }
                else
                {
	               if($("#from_datepicker").val()!='')
	               {//alert($(#employee_id).val());
	                  $.post("index.php/admin_ctrl/show_submit_data_for_attendance_record_by_date",
	                    {datepicker:$("#from_datepicker").val(),},
	                 function(data){ $("#description_div").html(data);clearInput();
	                 });
	                }
	                else
	                {

                         document.getElementById("message_showing_area").innerHTML="One Field is required!"; 
	                }

                }  
        });

    

      $("#cancel_attendance").click(function(){
         clearInput();

      });     

   function clearInput()
   {
    $("#from_datepicker").val('');
    $("#to_datepicker").val('');
    $("#employee_id").val('');
   }

  function attendance_detail(){
   // wait();
      $.post("index.php/admin_ctrl/show_data_from_database_for_attendance",
      function(data){ $("#description_div").html(data);
      });
   }
        
  function wait(){
       var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
       $("#description_div").html(ajax_load);

    }

    </script>
</body>
</html>