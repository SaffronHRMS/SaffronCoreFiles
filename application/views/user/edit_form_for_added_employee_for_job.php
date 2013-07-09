  <link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
     
      <script type="text/javascript" src="<?php echo(base_url()); ?>js/jquery-1.7.2.min.js"></script>

     <script type="text/javascript" src="<?php echo base_url('bootstrap/js/jquery.datepick.js'); ?>"></script>                     
                            
                      <?php
                             
                              if(isset($records))
                              {
                              foreach($records as $row)
                                {
                                  ?>

                      <div class="rowme" id="update_add_job_for_employee">
                         <div class="row_content_left">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Employee Id :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  <input type="text" id="emp_id" class="span4me" value="<?php echo $row->employee_id; ?>" readonly="readonly" >
                              </div>                          
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Job Title:</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  <input type="hidden" id="emp_id" class="span4me" value="<?php echo $row->employee_id; ?>" >
                                  <input type="text" id="job_title_field" class="span4me" value="<?php echo $row->emp_job_title; ?>" placeholder="Job Title">
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Job Specification :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <input type="text" id="job_specification" class="span4me" value="<?php echo $row->emp_job_specification; ?>" placeholder="Job Specification">
                              </div>
                           <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Joined Date :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <input type="text" id="joined_date" class="span4me" value="<?php echo $row->emp_joined_date; ?>" placeholder="Joined Date">
                              </div>
                           <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Sub Unit :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <input type="text" id="sub_unit" class="span4me" value="<?php echo $row->emp_sub_unit; ?>" placeholder="Sub Unit">
                              </div>
                           <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Job Start Date :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <input type="text" id="job_start_date" class="span4me" value="<?php echo $row->emp_job_start_date; ?>" placeholder="Job Start Date">
                              </div>                              
                        </div> <!--row_content_left-->

                        <div class="row_content_right">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                 <!--    <b>Employee Id :</b> -->
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                           <!--        <input type="text" id="emp_id" class="span4me" value="<?php echo $row->employee_id; ?>" readonly="readonly" > -->
                              </div>
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Job Category :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <input type="text" id="job_category" class="span4me" value="<?php echo $row->emp_job_category; ?>" placeholder="Job Category">
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Employeement Status :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <input type="text" id="employeement_status_field" class="span4me" value="<?php echo $row->emp_employement_status; ?>" placeholder="Employeement Status">
                              </div>
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Location :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <input type="text" id="location_field" class="span4me" value="<?php echo $row->emp_location; ?>" placeholder="Job Location">
                              </div>
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Contract Detail :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <input type="text" id="contract" class="span4me" value="<?php echo $row->emp_contract_details; ?>" placeholder="Contract Detail">
                              </div>
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Job End Date :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <input type="text" id="job_end_date" class="span4me" value="<?php echo $row->emp_job_end_date; ?>" placeholder="Job End Date">
                              </div>                                                            
                        </div> <!--row_content_right -->   
                 <hr style="width:1130px; margin-left:80px">
                        <div class="button_field">
                            <button type="button" class="btn btn-success " id="update">Update</button>&nbsp;&nbsp;
                            <button type="button" class="btn btn-info" id="cancel_button_for_added_employee">Cancel</button>&nbsp;&nbsp;     
                            <button type="button" class="btn btn-danger " id="delete_data">Delete</button>      
                              
                         </div>                             
                    </div>
                       <?php
                            } 
                              }
                              else  
                              {
                           ?>      


















                          <div class="rowme" id="add_add_job_for_employee">
                                        
                        <div class="row_content_left">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Employee Id :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                <?php
                             
                              if(isset($only_employee_id))
                              {
                              foreach($only_employee_id as $row)
                                {?>
                            <input type="text" id="emp_id_add" class="span4me" value="<?php echo $row->employee_id; ?>" readonly="readonly" >
                        <?php      } 
                              }
                   
                              ?>
                              </div>                   
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Job Title:</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
               
                                       <select name="job_title_field" id="job_title_field_add">
                                                  <option value="">-------Select-------</option>  
                                               <?php 
                                               if(isset($job_title)) :
                                               foreach($job_title as $row) : ?>
                                               <option value="<?php echo($row->job_title)?>"><?php echo($row->job_title)?></option>
                                               <?php endforeach;
                                                   else : ?>   
                                                   <option value="">No Data</option>
                                                   <?php endif; ?>
                                      </select>
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Job Specification :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <input type="text" id="job_specification_add" class="span4me"  placeholder="Job Specification">
                              </div>
                           <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Joined Date :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <input type="text" id="joined_date_add" class="span4me"  placeholder="Joined Date">
                              </div>
                           <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Sub Unit :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <input type="text" id="sub_unit_add" class="span4me"  placeholder="Sub Unit">
                              </div>
                           <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Job Start Date :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <input type="text" id="job_start_date_add" class="span4me"  placeholder="Job Start Date">
                              </div>                              
                        </div><!--row_content_left-->

                        <div class="row_content_right">
                           <div class="row_content_left_left_less">
                                  <div class="name_field">
                             <!--         <b>Job Start Date :</b> -->
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                              <!--     <input type="text" id="job_start_date_add" class="span4me"  placeholder="Job Start Date"> -->
                              </div>                           
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Job Category :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <!-- <input type="text" id="job_category" class="span4me"  placeholder="Job Category"> -->
                                       <select name="job_category" id="job_category_add">
                                                  <option value="">-------Select-------</option>  
                                               <?php 
                                               if(isset($job_category)) :
                                               foreach($job_category as $row) : ?>
                                               <option value="<?php echo($row->name)?>"><?php echo($row->name)?></option>
                                               <?php endforeach;
                                                   else : ?>   
                                                   <option value="">No Data</option>
                                                   <?php endif; ?>
                                      </select>                                  
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Employeement Status :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <!-- <input type="text" id="employeement_status_field" class="span4me"  placeholder="Employeement Status"> -->
                                       <select name="employeement_status_field" id="employeement_status_field_add">
                                                  <option value="">-------Select-------</option>  
                                               <?php 
                                               if(isset($employeement_status)) :
                                               foreach($employeement_status as $row) : ?>
                                               <option value="<?php echo($row->name)?>"><?php echo($row->name)?></option>
                                               <?php endforeach;
                                                   else : ?>   
                                                   <option value="">No Data</option>
                                                   <?php endif; ?>
                                      </select>                                  
                              </div>
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Location :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <input type="text" id="location_field_add" class="span4me"  placeholder="Job Location">
                              </div>
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Contract Detail :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <input type="text" id="contract_add" class="span4me"  placeholder="Contract Detail">
                              </div>
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Job End Date :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <input type="text" id="job_end_date_add" class="span4me"  placeholder="Job End Date">
                              </div>                                                            
                        </div><!--row_content_right-->    
                 <hr style="width:1130px; margin-left:80px">
                        <div class="button_field">
                            <button type="button" class="btn btn-success " id="add_jobs_for_employee">Add</button>&nbsp;&nbsp;
                            <button type="button" class="btn btn-info" id="cancel_button_for_added_employee">Cancel</button>&nbsp;&nbsp;     
                            <button type="button" class="btn btn-danger " id="delete_data">Delete</button>      
     
                        </div>                             
                    </div>
<?php 
}
?>

 <script type="text/javascript">

  $(function() {
    $( "#joined_date" ).datepick();
    $( "#job_start_date" ).datepick();
    $( "#job_end_date" ).datepick();
    $( "#joined_date_add" ).datepick();
    $( "#job_start_date_add" ).datepick();
    $( "#job_end_date_add" ).datepick();    
  });


 $("#update").click(function(){
         if($("#message_showing_area").show())
         {
          $("#message_showing_area").hide();
         }
        $.post("index.php/admin_ctrl/show_update_form_for_added_employee_for_job",{emp_id:$("#emp_id").val(),
      job_title:$("#job_title_field").val(),job_specification:$("#job_specification").val(),
      joined_date:$("#joined_date").val(),sub_unit:$("#sub_unit").val(),job_start_date:$("#job_start_date").val(),
      job_category:$("#job_category").val(),employeement_status:$("#employeement_status_field").val(),location:$("#location_field").val(),
      contract:$("#contract").val(),job_end_date:$("#job_end_date").val(),},
      function(data){ $("#update_div").html(data);add_employee_detail_for_job();
      });
   });
  $("#add_jobs_for_employee").click(function(){
         if($("#message_showing_area").show())
         {
          $("#message_showing_area").hide();
         }
        $.post("index.php/admin_ctrl/show_update_form_for_added_employee_for_job",{emp_id:$("#emp_id_add").val(),
      job_title:$("#job_title_field_add").val(),job_specification:$("#job_specification_add").val(),
      joined_date:$("#joined_date_add").val(),sub_unit:$("#sub_unit_add").val(),job_start_date:$("#job_start_date_add").val(),
      job_category:$("#job_category_add").val(),employeement_status:$("#employeement_status_field_add").val(),location:$("#location_field_add").val(),
      contract:$("#contract_add").val(),job_end_date:$("#job_end_date_add").val(),},
      function(data){ $("#update_div").html(data);add_employee_detail_for_job();
      });
   });   

  $("#delete_data").click(function(){
    //alert("DELETE is clicked");
     if($("#message_showing_area").show())
         {
          $("#message_showing_area").hide();
         }
    
      $.post("index.php/admin_ctrl/delete_data_for_employee",
        {id:$("#id_field").val(),employee_id:$("#emp_id").val()},
      function(data){ $("#update_div").html(data);add_employee_detail();
       });        
     
    });      

$("#cancel_button_for_added_employee").click(function(){
  if($("#update_div").show())
         {
          $("#update_div").hide();
         }
  });

 </script>     