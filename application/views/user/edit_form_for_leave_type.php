                      <div class="rowme">
                      <?php
                             
                              if(isset($records))
                              {
                              foreach($records as $row)
                                {?>
                        <div class="row_content_left">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Leave Type Id:</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  <input type="text" class="span4me" id="leavetype_id" value="<?php echo $row->leave_type_id; ?>">
                              </div>

                        </div><!--row_content_left-->

                        <div class="row_content_right">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Name:</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <input type="text" class="span4me" id="leavetype_name" value="<?php echo $row->leave_type_name; ?>">
                                  <input type="hidden" id="id_field" value="<?php echo $row->id; ?>">
                              </div>

                        </div><!--row_content_right-->    
                  <hr style="width:1130px; margin-left:80px">
                        <div class="button_field">
                            <button type="button" class="btn btn-success " id="update">Update</button>&nbsp;&nbsp;
                            <button type="button" class="btn btn-info" id="cancel_button_for_leave_type">Cancel</button>&nbsp;&nbsp;     
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

$('tr').click(function(){      $('tr').removeClass("highlight_line");
       var id=$(this).attr('id')
      $("#"+id).addClass("highlight_line");if($(this).attr('id')=='table_head')
          { return ;}
  var id = $(this).attr('id');

   });
 $("#update").click(function(){
      if($("#message_showing_area").show())
         {
          $("#message_showing_area").hide();
         }
     $.post("index.php/admin_ctrl/show_update_form_for_leave_type",
      {id:$("#id_field").val(),leave_name:$("#leavetype_name").val(),leave_id:$("#leavetype_id").val()},
      function(data){ $("#update_div").html(data);leave_type_detail();
      });
   }); 

 $("#delete_data").click(function(){
      if($("#message_showing_area").show())
         {
          $("#message_showing_area").hide();
         }
     $.post("index.php/admin_ctrl/delete_data_for_leave_type",
      {id:$("#id_field").val()},
      function(data){ $("#update_div").html(data);leave_type_detail();
      });
   }); 

$("#cancel_button_for_leave_type").click(function(){
  if($("#update_div").show())
         {
          $("#update_div").hide();
         }
  leave_type_detail();
});


 </script>     