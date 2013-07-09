<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
     
</head>
<body>
<h3 style="font-family: Steinem;"><center>ADD EMPLOYEE</center></h3>
<div id="inside_middle">
    <div id="message_showing_area">
    </div>
	<div id="menu_div">
	 
				
                <div class="container-login" id="container-login">
                      <div class="rowme">
                        <div class="row_content_left">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Employee Id:</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                      <input type="text" id="employee_id" class="span4me" name="employee_id" placeholder="Employee ID is must">                                  
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>First Name :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                <!-- <div class="text_area_field1"> -->
                                    <input type="text" id="firstname" class="span4me" name="firstname" placeholder="First name is must">
                                <!-- </div>  -->                              
                              </div>                  
                        </div><!--row_content_left-->

                        <div class="row_content_right">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Middle Name :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                 <input type="text" id="middlename" class="span4me" name="middlename" placeholder="Middle name">        
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Last Name :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                <!-- <div class="text_area_field1"> -->
                                    <input type="text" id="lastname" class="span4me" name="lastname" placeholder="Last name is must">
                                <!-- </div>  -->                            
                              </div> 
                        </div><!--row_content_right-->
                   <hr style="width:1130px; margin-left:80px">
                            <div id="create_employee_button" class="button_field">
                                <button type="button" class="btn btn-success " id="create_employee">Create</button>&nbsp;&nbsp;
                                <button type="button" class="btn btn-info" id="cancel_add_employee">Cancel</button>
                             </div><!--end #create_employee_button-->
                    </div>
            </div>
			<input type="submit" class="btn btn-success" value="ADD" id="add_user_form">		    
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
        $("#create_employee_button").hide();
        $("#container-login").hide();
        add_employee_detail();

  });


    $("#add_user_form").click(function(){
       if($("#update_div").show())
         {
          $("#update_div").hide();
         }

       $("#create_employee_button").show();
       $("#container-login").show();  
       $("#add_user_form").hide();
    });



    $("#cancel_add_employee").click(function(){
      clearInput();
      $("#create_employee_button").hide();
        $("#container-login").hide();
        $("#add_user_form").show();
    });

      $("#create_employee").click(function(){
           if($("#message_showing_area").hide())
         {
          $("#message_showing_area").show();
         }    
      if($("#employee_id").val()!='')
      {
         if($("#firstname").val()!='')
         {
            if($("#lastname").val()!='')
            {
              if($("#middlename").val()!='')
              {
                $.post("index.php/admin_ctrl/show_submit_data_for_employee_add_except_image_field",
                 {firstname:$("#firstname").val(),middlename:$("#middlename").val(),
                  lastname:$("#lastname").val(),employee_id:$("#employee_id").val(),},
                function(data){ $("#message_showing_area").html(data);clearInput();add_employee_detail();
                });
              }
              else
                {
       
                     $.post("index.php/admin_ctrl/show_submit_data_for_employee_add",
                      {firstname:$("#firstname").val(),lastname:$("#lastname").val(),
                       employee_id:$("#employee_id").val(),},
                     function(data){ $("#message_showing_area").html(data);clearInput();add_employee_detail();
                     });

                   
                }

            }
            else
             {
                document.getElementById("message_showing_area").innerHTML="Lastname is blank";    
             }
         
         }
         else
         {    
            document.getElementById("message_showing_area").innerHTML="Firstname is blank";
         } 
       }
       else
       {
        document.getElementById("message_showing_area").innerHTML="Employee ID is blank";
       }    

      });     


   //    $("#cancel_add_employee ,#cancel_delete_employee").click(function(){
   //       clearInput();

   //    });     

   function clearInput()
   {
    $("#firstname").val('');
    $("#lastname").val('');
    $("#middlename").val('');
    $("#employee_id").val('');
   }








  function add_employee_detail(){
   // wait();
      $.post("index.php/admin_ctrl/show_data_from_database_for_adding_employee",
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