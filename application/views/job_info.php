<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
     
</head>
<body>
<h3 style="font-family: Steinem;"><center>JOB TITLE</center></h3>
<div id="inside_middle">
    <div id="message_showing_area">
    </div>
    <div id="menu_div">
     
                
                <div class="container-login" id="container-login">
                    <div class="rowme">
                        <div class="row_content_left">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Title :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" id="job_title_field" class="span4me" name="job_title" placeholder="Job title ">
                                      
                              </div>

                              <div class="row_content_left_left_for_text_area_less">
                                  <div class="name_field">
                                     <b>Job Description :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right_for_text_area">
                                <!-- <div class="text_area_field1"> -->
                                     <textarea id="job_desc_field" class="span4me" name="job_title" placeholder="Job Description " cols="50" rows="3"></textarea>
                                <!-- </div>  --> 
                                
                              </div>                  
                        </div><!--row_content_left-->

                        <div class="row_content_right">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Job Category :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <!-- <input type="text" id="job_category_field" class="span4me" name="job_category" placeholder="Job Category "> -->

                                  <select name="job_category" id="job_category_field">
                                    <option value="">------ Select ------</option>
                                     <?php 
                                     if(isset($records)) :
                                     foreach($records as $row) : ?>
                                     <option value="<?php echo($row->name)?>"><?php echo($row->name)?></option>
                                     <?php endforeach;
                                     else : ?>   
                                     <option value="">No Data</option>
                                     <?php endif; ?>
                                  </select>    
                                      
                              </div>

                              <div class="row_content_left_left_for_text_area_less">
                                  <div class="name_field">
                                     <!-- <b>Note :</b> -->
                                  </div>  
                              </div>
                              <div class="row_content_left_right_for_text_area">
                                <!-- <div class="text_area_field1"> -->
                                     <!-- <textarea id="job_category_field" class="span4me" name="job_title" placeholder="Note " cols="50" rows="3"></textarea> -->
                                <!-- </div>  --> 
                                
                              </div> 
                        </div><!--row_content_right-->
                           <hr style="width:1130px; margin-left:80px">
                            <div id="create_job_title_button" class="button_field">
                                <button type="button" class="btn btn-success " id="create_job_title">Create</button>&nbsp;&nbsp;
                                <button type="button" class="btn btn-info" id="cancel_add_job_title">Cancel</button>
                             </div><!--end #create_employee_button-->
                    </div>
                </div>
            <input type="submit" class="btn btn-success" value="ADD" id="add_job_title_form">
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
        $("#create_job_title_button").hide();
        // $("#delete_job_title_button").hide();
        $("#container-login").hide();
        job_info_detail();
  });


      $("#add_job_title_form").click(function(){
          if($("#update_div").show())
         {
          $("#update_div").hide();
         }
        $("#add_job_title_form").hide();
        $("#job_desc_field").show();
        $("#job_category_field").show();
        $("#create_job_title_button").show();
        $("#container-login").show();

      });



      $("#create_job_title").click(function(){
        
           if($("#message_showing_area").hide())
         {
          $("#message_showing_area").show();
         }          
         if($("#job_title_field").val()!='')
         {
            if($("#job_desc_field").val()!='')
             {
                if($("#job_category_field").val()!='')
                {
                 wait();
                   $.post("index.php/admin_ctrl/show_job_title_submit_data",{job_title_field:$("#job_title_field").val(),job_desc_field:$("#job_desc_field").val(),job_category_field:$("#job_category_field").val()},
                   function(data){ $("#message_showing_area").html(data);clearInput();job_info_detail();
                   });
               
                }
                else
                {    
                    alert ("Select Job Category !");
                }
             }
             else
             {    
                alert ("Description field is blank !");
             }      
         }
         else
         {    
            alert ("Title field is blank !");
         }   

      });     


      $("#cancel_add_job_title ,#cancel_delete_job_title").click(function(){
         clearInput();
         $("#container-login").hide();
         $("#add_job_title_form").show();

      });     

   function clearInput()
   {
    $("#job_title_field").val('');
    $("#job_desc_field").val('');
    $("#job_category_field").val('');
    $("#job_title_name_field").val('');
    $("#job_description_field").val('');
    $("#note_field").val('');
   }


  function job_info_detail(){
   // wait();
      $.post("index.php/admin_ctrl/show_data_from_database_for_job_title",
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