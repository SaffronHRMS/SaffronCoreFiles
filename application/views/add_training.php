<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
     
</head>
<body>
<h3 style="font-family: Steinem;">ADD TRAINING</h3>
<div id="inside_middle">
    <div id="message_showing_area">
    </div>
    <div id="menu_div">
     
                
                <div class="container-login" id="container-login">
                    <div class="row">
                        <div class="span4 offset4 well">

                              
                            <input type="text" id="training_course_name" class="span4" name="add_training" placeholder="Course Name "><br />
                            
                            <input type="text" id="training_company" class="span4" name="add_training" placeholder="Compnay Name "><br />
                            
                            <input type="text" id="training_date_schedule" class="span4" name="add_training" placeholder="Date Scheduled "><br />

                            <input type="text" id="training_coordinator" class="span4" name="add_training" placeholder="Coordinator "><br />

                            <input type="text" id="training_cost" class="span4" name="add_training" placeholder="Cost "><br />

                            <input type="text" id="training_tags" class="span4" name="add_training" placeholder="Tags "><br />

                            <input type="text" id="training_id" class="span4" name="add_training" placeholder="Training ID "><br />

                            <input type="text" id="training_status" class="span4" name="add_training" placeholder="Status "><br />

                            <input type="text" id="training_time" class="span4" name="add_training" placeholder="Training Time "><br />

                            <input type="text" id="training_location" class="span4" name="add_training" placeholder="Location "><br />

                            <textarea id="training_note_field" class="span4" name="add_training" placeholder="Note " cols="50" rows="3"></textarea><br>
                           
                            <div id="create_add_training_button">
                            <button type="button" class="btn btn-success " id="create_add_training">Create</button>
                            <button type="button" class="btn btn-info" id="cancel_add_add_training">Reset</button>
                             </div><!--end #create_employee_button-->


                        </div>
                    </div>
                </div>
            <input type="submit" class="btn btn-success" value="ADD" id="add_add_training_form">
            <!-- <input type="submit" class="btn btn-danger" value="DELETE" id="delete_add_training_form"> -->
                    
                
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
        $("#create_add_training_button").hide();
        // $("#delete_add_training_button").hide();
        $("#container-login").hide();
        add_training_detail();
  });


      $("#add_add_training_form").click(function(){
          if($("#update_div").show())
         {
          $("#update_div").hide();
         }
        $("#add_add_training_form").hide();
        $("#training_course_name").show();
        $("#training_company").show();
        $("#training_date_schedule").show();
        $("#training_coordinator").show();
        $("#training_cost").show();
        $("#training_tags").show();
        $("#training_id").show();
        $("#training_status").show();
        $("#training_time").show();
        $("#training_location").show();
        $("#training_note_field").show();
        $("#create_add_training_button").show();
        $("#container-login").show();

      });



      $("#create_add_training").click(function(){
         wait();
           if($("#message_showing_area").hide())
         {
          $("#message_showing_area").show();
         }          
         if($("#training_course_name").val()!='')
         {
            if($("#training_company").val()!='')
             {
                if($("#training_date_schedule").val()!='')
                {
                
                   $.post("index.php/admin_ctrl/show_add_training_submit_data",{training_name_field:$("#training_name_field").val(),training_duration_field:$("#training_duration_field").val(),training_note_field:$("#training_note_field").val(),training_fee_field:$("#training_fee_field").val()},
                   function(data){ $("#message_showing_area").html(data);clearInput();add_training_detail();
                   });
               
                }
                else
                {    
                    document.getElementById("message_showing_area").innerHTML="Course Title field is blank";
                }
             }
             else
             {    
                document.getElementById("message_showing_area").innerHTML="Course Duration field is blank";
             }      
         }
         else
         {    
            document.getElementById("message_showing_area").innerHTML="Course Fee field is blank";
         }   

      });     


      $("#cancel_add_add_training ,#cancel_delete_add_training").click(function(){
         clearInput();

      });     

   function clearInput()
   {
    $("#training_course_name").val('');
    $("#training_company").val('');
    $("#training_date_schedule").val('');
    $("#training_note_field").val('');
   }


  function add_training_detail(){
   // wait();
      $.post("index.php/admin_ctrl/show_data_from_database_for_add_training",
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