<html>
<head>
	<title></title>
	<link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
     
</head>
<body>
<h3 style="font-family: Steinem;"><center>LEAVE TYPE</center></h3>
<div id="inside_middle">
   <div id="message_showing_area">
    </div>
	<div id="menu_div">

         <div class="container-login" id="container-login">
                 <div class="rowme">
                        <div class="row_content_left">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Leave Type Id:</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                      <input type="text" id="leave_id" class="span4me" name="leave_id" placeholder="Leave type ID">                                
                              </div>                
                        </div><!--row_content_left-->

                        <div class="row_content_right">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Leave Type Name :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                 <input type="text" id="leave_name" class="span4me" name="leave_name" placeholder="Leave type name">       
                              </div>
                        </div><!--row_content_right-->
                   <hr style="width:1130px; margin-left:80px">
                            <div id="create_leave_type_button" class="button_field">
                                <button type="button" class="btn btn-success " id="create_add_leave_type">Create</button>&nbsp;&nbsp;
                                <button type="button" class="btn btn-info" id="cancel_add_leave_type">Cancel</button>
                             </div><!--end #create_employee_button-->
                    </div>
           
         </div>
                  <input type="submit" class="btn btn-success" value="ADD" id="add_leave_type_form">	 
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
        $("#create_leave_type_button").hide();
        $("#container-login").hide();
        leave_type_detail();
  });


         $("#add_leave_type_form").click(function(){
 
        $("#add_leave_type_form").hide();
        $("#create_leave_type_button").show();
        $("#container-login").show();
      });


     $("#create_add_leave_type").click(function(){
      if($("#message_showing_area").hide())
         {
          $("#message_showing_area").show();
         }
      if($("#update_div").show())
         {
          $("#update_div").hide();
         }   
         if($("#leave_id").val()!='')
               {
	               if($("#leave_name").val()!='')
	               {//alert($(#employee_id).val());
	                  $.post("index.php/admin_ctrl/show_submit_data_for_adding_leave_type",
	                    {leave_name:$("#leave_name").val(),leave_id:$("#leave_id").val(),},
	                 function(data){ $("#message_showing_area").html(data);clearInput();leave_type_detail();
	                 });
	                }
	                else
	                {
	                  document.getElementById("message_showing_area").innerHTML="Leave name is blank";
	                }
               }
                else
                {
                  document.getElementById("message_showing_area").innerHTML="Leave ID is blank";
                }  
        });

    

      $("#cancel_add_leave_type").click(function(){
         clearInput();
         $("#create_leave_type_button").hide();
        $("#container-login").hide();
        $("#add_leave_type_form").show();

      });     

   function clearInput()
   {
    $("#leave_name").val('');
    $("#leave_id").val('');
   }

  function leave_type_detail(){
   // wait();
      $.post("index.php/admin_ctrl/show_data_from_database_for_leave_type",
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