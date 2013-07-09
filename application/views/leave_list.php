<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />  
    <script type="text/javascript" src="<?php echo(base_url()); ?>js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('bootstrap/js/jquery.datepick.js'); ?>"></script>
     

</head>
<body>
<h3 style="font-family: Steinem;"><center>LEAVE LIST</center></h3>
<div id="inside_middle">
    <div id="message_showing_area">
    </div>
    <div id="menu_div">
     
                
                <div class="container-login" id="container-login">
                    <div class="rowme">
                           <!-- <div class="row_content_left_left"> -->
                                  <div class="name_field_for_leave_list">
                                    <b>Show Leave with status:</b>
                                  </div>
                            <!-- </div> -->
                            <div class="checkbox_div">
                                  <div class="name_field_for_checkbox">
                                             All
                                      </div>
                                      <div class="field_for_checkbox">
                                              <input type="checkbox" name="all" id="all" />
                                       </div>
                                       <div class="name_field_for_checkbox">
                                             Rejected
                                      </div>
                                      <div class="field_for_checkbox">
                                              <input type="checkbox" name="rejected" id="rejected" />
                                       </div>
                                       <div class="name_field_for_checkbox">
                                               Canceled
                                      </div>
                                      <div class="field_for_checkbox">
                                              <input type="checkbox" name="canceled" id="canceled" />
                                       </div>

                                       <div class="name_field_for_checkbox">
                                          Pending Approval
                                        </div>
                                        <div class="field_for_checkbox">
                                          <input type="checkbox" name="pending_approval" id="pending_approval" />
                                         </div>
                                         <div class="name_field_for_checkbox">
                                         Scheduled
                                        </div>
                                        <div class="field_for_checkbox">
                                          <input type="checkbox" name="scheduled" id="scheduled" />
                                         </div>

                                         <div class="name_field_for_checkbox">
                                        Taken
                                        </div>
                                        <div class="field_for_checkbox">
                                          <input type="checkbox" name="taken" id="taken" />
                                         </div> 
                              </div>
                    <hr style="width:1130px; margin-left:80px">
                            <div id="create_button" class="button_field">
                              <!--   <button type="button" class="btn btn-success " id="create_employee">Create</button>&nbsp;&nbsp; -->
                                <button type="button" class="btn btn-info" id="cancel_leave_list">Cancel</button>
                             </div><!--end #create_employee_button-->
                    </div> 
         
                </div>
         <input type="submit" class="btn btn-success" value="SEARCH" id="add_leave_list_form">
          
    </div><!-- end #menu_div -->
    
                
    
                 <div id="update_div">
                   <!--  <h1>Update div</h1> -->
                  </div><!-- end #update_div -->
                  <!-- <h3 style="font-family: Steinem;">Description</h3>  -->       
                  <div id="description_div">
                  </div><!-- end #description_div -->
      

</div> <!-- end #inside_middle -->

<script type="text/javascript">


  
   $("input[type='checkbox']").click(function(){

			//alert ($(this).attr('id'));
		$.fn.hasAttr = function(name) 
		{  
	      return this.attr(name) !== undefined;
	    };

		if($(this).hasAttr('checked')) 
		{
         if($("#description_div").hide())
         {
          //$("#description_div").show();
            $.post("index.php/admin_ctrl/show_data_from_database_for_leave_list_search_by_checkbox",
              {checkbox_name:$(this).attr('id')},
            function(data){ $("#description_div").show().html(data);
            });          
         }
         else
         {
            $.post("index.php/admin_ctrl/show_data_from_database_for_leave_list_search_by_checkbox",
            	{checkbox_name:$(this).attr('id')},
            function(data){ $("#description_div").html(data);
            });
         }
	    } 
	    else 
	    {
	       $("#description_div").hide();
	    }
		 
    });		    
	






    $.ajaxSetup ({
        cache: false
    });
    var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
    

    $(document).ready(function() {
        $("#create_button").hide();
       
        $("#container-login").hide();
        leave_list_detail();
  });




      $("#add_leave_list_form").click(function(){
          if($("#update_div").show())
         {
          $("#update_div").hide();
         }       
        $("#add_leave_list_form").hide();
        $("#currency_id").show();
         $("#select_heading").show();
        $("#min_salary").show();
        $("#max_salary").show();
  
        $("#create_button").show();
        $("#container-login").show();
      });



      $("#create_leave_list").click(function(){
        wait();//alert ($("#employee_id").val());
           if($("#message_showing_area").hide())
         {
          $("#message_showing_area").show();
         }
         alert ($("#newsletter").val());         
         // if($("#pay_grade_name").val()!='')
         // {
         //    if($("#min_salary").val()!='')
         //    {
         //       if($("#max_salary").val()!='')
         //       {
         //            if($("#currency_id").val()!='')
         //            {
         //              $.post("index.php/admin_ctrl/show_submit_data_for_adding_leave_list",
         //                {pay_grade_name:$("#pay_grade_name").val(),currency_id:$("#currency_id").val(),
         //             min_salary:$("#min_salary").val(),max_salary:$("#max_salary").val(),},
         //             function(data){ $("#message_showing_area").html(data);clearInput();leave_list_detail();
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

      });     


      $("#cancel_leave_list ,#cancel_delete_leave_list").click(function(){
         $("#create_button").hide();
        $("#container-login").hide();
        if($("#add_leave_list_form").hide())
        {
          $("#add_leave_list_form").show();
        }

      });     

   function clearInput()
   {
    $("#pay_grade_name").val('');
    $("#min_salary").val('');
    $("#max_salary").val('');
    $("#pay_grade_name_field").val('');
    $("#min_salary_field").val('');
    $("#max_salary_field").val('');
   }


  function leave_list_detail(){
   // wait();
      $.post("index.php/admin_ctrl/show_data_from_database_for_leave_list",
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