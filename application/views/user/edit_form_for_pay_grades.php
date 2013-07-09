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
                                    <b>Name :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" id="pay_grade_name_field" class="span4me" value="<?php echo $row->pay_grade_name; ?>" placeholder="Pay Grade name">
                                      
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Minimum Salary :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                <!-- <div class="text_area_field1"> -->
                                <input type="text" id="min_salary_field" class="span4me" value="<?php echo $row->min_salary; ?>" placeholder="Minimum salary">
                                <!-- </div>  --> 
                                
                              </div>

                        </div><!--row_content_left-->

                        <div class="row_content_right">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <!-- <b>Minimum Salary :</b> -->
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                    
                                    <input type="hidden" id="id_field" value="<?php echo $row->id; ?>">    
                                      
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Maximum Salary :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                <!-- <div class="text_area_field1"> -->
                                     <input type="text" id="max_salary_field" class="span4me" value="<?php echo $row->max_salary; ?>" placeholder="Maximum salary">
                                <!-- </div>  --> 
                              </div> 
                        </div><!--row_content_right-->
                   <!--  </div>
                    <div class="rowme"> -->
                      <hr style="width:1130px; margin-left:80px">
                        <div class="button_field">
                            <button type="button" class="btn btn-success " id="update">Update</button>&nbsp;&nbsp;
                            <button type="button" class="btn btn-info" id="cancel_pay_grade_update">Cancel</button>&nbsp;&nbsp;     
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

$("#cancel_pay_grade_update").click(function(){
  $("#update_div").html("");
});

 $("#update").click(function(){
       if($("#message_showing_area").show())
         {
          $("#message_showing_area").hide();
         }
         if($("#pay_grade_name_field").val().length>0)
         {
                $.post("index.php/admin_ctrl/show_update_form_for_pay_grade",{id:$("#id_field").val(),
              pay_grade_name_field:$("#pay_grade_name_field").val(),min_salary_field:$("#min_salary_field").val(),
              max_salary_field:$("#max_salary_field").val(),},
              function(data){ $("#update_div").html(data);pay_grades_detail();
              });
        }
        else
        {
          alert ("Pay Grade name should not be blank");
        }
     }); 

 $("#delete_data").click(function(){
     if($("#message_showing_area").show())
         {
          $("#message_showing_area").hide();
         }
      $.post("index.php/admin_ctrl/delete_data_for_pay_grades",
        {id:$("#id_field").val()},
      function(data){ $("#update_div").html(data);pay_grades_detail();
       });
   }); 



 </script>     