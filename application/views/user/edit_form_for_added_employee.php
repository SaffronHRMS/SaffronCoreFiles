                      <div class="rowme">
                      <?php
                             
                              if(isset($records))
                              {
                              foreach($records as $row)
                                {?>
                        <div class="row_content_left">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Employee Id:</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  <input type="text" id="emp_id" class="span4me" value="<?php echo $row->employee_id; ?>" placeholder="Employee ID">
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>First Name :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <input type="text" id="emp_firstname" class="span4me" value="<?php echo $row->emp_first_name; ?>" placeholder="First name">
                              </div>


                        </div><!--row_content_left-->

                        <div class="row_content_right">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Middle Name :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <input type="text" id="emp_middlename" class="span4me" value="<?php echo $row->emp_middle_name; ?>" placeholder="Middle name">
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Last Name:</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <input type="text" id="emp_lastname" class="span4me" value="<?php echo $row->emp_last_name; ?>" placeholder="Last name">
                                  <input type="hidden" id="id_field" value="<?php echo $row->id; ?>">
                              </div>

                        </div><!--row_content_right-->    
                 <hr style="width:1130px; margin-left:80px">
                        <div class="button_field">
                            <button type="button" class="btn btn-success " id="update">Update</button>&nbsp;&nbsp;
                            <button type="button" class="btn btn-info" id="cancel_button_for_added_employee">Cancel</button>&nbsp;&nbsp;     
                            <button type="button" class="btn btn-danger " id="delete_data">Delete</button>      
                            <?php } 
                              }
                              else  
                              {
                                echo "No Records Found";
                              }?>     
                        </div>                             
                    </div>


 <script type="text/javascript">

 $(document).ready(function() {
//$("#update_div").hide();
//alert ($(this).attr('id'));    
});


 $("#update").click(function(){
         if($("#message_showing_area").show())
         {
          $("#message_showing_area").hide();
         }
        $.post("index.php/admin_ctrl/show_update_form_for_added_employee",{id:$("#id_field").val(),
      employee_id:$("#emp_id").val(),emp_firstname:$("#emp_firstname").val(),
      emp_middlename:$("#emp_middlename").val(),emp_lastname:$("#emp_lastname").val(),},
      function(data){ $("#update_div").html(data);add_employee_detail();
      });
   }); 

  $("#delete_data").click(function(){
    //alert("DELETE is clicked");
     if($("#message_showing_area").show())
         {
          $("#message_showing_area").hide();
         }
    
      $.post("index.php/admin_ctrl/delete_data_for_employee",
        {id:$("#id_field").val(),employee_id:$("#emp_id").val()},
      function(data){ $("#update_div").html(data);add_employee_detail();
       });        
     
    });      

$("#cancel_button_for_added_employee").click(function(){
  if($("#update_div").show())
         {
          $("#update_div").hide();
         }
  });

 </script>     