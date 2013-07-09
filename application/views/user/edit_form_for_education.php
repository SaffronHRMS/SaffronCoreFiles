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
                                  
                                      <input type="text" id="education_name_field" class="span4me" value="<?php echo $row->name; ?>" placeholder="Education name">
                                      
                              </div>                 
                        </div><!--row_content_left-->

                        <div class="row_content_right">

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Description :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                <!-- <div class="text_area_field1"> -->
                                     <input type="text" id="education_desc_field" class="span4me" value="<?php echo $row->description; ?>" placeholder="Education Description">
                                     <input type="hidden" id="id_field" value="<?php echo $row->id; ?>">
                                <!-- </div>  --> 
                                
                              </div> 
                        </div><!--row_content_right-->
                    <hr style="width:1130px; margin-left:80px">
                        <div class="button_field">
                            <button type="button" class="btn btn-success " id="update">Update</button>&nbsp;&nbsp;
                            <button type="button" class="btn btn-info" id="cancel_button_for_education">Cancel</button>&nbsp;&nbsp;     
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


 $("#update").click(function(){
        if($("#message_showing_area").show())
         {
          $("#message_showing_area").hide();
         }
     $.post("index.php/admin_ctrl/show_update_form_for_education",{id:$("#id_field").val(),
      education_name_field:$("#education_name_field").val(),education_desc_field:$("#education_desc_field").val()},
      function(data){ $("#update_div").html(data);education_detail();
      });
   }); 

 $("#delete_data").click(function(){
     if($("#message_showing_area").show())
         {
          $("#message_showing_area").hide();
         }
      $.post("index.php/admin_ctrl/delete_data_for_education",
        {id:$("#id_field").val()},
      function(data){ $("#update_div").html(data);clearInput();education_detail();
       });
   }); 
$("#cancel_button_for_education").click(function(){
  if($("#update_div").show())
         {
          $("#update_div").hide();
         }
  education_detail();
});


 </script>     