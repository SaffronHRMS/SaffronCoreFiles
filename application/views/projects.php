<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
     
</head>
<body>
<h3 style="font-family: Steinem;"><center>PROJECTS</center></h3>
<div id="inside_middle">
    <div id="message_showing_area">
    </div>
    <div id="menu_div">
     
                
             <div class="container-login" id="container-login">
                    <div class="rowme">
                        <div class="row_content_left">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Project Id :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" id="addprojectid" class="span4me" name="addprojectid" placeholder="Project ID">
                                      
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Name :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  
                                       <input type="text" id="project_name" class="span4me" name="project_name" placeholder="Project Name">
                                      
                              </div>
                              
                               <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Description :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right_for_text_area">
                                <!-- <div class="text_area_field1"> -->
                                     <textarea id="project_description" class="span4me" name="project_description" placeholder="Project Description " cols="50" rows="3"></textarea>
                                <!-- </div>  --> 
                                
                              </div>
                                               
                        </div><!--row_content_left-->

                        <div class="row_content_right">
                               <div class="row_content_left_left">
                                  <div class="name_field">
                                    <b>Select Customer Name :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <select name="customer_id" id="customer_id">
                                        <option value="">------Select------</option>
                                       <?php 
                                       if(isset($customer)) :
                                       foreach($customer as $row) : ?>
                                       <option value="<?php echo($row->name)?>"><?php echo($row->name)?></option>
                                       <?php endforeach;
                                           else : ?>   
                                           <option value="">No Data</option>
                                           <?php endif; ?>
                                        </select>
                                      
                              </div>

                               <div class="row_content_left_left">
                                  <div class="name_field">
                                    <b>Select Project Admin:</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <select name="project_admin" id="project_admin">
                                        <option value="">------Select------</option>
                                       <?php 
                                       if(isset($project_admin)) :
                                       foreach($project_admin as $row) : ?>
                                       <option value="<?php echo $row->emp_first_name." ".$row->emp_middle_name." ".$row->emp_last_name ;?>"><?php echo $row->emp_first_name." ".$row->emp_middle_name." ".$row->emp_last_name ;?></option>
                                       <?php endforeach;
                                           else : ?>   
                                           <option value="">No Data</option>
                                           <?php endif; ?>
                                        </select>
                                      
                              </div> 

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <!-- <b>Description :</b> -->
                                  </div>  
                              </div>
                              <div class="row_content_left_right_for_text_area">
                                <!-- <div class="text_area_field1"> -->
                                     <!-- <textarea id="customer_description" class="span4me" name="customer_description" placeholder="Customer Description " cols="50" rows="3"></textarea> -->
                                <!-- </div>  --> 
                                
                              </div>

                        </div><!--row_content_right-->
                 <hr style="width:1130px; margin-left:80px">
                           
                            <div id="create_button" class="button_field">
                                <button type="button" class="btn btn-success " id="create_project">Create</button>&nbsp;&nbsp;
                                <button type="button" class="btn btn-info" id="cancel_project">Cancel</button>
                             </div><!--end #create_employee_button-->
                    </div>

            </div>
            <input type="submit" class="btn btn-success" value="ADD" id="add_project_form">              
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
        $("#create_button").hide();
       
        $("#container-login").hide();
        projects_detail();
  });




      $("#add_project_form").click(function(){
          if($("#update_div").show())
         {
          $("#update_div").hide();
         }       
        $("#add_project_form").hide();
        $("#customer_id").show();
        $("#project_admin").show();
         $(".select_heading").show();
  
        $("#create_button").show();
        $("#container-login").show();
      });



      $("#create_project").click(function(){
        wait();//alert ($("#employee_id").val());
           if($("#message_showing_area").hide())
         {
          $("#message_showing_area").show();
         }
         if($("#addprojectid").val()!='')
         {         
             if($("#project_name").val()!='')
             {
                if($("#customer_id").val()!='')
                {
                   if($("#project_admin").val()!='')
                   {
                        if($("#project_description").val()!='')
                        {
                          $.post("index.php/admin_ctrl/show_submit_data_for_adding_project",
                            {project_id:$("#addprojectid").val(),project_name:$("#project_name").val(),project_description:$("#project_description").val(),
                         customer_id:$("#customer_id").val(),project_admin:$("#project_admin").val(),},
                         function(data){ $("#message_showing_area").html(data);clearInput();projects_detail();
                         });
                        }
                        else
                        {
                            document.getElementById("message_showing_area").innerHTML="Enter Some detail about Project";
                        }
                   }
                    else
                    {
                      document.getElementById("message_showing_area").innerHTML="project admin is blank";
                    }
                }
                else
                 {
                    document.getElementById("message_showing_area").innerHTML="customer id is blank";    
                 }
             
             }
             else
             {    
                document.getElementById("message_showing_area").innerHTML="Project name is blank";
             }

          }
         else
         {    
            document.getElementById("message_showing_area").innerHTML="Project Id is blank";
         }   

      });     


      $("#cancel_project ,#cancel_delete_project").click(function(){
        $("#create_button").hide();
        $("#add_project_form").show();
        $("#container-login").hide();
         clearInput();

      });     

   function clearInput()
   {
    $("#project_name").val('');
    $("#addprojectid").val('');
    $("#customer_id").val('');
    $("#project_admin").val('');
    $("#project_description").val('');
    
   }


  function projects_detail(){
   // wait();
      $.post("index.php/admin_ctrl/show_data_from_database_for_project",
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