                          <?php
                          //print_r($records);
                          foreach($records as $row)
                            {
                              ?>

                    <div class="rowme">
                        <div class="row_content_left">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Name :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" id="work_shift_name" class="span4me" value="<?php echo $row->name; ?>" placeholder="Workshift Name">
                                      
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Starting Time :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" id="starting_time" class="span4me" value="<?php echo $row->starting_time; ?>" placeholder="Starting Time">
                                      
                              </div>                 
                        </div><!--row_content_left-->

                        <div class="row_content_right">

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <!--  <b>Note :</b> -->
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                <!-- <div class="text_area_field1"> -->
                                     <input type="hidden" id="id_field" value="<?php echo $row->id; ?>">
                                <!-- </div>  --> 
                                
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Ending Time :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                <!-- <div class="text_area_field1"> -->
                                     <input type="text" id="ending_time" class="span4me" value="<?php echo $row->ending_time; ?>" placeholder="Ending Time">
                                <!-- </div>  --> 
                                
                              </div> 
                        </div><!--row_content_right-->
                <!--     </div>

                    <div class="rowme"> -->
                        <hr style="width:1130px; margin-left:80px">
                        <div class="button_field">
                            <button type="button" class="btn btn-success " id="update">Update</button>&nbsp;&nbsp;
                            <button type="button" class="btn btn-info" id="cancel_work_shift_update">Cancel</button>&nbsp;&nbsp;     
                            <button type="button" class="btn btn-danger " id="delete_data">Delete</button>      
                            <?php  
                              }
                            ?>     
                        </div>                             
                    </div>






 <script type="text/javascript">

 $(document).ready(function() {
//$("#update_div").hide();
//alert ($(this).attr('id'));    
});

 $("#cancel_work_shift_update").click(function(){
  $("#update_div").html("");
 }) ;

 $("#update").click(function(){
        if($("#message_showing_area").show())
         {
          $("#message_showing_area").hide();
         }

        $.post("index.php/admin_ctrl/show_update_form_for_work_shift",{id:$("#id_field").val(),
      work_shift_name:$("#work_shift_name").val(),starting_time:$("#starting_time").val(),
      ending_time:$("#ending_time").val(),},
      function(data){ $("#update_div").html(data);workshift_detail();
      });
   }); 

  $("#delete_data").click(function(){
     if($("#message_showing_area").show())
         {
          $("#message_showing_area").hide();
         }
      $.post("index.php/admin_ctrl/delete_data_for_work_shift",
        {id:$("#id_field").val()},
      function(data){ $("#update_div").html(data);workshift_detail();
       });
    });      



 </script>     