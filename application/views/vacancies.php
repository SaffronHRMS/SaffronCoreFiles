<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
     
</head>
<body>
<h3 style="font-family: Steinem;">JOB VACANCY</h3>
<div id="inside_middle">
    <div id="message_showing_area">
    </div>
    <div id="menu_div">
     
                
                <div class="container-login" id="container-login">
                    <div class="row">
                        <div class="span4 offset4 well">
                
                            
                                
                            <input type="text" id="job_title_field" class="span4" name="job_title_field" placeholder="Job title ">
                            <input type="text" id="no_of_vacancy" class="span4" name="no_of_vacancy" placeholder="No of Vacancy "><br>
                            <input type="text" id="hiring_manager" class="span4" name="hiring_manager" placeholder="Hiring Manager "><br>
                           <textarea id="job_desc_field" class="span4" name="job_title" placeholder="Job Description " cols="50" rows="3"></textarea><br>
                            

                            <div id="create_job_vacancy_button">
                            <button type="button" class="btn btn-success " id="create_job_vacancy">Create</button>
                            <button type="button" class="btn btn-info" id="cancel_add_job_vacancy">Reset</button>
                             </div><!--end #create_employee_button-->

                             <div id="search_job_vacancy_button">
                            <button type="button" class="btn btn-danger " id="search_job_vacancy">Search</button>
                            <button type="button" class="btn btn-info" id="cancel_search_job_vacancy">Reset</button>
                             </div><!--end #create_employee_button-->
                        
                            
                            <!-- </form> -->
                        </div>
                    </div>
                </div>
        <div class="row">        
           <div class="span4 offset4 well">     
            <input type="submit" class="btn btn-success" value="ADD" id="add_job_vacancy_form">
            <input type="submit" class="btn btn-info" value="SEARCH" id="search_job_vacancy_form">
           </div>         
        </div>        
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
        $("#create_job_vacancy_button").hide();
        $("#search_job_vacancy_button").hide();
        $("#container-login").hide();
        job_vacancy_detail();
  });


      $("#add_job_vacancy_form").click(function(){
        $("#search_job_vacancy_button").hide();
        $("#add_job_vacancy_form").hide();
        $("#job_desc_field").show();
        $("#job_note_field").show();
        $("#search_job_vacancy_form").show();
        $("#create_job_vacancy_button").show();
        $("#container-login").show();
      });

      $("#search_job_vacancy_form").click(function(){
        $("#create_job_vacancy_button").hide();
        $("#search_job_vacancy_form").hide();
        $("#job_desc_field").hide();
        $("#job_note_field").hide();
        $("#search_job_vacancy_button").show();
        $("#add_job_vacancy_form").show();
        $("#container-login").show();
      });


      $("#create_job_vacancy").click(function(){
        wait();
         if($("#job_vacancy_field").val()!='')
         {
            if($("#job_desc_field").val()!='')
             {
                if($("#job_note_field").val()!='')
                {
                
                   $.post("index.php/admin_ctrl/show_job_vacancy_submit_data",{job_vacancy_field:$("#job_vacancy_field").val(),job_desc_field:$("#job_desc_field").val(),job_note_field:$("#job_note_field").val()},
                   function(data){ $("#message_showing_area").html(data);clearInput();job_vacancy_detail();
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


      $("#cancel_add_job_vacancy ,#cancel_search_job_vacancy").click(function(){
         clearInput();

      });     

   function clearInput()
   {
    $("#job_vacancy_field").val('');
    $("#job_desc_field").val('');
    $("#job_note_field").val('');
   }



    $("#search_job_vacancy").click(function(){
        wait();
            if($("#job_vacancy_field").val()!='')
            {
               $.post("index.php/admin_ctrl/show_search_job_vacancy",{job_vacancy_field:$("#job_vacancy_field").val()},
               function(data){ $("#message_showing_area").html(data);clearInput();job_vacancy_detail();
               });

            }
            else
             {
                document.getElementById("message_showing_area").innerHTML="Title field is blank";    
             }
         

    });




  function job_vacancy_detail(){
   // wait();
      $.post("index.php/admin_ctrl/show_data_from_database_for_job_vacancy",
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