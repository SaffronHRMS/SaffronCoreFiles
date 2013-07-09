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
<h3 style="font-family: Steinem;"><center>WORK SHIFT</center></h3>
<div id="inside_middle">
    <div id="message_showing_area">
    </div>
    <div id="menu_div">
     
                
                <div class="container-login" id="container-login">
                    <div class="rowme">
                        <div class="row_content_left">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Name :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" id="workshift_name_field" class="span4me" name="workshift_name" placeholder="Work Shift Name ">
                                      
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Starting Time :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" id="starting_time_field" class="span4me" name="starting_time" placeholder="HH:mm:ss in 24-hour format">
                                      
                              </div>                 
                        </div><!--row_content_left-->

                        <div class="row_content_right">

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <!-- <b>Ending Time :</b> -->
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                <!-- <div class="text_area_field1"> -->
                                     <!-- <textarea id="job_category_field" class="span4me" name="job_title" placeholder="Note " cols="50" rows="3"></textarea> -->
                                <!-- </div>  --> 
                                
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Ending Time :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                <!-- <div class="text_area_field1"> -->
                                     <input type="text" id="ending_time_field" class="span4me" name="ending_time" placeholder="HH:mm:ss in 24-hour format" >
                                <!-- </div>  --> 
                                
                              </div> 
                        </div><!--row_content_right-->
                   <!--  </div>
                    <div class="rowme"> -->
                           <hr style="width:1130px; margin-left:80px">
                            <div id="create_job_title_button" class="button_field">
                                <button type="button" class="btn btn-success " id="create_workshift">Create</button>&nbsp;&nbsp;
                                <button type="button" class="btn btn-info" id="cancel_add_workshift">Cancel</button>
                             </div><!--end #create_employee_button-->
                    </div>                                            
                </div>

                      <input type="submit" class="btn btn-success" value="ADD" id="add_workshift_form"></center>
                         
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
     var IsEmailValid= /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
     var IsTimeValid=/^([0-9])+\:([0-9])+\:([0-9])/; 

    $(document).ready(function() {
        $("#create_workshift_button").hide();
        $("#container-login").hide();
        workshift_detail();
  });



      $("#add_workshift_form").click(function(){
         if($("#message_showing_area").hide())
         {
          $("#message_showing_area").show();
         }
        if($("#update_div").show())
         {
          $("#update_div").hide();
         }           
        $("#add_workshift_form").hide();
        $("#starting_time_field").show();
        $("#ending_time_field").show();
     
        $("#create_workshift_button").show();
        $("#container-login").show();
      });


      $("#create_workshift").click(function(){
        wait();
           if($("#message_showing_area").hide())
         {
          $("#message_showing_area").show();
         }         
         if($("#workshift_name_field").val()!='')
         {
            if($("#starting_time_field").val().length==8 && IsTimeValid.test($("#starting_time_field").val()))
             {
                if($("#ending_time_field").val().length==8 && IsTimeValid.test($("#ending_time_field").val()))
                {
                
                   $.post("index.php/admin_ctrl/show_workshift_submit_data",{workshift_name_field:$("#workshift_name_field").val(),starting_time_field:$("#starting_time_field").val(),ending_time_field:$("#ending_time_field").val()},
                   function(data){ $("#message_showing_area").html(data);clearInput();workshift_detail();
                   });
               
                }
                else
                {    
                    alert ("Enter Valid Time hh:mm:ss !");
                }
             }
             else
             {    
                alert ("Enter Valid Time hh:mm:ss !");
             }      
         }
         else
         {    
            alert ("Name field is blank !");
         }   

      });     


      $("#cancel_add_workshift ,#cancel_delete_workshift").click(function(){
         clearInput();
         $("#create_workshift_button").hide();
        $("#container-login").hide();
        $("#add_workshift_form").show();

      });     

   function clearInput()
   {
    $("#workshift_name_field").val('');
    $("#starting_time_field").val('');
    $("#ending_time_field").val('');
   }



  function workshift_detail(){
   // wait();
      $.post("index.php/admin_ctrl/show_data_from_database_for_workshift",
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