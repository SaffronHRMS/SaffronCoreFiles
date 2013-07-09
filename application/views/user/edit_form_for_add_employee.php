                         <?php
                          //print_r($records);
                          foreach($records as $row)
                            {
                              ?>

                    <div class="rowme">
                        <div class="row_content_left">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Username:</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" id="user_name" class="span4me" value="<?php echo $row->user_name; ?>" placeholder="User Name">
                                       <input type="hidden" id="id_field" value="<?php echo $row->id; ?>">
                                      
                              </div>
                              
                            <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Status :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                         <input type="text" id="status" class="span4me" value="<?php echo $row->status; ?>" placeholder="Status">
                              </div>
                        </div><!--row_content_left-->

                        <div class="row_content_right">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Work Shift:</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                         <input type="text" id="work_shift_field" class="span4me" value="<?php echo $row->work_shift; ?>" placeholder="Work Shift">
                              </div>
                             <?php  
                              }
                            ?>              

                               <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Role :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  <select name="user_role" id="user_role">
                                        <option value="">-------Select-------</option>
                                       <?php 
                                       if(isset($role)) :
                                       foreach($role as $row) : ?>
                                       <option value="<?php echo($row->role_id)?>"><?php echo($row->role_name)?></option>
                                       <?php endforeach;
                                           else : ?>   
                                           <option value="">No Data</option>
                                           <?php endif; ?>
                                        </select>

                              </div>

                        </div><!--row_content_right-->
                    <hr style="width:1130px; margin-left:80px">
                        <div class="button_field">
                            <button type="button" class="btn btn-success " id="update">Update</button>&nbsp;&nbsp;
                            <button type="button" class="btn btn-info" id="cancel_add_employee_update">Cancel</button>&nbsp;&nbsp;     
                            <button type="button" class="btn btn-danger " id="delete_data">Delete</button>      
                               
                        </div>                             
                  



 <script type="text/javascript">

 $(document).ready(function() {
//$("#update_div").hide();
//alert ($(this).attr('id'));    
});

 $("#cancel_add_employee_update").click(function(){
  $("#update_div").html("");
 }) ;

 $("#update").click(function(){
         if($("#message_showing_area").show())
         {
          $("#message_showing_area").hide();
         }
         if($("#user_role").val()!='')
          {
                $.post("index.php/admin_ctrl/show_update_form_for_add_employee",{id:$("#id_field").val(),work_shift:$("#work_shift_field").val(),
              user_name:$("#user_name").val(),user_role:$("#user_role").val(),status:$("#status").val(),},
              function(data){ $("#update_div").html(data);add_employee_detail();
              });
           }
                else
                {    
                    document.getElementById("message_showing_area").innerHTML="Select Role for User";
                }                
             });


  $("#delete_data").click(function(){
    //alert("DELETE is clicked");
     if($("#message_showing_area").show())
         {
          $("#message_showing_area").hide();
         }
      $.post("index.php/admin_ctrl/delete_data_for_user",
        {id:$("#id_field").val()},
      function(data){ $("#update_div").html(data);add_employee_detail();
       });
    });      



 </script>     