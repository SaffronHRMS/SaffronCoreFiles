<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
     
</head>
<body>
<h3 style="font-family: Steinem;"><center>SKILLS</center></h3>
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
                                  
                                      <input type="text" id="skill_field" class="span4me" name="skill_field" placeholder="Skill Name ">
                                      
                              </div>                 
                        </div><!--row_content_left-->

                        <div class="row_content_right">

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Description :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right_for_text_area">
                                <!-- <div class="text_area_field1"> -->
                                     <textarea id="skill_desc" class="span4me" name="skill_desc" placeholder="Skill Description " cols="50" rows="3"></textarea>
                                <!-- </div>  --> 
                                
                              </div> 
                        </div><!--row_content_right-->
                    <hr style="width:1130px; margin-left:80px">
                           
                            <div id="create_skill_button" class="button_field">
                                <button type="button" class="btn btn-success " id="create_skill">Create</button>&nbsp;&nbsp;
                                <button type="button" class="btn btn-info" id="cancel_add_skill">Cancel</button>
                             </div><!--end #create_employee_button-->
                    </div>                                            
                </div>

        
            <input type="submit" class="btn btn-success" value="ADD" id="add_skill_form">
            <!-- <input type="submit" class="btn btn-danger" value="DELETE" id="delete_skill_form"> -->
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
        $("#create_skill_button").hide();
        // $("#delete_skill_button").hide();
        $("#container-login").hide();
        skill_detail();
  });


      $("#add_skill_form").click(function(){
          if($("#update_div").show())
         {
          $("#update_div").hide();
         }
        $("#add_skill_form").hide();
        $("#create_skill_button").show();
        $("#container-login").show();

      });



      $("#create_skill").click(function(){
         wait();
           if($("#message_showing_area").hide())
         {
          $("#message_showing_area").show();
         }          
         if($("#skill_field").val()!='')
         {
           
           $.post("index.php/admin_ctrl/show_skill_submit_data",{skill_field:$("#skill_field").val(),skill_desc:$("#skill_desc").val()},
           function(data){ $("#message_showing_area").html(data);clearInput();skill_detail();
           });
               
         }
         else
         {    
            document.getElementById("message_showing_area").innerHTML="skill field is blank";
         }   

      });     


      $("#cancel_add_skill ").click(function(){
         clearInput();
        $("#create_skill_button").hide();
        $("#add_skill_form").show();
        $("#container-login").hide();

      });     

   function clearInput()
   {
    $("#skill_field").val('');
    //$("#skill_name_field").val('');
   }


  function skill_detail(){
   // wait();
      $.post("index.php/admin_ctrl/show_data_from_database_for_skill",
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