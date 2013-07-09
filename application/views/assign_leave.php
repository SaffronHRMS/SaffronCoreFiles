<html>
<head>
	<title></title>
  <link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />
  <!-- <link rel="stylesheet" href="<?php echo(base_url()); ?>css/date_pick-ui.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php echo(base_url()); ?>css/style_date_pick.css" type="text/css" media="screen" /> -->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
     
      <script type="text/javascript" src="<?php echo(base_url()); ?>js/jquery-1.7.2.min.js"></script>
     <!-- <script type="text/javascript" src="<?php echo(base_url()); ?>js/date_pick-ui.js"></script>-->
     <script type="text/javascript" src="<?php echo base_url('bootstrap/js/jquery.datepick.js'); ?>"></script>
   
</head>
<body>
<h3 style="font-family: Steinem;"><center>ASSIGN LEAVE</center></h3>
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
                                  
                                      <input type="text" id="employee_id" class="span4me" name="employee_id" placeholder="Employee Name">
                                      
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>From :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" id="from_datepicker" class="span4me" name="from_datepicker" placeholder="Choose Date from">  
                                      
                              </div> 
                              <div class="row_content_left_left_for_text_area_less">
                                  <div class="name_field">
                                     <b>Comment :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right_for_text_area">
                                <!-- <div class="text_area_field1"> -->
                                  <textarea id="leave_comment" class="span4me" name="leave_comment" placeholder="Comment " cols="50" rows="3"></textarea>
                                <!-- </div>  --> 
                                
                              </div>                
                        </div><!--row_content_left-->

                        <div class="row_content_right">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>  Leave Type :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                <!-- <div class="text_area_field1"> -->
                                      <select name="select_leave_type" id="select_leave_type" >
                                        <option value="">----- Select -----</option>
                                       <?php 
                                       if(isset($leave_type)) :
                                       foreach($leave_type as $row) : ?>
                                     
                                       <option value="<?php echo($row->leave_type_name)?>"><?php echo($row->leave_type_name)?></option>
                                       <?php endforeach;
                                           else : ?>   
                                           <option value="">No Data</option>
                                           <?php endif; ?>
                                        </select>
                                <!-- </div>  -->      
                              </div>                          
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>To :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  
                                        <input type="text" id="to_datepicker" class="span4me" name="to_datepicker" placeholder="Choose Date to">
                                      
                              </div> 
                        </div><!--row_content_right-->
                    <!-- </div>
                    <div class="rowme"> -->
                           <hr style="width:1130px; margin-left:80px">
                            <div id="create_job_title_button" class="button_field">
                                <button type="button" class="btn btn-success " id="assign_leave_form">Assign</button>&nbsp;&nbsp;
                                <button type="button" class="btn btn-info" id="cancel_assign_leave">Cancel</button>
                             </div><!--end #create_employee_button-->
                    </div>


         </div>

		<!-- 	<input type="button" class="btn btn-success" value="ASSIGN" id="assign_leave_form"> -->
			
					
			 
    </div><!-- end #menu_div -->
 
                 <div id="update_div">
                   <!--  <h1>Update div</h1> -->
                  </div><!-- end #update_div -->
                  <!-- <h3 style="font-family: Steinem;">Description</h3>  -->       
                  <div id="description_div">
                  </div><!-- end #description_div -->



</div> <!-- end #inside_middle -->

<script type="text/javascript">

  $(function() {
    $( "#from_datepicker" ).datepick();
    $( "#to_datepicker" ).datepick();

  });

    

     $("#assign_leave_form").click(function(){
      //alert('working fine');
      if($("#message_showing_area").hide())
         {
          $("#message_showing_area").show();
         }
      if($("#update_div").show())
         {
          $("#update_div").hide();
         }   
         
       if($("#employee_id").val()!='')
          {    
                if($("#select_leave_type").val()!='')
             {       
	          if($("#from_datepicker").val()!='')
	          {
	               if($("#to_datepicker").val()!='')
	                { //alert ("all field is selected");
                     if($("#leave_comment").val()!='')
                      { //alert ("all field is selected");
                         $.post("index.php/admin_ctrl/show_submit_data_for_assign_leave",
                           {datepicker:$("#from_datepicker").val(),to_datepicker:$("#to_datepicker").val(),
                           employee_id:$("#employee_id").val(),leave_type:$("#select_leave_type").val(),leave_comment:$("#leave_comment").val()},
                        function(data){ $("#description_div").html(data);clearInput();
                        });
                      }
                      else
                      {
                      document.getElementById("message_showing_area").innerHTML="Comment is required!";
                      }
	                }
	                else
	                {
	                document.getElementById("message_showing_area").innerHTML="To which date is required!";
	                }
	           }
	           else
	           {
			             document.getElementById("message_showing_area").innerHTML="From which is required!";
	           }
              }
             else
             {
                   document.getElementById("message_showing_area").innerHTML="Select Leave Type!";
             }
          }
          else
          {
              document.getElementById("message_showing_area").innerHTML="Employee name is required!"; 
          }  
        });

    

      $("#cancel_attendance").click(function(){
         clearInput();

      });     

   function clearInput()
   {
    $("#from_datepicker").val('');
    $("#to_datepicker").val('');
    $("#employee_id").val('');
    $("#select_leave_type").val('');
    $("#leave_comment").val('');
   }

  function employee_on_leave_detail(){
   // wait();
      $.post("index.php/admin_ctrl/show_data_from_database_for_employee_on_leave",
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