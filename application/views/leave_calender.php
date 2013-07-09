<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
     
	<link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
     
      <script type="text/javascript" src="<?php echo(base_url()); ?>js/jquery-1.7.2.min.js"></script>
     
</head>
<body>

<h3 style="font-family: Steinem;"><center>LEAVE CALANDER</center></h3>
<div id="inside_middle">
    <div id="message_showing_area">
    </div>
    <div id="menu_div">
     
                
                <div class="container-login" id="container-login">
                    <div class="row">
                        <div class="span4 offset4 well">
                
                            
                                
                            <input type="text" id="leave_calender_field" class="span4" name="leave_calender" placeholder="Job title "><br>
                            <textarea id="job_desc_field" class="span4" name="leave_calender" placeholder="Job Description " cols="50" rows="3"></textarea><br>
                            <textarea id="job_note_field" class="span4" name="leave_calender" placeholder="Note " cols="50" rows="3"></textarea><br>
                           
                            <div id="create_leave_calender_button">
                            <button type="button" class="btn btn-success " id="create_leave_calender">Create</button>
                            <button type="button" class="btn btn-info" id="cancel_add_leave_calender">Reset</button>
                             </div><!--end #create_employee_button-->


                        </div>
                    </div>
                </div>
            <input type="submit" class="btn btn-success" value="ADD" id="add_leave_calender_form">
            <!-- <input type="submit" class="btn btn-danger" value="DELETE" id="delete_leave_calender_form"> -->
                    
                
    </div><!-- end #menu_div -->
    
                
  
          <div class="row">
              <div class="span4 offset4 well">      
                 <div id="update_div">
                   <!--  <h1>Update div</h1> -->
                  </div><!-- end #update_div -->
                  <!-- <h3 style="font-family: Steinem;">Description</h3>  -->       
                  <div id="description_div">
                  </div><!-- end #description_div -->
              </div>
          </div>    


</div> <!-- end #inside_middle -->

<script type="text/javascript">
    $.ajaxSetup ({
        cache: false
    });
    var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
    

    $(document).ready(function() {
        $("#create_leave_calender_button").hide();
        // $("#delete_leave_calender_button").hide();
        $("#container-login").hide();
        leave_calender_detail();
  });


      $("#add_leave_calender_form").click(function(){
          if($("#update_div").show())
         {
          $("#update_div").hide();
         }
        $("#add_leave_calender_form").hide();
        $("#job_desc_field").show();
        $("#job_note_field").show();
        $("#create_leave_calender_button").show();
        $("#container-login").show();

      });



      $("#create_leave_calender").click(function(){
         wait();
           if($("#message_showing_area").hide())
         {
          $("#message_showing_area").show();
         }          
         if($("#leave_calender_field").val()!='')
         {
            if($("#job_desc_field").val()!='')
             {
                if($("#job_note_field").val()!='')
                {
                
                   $.post("index.php/admin_ctrl/show_leave_calender_submit_data",{leave_calender_field:$("#leave_calender_field").val(),job_desc_field:$("#job_desc_field").val(),job_note_field:$("#job_note_field").val()},
                   function(data){ $("#message_showing_area").html(data);clearInput();leave_calender_detail();
                   });
               
                }
                else
                {    
                    document.getElementById("message_showing_area").innerHTML="Title field is blank";
                }
             }
             else
             {    
                document.getElementById("message_showing_area").innerHTML="Description field is blank";
             }      
         }
         else
         {    
            document.getElementById("message_showing_area").innerHTML="Note field is blank";
         }   

      });     


      $("#cancel_add_leave_calender ,#cancel_delete_leave_calender").click(function(){
         clearInput();

      });     

   function clearInput()
   {
    $("#leave_calender_field").val('');
    $("#job_desc_field").val('');
    $("#job_note_field").val('');
    $("#leave_calender_name_field").val('');
    $("#job_description_field").val('');
    $("#note_field").val('');
   }


  function leave_calender_detail(){
   // wait();
      $.post("index.php/admin_ctrl/show_data_from_database_for_leave_calender",
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