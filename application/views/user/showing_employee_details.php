

<?php 
if(isset($search_by_name))
{
  if(isset($records))
  {
?>
<center>
  <div class="showing_user_input_data_in_showing_view">
          <b>Showing Results for :- </b><?php echo $search_by_name; ?>
  </div>
</center>
<?php
foreach($records as $row)
  {
  ?>
       <div class="rowme">
                   <div class="row_content_left">
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Employee Id : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->employee_id; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Birthday : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_birthday; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Marital status : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                               <?php if($row->emp_marital_status==1){echo "Single";} elseif($row->emp_marital_status==2){echo "Married";} elseif($row->emp_marital_status==3){echo "Other"; }; ?>
                          </div>    
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Street 1 : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_street1; ?>
                        </div>    
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>City : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->city_code; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Pincode : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_zipcode; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Mobile No : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_mobile; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Job Title : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                          <?php echo $row->job_title_code; ?>
                        </div>
                        <div class="row_content_left_left">
                          <div class="name_field">
                            <b>Employee Work Telephone : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_work_telephone; ?>
                        </div>
                        <div class="row_content_left_left">
                          <div class="name_field">
                            <b>Employee Working Email : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_work_email; ?>
                        </div>
                        <div class="row_content_left_left">
                          <div class="name_field">
                            <b>Driving Licence Number : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_dri_lice_num; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Status : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_status; ?>
                        </div>                                                                                                
                   </div> <!--End row_content_left-->
                   <div class="row_content_right">
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Name : </b>
                          </div>  
                       </div>
                       <div class="row_content_left_right">
                        <?php echo $row->emp_first_name ." ".$row->emp_middle_name." ".$row->emp_last_name; ?>
                       </div>    
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Nick Name : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_nick_name; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Gender : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php if($row->emp_gender==1){echo "Male";} elseif($row->emp_gender==2){echo "Female";} elseif($row->emp_gender==3){echo "Other"; }; ?>
                        </div>    
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Street 2 : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_street2; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>State : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->provin_code; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Nation : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->coun_code; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Joined Date : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->joined_date; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Supervisor : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_supervisor_name; ?>
                        </div>
                        <div class="row_content_left_left">
                          <div class="name_field">
                            <b>Employee Home Telephone : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_hm_telephone; ?>
                        </div>
                        <div class="row_content_left_left">
                          <div class="name_field">
                            <b>Employee Personal Email : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_other_email; ?>
                        </div>
                        <div class="row_content_left_left">
                          <div class="name_field">
                            <b>Driving Licence Expire on : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_dri_lice_exp_date; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Salary Grade : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->sal_grd_code; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                           <!--  Pincode -->
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                       <!--     <input type="text" id="search_by_name" class="span4me" name="search_by_name " placeholder="Search by Name "> -->
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                           <!--  Pincode -->
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <!-- <input type="text" id="search_by_name" class="span4me" name="search_by_name " placeholder="Search by Name "> -->
                        </div>                                                                                                   
                   </div> <!--End row_content_left_right--> 
       </div>              


   <?php
   }
   }
else  
{
  echo "No Records Found";
}
}
elseif(isset($search_by_id))
{
  if(isset($records))
  {
?>
<center>
  <div class="showing_user_input_data_in_showing_view">
          <b>Showing Results for :- </b><?php echo $search_by_id; ?>
  </div>
</center>
<?php
foreach($records as $row)
  {
  ?>
       <div class="rowme">
                   <div class="row_content_left">
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Employee Id : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->employee_id; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Birthday : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_birthday; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Marital status : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                               <?php if($row->emp_marital_status==1){echo "Single";} elseif($row->emp_marital_status==2){echo "Married";} elseif($row->emp_marital_status==3){echo "Other"; }; ?>
                          </div>    
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Street 1 : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_street1; ?>
                        </div>    
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>City : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->city_code; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Pincode : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_zipcode; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Mobile No : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_mobile; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Job Title : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                          <?php echo $row->job_title_code; ?>
                        </div>
                        <div class="row_content_left_left">
                          <div class="name_field">
                            <b>Employee Work Telephone : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_work_telephone; ?>
                        </div>
                        <div class="row_content_left_left">
                          <div class="name_field">
                            <b>Employee Working Email : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_work_email; ?>
                        </div>
                        <div class="row_content_left_left">
                          <div class="name_field">
                            <b>Driving Licence Number : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_dri_lice_num; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Status : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_status; ?>
                        </div>                                                                                                
                   </div> <!--End row_content_left-->
                   <div class="row_content_right">
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Name : </b>
                          </div>  
                       </div>
                       <div class="row_content_left_right">
                        <?php echo $row->emp_first_name ." ".$row->emp_middle_name." ".$row->emp_last_name; ?>
                       </div>    
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Nick Name : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_nick_name; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Gender : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php if($row->emp_gender==1){echo "Male";} elseif($row->emp_gender==2){echo "Female";} elseif($row->emp_gender==3){echo "Other"; }; ?>
                        </div>    
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Street 2 : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_street2; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>State : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->provin_code; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Nation : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->coun_code; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Joined Date : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->joined_date; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Supervisor : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_supervisor_name; ?>
                        </div>
                        <div class="row_content_left_left">
                          <div class="name_field">
                            <b>Employee Home Telephone : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_hm_telephone; ?>
                        </div>
                        <div class="row_content_left_left">
                          <div class="name_field">
                            <b>Employee Personal Email : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_other_email; ?>
                        </div>
                        <div class="row_content_left_left">
                          <div class="name_field">
                            <b>Driving Licence Expire on : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_dri_lice_exp_date; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Salary Grade : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->sal_grd_code; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                           <!--  Pincode -->
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                       <!--     <input type="text" id="search_by_name" class="span4me" name="search_by_name " placeholder="Search by Name "> -->
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                           <!--  Pincode -->
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <!-- <input type="text" id="search_by_name" class="span4me" name="search_by_name " placeholder="Search by Name "> -->
                        </div>                                                                                                   
                   </div> <!--End row_content_left_right--> 
       </div>              


   <?php
   }
   }
else  
{
  echo "No Records Found";
}
}
elseif(isset($search_by_supervisor_name))
{
  if(isset($records))
  {
?>
<center>
  <div class="showing_user_input_data_in_showing_view">
          <b>Showing Results for :- </b><?php echo $search_by_supervisor_name; ?>
  </div>
</center>
<?php
foreach($records as $row)
  {
  ?>
       <div class="rowme">
                   <div class="row_content_left">
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Employee Id : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->employee_id; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Birthday : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_birthday; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Marital status : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                               <?php if($row->emp_marital_status==1){echo "Single";} elseif($row->emp_marital_status==2){echo "Married";} elseif($row->emp_marital_status==3){echo "Other"; }; ?>
                          </div>    
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Street 1 : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_street1; ?>
                        </div>    
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>City : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->city_code; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Pincode : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_zipcode; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Mobile No : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_mobile; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Job Title : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                          <?php echo $row->job_title_code; ?>
                        </div>
                        <div class="row_content_left_left">
                          <div class="name_field">
                            <b>Employee Work Telephone : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_work_telephone; ?>
                        </div>
                        <div class="row_content_left_left">
                          <div class="name_field">
                            <b>Employee Working Email : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_work_email; ?>
                        </div>
                        <div class="row_content_left_left">
                          <div class="name_field">
                            <b>Driving Licence Number : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_dri_lice_num; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Status : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_status; ?>
                        </div>                                                                                                
                   </div> <!--End row_content_left-->
                   <div class="row_content_right">
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Name : </b>
                          </div>  
                       </div>
                       <div class="row_content_left_right">
                        <?php echo $row->emp_first_name ." ".$row->emp_middle_name." ".$row->emp_last_name; ?>
                       </div>    
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Nick Name : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_nick_name; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Gender : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php if($row->emp_gender==1){echo "Male";} elseif($row->emp_gender==2){echo "Female";} elseif($row->emp_gender==3){echo "Other"; }; ?>
                        </div>    
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Street 2 : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_street2; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>State : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->provin_code; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Nation : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->coun_code; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Joined Date : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->joined_date; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Supervisor : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_supervisor_name; ?>
                        </div>
                        <div class="row_content_left_left">
                          <div class="name_field">
                            <b>Employee Home Telephone : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_hm_telephone; ?>
                        </div>
                        <div class="row_content_left_left">
                          <div class="name_field">
                            <b>Employee Personal Email : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_other_email; ?>
                        </div>
                        <div class="row_content_left_left">
                          <div class="name_field">
                            <b>Driving Licence Expire on : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_dri_lice_exp_date; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Salary Grade : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->sal_grd_code; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                           <!--  Pincode -->
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                       <!--     <input type="text" id="search_by_name" class="span4me" name="search_by_name " placeholder="Search by Name "> -->
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                           <!--  Pincode -->
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <!-- <input type="text" id="search_by_name" class="span4me" name="search_by_name " placeholder="Search by Name "> -->
                        </div>                                                                                                   
                   </div> <!--End row_content_left_right--> 
       </div>              


   <?php
   }
   }
else  
{
  echo "No Records Found";
}
}
elseif(isset($city_code))
{
  if(isset($records))
  {
?>
<center>
  <div class="showing_user_input_data_in_showing_view">
          <b>Showing Results for :- </b><?php echo $city_code; ?>
  </div>
</center>
<?php
foreach($records as $row)
  {
  ?>
       <div class="rowme">
                   <div class="row_content_left">
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Employee Id : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->employee_id; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Birthday : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_birthday; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Marital status : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                               <?php if($row->emp_marital_status==1){echo "Single";} elseif($row->emp_marital_status==2){echo "Married";} elseif($row->emp_marital_status==3){echo "Other"; }; ?>
                          </div>    
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Street 1 : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_street1; ?>
                        </div>    
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>City : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->city_code; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Pincode : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_zipcode; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Mobile No : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_mobile; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Job Title : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                          <?php echo $row->job_title_code; ?>
                        </div>
                        <div class="row_content_left_left">
                          <div class="name_field">
                            <b>Employee Work Telephone : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_work_telephone; ?>
                        </div>
                        <div class="row_content_left_left">
                          <div class="name_field">
                            <b>Employee Working Email : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_work_email; ?>
                        </div>
                        <div class="row_content_left_left">
                          <div class="name_field">
                            <b>Driving Licence Number : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_dri_lice_num; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Status : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_status; ?>
                        </div>                                                                                                
                   </div> <!--End row_content_left-->
                   <div class="row_content_right">
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Name : </b>
                          </div>  
                       </div>
                       <div class="row_content_left_right">
                        <?php echo $row->emp_first_name ." ".$row->emp_middle_name." ".$row->emp_last_name; ?>
                       </div>    
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Nick Name : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_nick_name; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Gender : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php if($row->emp_gender==1){echo "Male";} elseif($row->emp_gender==2){echo "Female";} elseif($row->emp_gender==3){echo "Other"; }; ?>
                        </div>    
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Street 2 : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_street2; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>State : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->provin_code; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Nation : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->coun_code; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Joined Date : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->joined_date; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Supervisor : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_supervisor_name; ?>
                        </div>
                        <div class="row_content_left_left">
                          <div class="name_field">
                            <b>Employee Home Telephone : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_hm_telephone; ?>
                        </div>
                        <div class="row_content_left_left">
                          <div class="name_field">
                            <b>Employee Personal Email : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_other_email; ?>
                        </div>
                        <div class="row_content_left_left">
                          <div class="name_field">
                            <b>Driving Licence Expire on : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_dri_lice_exp_date; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Salary Grade : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->sal_grd_code; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                           <!--  Pincode -->
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                       <!--     <input type="text" id="search_by_name" class="span4me" name="search_by_name " placeholder="Search by Name "> -->
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                           <!--  Pincode -->
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <!-- <input type="text" id="search_by_name" class="span4me" name="search_by_name " placeholder="Search by Name "> -->
                        </div>                                                                                                   
                   </div> <!--End row_content_left_right--> 
       </div>              


   <?php
   }
   }
else  
{
  echo "No Records Found";
}
}
elseif(isset($emp_status))
{
  if(isset($records))
  {
?>
<center>
  <div class="showing_user_input_data_in_showing_view">
          <b>Showing Results for :- </b><?php echo $emp_status; ?>
  </div>
</center>
<?php
foreach($records as $row)
  {
  ?>
       <div class="rowme">
                   <div class="row_content_left">
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Employee Id : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->employee_id; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Birthday : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_birthday; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Marital status : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                               <?php if($row->emp_marital_status==1){echo "Single";} elseif($row->emp_marital_status==2){echo "Married";} elseif($row->emp_marital_status==3){echo "Other"; }; ?>
                          </div>    
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Street 1 : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_street1; ?>
                        </div>    
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>City : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->city_code; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Pincode : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_zipcode; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Mobile No : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_mobile; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Job Title : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                          <?php echo $row->job_title_code; ?>
                        </div>
                        <div class="row_content_left_left">
                          <div class="name_field">
                            <b>Employee Work Telephone : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_work_telephone; ?>
                        </div>
                        <div class="row_content_left_left">
                          <div class="name_field">
                            <b>Employee Working Email : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_work_email; ?>
                        </div>
                        <div class="row_content_left_left">
                          <div class="name_field">
                            <b>Driving Licence Number : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_dri_lice_num; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Status : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_status; ?>
                        </div>                                                                                                
                   </div> <!--End row_content_left-->
                   <div class="row_content_right">
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Name : </b>
                          </div>  
                       </div>
                       <div class="row_content_left_right">
                        <?php echo $row->emp_first_name ." ".$row->emp_middle_name." ".$row->emp_last_name; ?>
                       </div>    
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Nick Name : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_nick_name; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Gender : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php if($row->emp_gender==1){echo "Male";} elseif($row->emp_gender==2){echo "Female";} elseif($row->emp_gender==3){echo "Other"; }; ?>
                        </div>    
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Street 2 : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_street2; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>State : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->provin_code; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Nation : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->coun_code; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Joined Date : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->joined_date; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Supervisor : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_supervisor_name; ?>
                        </div>
                        <div class="row_content_left_left">
                          <div class="name_field">
                            <b>Employee Home Telephone : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_hm_telephone; ?>
                        </div>
                        <div class="row_content_left_left">
                          <div class="name_field">
                            <b>Employee Personal Email : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_other_email; ?>
                        </div>
                        <div class="row_content_left_left">
                          <div class="name_field">
                            <b>Driving Licence Expire on : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->emp_dri_lice_exp_date; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                            <b>Salary Grade : </b>
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <?php echo $row->sal_grd_code; ?>
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                           <!--  Pincode -->
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                       <!--     <input type="text" id="search_by_name" class="span4me" name="search_by_name " placeholder="Search by Name "> -->
                        </div>
                        <div class="row_content_left_left_less">
                          <div class="name_field">
                           <!--  Pincode -->
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <!-- <input type="text" id="search_by_name" class="span4me" name="search_by_name " placeholder="Search by Name "> -->
                        </div>                                                                                                   
                   </div> <!--End row_content_left_right--> 
       </div>              


   <?php
   }
  }
    else  
    {
      echo "No Records Found";
    }
}
else  
{
  echo "No Records Found";
}?>
                  