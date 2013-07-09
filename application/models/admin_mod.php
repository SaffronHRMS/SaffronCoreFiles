<?php
class Admin_mod extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  //settings for image
  function image_setting($image_field)
  {
$fileField=$image_field;
echo $image_field;

if ((($_FILES["fileField"]["type"] == "image/gif")
|| ($_FILES["fileField"]["type"] == "image/jpeg")
|| ($_FILES["fileField"]["type"] == "image/jpg")
)
&& ($_FILES["fileField"]["size"] < 2000000000))
  {
  if ($_FILES["fileField"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["fileField"]["error"] . "<br />";
    }
  else
    {
    //echo($_FILES['fileField']['name']);
  $file = basename($_FILES['fileField']['name']);
  $random1=rand(1,9999999999999999);
  $random2=rand(1,9999999999999999);
  $filename=$random1.$random2.$file;
  

    if (file_exists("photos/" . $filename))
      {
      echo $filename . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["fileField"]["tmp_name"],"photos/" . $filename);
}
}
}
}
//end image setting
  function getAutocomplete_Data_for_name($q)
  {
    //echo "This is admin model";
    $query="select * from hrms_employee where emp_first_name like '%".$q."%'";
    //echo $query;

            $records=$this->db->query($query);    
                if($records->num_rows() > 0) 
                {
                  foreach ($records->result() as $row) 
                  {
                       $data[] = $row;
                  }
                  return $data;
                }
  }
  function getAutocomplete_Data_for_employee_id($q)
  {
    //echo "This is admin model";
    $query="select * from hrms_employee where employee_id like '%".$q."%'";
    //echo $query;

            $records=$this->db->query($query);    
                if($records->num_rows() > 0) 
                {
                  foreach ($records->result() as $row) 
                  {
                       $data[] = $row;
                  }
                  return $data;
                }
  }

  function getAutocomplete_Data_for_supervisor_name($q)
  {
    //echo "This is admin model";
    $query="select * from hrms_employee where emp_supervisor_name like '%".$q."%'";
    //echo $query;

            $records=$this->db->query($query);    
                if($records->num_rows() > 0) 
                {
                  foreach ($records->result() as $row) 
                  {
                       $data[] = $row;
                  }
                  return $data;
                }
  }

  function getAutocomplete_Data_for_country($q)
  {
    //echo "This is admin model";
    $query="select * from hrms_country where cou_name like '%".$q."%'";
    //echo $query;

            $records=$this->db->query($query);    
                if($records->num_rows() > 0) 
                {
                  foreach ($records->result() as $row) 
                  {
                       $data[] = $row;
                  }
                  return $data;
                }
  }

  function check_exists_username_password($username,$password)
  {
      $query="select * from hrms_user where user_name='".$username."' and user_password='".$password."'";
      //echo($query);
      $result=$this->db->query($query);
      $row = $result->row();
      //$row=$this->db->fetch_assoc($result);
      if($row)
      {
         if($row->user_role_id=='1')
         {
        return $msg=1;
         }
         if($row->user_role_id=='4')
         {
        return $msg=4;
         }
         else
         {
         return false;
         }
      }
      else
        {
          return false;
        }
     
  }

  function search_attendance_details($employee_id,$final_date)
  {
    //$query="select * from hrms_attendance_record where employee_id='".$employee_id."' and punch_date='".$final_date."'";
     $query="select hrms_attendance_record.punch_in_utc_time,hrms_attendance_record.punch_out_utc_time, hrms_employee.emp_first_name,hrms_employee.emp_middle_name,hrms_employee.emp_last_name,hrms_attendance_record.punch_date,hrms_attendance_record.punch_time,hrms_attendance_record.punch_in_user_time,hrms_attendance_record.punch_out_user_time,hrms_attendance_record.punch_status from hrms_employee,hrms_attendance_record where concat(hrms_employee.emp_first_name,' ',hrms_employee.emp_last_name) LIKE '%".$employee_id."%' and hrms_attendance_record.punch_date='".$final_date."' and hrms_attendance_record.employee_id=hrms_employee.employee_id";
    //echo $query;
    $q=$this->db->query($query);
    
    if($q->num_rows() > 0) {
      foreach ($q->result() as $row) {
          $data[] = $row;
      }
    return $data;
    }

  }

  function search_attendance_details_from_to($employee_id,$final_date,$final_to_date)
  {
        // if(strtotime($final_to_date)<strtotime($final_date))
        // {
        //   echo "Date to must be greater than Date from";
        // }
        // else 
        // {   
                //$query="select * from hrms_attendance_record where employee_id='".$employee_id."' and  punch_date>='".$final_date."' and punch_date<='".$final_to_date."'";
                $query="select hrms_attendance_record.punch_in_utc_time,hrms_attendance_record.punch_out_utc_time, hrms_employee.emp_first_name,hrms_employee.emp_middle_name,hrms_employee.emp_last_name,hrms_attendance_record.punch_date,hrms_attendance_record.punch_time,hrms_attendance_record.punch_in_user_time,hrms_attendance_record.punch_out_user_time,hrms_attendance_record.punch_status from hrms_employee,hrms_attendance_record where concat(hrms_employee.emp_first_name,' ',hrms_employee.emp_last_name) LIKE '%".$employee_id."%'  and hrms_attendance_record.employee_id=hrms_employee.employee_id and hrms_attendance_record.punch_date between '".$final_date."' and '".$final_to_date."'";
                //echo $query;
                $q=$this->db->query($query);
                
                if($q->num_rows() > 0) {
                  foreach ($q->result() as $row) {
                      $data[] = $row;
                  }
                return $data;
                }
        // }
  }

  // function search_employee_full_name_by_name($employee_id)
  // {
  //   //$query="select * from hrms_attendance_record where employee_id='".$employee_id."'";
  //   $query="select * from hrms_employee where concat(emp_first_name,' ',emp_last_name) LIKE '%".$employee_id."%' ";
  //  // echo $query;
  //         $q=$this->db->query($query);
          
  //         if($q->num_rows() > 0)
  //          {
  //           foreach ($q->result() as $row) 
  //           {
  //               $data[] = $row;
  //           }
  //         return $data;
  //         }         

  //     else
  //     {
  //          //$query="select * from hrms_employee where concat(emp_first_name,' ',emp_middle_name,' ',emp_last_name) LIKE '%".$employee_id."%'";
  //          $query="select * from hrms_employee where concat(emp_first_name,' ',emp_middle_name,' ',emp_last_name) LIKE '%".$employee_id."%' ";
  //             $q=$this->db->query($query);
              
  //             if($q->num_rows() > 0)
  //              {
  //               foreach ($q->result() as $row) 
  //               {
  //                   $data[] = $row;
  //               }
  //             return $data;
  //             } 
  //     }
 

  // }

  function search_attendance_details_by_name($employee_id)
  {
    //$query="select * from hrms_attendance_record where employee_id='".$employee_id."'";
    $query="select hrms_attendance_record.punch_in_utc_time,hrms_attendance_record.punch_out_utc_time, hrms_employee.emp_first_name,hrms_employee.emp_middle_name,hrms_employee.emp_last_name,hrms_attendance_record.punch_date,hrms_attendance_record.punch_time,hrms_attendance_record.punch_in_user_time,hrms_attendance_record.punch_out_user_time,hrms_attendance_record.punch_status from hrms_employee,hrms_attendance_record where concat(hrms_employee.emp_first_name,'  ',hrms_employee.emp_last_name) LIKE '%".$employee_id."%' and hrms_attendance_record.employee_id=hrms_employee.employee_id";
   // echo $query;
    //$query="select * from hrms_employee where concat(emp_first_name,' ',emp_last_name) LIKE '%".$employee_id."%'";
    //echo $query."<br>";
        //$query="select * from hrms_attendance_record where employee_id='".$row->employee_id."'";
          $q=$this->db->query($query);
          
          if($q->num_rows() > 0)
           {
            foreach ($q->result() as $row) 
            {
                $data[] = $row;
            }
          return $data;
          }         

      else
      {
           //$query="select * from hrms_employee where concat(emp_first_name,' ',emp_middle_name,' ',emp_last_name) LIKE '%".$employee_id."%'";
           $query="select hrms_attendance_record.punch_in_utc_time,hrms_attendance_record.punch_out_utc_time,hrms_employee.emp_first_name,hrms_employee.emp_middle_name,hrms_employee.emp_last_name,hrms_attendance_record.punch_date,hrms_attendance_record.punch_time,hrms_attendance_record.punch_in_user_time,hrms_attendance_record.punch_out_user_time,hrms_attendance_record.punch_status from hrms_employee,hrms_attendance_record where concat(hrms_employee.emp_first_name,' ',hrms_employee.emp_middle_name,' ',hrms_employee.emp_last_name) LIKE '%".$employee_id."%' and hrms_attendance_record.employee_id=hrms_employee.employee_id";
              $q=$this->db->query($query);
              
              if($q->num_rows() > 0)
               {
                foreach ($q->result() as $row) 
                {
                    $data[] = $row;
                }
              return $data;
              } 
      }
 

  }

  function change_password($user_name,$old_password,$new_password)
  {
    $query="update hrms_user set user_password='".$new_password."' where user_name='".$user_name."' and user_password='".$old_password."'";
    //echo $query;
    $result=$this->db->query($query);
     if($this->db->affected_rows()>0)
     {
       return true;
     }
     else
     {
       return false;
     }
  }

  function search_leave_list_detail_search_by_checkbox($checkbox_name,$tablename,$tablename2)
  {
    if($checkbox_name=='all')
    {
       $query="select hrms_employee.emp_first_name,hrms_employee.emp_middle_name,hrms_employee.emp_last_name,hrms_leave_list.apply_date,hrms_leave_list.leave_type,hrms_leave_list.leave_balance,hrms_leave_list.no_of_days,hrms_leave_list.date_from,hrms_leave_list.date_to,hrms_leave_list.status,hrms_leave_list.comment,hrms_leave_list.id from ".$tablename.",".$tablename2." where ".$tablename.".employee_id=".$tablename2.".employee_id";
      //echo $query;
      $q=$this->db->query($query);
      
      if($q->num_rows() > 0) {
        foreach ($q->result() as $row) {
            $data[] = $row;
        }
      return $data;
      }
     }

    if($checkbox_name=='rejected')
    {
     $query="select hrms_employee.emp_first_name,hrms_employee.emp_middle_name,hrms_employee.emp_last_name,hrms_leave_list.apply_date,hrms_leave_list.leave_type,hrms_leave_list.leave_balance,hrms_leave_list.no_of_days,hrms_leave_list.date_from,hrms_leave_list.date_to,hrms_leave_list.status,hrms_leave_list.comment,hrms_leave_list.id from ".$tablename.",".$tablename2." where ".$tablename.".employee_id=".$tablename2.".employee_id and ".$tablename.".status='rejected'";
      //echo $query;
      $q=$this->db->query($query);
      
      if($q->num_rows() > 0) {
        foreach ($q->result() as $row) {
            $data[] = $row;
        }
      return $data;
      }
     }

    if($checkbox_name=='canceled')
    {
      $query="select hrms_employee.emp_first_name,hrms_employee.emp_middle_name,hrms_employee.emp_last_name,hrms_leave_list.apply_date,hrms_leave_list.leave_type,hrms_leave_list.leave_balance,hrms_leave_list.no_of_days,hrms_leave_list.date_from,hrms_leave_list.date_to,hrms_leave_list.status,hrms_leave_list.comment,hrms_leave_list.id from ".$tablename.",".$tablename2." where ".$tablename.".employee_id=".$tablename2.".employee_id and ".$tablename.".status='canceled'";
      //echo $query;
      $q=$this->db->query($query);
      
      if($q->num_rows() > 0) {
        foreach ($q->result() as $row) {
            $data[] = $row;
        }
      return $data;
      }
     }

    if($checkbox_name=='pending_approval')
    {
      $query="select hrms_employee.emp_first_name,hrms_employee.emp_middle_name,hrms_employee.emp_last_name,hrms_leave_list.apply_date,hrms_leave_list.leave_type,hrms_leave_list.leave_balance,hrms_leave_list.no_of_days,hrms_leave_list.date_from,hrms_leave_list.date_to,hrms_leave_list.status,hrms_leave_list.comment,hrms_leave_list.id from ".$tablename.",".$tablename2." where ".$tablename.".employee_id=".$tablename2.".employee_id and ".$tablename.".status='pending_approval'";
      //echo $query;
      $q=$this->db->query($query);
      
      if($q->num_rows() > 0) {
        foreach ($q->result() as $row) {
            $data[] = $row;
        }
      return $data;
      }
     }

    if($checkbox_name=='scheduled')
    {
      $query="select hrms_employee.emp_first_name,hrms_employee.emp_middle_name,hrms_employee.emp_last_name,hrms_leave_list.apply_date,hrms_leave_list.leave_type,hrms_leave_list.leave_balance,hrms_leave_list.no_of_days,hrms_leave_list.date_from,hrms_leave_list.date_to,hrms_leave_list.status,hrms_leave_list.comment,hrms_leave_list.id from ".$tablename.",".$tablename2." where ".$tablename.".employee_id=".$tablename2.".employee_id and ".$tablename.".status='scheduled'";
      //echo $query;
      $q=$this->db->query($query);
      
      if($q->num_rows() > 0) {
        foreach ($q->result() as $row) {
            $data[] = $row;
        }
      return $data;
      }
     }

    if($checkbox_name=='taken')
    {
      $query="select hrms_employee.emp_first_name,hrms_employee.emp_middle_name,hrms_employee.emp_last_name,hrms_leave_list.apply_date,hrms_leave_list.leave_type,hrms_leave_list.leave_balance,hrms_leave_list.no_of_days,hrms_leave_list.date_from,hrms_leave_list.date_to,hrms_leave_list.status,hrms_leave_list.comment,hrms_leave_list.id from ".$tablename.",".$tablename2." where ".$tablename.".employee_id=".$tablename2.".employee_id and ".$tablename.".status='taken'";
      //echo $query;
      $q=$this->db->query($query);
      
      if($q->num_rows() > 0) {
        foreach ($q->result() as $row) {
            $data[] = $row;
        }
      return $data;
      }
     }               
  }

  function search_leave_summary_details_by_name($employee_name)
  {
    $query="select * from hrms_leave where employee_id='".$employee_name."'";
    //echo $query;
    $q=$this->db->query($query);
    
    if($q->num_rows() > 0) {
      foreach ($q->result() as $row) {
          $data[] = $row;
      }
    return $data;
    }

  }

  function search_leave_summary_details_by_id($employee_id)
  {
    $query="select * from hrms_leave where employee_id='".$employee_id."'";
    //echo $query;
    $q=$this->db->query($query);
    
    if($q->num_rows() > 0) {
      foreach ($q->result() as $row) {
          $data[] = $row;
      }
    return $data;
    }

  }


  function search_attendance_details_by_date($final_date)
  {
    //$query="select * from hrms_attendance_record where punch_date='".$final_date."'";
    $query="select hrms_attendance_record.punch_in_utc_time,hrms_attendance_record.punch_out_utc_time, hrms_employee.emp_first_name,hrms_employee.emp_middle_name,hrms_employee.emp_last_name,hrms_attendance_record.punch_date,hrms_attendance_record.punch_time,hrms_attendance_record.punch_in_user_time,hrms_attendance_record.punch_out_user_time,hrms_attendance_record.punch_status from hrms_employee,hrms_attendance_record where  hrms_attendance_record.punch_date='".$final_date."' and hrms_attendance_record.employee_id=hrms_employee.employee_id";
    //echo $query;
    $q=$this->db->query($query);
    
    if($q->num_rows() > 0) {
      foreach ($q->result() as $row) {
          $data[] = $row;
      }
    return $data;
    }

  }


  function search_candidate_detail_by_data_select_job_title($select_job_title)
  {
    $query="select * from hrms_job_candidate where applied_for='".$select_job_title."'";
    $q=$this->db->query($query);
    
    if($q->num_rows() > 0) {
      foreach ($q->result() as $row) {
          $data[] = $row;
      }
    return $data;
    }

  }

  function search_candidate_detail_by_data_search_by_name($search_by_name)
  {
    $query="select * from hrms_job_candidate where first_name='".$search_by_name."'";
    $q=$this->db->query($query);
    
    if($q->num_rows() > 0) {
      foreach ($q->result() as $row) {
          $data[] = $row;
      }
    return $data;
    }

  }

  function search_candidate_detail_by_data_select_keywords($select_keywords)
  {
    $query="select * from hrms_job_candidate where keywords like '%".$select_keywords."%'";
    $q=$this->db->query($query);
    
    if($q->num_rows() > 0) {
      foreach ($q->result() as $row) {
          $data[] = $row;
      }
    return $data;
    }

  }

  function search_employee_detail_by_data_search_by_name($username)
  {
    $query="select * from hrms_employee where concat(emp_first_name,' ',emp_middle_name,' ',emp_last_name)='".$username."'";
    $q=$this->db->query($query);
    
    if($q->num_rows() > 0) {
      foreach ($q->result() as $row) {
          $data[] = $row;
      }
    return $data;
    }

  }

  function search_employee_detail_by_data_search_by_id($username)
  {
  $query="select * from hrms_employee where employee_id='".$username."'";
  //echo $query;
    $q=$this->db->query($query);
    
    if($q->num_rows() > 0) {
      foreach ($q->result() as $row) {
          $data[] = $row;
      }
    return $data;
    }

  }

  function search_employee_detail_by_data_search_by_supervisor_name($username)
  {
  $query="select * from hrms_employee where emp_supervisor_name='".$username."'";
    $q=$this->db->query($query);
    
    if($q->num_rows() > 0) {
      foreach ($q->result() as $row) {
          $data[] = $row;
      }
    return $data;
    }

  }

  function search_employee_detail_by_data_job_title($username)
  {
  $query="select * from hrms_employee where job_title_code='".$username."'";
    $q=$this->db->query($query);
    
    if($q->num_rows() > 0) {
      foreach ($q->result() as $row) {
          $data[] = $row;
      }
    return $data;
    }

  }

  function search_employee_detail_by_data_city_code($username)
  {
  $query="select * from hrms_employee where city_code='".$username."'";
    $q=$this->db->query($query);
    
    if($q->num_rows() > 0) {
      foreach ($q->result() as $row) {
          $data[] = $row;
      }
    return $data;
    }
  }

  function search_employee_detail_by_data_emp_status($username)
  {
  $query="select * from hrms_employee where emp_status='".$username."'";
    $q=$this->db->query($query);
    
    if($q->num_rows() > 0) {
      foreach ($q->result() as $row) {
          $data[] = $row;
      }
    return $data;
    }

  }

  function add_project($project_id,$project_name,$project_description,$customer_id,$project_admin)
  {

     $query="select * from hrms_project where name='".$project_name."' and customer_id='".$customer_id."'";
     //echo $query;
     $result=$this->db->query($query);
     if($this->db->affected_rows()==0)
     {
      $completed='pending';
        $query="insert into hrms_project values ('','".$customer_id."','".$project_id."','".$project_name."','".$project_description."','".$project_admin."','".$completed."')";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
           return true;
         }
         else
         {
           return false;
         }
      }
      else
      {
        return false;
      }   
  }

  function submit_candidate_details($candidate_first_name,$candidate_middle_name,
      $candidate_last_name,$candidate_email,$candidate_contact_number,$candidate_applied_for,
      $candidate_skills,$candidate_comment)
  {
    $query = " select * from hrms_job_candidate where email ='".$candidate_email."'";
    $result = $this->db->query($query);
    if($this->db->affected_rows() == 0)
    {
      $query = " insert into hrms_job_candidate values('','$candidate_first_name','$candidate_middle_name',
        '$candidate_last_name','$candidate_email','$candidate_contact_number','','$candidate_comment',
        '$candidate_applied_for','','','','','$candidate_skills','') ";
  
          $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
           return true;
         }
         else
         {
           return false;
         }
    }
    else
    {
      return false;
    } 
  }
  function submit_training_details($training_name_field,$training_duration_field,
      $training_fee_field,$training_note_field)
  {
    $query="select * from hrms_training where training_name='".$training_name_field."'";
     //echo $query;
     $result=$this->db->query($query);
     if($this->db->affected_rows()==0)
     {
        $query="insert into hrms_training values ('','".$training_name_field."','".$training_duration_field."','".$training_fee_field."','".$training_note_field."')";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
           return true;
         }
         else
         {
           return false;
         }
      }
      else
      {
        return false;
      }   
  }

  function add_pay_grades($pay_grade_name,$currency_id,$min_salary,$max_salary)
  {

     $query="select * from hrms_pay_grade where pay_grade_name='".$pay_grade_name."'";
     //echo $query;
     $result=$this->db->query($query);
     if($this->db->affected_rows()==0)
     {
        $query="insert into hrms_pay_grade values ('','".$pay_grade_name."','".$currency_id."','".$min_salary."','".$max_salary."')";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
           return true;
         }
         else
         {
           return false;
         }
      }
      else
      {
        return false;
      }   
  }

  function add_workshift($workshift_name_field,$starting_time_field,$ending_time_field)
  {
    $hours_per_day=$ending_time_field-$starting_time_field;
     $query="select * from hrms_work_shift where name='".$workshift_name_field."' and starting_time='".$starting_time_field."' and ending_time='".$ending_time_field."'";
     //echo $query;
     $result=$this->db->query($query);
     if($this->db->affected_rows()==0)
     {
        $query="insert into hrms_work_shift values ('','".$workshift_name_field."','".$hours_per_day."','".$starting_time_field."','".$ending_time_field."')";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
           return true;
         }
         else
         {
           return false;
         }
      }
      else
      {
        return false;
      }   
  }

  function update_job_title($id,$job_title_field,$job_desc_field,$job_category_field)
  {

        $query="update hrms_job_title set job_title='".$job_title_field."' ,job_description='".$job_desc_field."',category='".$job_category_field."' where id='".$id."'";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
            return true;
         }
         else
         {
           return false;
         }
  }

  function update_leave_summary($id,$leave_entitle,$leave_scheduled,$leave_taken)
  {
     $leave_balance=$leave_entitle-$leave_taken;
        $query="update hrms_leave set leave_entitle='".$leave_entitle."' ,leave_scheduled='".$leave_scheduled."' ,leave_taken='".$leave_taken."' ,leave_balance='".$leave_balance."' where id='".$id."'";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {  
             $query="select * from hrms_leave where id='".$id."'" ;
              //echo $query;
                $q=$this->db->query($query);    
                if($q->num_rows() > 0) 
                {
                  foreach ($q->result() as $row) 
                  {    
                    $query="select * from hrms_leave_list where employee_id='".$row->employee_id."' and leave_type='".$row->leave_type."'";
                    //echo($query);
                    $result=$this->db->query($query);
                     if($this->db->affected_rows()>0)
                     {
                        $query="update hrms_leave_list set leave_balance='".$leave_balance."' where employee_id='".$row->employee_id."' and leave_type='".$row->leave_type."'";
                        //echo($query);
                        $result=$this->db->query($query);
                        if($this->db->affected_rows()>0)
                        {
                          return true;
                        }
                        else
                        {
                         return false;
                        }
                     }
                     else
                     {
                      return true;
                     }

                  }
                }  
         }
         else
         {
           return false;
         }
  }

  function update_leave_list($id,$date_from,$date_to,$status,$leave_list_comment)
  {
      $no_of_days=(strtotime($date_to) - strtotime($date_from)) / (60 * 60 * 24);
     $query="select * from hrms_leave_list where id='".$id."'" ;
      //echo $query;
        $q=$this->db->query($query);    
         if($q->num_rows() > 0) 
         {
           foreach ($q->result() as $row) 
           {  
              if($row->leave_balance>=$no_of_days)
              {
                if($status=='taken')
                {
                  $query="select hrms_leave.leave_scheduled ,hrms_leave.id,hrms_leave.leave_taken,hrms_leave.leave_entitle from hrms_leave_list,hrms_leave where hrms_leave_list.employee_id=hrms_leave.employee_id and hrms_leave_list.leave_type=hrms_leave.leave_type and hrms_leave_list.id='".$id."'";
                  //echo $query;
                  $q=$this->db->query($query);
                  if($q->num_rows()>0)
                  {
                    foreach($q->result() as $row)
                    {
                      $total_no_of_days=$row->leave_taken + $no_of_days;
                      $leave_balance=$row->leave_entitle-$total_no_of_days;
                      $leave_scheduled=0;
                      $query="update hrms_leave set leave_scheduled='".$leave_scheduled."', leave_taken='".$total_no_of_days."',leave_balance='".$leave_balance."' where id='".$row->id."'";
                      //echo $query;
                      $result=$this->db->query($query); 
                    }
                      $query="update hrms_leave_list set no_of_days='".$no_of_days."' ,status='".$status."' ,comment='".$leave_list_comment."' ,date_from='".$date_from."' ,date_to='".$date_to."' where id='".$id."'";
                      //echo($query);
                      $result=$this->db->query($query);
                       if($this->db->affected_rows()>0)
                       {
                          return true;
                       }
                       else
                       {
                         return false;
                       }                    
                  }
                }
                else if($status=='scheduled')
                {
                  $query="select hrms_leave.id,hrms_leave.leave_scheduled,hrms_leave.leave_entitle from hrms_leave_list,hrms_leave where hrms_leave_list.employee_id=hrms_leave.employee_id and hrms_leave_list.leave_type=hrms_leave.leave_type and hrms_leave_list.id='".$id."'";
                  //echo $query;
                  $q=$this->db->query($query);
                  if($q->num_rows()>0)
                  {
                    foreach($q->result() as $row)
                    {
                      $total_no_of_days=$row->leave_scheduled + $no_of_days;
                      if($total_no_of_days>$row->leave_entitle)
                      {
                        echo ("Employee has not this much leave in Entitled");
                      }
                      else
                      {
                      $query="update hrms_leave set leave_scheduled='".$total_no_of_days."' where id='".$row->id."'";
                      //echo $query;
                      $result=$this->db->query($query);
                      } 
                    }
                      $query="update hrms_leave_list set no_of_days='".$no_of_days."' ,status='".$status."' ,comment='".$leave_list_comment."' ,date_from='".$date_from."' ,date_to='".$date_to."' where id='".$id."'";
                      //echo($query);
                      $result=$this->db->query($query);
                       if($this->db->affected_rows()>0)
                       {
                          return true;
                       }
                       else
                       {
                         return false;
                       }                    
                  }
                }                  
                else
                {
                  $query="update hrms_leave_list set no_of_days='".$no_of_days."' ,status='".$status."' ,comment='".$leave_list_comment."' ,date_from='".$date_from."' ,date_to='".$date_to."' where id='".$id."'";
                  //echo($query);
                  $result=$this->db->query($query);
                   if($this->db->affected_rows()>0)
                   {
                      return true;
                   }
                   else
                   {
                     return false;
                   }
                 }
               }  
              else
              {
                echo ("Employee has not this much leave in balance");
              }
           }
         }
  }

  function update_skill($id,$skill_name_field,$skill_desc_field)
  {

        $query="update hrms_skill set name='".$skill_name_field."' ,description='".$skill_desc_field."' where id='".$id."'";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
            return true;
         }
         else
         {
           return false;
         }
  }

  function update_license($id,$license_name_field,$license_desc_field)
  {

        $query="update hrms_license set name='".$license_name_field."' ,description='".$license_desc_field."' where id='".$id."'";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
            return true;
         }
         else
         {
           return false;
         }
  }

  function update_languages($id,$languages_name_field)
  {

        $query="update hrms_language set name='".$languages_name_field."' where id='".$id."'";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
            return true;
         }
         else
         {
           return false;
         }
  }

  function update_education($id,$education_name_field,$education_desc_field)
  {

        $query="update hrms_education set name='".$education_name_field."' ,description='".$education_desc_field."' where id='".$id."'";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
            return true;
         }
         else
         {
           return false;
         }
  }

  function update_project($id,$project_id,$customer_id,$project_name,$desc,$project_admin,$completed)
  {

        $query="update hrms_project set customer_id='".$customer_id."' ,project_id='".$project_id."', name='".$project_name."' ,description='".$desc."' ,project_admin='".$project_admin."' ,status='".$completed."' where id='".$id."'";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
             return true;
         }
         else
         {
           return false;
         }
  }


  function update_pay_grade($id,$pay_grade_name,$min_salary_field,$max_salary_field)
  {

        $query="update hrms_pay_grade set pay_grade_name='".$pay_grade_name."' ,min_salary='".$min_salary_field."' ,max_salary='".$max_salary_field."' where id='".$id."'";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
             return true;
         }
         else
         {
           return false;
         }
  }

  function update_work_shift($id,$work_shift_name,$starting_time,$ending_time)
  {
        $hours_per_day=$ending_time-$starting_time;
        $query="update hrms_work_shift set name='".$work_shift_name."' ,hours_per_day='".$hours_per_day."' ,starting_time='".$starting_time."' ,ending_time='".$ending_time."' where id='".$id."'";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
             return true;
         }
         else
         {
           return false;
         }
  }

  function update_add_employee($id,$user_name,$user_role,$status,$work_shift)
  {
      
        $query="update hrms_user set user_name='".$user_name."' ,user_role_id='".$user_role."' ,status='".$status."' ,work_shift='".$work_shift."' where id='".$id."'";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
             return true;
         }
         else
         {
           return false;
         }
  }


  function update_added_employee($id,$employee_id,$emp_firstname,$emp_middlename,$emp_lastname)
  {
      
        $query="update hrms_employee set employee_id='".$employee_id."' ,emp_first_name='".$emp_firstname."' ,emp_middle_name='".$emp_middlename."' ,emp_last_name='".$emp_lastname."' where id='".$id."'";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
             return true;
         }
         else
         {
           return false;
         }
  }


  function add_job_title($job_title_field,$job_desc_field,$job_note_field)
  {

     $query="select * from hrms_job_title where job_title='".$job_title_field."' and job_description='".$job_desc_field."' and category='".$job_note_field."'";
     //echo $query;
     $result=$this->db->query($query);
     if($this->db->affected_rows()==0)
     {
        $query="insert into hrms_job_title values ('','".$job_title_field."','".$job_desc_field."','".$job_note_field."')";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
           return true;
         }
         else
         {
           return false;
         }
      }
      else
      {
        return false;
      }   
  }

  function add_skill($skill_field,$skill_desc)
  {

     $query="select * from hrms_skill where name='".$skill_field."'";
     //echo $query;
     $result=$this->db->query($query);
     if($this->db->affected_rows()==0)
     {
        $query="insert into hrms_skill values ('','".$skill_field."','".$skill_desc."')";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
           return true;
         }
         else
         {
           return false;
         }
      }
      else
      {
        return false;
      }   
  }

  function add_license($license_field,$license_desc)
  {

     $query="select * from hrms_license where name='".$license_field."'";
     //echo $query;
     $result=$this->db->query($query);
     if($this->db->affected_rows()==0)
     {
        $query="insert into hrms_license values ('','".$license_field."','".$license_desc."')";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
           return true;
         }
         else
         {
           return false;
         }
      }
      else
      {
        return false;
      }   
  }

  function add_languages($languages_field)
  {

     $query="select * from hrms_language where name='".$languages_field."'";
     //echo $query;
     $result=$this->db->query($query);
     if($this->db->affected_rows()==0)
     {
        $query="insert into hrms_language values ('','".$languages_field."')";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
           return true;
         }
         else
         {
           return false;
         }
      }
      else
      {
        return false;
      }   
  }

  function add_education($education_field,$education_desc)
  {

     $query="select * from hrms_education where name='".$education_field."'";
     //echo $query;
     $result=$this->db->query($query);
     if($this->db->affected_rows()==0)
     {
        $query="insert into hrms_education values ('','".$education_field."','".$education_desc."')";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
           return true;
         }
         else
         {
           return false;
         }
      }
      else
      {
        return false;
      }   
  }

  function add_leave_type($leave_id,$leave_name)
  {

     $query="select * from hrms_leavetype where leave_type_id='".$leave_id."'";
    // echo $query;
     $result=$this->db->query($query);
     if($this->db->affected_rows()==0)
     {
      $deleted=0;
        $query="insert into hrms_leavetype values ('','".$leave_id."','".$leave_name."')";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
           return true;
         }
         else
         {
           return false;
         }
      }
      else
      {
        return false;
      }   
  }


  function add_customer($addcustomername, $addcustomerid,$customer_description, $addcustomeraddress, $addcustomerphone)
  {

     $query="select * from hrms_customer where customer_id='".$addcustomerid."'";
     //echo $query;
     $result=$this->db->query($query);
     if($this->db->affected_rows()==0)
     {
      $deleted=0;
        $query="insert into hrms_customer values ('','".$addcustomerid."','".$addcustomername."','".$customer_description."','".$deleted."','".$addcustomeraddress."','".$addcustomerphone."')";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
           return true;
         }
         else
         {
           return false;
         }
      }
      else
      {
        return false;
      }   
  }


  function add_employment_status($employment_status_name)
  {

     $query="select * from hrms_employment_status where name='".$employment_status_name."'";
     //echo $query;
     $result=$this->db->query($query);
     if($this->db->affected_rows()==0)
     {
        $query="insert into hrms_employment_status values ('','".$employment_status_name."')";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
           return true;
         }
         else
         {
           return false;
         }
      }
      else
      {
        return false;
      }   
  }


  function add_job_category($job_category)
  {

     $query="select * from hrms_job_category where name='".$job_category."'";
     //echo $query;
     $result=$this->db->query($query);
     if($this->db->affected_rows()==0)
     {
        $query="insert into hrms_job_category values ('','".$job_category."')";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
           return true;
         }
         else
         {
           return false;
         }
      }
      else
      {
        return false;
      }   
  }

   function employee_add($firstname,$lastname,$employee_id)
  {

     $query="select * from hrms_employee where employee_id='".$employee_id."'";
     //echo $query;
     $result=$this->db->query($query);
     if($this->db->affected_rows()==0)
     {
        //$query="insert into hrms_employee('employee_id','emp_firstname','emp_lastname','emp_middle_name') values ('".$employee_id."','".$firstname."','".$lastname."','".$middlename."')";
        $query="insert into hrms_employee values('','".$employee_id."','No' ,'".$firstname."','','".$lastname."','','','','','','','','','','','','','','','','','','','','','','','','','','')";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
                $query1="select * from hrms_leavetype";
               //echo $query1;
                $q=$this->db->query($query1);    
                if($q->num_rows() > 0) 
                {
                  foreach ($q->result() as $row) 
                  {
                      //echo $row->leave_type_name;
                    $query2="insert into hrms_leave values('','".$employee_id."','".$row->leave_type_name."','','','','')";
                    //echo $query2;
                    $result=$this->db->query($query2);
                  }
                  return true;
                }          
         }
         else
         {
           return false;
         }
      }
      else
      {
        return false;
      }   
  } 

  function employee_add_except_image_field($firstname,$middlename,$lastname,$employee_id)
  {

        $query="select * from hrms_employee where employee_id='".$employee_id."'";
       //echo $query;
       $result=$this->db->query($query);
       if($this->db->affected_rows()==0)
       {
          //$query="insert into hrms_employee('employee_id','emp_firstname','emp_lastname','emp_middle_name') values ('".$employee_id."','".$firstname."','".$lastname."','".$middlename."')";
          $query="insert into hrms_employee values('','".$employee_id."','No' ,'".$firstname."','".$middlename."','".$lastname."','','','','','','','','','','','','','','','','','','','','','','','','','','')";
          //echo($query);
          $result=$this->db->query($query);
           if($this->db->affected_rows()>0)
           {
                  $query1="select * from hrms_leavetype";
                 //echo $query1;
                  $q=$this->db->query($query1);    
                  if($q->num_rows() > 0) 
                  {
                    foreach ($q->result() as $row) 
                    {
                        //echo $row->leave_type_name;
                      $query2="insert into hrms_leave values('','".$employee_id."','".$row->leave_type_name."','','','','')";
                      //echo $query2;
                      $result=$this->db->query($query2);
                    }
                    return true;
                  }          
           }
           else
           {
             return false;
           }
        }
        else
        {
          return false;
        }   
  }

  function add_employee_user($username,$password,$employee_id,$user_role_id,$work_shift)
  {
      $status=1;
      // $user_role_id=4;
      //$localtime = mktime(date('g')+5,date('i')+30,date('s'));
     //$mydate=date('Y-m-d g:i:s' ,$localtime);
    $localtime = mktime(date('H')+5,date('i')+30,date('s'));
      $mydate=date("Y-m-d H:i:s",$localtime);
    $query="select * from hrms_user where user_name='".$username."' and user_password='".$password."'";
    $result=$this->db->query($query);
    if($this->db->affected_rows()==0)
     {
        $query="update hrms_employee set user='Yes' where employee_id='".$employee_id."'";
         //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
           
             $query="insert into hrms_user values ('','".$user_role_id."','".$employee_id."','".$work_shift."','".$username."','".$password."','','".$status."','".$mydate."','','','')";
       //echo($query);
            $result=$this->db->query($query);
             if($this->db->affected_rows()>0)
             {
               return true;
             }
             else
             {
               return false;
             }       
         }
         else
         {
           return false;
         }
      }
      else
      {
        return false;
      }   
  }

  function delete_workshift($username)
  {
     
    $query="select * from hrms_work_shift where name='".$username."'";
    $result=$this->db->query($query);
    if($this->db->affected_rows()>0)
     {
        $query="delete from hrms_work_shift where name='".$username."'";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
           return true;
         }
         else
         {
           return false;
         }
      }
      else
      {
        return false;
      }   
  }


  function delete_pay_grade($username)
  {
     
    $query="select * from hrms_pay_grade where pay_grade_name='".$username."'";
    $result=$this->db->query($query);
    if($this->db->affected_rows()>0)
     {
        $query="delete from hrms_pay_grade where pay_grade_name='".$username."'";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
           return true;
         }
         else
         {
           return false;
         }
      }
      else
      {
        return false;
      }   
  }


  function update_leave_type($id,$leave_name,$leave_id)
  {
     
    $query="select * from hrms_leavetype where id='".$id."'";
    $result=$this->db->query($query);
    if($this->db->affected_rows()>0)
     {
        $query="update hrms_leavetype set leave_type_id='".$leave_id."' ,leave_type_name='".$leave_name."' where id='".$id."'";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
           return true;
         }
         else
         {
           return false;
         }
      }
      else
      {
        return false;
      }   
  }

  function update_customer($id,$customer_id,$customer_name,$desc,$customer_address,$customer_phone)
  {
     
    $query="select * from hrms_customer where id='".$id."'";
    $result=$this->db->query($query);
    if($this->db->affected_rows()>0)
     {
        $query="update hrms_customer set customer_id='".$customer_id."' ,name='".$customer_name."' ,description='".$desc."',address='".$customer_address."',phone='".$customer_phone."' where id='".$id."'";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
           return true;
         }
         else
         {
           return false;
         }
      }
      else
      {
        return false;
      }   
  }



  function update_job_category($id,$job_category_name)
  {
     
    $query="select * from hrms_job_category where id='".$id."'";
    $result=$this->db->query($query);
    if($this->db->affected_rows()>0)
     {
        $query="update hrms_job_category set name='".$job_category_name."' where id='".$id."'";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
           return true;
         }
         else
         {
           return false;
         }
      }
      else
      {
        return false;
      }   
  }

  function update_added_employee_for_job($emp_id,$job_title,$job_specification,$joined_date,$sub_unit,$job_start_date,$job_category,$employeement_status,$location,$contract,$job_end_date)
  {
     
    $query="select * from hrms_emp_job_details where employee_id='".$emp_id."'";
    $result=$this->db->query($query);
    if($this->db->affected_rows()>0)
     {
        $query="update hrms_emp_job_details set emp_job_title='".$job_title."',emp_job_specification='".$job_specification."',emp_employement_status='".$employeement_status."' ,emp_job_category='".$job_category."' ,emp_joined_date='".$joined_date."' ,emp_sub_unit='".$sub_unit."' ,emp_location='".$location."'  ,emp_job_start_date='".$job_start_date."' ,emp_job_end_date='".$job_end_date."' ,emp_contract_details='".$contract."' where employee_id='".$emp_id."'";
       // echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
           return true;
         }
         else
         {
           return false;
         }
      }
      else
      {
        $query="insert into hrms_emp_job_details values('','','".$emp_id."','".$job_title."','".$job_specification."','".$employeement_status."','".$job_category."','".$joined_date."','".$sub_unit."','".$location."','".$job_start_date."','".$job_end_date."','".$contract."' )";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
           return true;
         }
         else
         {
           return false;
         }
      }   
  }

  function update_job_candidate($id,$comment_field)
  {
     
    $query="select * from hrms_job_candidate where id='".$id."'";
    $result=$this->db->query($query);
    if($this->db->affected_rows()>0)
     {
        $query="update hrms_job_candidate set comment='".$comment_field."' where id='".$id."'";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
           return true;
         }
         else
         {
           return false;
         }
      }
      else
      {
        return false;
      }   
  }

   function update_employment_status($id,$job_category_name)
  {
     
    $query="select * from hrms_employment_status where id='".$id."'";
    $result=$this->db->query($query);
    if($this->db->affected_rows()>0)
     {
        $query="update hrms_employment_status set name='".$job_category_name."' where id='".$id."'";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
           return true;
         }
         else
         {
           return false;
         }
      }
      else
      {
        return false;
      }   
  }
   

  function delete_employee($username)
  {
     
    $query="select * from hrms_user where user_name='".$username."'";
    $result=$this->db->query($query);
    if($this->db->affected_rows()>0)
     {
        $query="delete from hrms_user where user_name='".$username."'";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
           return true;
         }
         else
         {
           return false;
         }
      }
      else
      {
        return false;
      }   
  }

  function add_company_location($add_location_name,$address1,$address2,$city,$state,$pincode,$country,$phone,$fax,$no_of_employee)
  {
     
  
    $query="insert into organisation_location values('','".$add_location_name."','".$address1."','".$address2."','".$city."','".$state."','".$pincode."','".$country."','".$phone."','".$fax."','".$no_of_employee."')";
    $result=$this->db->query($query);
     if($this->db->affected_rows()>0)
     {
        return true;
     }
     else
     {
       return false;
     }
     
  }

  function update_company_location($id,$add_location_name,$no_of_employee,$phone,$fax,$address1,$address2,$city,$state,$pincode,$country)
  {
     
  //echo $phone;
    $query="update organisation_location set name='".$add_location_name."', address1='".$address1."', address2='".$address2."', city='".$city."', state='".$state."', pincode='".$pincode."',country='".$country."',phone='".$phone."', fax='".$fax."', no_of_employee='".$no_of_employee."' where id='".$id."'";
    //echo($query);
    $result=$this->db->query($query);
     if($this->db->affected_rows()>0)
     {
        return true;
     }
     else
     {
       return false;
     }
     
  }

  function update_company_info($organisation_name,$tax_id,$no_of_employee,$registration_no,$phone,$fax,$email,$address1,$address2,$city,$state,$zipcode,$country,$note)
  {
     
  
    $query="update organisation set organisation_name='".$organisation_name."', tax_id='".$tax_id."', no_of_employee='".$no_of_employee."', registration_no='".$registration_no."',phone='".$phone."' ,fax='".$fax."',email='".$email."',address1='".$address1."',address2='".$address2."',city='".$city."', state='".$state."', zipcode='".$zipcode."',country='".$country."',note='".$note."' ";
    //echo($query);
    $result=$this->db->query($query);
     if($this->db->affected_rows()>0)
     {
        return true;
     }
     else
     {
       return false;
     }
     
  }

  function update_user_or_not($employee_id,$tablename2)
  {
     
    $query="select * from `".$tablename2."` where employee_id='".$employee_id."'";
 //echo "$query";
    $result=$this->db->query($query);
    if($this->db->affected_rows()>0)
     {
        $query="update `".$tablename2."` set user='No' where employee_id='".$employee_id."'";
        //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
            return true;
         }
         else
         {
           return false;
         }
      }
      else
      {
        return false;
      }   
  }

  function assign_leave($employee_id,$leave_type,$datepicker,$to_datepicker,$leave_comment)
  {
     date_default_timezone_set('UTC');
  $apply_date=date("Y/m/d");
  // $formated_date=explode("/", $date);
  //   $apply_date = $formated_date[2]."-".$formated_date[0]."-".$formated_date[1];
    $leave_scheduled=(strtotime($to_datepicker) - strtotime($datepicker)) / (60 * 60 * 24);
    $query="select * from hrms_leave where employee_id='".$employee_id."' and leave_type='".$leave_type."'";
 //echo "$query";
    $result=$this->db->query($query);
    if($this->db->affected_rows()>0)
     {
       $query="update hrms_leave set leave_scheduled='".$leave_scheduled."' where employee_id='".$employee_id."' and leave_type='".$leave_type."'";
      //echo($query);
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
            $query="insert into hrms_leave_list values ('','".$employee_id."','".$apply_date."','".$leave_type."','','".$leave_scheduled."','".$datepicker."','".$to_datepicker."','scheduled','".$leave_comment."','')";
            //echo($query);
            $result=$this->db->query($query);
             if($this->db->affected_rows()>0)
             {
                return true;
             }
             else
             {
               return false;
             }
         }
         else
         {
           return false;
         }
      }
      else
      {
        return false;
       }   
  }

  function getAll($tablename)
  {
    $q = $this->db->get($tablename);
    
    if($q->num_rows() > 0) {
      foreach ($q->result() as $row) {
          $data[] = $row;
      }
    return $data;
    }
  }

  function getAll_filter_data($tablename,$id)
  {
   $query="select * from ".$tablename." where id='".$id."'";
  //echo $query;
    $q=$this->db->query($query);    
    if($q->num_rows() > 0) {
      foreach ($q->result() as $row) {
          $data[] = $row;
      }
    return $data;
    }
  } 

  function getAll_Distinct_city($tablename)
  {
   $query="select distinct city_code from ".$tablename."";
  //echo $query;
    $q=$this->db->query($query);    
    if($q->num_rows() > 0) {
      foreach ($q->result() as $row) {
          $data[] = $row;
      }
    return $data;
    }
  }

  function getAll_filter_data_for_employee_id($tablename,$employee_id)
  {
   $query="select * from ".$tablename." where employee_id='".$employee_id."'";
  //echo $query;
    $q=$this->db->query($query);    
    if($q->num_rows() > 0) {
      foreach ($q->result() as $row) {
          $data[] = $row;
      }
    return $data;
    }
  }

  function getEmployee_id_for_Employee_name($tablename,$employee_name)
  {
   $query="select * from ".$tablename." where concat(emp_first_name,' ',emp_last_name)='".$employee_name."'";
  //echo $query."<br>";
    $q=$this->db->query($query);    
    if($q->num_rows() > 0) {
      foreach ($q->result() as $row) {
          $data[] = $row;
      }
    return $data;
    }
    else
    {
        $query="select * from ".$tablename." where concat(emp_first_name,' ',emp_middle_name,' ',emp_last_name)='".$employee_name."'";
        //echo $query;
          $q=$this->db->query($query);    
          if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
          return $data;
          }
    }
  }

  function getAll_data_fromtwo_tables($tablename,$tablename2)
  {
   $query="select hrms_employee.emp_first_name,hrms_employee.emp_middle_name,hrms_employee.emp_last_name,hrms_leave.id,hrms_leave.leave_type,hrms_leave.leave_entitle,hrms_leave.leave_scheduled,hrms_leave.leave_taken,hrms_leave.leave_balance from ".$tablename.",".$tablename2." where ".$tablename.".employee_id=".$tablename2.".employee_id";
  //echo $query;
    $q=$this->db->query($query);    
    if($q->num_rows() > 0) {
      foreach ($q->result() as $row) {
          $data[] = $row;
      }
    return $data;
    }
  }

  function getAllDetail_for_leave_calender($tablename,$tablename2)
  {
   $query="select hrms_employee.emp_first_name,hrms_employee.emp_middle_name,hrms_employee.emp_last_name,hrms_leave.id,hrms_leave.leave_type,hrms_leave.leave_entitle,hrms_leave.leave_scheduled,hrms_leave.leave_taken,hrms_leave.leave_balance from ".$tablename.",".$tablename2." where ".$tablename.".employee_id=".$tablename2.".employee_id";
  //echo $query;
    $q=$this->db->query($query);    
    if($q->num_rows() > 0) {
      foreach ($q->result() as $row) {
          $data[] = $row;
      }
    return $data;
    }
  }

  function getAllDetail_for_leave_list($tablename,$tablename2)
  {
   $query="select hrms_employee.emp_first_name,hrms_employee.emp_middle_name,hrms_employee.emp_last_name,hrms_leave_list.apply_date,hrms_leave_list.leave_type,hrms_leave_list.leave_balance,hrms_leave_list.no_of_days,hrms_leave_list.date_from,hrms_leave_list.date_to,hrms_leave_list.status,hrms_leave_list.comment,hrms_leave_list.id from ".$tablename.",".$tablename2." where ".$tablename.".employee_id=".$tablename2.".employee_id";
  //echo $query;
    $q=$this->db->query($query);    
    if($q->num_rows() > 0) {
      foreach ($q->result() as $row) {
          $data[] = $row;
      }
    return $data;
    }
  }

  function getAll_filter_data_fromtwo_tables($tablename,$tablename2,$employee_id)
  {
   $query="select hrms_employee.emp_first_name,hrms_employee.emp_middle_name,hrms_employee.emp_last_name,hrms_leave.id,hrms_leave.leave_type,hrms_leave.leave_entitle,hrms_leave.leave_scheduled,hrms_leave.leave_taken,hrms_leave.leave_balance from ".$tablename.",".$tablename2." where ".$tablename.".employee_id='".$employee_id."' and ".$tablename.".employee_id=".$tablename2.".employee_id";
  //echo $query;
    $q=$this->db->query($query);    
    if($q->num_rows() > 0) {
      foreach ($q->result() as $row) {
          $data[] = $row;
      }
    return $data;
    }
  }

  function getAll_filter_data_by_name_fromtwo_tables($tablename,$tablename2,$employee_name)
  {
   $query="select hrms_employee.emp_first_name,hrms_employee.emp_middle_name,hrms_employee.emp_last_name,hrms_leave.id,hrms_leave.leave_type,hrms_leave.leave_entitle,hrms_leave.leave_scheduled,hrms_leave.leave_taken,hrms_leave.leave_balance from ".$tablename.",".$tablename2." where ".$tablename2.".emp_first_name='".$employee_name."' and ".$tablename.".employee_id=".$tablename2.".employee_id";
  //echo $query;
    $q=$this->db->query($query);    
    if($q->num_rows() > 0) {
      foreach ($q->result() as $row) {
          $data[] = $row;
      }
    return $data;
    }
  }



  function find_data($id,$tablename)
  {

      $query = $this->db->query("select * from ".$tablename." where id='".$id."'");
       //return $query->result($row->employee_id);
      foreach ($query->result() as $row)
      {
         return $row->employee_id;
      }
  }

  function get_not_added_data()
  {
  $query="select * from hrms_employee where user='No'";
  //echo $query;
    $q=$this->db->query($query);
 
    if($q->num_rows() > 0) {
      foreach ($q->result() as $row) {
          $data[] = $row;
      }
    return $data;
    }
  }

  function punchin($username, $password)
  {  
    $sql="SELECT * FROM hrms_user WHERE username='".$username."' AND password='".$password."'";
    $query=$this->db->query($sql);
    $row=$this->db->affected_rows();
    if($row == 1)
    {
      foreach($query->result() as $id)
      {
        $emp_id = $id->emp_id;
      }
      // date
      $date=date("Y/m/d");
      // time
      $today = mktime(date('g')+5,date('i')+30,date('s'));
      $time=date("g:i A",$today);

      // query for check already punch in or not
      $sql="SELECT * FROM daily_in_out WHERE emp_id='".$emp_id."' AND date='".$date."'";
      $query=$this->db->query($sql);
      $row=$this->db->affected_rows();
      if ($row == 0)
      {
        // database query to insert
      $sql="INSERT INTO daily_in_out values('','$emp_id','$time','','$date')";
      $query=$this->db->query($sql);
      $msg=1;
      return $msg;
      }
      else
      {
        return false;
      }
    }
    else
    {
      $msg=3;
      return $msg;
    }
    //$this->insert_user($username, $password,$email);
  }

  function punchout($username, $password)
  {  
    $sql="SELECT * FROM user_sign WHERE user_name='".$username."' AND password='".$password."'";
    $query=$this->db->query($sql);
    $row=$this->db->affected_rows();
    if($row == 1)
    {
      foreach($query->result() as $id)
      {
        $emp_id = $id->emp_id;
      }
      // date
      $date=date("Y/m/d");
      // time
      $today = mktime(date('g')+5,date('i')+30,date('s'));
      $time=date("g:i A",$today);


      //query for check not punch in today
      $sql="SELECT * FROM daily_in_out WHERE emp_id='".$emp_id."' AND date='".$date."' AND in_time NOT LIKE '00:00:00' AND out_time NOT LIKE '00:00:00'";
      $query=$this->db->query($sql);
      $row=$this->db->affected_rows();
      if ($row == 1)
      {
        $msg=2;
        return $msg;
      }
      else
      {
        // query for check already punch in or not
        $sql="SELECT * FROM daily_in_out WHERE emp_id='".$emp_id."' AND date='".$date."' AND in_time NOT LIKE '00:00:00' AND out_time LIKE '00:00:00'";
        $query=$this->db->query($sql);
        $row=$this->db->affected_rows();
        if ($row == 1)
        {
          // database query to insert
          $sql="UPDATE daily_in_out SET out_time='$time' WHERE date ='".$date."' AND emp_id='".$emp_id."';";
          $query=$this->db->query($sql);
          return $row;
        }
        else
        {
          return false;
        }
      }  
    }
    else
    {
      $msg=3;
      return $msg;
    }
   }


  function edit_job_title()
  {
    $id=$this->uri->segment(3);
    $sql="select * from hrms_job_title where id='".$id."'";
    //echo("kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk".$sql);
    $query = $this->db->query($sql);
    $row = $query->row_array();
    if($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
      return $data;
      }
  }


   function delete_data($id,$tablename)
   {
      $query="delete from ".$tablename." where id='".$id."'";
  //echo $query;
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
           return true;
         }
         else
         {
           return false;
         }

   }

   function delete_data_for_leave_summary($employee_id,$tablename)
   {
      $query="delete from ".$tablename." where employee_id='".$employee_id."'";
  //echo $query;
        $result=$this->db->query($query);
         if($this->db->affected_rows()>0)
         {
           return true;
         }
         else
         {
           return false;
         }

   }
function backup($hostname,$username,$password,$database)
{
// if mysqldump is on the system path you do not need to specify the full path
// simply use "mysqldump --add-drop-table ..." in this case
$dumpfname = $database . "_" . date("Y-m-d_H-i-s").".sql";
$command = "C:\\wamp\\bin\\mysql\\mysql5.5.24\\bin\\mysqldump --add-drop-table --host=$hostname --user=$username ";
if ($password) 
        $command.= "--password=". $password ." "; 
$command.= $database;
$command.= " > " . $dumpfname;
system($command);
 
// zip the dump file
// $zipfname = $database . "_" . date("Y-m-d_H-i-s").".zip";
// $zip = new ZipArchive();
// if($zip->open($zipfname,ZIPARCHIVE::CREATE)) 
// {
//    $zip->addFile($dumpfname,$dumpfname);
//    $zip->close();
// }
 
// read zip file and send it to standard output
// if (file_exists($zipfname)) {
//     header('Content-Description: File Transfer');
//     header('Content-Type: application/octet-stream');
//     header('Content-Disposition: attachment; filename='.basename($zipfname));
//     flush();
//     readfile($zipfname);
//     exit;
// }
$dump = ob_get_contents(); 
ob_end_clean();
 
// send dump file to the output
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.basename($dbname . "_" . date("Y-m-d_H-i-s").".sql"));
flush();
//echo $dump;
exit();
}   

}
?>