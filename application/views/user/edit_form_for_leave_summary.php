                     <div class="rowme">
                      <?php
                             
                              if(isset($records))
                              {
                              foreach($records as $row)
                                {?>
                        <div class="row_content_left">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Leave Entitle:</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  <input type="text" id="leave_entitle" class="span4me" value="<?php echo $row->leave_entitle; ?>">
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Leave Scheduled:</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <input type="text" id="leave_scheduled" class="span4me" value="<?php echo $row->leave_scheduled; ?>">
                              </div>


                        </div><!--row_content_left-->

                        <div class="row_content_right">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Leave Taken :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                 <input type="text" id="leave_taken" class="span4me" value="<?php echo $row->leave_taken; ?>">
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <!--  <b>Last Name:</b> -->
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <input type="hidden" id="id_field" value="<?php echo $row->id; ?>">
                              </div>

                        </div><!--row_content_right-->    
                   <hr style="width:1130px; margin-left:80px">
                        <div class="button_field">
                            <button type="button" class="btn btn-success " id="update">Update</button>&nbsp;&nbsp;
                            <button type="button" class="btn btn-info" id="cancel_button_for_leave_summary">Cancel</button>&nbsp;&nbsp;     
                            <!-- <button type="button" class="btn btn-danger " id="delete_data">Delete</button>   -->    
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
         //alert($("#leave_entitle").val());
        $.post("index.php/admin_ctrl/show_update_form_for_leave_summary",{id:$("#id_field").val(),
      leave_entitle:$("#leave_entitle").val(),leave_scheduled:$("#leave_scheduled").val(),
      leave_taken:$("#leave_taken").val(),},
      function(data){ $("#update_div").html(data);leave_summary_detail();
      });
   }); 
      
$("#cancel_button_for_leave_summary").click(function(){
  if($("#update_div").show())
         {
          $("#update_div").hide();
         }
  leave_summary_detail();
});


 </script>     