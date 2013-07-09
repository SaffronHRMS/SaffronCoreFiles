<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
    <script type="text/javascript" src="<?php echo(base_url()); ?>js/jquery-1.7.2.min.js"></script>
     

</head>
<body>
<h3 style="font-family: Steinem;">Apply for Leave</h3>
<div id="inside_middle">
    <div id="message_showing_area">
    </div>
    <div id="menu_div">
     
                
                <div class="container-login" id="container-login">
                    <div class="row">
                        <div class="span4 offset4 well">
                
                    
                        <input type="text" id="employee_id" name="employee_id" placeholder="employee_id"></br>
                        <input type="text" id="apply_date" name="apply_date" placeholder="apply_date"></br>
                        <input type="text" id="leave_type" name="leave_type" placeholder="leave_type"></br>
                        <input type="text" id="date_from" name="date_from" placeholder="date_from YYYY-MM-DD"></br>
                        <input type="text" id="date_to" name="date_to" placeholder="date_to YYYY-MM-DD"></br>

                            <div id="create_button">
                            <button type="button" class="btn btn-success " id="create_leave_apply">Apply</button>
                            <button type="button" class="btn btn-info" id="cancel_leave_apply">Cancel</button>
                             </div><!--end #create_button-->
                            
                            <!-- </form> -->
                        </div>
                    </div>
                </div>
            <!-- <input type="submit" class="btn btn-success" value="SEARCH" id="add_leave_apply_form"> -->
           
                    
                
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
  $("#create_leave_apply").click(function(){
  	 $.post("testing_leave_apply",
                        {employee_id:$("#employee_id").val(),apply_date:$("#apply_date").val(),
                     leave_type:$("#leave_type").val(),date_from:$("#date_from").val(),date_to:$("#date_to").val()},
                     function(data){ $("#message_showing_area").html(data);
                     });
  });
	






    $.ajaxSetup ({
        cache: false
    });
    var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
    

    $(document).ready(function() {
        // $("#create_button").hide();
       
        // $("#container-login").hide();
        // leave_apply_detail();
  });




      // $("#add_leave_apply_form").click(function(){
      //     if($("#update_div").show())
      //    {
      //     $("#update_div").hide();
      //    }       
      //   $("#add_leave_apply_form").hide();
      //   $("#currency_id").show();
      //    $("#select_heading").show();
      //   $("#min_salary").show();
      //   $("#max_salary").show();
  
      //   $("#create_button").show();
      //   $("#container-login").show();
      // });



      // $("#create_leave_apply").click(function(){
      //   wait();//alert ($("#employee_id").val());
      //      if($("#message_showing_area").hide())
      //    {
      //     $("#message_showing_area").show();
      //    }
      //    alert ($("#newsletter").val());         
         // if($("#pay_grade_name").val()!='')
         // {
         //    if($("#min_salary").val()!='')
         //    {
         //       if($("#max_salary").val()!='')
         //       {
         //            if($("#currency_id").val()!='')
         //            {
         //              $.post("index.php/admin_ctrl/show_submit_data_for_adding_leave_apply",
         //                {pay_grade_name:$("#pay_grade_name").val(),currency_id:$("#currency_id").val(),
         //             min_salary:$("#min_salary").val(),max_salary:$("#max_salary").val(),},
         //             function(data){ $("#message_showing_area").html(data);clearInput();leave_apply_detail();
         //             });
         //            }
         //            else
         //            {
         //                document.getElementById("message_showing_area").innerHTML="No Currency selected";
         //            }
         //       }
         //        else
         //        {
         //          document.getElementById("message_showing_area").innerHTML="Max Salary is blank";
         //        }
         //    }
         //    else
         //     {
         //        document.getElementById("message_showing_area").innerHTML="Min Salary is blank";    
         //     }
         
         // }
         // else
         // {    
         //    document.getElementById("message_showing_area").innerHTML="Pay grade name is blank";
         // }   

     // });     


      // $("#cancel_leave_apply ,#cancel_delete_leave_apply").click(function(){
      //    $("#create_button").hide();
      //   $("#container-login").hide();
      //   if($("#add_leave_apply_form").hide())
      //   {
      //     $("#add_leave_apply_form").show();
      //   }

      // });     

   // function clearInput()
   // {
   //  $("#pay_grade_name").val('');
   //  $("#min_salary").val('');
   //  $("#max_salary").val('');
   //  $("#pay_grade_name_field").val('');
   //  $("#min_salary_field").val('');
   //  $("#max_salary_field").val('');
   // }


  // function leave_apply_detail(){
  //  // wait();
  //     $.post("index.php/admin_ctrl/show_data_from_database_for_leave_apply",
  //     function(data){ $("#description_div").html(data);
  //     });
  //  }
        
  // function wait(){
  //      var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
  //      $("#message_showing_area").html(ajax_load);

  //   }

    </script>
</body>
</html>