                          <?php
                          //print_r($records);
                          foreach($records as $row)
                            {
                              ?>

                    <div class="rowme">
                        <div class="row_content_left">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Project Id :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" id="projectid" class="span4me" value="<?php echo $row->project_id; ?>" placeholder="Project Id">
                                      
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Name :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" id="projectname" class="span4me" value="<?php echo $row->name; ?>" placeholder="Project Name">
                                      
                              </div>
                              
                               <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Description :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                <!-- <div class="text_area_field1"> -->
                                    <input type="text" id="desc" class="span4me" value="<?php echo $row->description; ?>" placeholder="Description">
                                <!-- </div>  -->     
                              </div>
                                               
                        </div><!--row_content_left-->
                        <div class="row_content_right">
                               <div class="row_content_left_left">
                                  <div class="name_field">
                                    <b>Customer Name :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" id="customer_id" class="span4me" value="<?php echo $row->customer_id; ?>" placeholder="Customer ID">
                                      
                              </div>

                               <div class="row_content_left_left">
                                  <div class="name_field">
                                    <b>Project Admin:</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" id="projectadmin" class="span4me" value="<?php echo $row->project_admin; ?>" placeholder="Project Admin">
                                      
                              </div> 

                              <div class="row_content_left_left">
                                  <div class="name_field">
                                     <b>Status :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                <!-- <div class="text_area_field1"> -->
                                    <input type="text" id="completed" class="span4me" value="<?php echo $row->status; ?>" placeholder="Status">
                                    <input type="hidden" id="id_field" value="<?php echo $row->id; ?>">
                                <!-- </div>  --> 
                              </div>

                        </div><!--row_content_right-->
                <hr style="width:1130px; margin-left:80px">
                        <div class="button_field">
                            <button type="button" class="btn btn-success " id="update">Update</button>&nbsp;&nbsp;
                            <button type="button" class="btn btn-info" id="cancel_button_for_project">Cancel</button>&nbsp;&nbsp;     
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
        $.post("index.php/admin_ctrl/show_update_form_for_project",{id:$("#id_field").val(),
      projectid:$("#projectid").val(),customer_id:$("#customer_id").val(),projectname:$("#projectname").val(),
      desc:$("#desc").val(),projectadmin:$("#projectadmin").val(),completed:$("#completed").val(),},
      function(data){ $("#update_div").html(data);projects_detail();
      });
   }); 

  $("#delete_data").click(function(){
    //alert("DELETE is clicked");
     if($("#message_showing_area").show())
         {
          $("#message_showing_area").hide();
         }
      $.post("index.php/admin_ctrl/delete_data_for_project",
        {id:$("#id_field").val()},
      function(data){ $("#update_div").html(data);projects_detail();
       });
    });      

$("#cancel_button_for_project").click(function(){
  if($("#update_div").show())
         {
          $("#update_div").hide();
         }
  projects_detail();
});

 </script>     