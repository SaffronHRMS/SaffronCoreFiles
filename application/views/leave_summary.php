<html>
<head>
	<title></title>
	<link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo(base_url()); ?>css/date_pick-ui.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo(base_url()); ?>css/style_date_pick.css" type="text/css" media="screen" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
     
      <script type="text/javascript" src="<?php echo(base_url()); ?>js/jquery-1.7.2.min.js"></script>
     <script type="text/javascript" src="<?php echo(base_url()); ?>js/date_pick-ui.js"></script>
</head>
<body>
<h3 style="font-family: Steinem;"><center>LEAVE SUMMARY</center></h3>
<div id="inside_middle">
   <div id="message_showing_area">
    </div>
	<div id="menu_div">

         <div class="container-login" id="container-login">
                 <div class="rowme">
                        <div class="row_content_left">
                              <div class="row_content_left_left">
                                  <div class="name_field">
                                    <b>Employee First Name:</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                      <input type="text" id="employee_name" class="span4me" name="employee_name" placeholder="Employee first name">                                 
                              </div>           
                        </div><!--row_content_left-->

                        <div class="row_content_right">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Employee Id :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                 <input type="text" id="employee_id" class="span4me" name="employee_id" placeholder="Search Employee ID">       
                              </div>
                        </div><!--row_content_right-->
                    <hr style="width:1130px; margin-left:80px">
                            <div id="create_search_leave_summary_button" class="button_field">
                                <button type="button" class="btn btn-success " id="create_leave_summary">Search</button>&nbsp;&nbsp;
                                <button type="button" class="btn btn-info" id="cancel_leave_summary">Cancel</button>
                             </div><!--end #create_employee_button-->
                    </div>
         </div>
	          <input type="submit" class="btn btn-success" value="SEARCH" id="add_leave_summary_form">		 
    </div><!-- end #menu_div -->

      
                 <div id="update_div">
                   <!--  <h1>Update div</h1> -->
                  </div><!-- end #update_div -->
                  <!-- <h3 style="font-family: Steinem;">Description</h3>  -->       
                  <div id="description_div">
                  </div><!-- end #description_div -->


</div> <!-- end #inside_middle -->

<script type="text/javascript">
   

    $(document).ready(function() {
        $("#create_search_leave_summary_button").hide();
        $("#container-login").hide();
         leave_summary_detail();
  });


         $("#add_leave_summary_form").click(function(){
 
        $("#add_leave_summary_form").hide();
        $("#create_search_leave_summary_button").show();
        $("#container-login").show();
      });


     $("#create_leave_summary").click(function(){
      if($("#message_showing_area").hide())
         {
          $("#message_showing_area").show();
         }
      if($("#update_div").show())
         {
          $("#update_div").hide();
         }   

	               if($("#employee_name").val()!='')
	               {
                    $.post("index.php/admin_ctrl/show_submit_data_for_leave_summary_search_by_name",
                      {employee_name:$("#employee_name").val(),},
                      function(data){ $("#description_div").html(data);clearInput();
                       });
	                }
	                else
	                {
                    if($("#employee_id").val()!='')
                     {
                        $.post("index.php/admin_ctrl/show_submit_data_for_leave_summary_search_by_id",
                          {employee_id:$("#employee_id").val(),},
                         function(data){ $("#description_div").html(data);clearInput();
                         });
                     }
                     else
                     {
                       document.getElementById("message_showing_area").innerHTML="One is required!";
                     }
                   
	                }
              
        });

    

      $("#cancel_leave_summary").click(function(){
         clearInput();
         $("#create_search_leave_summary_button").hide();
        $("#container-login").hide();
        $("#add_leave_summary_form").show();

      });     

   function clearInput()
   {
    $("#employee_id").val('');
    $("#employee_name").val('');
    $("#employee_id").val('');
   }

  function leave_summary_detail(){
   // wait();
      $.post("index.php/admin_ctrl/show_data_from_database_for_leave_summary",
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