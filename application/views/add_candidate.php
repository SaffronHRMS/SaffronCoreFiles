<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
     
</head>
<body>
<h3 style="font-family: Steinem;">ADD CANDIDATE</h3>
<div id="inside_middle">
    <div id="message_showing_area">
    </div>
    <div id="menu_div">
     
                
                <div class="container-login" id="container-login">
                    <div class="row">
                        <div class="span4 offset4 well">

                              
                            <input type="text" id="candidate_first_name" class="span4" name="add_candidate" placeholder="First Name "><br />
                            
                            <input type="text" id="candidate_middle_name" class="span4" name="add_candidate" placeholder="Middle Name "><br />
                            
                            <input type="text" id="candidate_last_name" class="span4" name="add_candidate" placeholder="Last Name "><br />

                            <input type="text" id="candidate_email" class="span4" name="add_candidate" placeholder="Email "><br />

                            <input type="text" id="candidate_contact_number" class="span4" name="add_candidate" placeholder="Contact Number "><br />

                            <input type="text" id="candidate_applied_for" class="span4" name="add_candidate" placeholder="Applied for "><br />

                            <input type="text" id="candidate_skills" class="span4" name="add_candidate" placeholder="Skills "><br />

                            <textarea id="candidate_comment" class="span4" name="add_candidate" placeholder="Coomment " cols="50" rows="3"></textarea><br>
                           
                            <div id="create_add_candidate_button">
                            <button type="button" class="btn btn-success " id="create_add_candidate">Create</button>
                            <button type="button" class="btn btn-info" id="cancel_add_add_candidate">Reset</button>
                             </div><!--end #create_employee_button-->


                        </div>
                    </div>
                </div>
            <input type="submit" class="btn btn-success" value="ADD" id="add_add_candidate_form">
            <!-- <input type="submit" class="btn btn-danger" value="DELETE" id="delete_add_candidate_form"> -->
                    
                
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
        $("#create_add_candidate_button").hide();
        // $("#delete_add_candidate_button").hide();
        $("#container-login").hide();
        add_candidate_detail();
  });


      $("#add_add_candidate_form").click(function(){
          if($("#update_div").show())
         {
          $("#update_div").hide();
         }
        $("#add_add_candidate_form").hide();
        $("#candidate_first_name").show();
        $("#candidate_middle_name").show();
        $("#candidate_last_name").show();
        $("#candidate_email").show();
        $("#candidate_contact_number").show();
        $("#candidate_applied_for").show();
        $("#candidate_skills").show();
        $("#candidate_comment").show();
        $("#create_add_candidate_button").show();
        $("#container-login").show();

      });



      $("#create_add_candidate").click(function(){
         wait();
           if($("#message_showing_area").hide())
           {
            $("#message_showing_area").show();
           }          
           if($("#candidate_first_name").val()!='')
           {
            if($("#candidate_last_name").val()!='')
            {
             if($("#candidate_email").val()!='')
             {
              if($("#candidate_contact_number").val()!='')
              {
               if($("#candidate_applied_for").val()!='')
               {
                if($("#candidate_skills").val()!='')
                {
                  $.post("index.php/admin_ctrl/show_add_candidate_submit_data",{candidate_first_name:$("#candidate_first_name").val(),candidate_middle_name:$("#candidate_middle_name").val(),candidate_last_name:$("#candidate_last_name").val(),candidate_email:$('#candidate_email').val(),candidate_contact_number:$('#candidate_contact_number').val(),candidate_applied_for:$('#candidate_applied_for').val(),candidate_skills:$('#candidate_skills').val(),candidate_comment:$("#candidate_comment").val()},
                    function(data){ $("#message_showing_area").html(data);clearInput();add_candidate_detail();
                    });
                }
                else
                {
                  document.getElementById("message_showing_area").innerHTML="Skill field is blank";
                }            
              }
              else
              {    
                document.getElementById("message_showing_area").innerHTML="Applied for field is blank";
              }
            }
            else
            {
              document.getElementById("message_showing_area").innerHTML="Contact Number field is blank";
            }
          }
          else
          {
            document.getElementById("message_showing_area").innerHTML="Email field is blank";
          }
        }
        else
        {
          document.getElementById("message_showing_area").innerHTML="Last name field is blank";
        }
      }
      else
      {
        document.getElementById("message_showing_area").innerHTML="First name field is blank";
      }
          });     


      $("#cancel_add_add_candidate ,#cancel_delete_add_candidate").click(function(){
         clearInput();

      });     

   function clearInput()
   {
    $("#candidate_first_name").val('');
    $("#candidate_middle_name").val('');
    $("#candidate_last_name").val('');
    $("#candidate_email").val('');
    $("#candidate_contact_number").val('');
    $("#candidate_applied_for").val('');
    $("#candidate_skills").val('');
    $("#candidate_comment").val('');
   }


  function add_candidate_detail(){
   // wait();
      $.post("index.php/admin_ctrl/show_data_from_database_for_add_candidate",
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