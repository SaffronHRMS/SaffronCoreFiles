<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
     
</head>
<body>
<h3 style="font-family: Steinem;"><center>SYSTEM USER</center></h3>
<div id="inside_middle">
    <div id="message_showing_area">
    </div>
    <div id="menu_div">
     
                
                <div class="container-login" id="container-login">
                    <div class="rowme">
                        <div class="row_content_left">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Username:</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" id="addusername" class="span4me" name="addusername" placeholder="Username">
                                      
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Password:</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="password" id="addpassword" class="span4me" name="addpassword" placeholder="Password">
                                      
                              </div>
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Retype Password :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  
                                     <input type="password" id="confirm_password" class="span4me" name="confirm_password" placeholder="Retype Password">
                                      
                              </div>
                                             
                        </div><!--row_content_left-->

                        <div class="row_content_right">
                                <div class="row_content_left_left">
                                  <div class="name_field">
                                     <b>Select Employee Id :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                <!-- <div class="text_area_field1"> -->
                                      <select name="employee_id" id="employee_id">
                                        <option value="">-------Select-------</option>
                                       <?php 
                                       if(isset($records)) :
                                       foreach($records as $row) : ?>
                                       <option value="<?php echo($row->employee_id)?>"><?php echo($row->employee_id)?></option>
                                       <?php endforeach;
                                           else : ?>   
                                           <option value="">No Data</option>
                                           <?php endif; ?>
                                        </select>
                                
                              </div>
                              <div class="row_content_left_left">
                                  <div class="name_field">
                                     <b> Role for User:</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                <!-- <div class="text_area_field1"> -->
                                      <select name="employee_role" id="employee_role">
                                        <option value="">-------Select-------</option>
                                       <?php 
                                       if(isset($role)) :
                                       foreach($role as $row) : ?>
                                       <option value="<?php echo($row->role_id)?>"><?php echo($row->role_name)?></option>
                                       <?php endforeach;
                                           else : ?>   
                                           <option value="">No Data</option>
                                           <?php endif; ?>
                                        </select>
                                
                              </div>
                              <div class="row_content_left_left">
                                  <div class="name_field">
                                    <b>Work Shift:</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  
                                    <select name="work_shift_name" id="work_shift_name">
                                          <option value="">-------Select-------</option>
                                         <?php 
                                         if(isset($work_shift)) :
                                         foreach($work_shift as $row) : ?>
                                         <option value="<?php echo($row->name)?>"><?php echo($row->name)?></option>
                                         <?php endforeach;
                                             else : ?>   
                                             <option value="">No Data</option>
                                             <?php endif; ?>
                                          </select>
                                      
                              </div>

                        </div><!--row_content_right-->
                    <hr style="width:1130px; margin-left:80px">
                           
                            <div id="create_employee_button" class="button_field">
                                <button type="button" class="btn btn-success " id="create_add_employee">Create</button>&nbsp;&nbsp;
                                <button type="button" class="btn btn-info" id="cancel_add_employee">Cancel</button>
                             </div><!--end #create_employee_button-->
                    </div>

            </div>
            <input type="submit" class="btn btn-success" value="ADD" id="add_employee_form">
                           
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



      $("#add_employee_form").click(function(){
         if($("#message_showing_area").hide())
         {
          $("#message_showing_area").show();
         }
        if($("#update_div").show())
         {
          $("#update_div").hide();
         }           
        $("#add_employee_form").hide();
        $("#addpassword").show();
         $("#select_heading").show();
        $("#employee_id").show();

        $("#create_employee_button").show();
        $("#container-login").show();
      });


      $("#create_add_employee").click(function(){
        wait();//alert ($("#employee_id").val());
           if($("#message_showing_area").hide())
         {
          $("#message_showing_area").show();
         }         
         if($("#addusername").val()!='')
         {
            if($("#addpassword").val()!='')
            {
             if($("#addpassword").val().length>6)
            { 
               if($("#employee_id").val()!='')
               {//alert($(#employee_id).val());
                   if($("#addpassword").val()==$("#confirm_password").val())
                   {
                       if($("#employee_role").val()!='')
                          {
                              if($("#work_shift_name").val()!='')
                                   {
                                      $.post("index.php/admin_ctrl/show_submit_data_for_adding_user",{addusername:$("#addusername").val(),work_shift:$("#work_shift_name").val(),
                                       addpassword:$("#addpassword").val(),employee_id:$("#employee_id").val(),employee_role:$("#employee_role").val(),},
                                       function(data){ $("#message_showing_area").html(data);clearInput();add_employee_detail();
                                       });
                                    }
                                    else
                                    {
                                      document.getElementById("message_showing_area").innerHTML="Select Work Shift For Employee";
                                    }  
                            }
                            else
                            {
                              document.getElementById("message_showing_area").innerHTML="Select Role For Employee";
                            }
                    }
                    else
                    {
                      document.getElementById("message_showing_area").innerHTML="Password do not match";
                    }
                }
                else
                {
                  document.getElementById("message_showing_area").innerHTML="Select Employee ID to make it user";
                }
            }
            else
             {
                document.getElementById("message_showing_area").innerHTML="Password Must be greater than 6  digits";    
             }
            }
            else
             {
                document.getElementById("message_showing_area").innerHTML="Password is blank";    
             }
         
         }
         else
         {    
            document.getElementById("message_showing_area").innerHTML="Username is blank";
         }   

      });     


      $("#cancel_add_employee ,#cancel_delete_employee").click(function(){
         clearInput();
         $("#create_employee_button").hide();
         $("#add_employee_form").show();
        $("#container-login").hide();

      });     

   function clearInput()
   {
    $("#addusername").val('');
    $("#addpassword").val('');
    $("#employee_id").val('');
    $("#employee_role").val('');
    $("#confirm_password").val('');
    $("#work_shift").val('');
   }





  function add_employee_detail(){
   // wait();
      $.post("index.php/admin_ctrl/show_data_from_database_for_add_employee",
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