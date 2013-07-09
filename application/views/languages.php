<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
     
</head>
<body>
<h3 style="font-family: Steinem;"><center>LANGUAGES</center></h3>
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
                                  
                                      <input type="text" id="languages_field" class="span4me" name="languages_field" placeholder="Language Name ">
                                      
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
                   <hr style="width:1130px; margin-left:80px">
                           
                            <div id="create_languages_button" class="button_field">
                                <button type="button" class="btn btn-success " id="create_languages">Create</button>&nbsp;&nbsp;
                                <button type="button" class="btn btn-info" id="cancel_add_languages">Cancel</button>
                             </div><!--end #create_employee_button-->
                    </div>
                </div>

           <input type="submit" class="btn btn-success" value="ADD" id="add_languages_form">           
                
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
        $("#create_languages_button").hide();
        // $("#delete_languages_button").hide();
        $("#container-login").hide();
        languages_detail();
  });


      $("#add_languages_form").click(function(){
          if($("#update_div").show())
         {
          $("#update_div").hide();
         }
        $("#add_languages_form").hide();
        $("#create_languages_button").show();
        $("#container-login").show();

      });



      $("#create_languages").click(function(){
         wait();
           if($("#message_showing_area").hide())
         {
          $("#message_showing_area").show();
         }          
         if($("#languages_field").val()!='')
         {
           
           $.post("index.php/admin_ctrl/show_languages_submit_data",{languages_field:$("#languages_field").val()},
           function(data){ $("#message_showing_area").html(data);clearInput();languages_detail();
           });
               
         }
         else
         {    
            document.getElementById("message_showing_area").innerHTML="languages field is blank";
         }   

      });     


      $("#cancel_add_languages ").click(function(){
         clearInput();
         $("#create_languages_button").hide();
        $("#add_languages_form").show();
        $("#container-login").hide();

      });     

   function clearInput()
   {
    $("#languages_field").val('');
    //$("#languages_name_field").val('');
   }


  function languages_detail(){
   // wait();
      $.post("index.php/admin_ctrl/show_data_from_database_for_languages",
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