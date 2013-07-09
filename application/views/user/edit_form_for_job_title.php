                    <div class="rowme">
                      <?php
                              //print_r($records) ;

                              if(isset($records))
                              {
                              foreach($records as $row)
                                {?>
                        <div class="row_content_left">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Title :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" id="job_title_name_field" class="span4me" value="<?php echo $row->job_title; ?>" placeholder=" Title">
                                      
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Job Description :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" id="job_description_field" class="span4me" value="<?php echo $row->job_description; ?>" placeholder=" Job Description">
                                      
                              </div>


                        </div><!--row_content_left-->

                        <div class="row_content_right">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Job Category :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" value="<?php //echo $row->no_of_employee;?>" id="job_category_update_field" class="span4me" name="job_category_update_field" placeholder="Category">
                                      <!-- <select name="job_category" id="job_category_update_field">
                                     <?php 
                                     //if(isset($records)) :
                                     //foreach($records as $row) : ?>
                                     <option value="<?php //echo($row->name)?>"><?php //echo($row->name)?></option>
                                     <?php //endforeach;
                                     //else : ?>   
                                     <option value="">No Data</option>
                                     <?php //endif; ?>
                                  </select> -->
                                      
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <!-- <b>Job Category :</b> -->
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
                            <button type="button" class="btn btn-info" id="cancel_job_title_update">Cancel</button>&nbsp;&nbsp;     
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

$("#cancel_job_title_update").click(function(){
   $("#update_div").html("");
  // $("#add_job_title_form").show();
  //alert ('Cancel is clicked');
});

 $("#update").click(function(){
        if($("#message_showing_area").show())
         {
          $("#message_showing_area").hide();
         }
     $.post("index.php/admin_ctrl/show_update_form_for_job_title",{id:$("#id_field").val(),
      job_title_name_field:$("#job_title_name_field").val(),job_description_field:$("#job_description_field").val(),job_category_field:$("#job_category_update_field").val(),},
      function(data){ $("#update_div").html(data);job_info_detail();
      });
   }); 

 $("#delete_data").click(function(){
     if($("#message_showing_area").show())
         {
          $("#message_showing_area").hide();
         }
      $.post("index.php/admin_ctrl/delete_data_for_job_title",
        {id:$("#id_field").val()},
      function(data){ $("#update_div").html(data);clearInput();job_info_detail();
       });
   }); 


 </script>     