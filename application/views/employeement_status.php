<html>
<head>
	<title></title>
	<link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
     
      <script type="text/javascript" src="<?php echo(base_url()); ?>js/jquery-1.7.2.min.js"></script>
     
</head>
<body>
<h3 style="font-family: Steinem;"><center>EMPLOYMENT STATUS</center></h3>
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
                                  
                                      <input type="text" id="employment_status_name" class="span4me" name="employment_status_name" placeholder="Employment Status Name">
                                      
                              </div>                 
                        </div><!--row_content_left-->

                        <div class="row_content_right">

                              <div class="row_content_left_left_less">
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
                   <!--  </div>
                    <div class="rowme"> -->
                           <hr style="width:1130px; margin-left:80px">
                            <div id="create_job_title_button" class="button_field">
                                <button type="button" class="btn btn-success " id="create_add_employment_status">Create</button>&nbsp;&nbsp;
                                <button type="button" class="btn btn-info" id="cancel_add_employment_status">Cancel</button>
                             </div><!--end #create_employee_button-->
                    </div>
           
          </div>

			           <input type="submit" class="btn btn-success" value="ADD" id="add_employment_status_form">		
			 
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
        $("#create_employment_status_button").hide();
        $("#container-login").hide();
        employment_status_detail();
  });


         $("#add_employment_status_form").click(function(){
 
        $("#add_employment_status_form").hide();
        $("#create_employment_status_button").show();
        $("#container-login").show();
      });


     $("#create_add_employment_status").click(function(){
      if($("#message_showing_area").hide())
         {
          $("#message_showing_area").show();
         }
      if($("#update_div").show())
         {
          $("#update_div").hide();
         }   
               if($("#employment_status_name").val()!='')
               {//alert($(#employee_id).val());
                  $.post("index.php/admin_ctrl/show_submit_data_for_adding_employment_status",
                    {employment_status_name:$("#employment_status_name").val(),},
                 function(data){ $("#message_showing_area").html(data);clearInput();employment_status_detail();
                 });
                }
                else
                {
                  document.getElementById("message_showing_area").innerHTML="Select Employee ID to make it user";
                }
        });

    

      $("#cancel_add_employment_status").click(function(){
         clearInput();
         $("#create_employment_status_button").hide();
        $("#container-login").hide();
        $("#add_employment_status_form").show();

      });     

   function clearInput()
   {
    $("#employment_status_name").val('');
   }

  function employment_status_detail(){
   // wait();
      $.post("index.php/admin_ctrl/show_data_from_database_for_employment_status",
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