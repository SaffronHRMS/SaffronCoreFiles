  <div class="container-personal-detail well">
    <h4>Job</h4>
    <legend></legend>
    <?php if($job_details != FALSE) { ?>
    <?php foreach($job_details as $row) { ?>
     <div class="row_content_left_for_user">
                        <div class="row_content_left_left_less_for_user_view">
                                 <b>Job Title : </b> 
                        </div> 
                               <div class="row_content_left_right_for_user_view">
                                      <?php echo $row->emp_job_title; ?> 
                                </div>
                        <div class="row_content_left_left_less_for_user_view">
                                 <b>Job Category : </b> 
                        </div> 
                               <div class="row_content_left_right_for_user_view">
                                      <?php echo $row->emp_job_category; ?>
                                </div>
                        <div class="row_content_left_left_less_for_user_view">
                                 <b>Joined Date : </b> 
                        </div> 
                               <div class="row_content_left_right_for_user_view">
                                      <?php echo $row->emp_joined_date; ?>
                                </div>
                        <div class="row_content_left_left_less_for_user_view">
                                 <b>Sub Unit : </b> 
                        </div> 
                               <div class="row_content_left_right_for_user_view">
                                      <?php echo $row->emp_sub_unit; ?>
                                </div>
                        <div class="row_content_left_left_less_for_user_view">
                                 <b>Job Specification : </b> 
                        </div> 
                               <div class="row_content_left_right_for_user_view">
                                      <?php echo $row->emp_job_specification; ?> 
                                </div>
                        <div class="row_content_left_left_less_for_user_view">
                                 <b>Employment Status : </b> 
                        </div> 
                               <div class="row_content_left_right_for_user_view">
                                      <?php echo $row->emp_employement_status; ?>
                                </div>
                        <div class="row_content_left_left_less_for_user_view">
                                 <b>Location : </b> 
                        </div> 
                               <div class="row_content_left_right_for_user_view">
                                      <?php echo $row->emp_location; ?>
                                </div>
     </div>
 
<legend></legend>


      <h4>Employement Contract</h4>
      <legend></legend>
      <div class="row_content_left_for_user">
               <div class="row_content_left_left_less_for_user_view">
                <b>Start Date : </b>
                </div> 
                                       <div class="row_content_left_right_for_user_view">
                                        <?php echo $row->emp_job_start_date; ?>
                                      </div>
               <div class="row_content_left_left_less_for_user_view">
                <b>End Date : </b>
                </div> 
                                       <div class="row_content_left_right_for_user_view">
                                        <?php echo $row->emp_job_end_date; ?>
                                      </div>
               <div class="row_content_left_left_less_for_user_view">
                <b>Contract Details : </b>
                </div> 
                                       <div class="row_content_left_right_for_user_view">
                                        <?php echo $row->emp_contract_details; ?>
                                      </div>
         </div>
<?php  } }
      else
        {
          echo "Your Job Details Not Configured yet , You should Contact HR";
        } 
?>
  
<legend></legend>  

    <h4><b>Superviser : </b> </h4>
    <legend></legend>
     <?php if($report_to_details != FALSE) { ?>
    <?php foreach($report_to_details as $row) 
    {  ?>
         <div class="row_content_left_for_user">
                        <div class="row_content_left_left_less_for_user_view">
                                 <b>Name : </b> 
                        </div> 
                               <div class="row_content_left_right_for_user_view">
                                      <?php echo $row->emp_supervisor_name;?> 
                                </div>
          </div>                      
    <?php  } }
      else
        {
          echo "Your Superviser Not Assigned yet.";
        } 
?>
  </div>