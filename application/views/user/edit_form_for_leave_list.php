                    <h4>Assign Leave</h4>
                    <div class="rowme">
                      <?php
                              //print_r($records) ;

                              if(isset($records))
                              {
                              foreach($records as $row)
                                {
    $formated_date_from=explode("-", $row->date_from);
    $date_from = $formated_date_from[2]."-".$formated_date_from[1]."-".$formated_date_from[0];
    $formated_date_to=explode("-", $row->date_to);
    $date_to = $formated_date_to[2]."-".$formated_date_to[1]."-".$formated_date_to[0];
                                  ?>
                        <div class="row_content_left">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Name :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <?php echo $row->employee_id; ?>
                                      
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>From :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" class="span4me" id="date_from" value="<?php echo $date_from; ?>">
                                      
                              </div>
                              
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Status :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <select name="status" id="status">
                                       <option value="">Choose Action</option>
                                       <option value="scheduled">Schedule</option>
                                       <option value="rejected">Reject</option>
                                       <option value="canceled">Cancel</option>
                                       <option value="taken">Take</option>
                                   </select>
                                      
                              </div>

                        </div><!--row_content_left-->

                        <div class="row_content_right">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Comment :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" class="span4me" id="leave_list_comment" value="<?php echo $row->comment; ?>">
                                      
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>To :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" class="span4me" id="date_to" value="<?php echo $date_to; ?>">
                                      
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <!--  <b>To :</b> -->
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  
                                  <input type="hidden" id="id_field" value="<?php echo $row->id; ?>">
                                      
                              </div>

                        </div><!--row_content_right-->    
<!--                     </div>
                    <div class="rowme"> -->
                      <hr style="width:1130px; margin-left:80px">
                        <div class="button_field">
                            <button type="button" class="btn btn-success " id="update">Update</button>&nbsp;&nbsp;
                            <button type="button" class="btn btn-info" id="cancel_button_for_leave_list">Cancel</button>&nbsp;&nbsp;          
                            <?php } 
                              }
                              else  
                              {
                                echo "No Records Found";
                              }?>     
                        </div>                             
                    </div>



 <script type="text/javascript">

     $(function() {
    $( "#date_from" ).datepick();
    $( "#date_to" ).datepick();

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
     $.post("index.php/admin_ctrl/show_update_form_for_leave_list",
      {id:$("#id_field").val(),date_from:$("#date_from").val(),date_to:$("#date_to").val(),
      leave_list_comment:$("#leave_list_comment").val(),leave_list_action:$("#status").val()},
      function(data){ $("#update_div").html(data);leave_list_detail();
      });
   }); 

 // $("#delete_data").click(function(){
 //      if($("#message_showing_area").show())
 //         {
 //          $("#message_showing_area").hide();
 //         }
 //     $.post("index.php/admin_ctrl/delete_data_for_leave_type",
 //      {id:$("#id_field").val()},
 //      function(data){ $("#update_div").html(data);leave_list_detail();;
 //      });
 //   }); 

$("#cancel_button_for_leave_list").click(function(){
  if($("#update_div").show())
         {
          $("#update_div").hide();
         }
  leave_list_detail();
});


 </script>     