<!DOCTYPE html>
<html>
<head>
    <title></title>
  <link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?php echo(base_url()); ?>css/jquery.autocomplete.css" />
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
     
      <script type="text/javascript" src="<?php echo(base_url()); ?>js/jquery-1.7.2.min.js"></script>
     <script type="text/javascript" src="<?php echo(base_url()); ?>js/jquery.autocomplete.js"></script>
     
</head>
<body>
<h3 style="font-family: Steinem;"><center>PAY GRADE</center></h3>
<div id="inside_middle">
    <div id="message_showing_area">
    </div>
    <div id="menu_div">
     
                
                <div class="container-login" id="container-login">
                    <div class="rowme">
                        <div class="row_content_left">
                              <div class="row_content_left_left">
                                  <div class="name_field">
                                    <b>Name :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                      <input type="text" id="pay_grade_name" class="span4me" name="pay_grade_name" placeholder="Name">    
                              </div>

                              <div class="row_content_left_left">
                                  <div class="name_field">
                                     <b>Select Currency Name :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                <!-- <div class="text_area_field1"> -->
                                     <select name="currency_id" id="currency_id">
                                      <option value="">----- Select -----</option>
                                     <?php 
                                         if(isset($records)) :
                                         foreach($records as $row) : ?>
                                         <option value="<?php echo($row->currency_id)?>"><?php echo($row->currency_name)?></option>
                                         <?php endforeach;
                                         else : ?>   
                                         <option value="">No Data</option>
                                         <?php endif; ?>
                                      </select>
                                <!-- </div>  --> 
                                
                              </div>

                        </div><!--row_content_left-->

                        <div class="row_content_right">
                              <div class="row_content_left_left">
                                  <div class="name_field">
                                     <b>Minimum Salary :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                    <input type="text" id="min_salary" class="span4me" name="min_salary" placeholder="Min Salary">        
                              </div>

                              <div class="row_content_left_left">
                                  <div class="name_field">
                                     <b>Maximum Salary :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                <!-- <div class="text_area_field1"> -->
                                     <input type="text" id="max_salary" class="span4me" name="max_salary" placeholder="Max Salary">
                                <!-- </div>  --> 
                              </div> 
                        </div><!--row_content_right-->
                 <!--    </div>
                    <div class="rowme"> -->
                      <hr style="width:1130px; margin-left:80px">
                           
                            <div id="create_job_title_button" class="button_field">
                                <button type="button" class="btn btn-success " id="create_pay_grades">Create</button>&nbsp;&nbsp;
                                <button type="button" class="btn btn-info" id="cancel_pay_grades">Cancel</button>
                             </div><!--end #create_employee_button-->
                    </div>
                </div>
          <input type="submit" class="btn btn-success" value="ADD" id="add_pay_grades_form">
           
                    
                
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
     var IsPhoneValid=/^([0-9])/;

    $(document).ready(function() {
        $("#create_button").hide();
       
        $("#container-login").hide();
        pay_grades_detail();
  });




      $("#add_pay_grades_form").click(function(){
          if($("#update_div").show())
         {
          $("#update_div").hide();
         }       
        $("#add_pay_grades_form").hide();
        $("#currency_id").show();
         $("#select_heading").show();
        $("#min_salary").show();
        $("#max_salary").show();
  
        $("#create_button").show();
        $("#container-login").show();
      });



      $("#create_pay_grades").click(function(){
       //alert ($("#employee_id").val());
           if($("#message_showing_area").hide())
         {
          $("#message_showing_area").show();
         }         
         if($("#pay_grade_name").val()!='')
         {
            if($("#min_salary").val()!='' && IsPhoneValid.test($("#min_salary").val()))
            {
               if($("#max_salary").val()!='' && IsPhoneValid.test($("#max_salary").val()))
               {
                    if($("#currency_id").val()!='')
                    { wait();
                      $.post("index.php/admin_ctrl/show_submit_data_for_adding_pay_grades",
                        {pay_grade_name:$("#pay_grade_name").val(),currency_id:$("#currency_id").val(),
                     min_salary:$("#min_salary").val(),max_salary:$("#max_salary").val(),},
                     function(data){ $("#message_showing_area").html(data);clearInput();pay_grades_detail();
                     });
                    }
                    else
                    {
                        alert ("No Currency selected !");
                    }
               }
                else
                {
                  alert ("Max Salary should be in Number !");
                }
            }
            else
             {
                alert ("Min Salary should be in Number !"); 
             }
         
         }
         else
         {    
            alert ("Pay Grade name is blank !");
         }   

      });     


      $("#cancel_pay_grades ,#cancel_delete_pay_grades").click(function(){
         clearInput();
         $("#create_button").hide();
         $("#add_pay_grades_form").show();
        $("#container-login").hide();

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


  function pay_grades_detail(){
   // wait();
      $.post("index.php/admin_ctrl/show_data_from_database_for_pay_grades",
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