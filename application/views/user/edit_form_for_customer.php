                          <?php
                          //print_r($records);
                          foreach($records as $row)
                            {
                              ?>

                    <div class="rowme">
                        <div class="row_content_left">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Customer Id :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" id="customer_id" class="span4me" value="<?php echo $row->customer_id; ?>" placeholder="Customer ID">
                                      
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Name :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" id="customer_name" class="span4me" value="<?php echo $row->name; ?>" placeholder="Customer Name">
                                      
                              </div>
                              
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Phone No :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" id="customer_phone" class="span4me" value="<?php echo $row->phone; ?>" placeholder="Customer Phone">
                                      
                              </div>
                                             
                        </div><!--row_content_left-->

                        <div class="row_content_right">
                               <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Address :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" id="customer_address" class="span4me" value="<?php echo $row->address; ?>" placeholder="Customer Address">
                                      
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

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <!-- <b>Description :</b> -->
                                  </div>  
                              </div>
                              <div class="row_content_left_right_for_text_area">
                                <!-- <div class="text_area_field1"> -->
                                     <input type="hidden" id="id_field" value="<?php echo $row->id; ?>">
                                <!-- </div>  --> 
                                
                              </div>

                        </div><!--row_content_right-->
                    <hr style="width:1130px; margin-left:80px">
                        <div class="button_field">
                            <button type="button" class="btn btn-success " id="update">Update</button>&nbsp;&nbsp;
                            <button type="button" class="btn btn-info" id="cancel_button_for_customer">Cancel</button>&nbsp;&nbsp;     
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
        $.post("index.php/admin_ctrl/show_update_form_for_customer",{id:$("#id_field").val(),
      customer_id:$("#customer_id").val(),customer_name:$("#customer_name").val(),
      desc:$("#desc").val(),customer_address:$("#customer_address").val(),customer_phone:$("#customer_phone").val(),},
      function(data){ $("#update_div").html(data);customer_detail();
      });
   }); 

  $("#delete_data").click(function(){
    //alert("DELETE is clicked");
     if($("#message_showing_area").show())
         {
          $("#message_showing_area").hide();
         }
      $.post("index.php/admin_ctrl/delete_data_for_customer",
        {id:$("#id_field").val()},
      function(data){ $("#update_div").html(data);customer_detail();
       });
    });      

$("#cancel_button_for_customer").click(function(){
  if($("#update_div").show())
         {
          $("#update_div").hide();
         }
  customer_detail();
});

 </script>     