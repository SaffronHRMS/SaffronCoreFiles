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
                                            <b>Job Title :</b>
                                          </div>
                                      </div>
                                      <div class="row_content_left_right">
                                             <input type="text" class="span4me" id="emp_street1" value="<?php echo $row->emp_job_title;?>" placeholder="Job Title" >
                                             <input type="hidden" class="span4me" id="employee_id_field" value="<?php echo $row->employee_id;?>" >        
                                      </div>
                                      <div class="row_content_left_left_less">
                                          <div class="name_field">
                                            <b>Sub Unit:</b>
                                          </div>
                                      </div>
                                      <div class="row_content_left_right">
                                             <input type="text" class="span4me" id="coun_code" value="<?php echo $row->emp_sub_unit;?>" placeholder="Sub - Unit">        
                                      </div>
                                      <div class="row_content_left_left_less">
                                          <div class="name_field">
                                            <b>Job Start Date :</b>
                                          </div>
                                      </div>
                                      <div class="row_content_left_right">
                                             <input type="text" class="span4me" id="emp_hm_telephone" value="<?php echo $row->emp_job_start_date;?>" placeholder="Job Starting Date" >          
                                      </div>
                                      <div class="row_content_left_left_less">
                                          <div class="name_field">
                                            <b>Joined Date:</b>
                                          </div>
                                      </div>
                                      <div class="row_content_left_right">
                                             <input type="text" class="span4me" id="emp_work_telephone" value="<?php echo $row->emp_joined_date;?>" placeholder="Joined Date">        
                                      </div> 
                                      <div class="row_content_left_left">
                                          <div class="name_field">
                                            <b>Employeement Status :</b>
                                          </div>
                                      </div>
                                      <div class="row_content_left_right">
                                             <input type="text" class="span4me" id="city_code" value="<?php echo $row->emp_employement_status;?>" placeholder="Employeement Status">        
                                      </div>                                                                                                                                                                                         
                                </div><!--row_content_left-->
                               <div class="row_content_right">
                                      <div class="row_content_left_left_less">
                                          <div class="name_field">
                                            <b>Job Specification :</b>
                                          </div>
                                      </div>
                                      <div class="row_content_left_right">
                                             <input type="text" class="span4me" id="emp_street2" value="<?php echo $row->emp_job_specification;?>" placeholder="Specification" >         
                                      </div>
                                      <div class="row_content_left_left_less">
                                          <div class="name_field">
                                            <b>Job Category :</b>
                                          </div>
                                      </div>
                                      <div class="row_content_left_right">
                                            <input type="text" class="span4me" id="provin_code" value="<?php echo $row->emp_job_category;?>" placeholder=" Job Category" >        
                                      </div>
                                      <div class="row_content_left_left_less">
                                          <div class="name_field">
                                            <b>Location :</b>
                                          </div>
                                      </div>
                                      <div class="row_content_left_right">
                                              <input type="text" class="span4me" id="emp_zipcode" value="<?php echo $row->emp_location;?>" placeholder="Job Location">        
                                      </div>
                                      <div class="row_content_left_left_less">
                                          <div class="name_field">
                                            <b>Job End Date :</b>
                                          </div>
                                      </div>
                                      <div class="row_content_left_right">
                                            <input type="text" class="span4me" id="emp_work_email" value="<?php echo $row->emp_job_end_date;?>" placeholder="Job End Date">        
                                      </div>
                                      <div class="row_content_left_left_less">
                                          <div class="name_field">
                                            <b>Contract Detail :</b>
                                          </div>
                                      </div>
                                      <div class="row_content_left_right">
                                             <input type="text" class="span4me" id="emp_other_email" value="<?php echo $row->emp_contract_details;?>" placeholder="Contract">        
                                      </div> 
                                                                                                                                                                                                           
                                </div><!--row_content_right-->

                                                        


                      <hr style="width:1130px; margin-left:80px">
                        <div class="button_field">
                            <button type="button" class="btn btn-success " id="update_button_for_organisation">Update</button>&nbsp;&nbsp;
                            <button type="button" class="btn btn-info" id="cancel_employee_details_update">Cancel</button>&nbsp;&nbsp;     
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
$("#update_button_for_organisation").click(function(){
  wait();//alert ($("#customer_description").val());
          if($("#message_showing_area").hide())
         {
          $("#message_showing_area").show();
         }
  $("#container-login_edit").hide();
   $("#container-login_show").show();
   $("#edit_form_for_organisation").show();

    $.post("index.php/admin_ctrl/show_submit_data_for_updating_company_info",
      {employee_id:$("#employee_id").val(),
    emp_first_name:$("#emp_first_name").val(),
    emp_middle_name:$("#emp_middle_name").val(),
    emp_last_name:$("#emp_last_name").val(),    
    emp_nick_name:$("#emp_nick_name").val(),
    emp_birthday:$("#emp_birthday").val(),
    nation_code:$("#nation_code").val(),
    emp_marital_status:$("#emp_marital_status").val(),
    emp_pancard_num:$("#emp_pancard_num").val(),
    emp_dri_lice_num:$("#emp_dri_lice_num").val(),
    emp_dri_lice_exp_date:$("#emp_dri_lice_exp_date").val(),
    emp_military_service:$("#emp_military_service").val(),
    emp_status:$("#emp_status").val(),
    job_title_code:$("#job_title_code").val(),},
    function(data){ $("#message_showing_area").html(data);show_company_details();
    });
});
  

  function wait(){
       var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
       $("#message_showing_area").html(ajax_load);

    }
</script>                         