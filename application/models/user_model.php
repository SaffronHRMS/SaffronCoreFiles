<?php
Class User_model extends CI_Model
{

  function getall_from_table($table_name)
  {
    return $this->db->get($table_name)->result();
  }

	function getall($emp_id)
	{
		$sql="SELECT * FROM hrms_employee WHERE employee_id='".$emp_id."'";
  		$query=$this->db->query($sql);
      $row = $this->db->affected_rows();
      if($row == 1)
      {
  		return $query; 
      }
      else
      {
        return FALSE;
      }
	}

  function emp_update($emp_id,$fname,$mname,$lname,$gender,$dob,$marital,$clist,$nick_name,$dl_num,$military_service,$pan_number,$dl_exp_date)
  {
    	$sql="UPDATE hrms_employee SET emp_first_name='$fname',emp_middle_name='$mname',
      emp_last_name='$lname',emp_gender='$gender',emp_birthday='$dob',emp_marital_status='$marital',
      coun_code='$clist',emp_nick_name='$nick_name',emp_dri_lice_num='$dl_num',
      emp_military_service='$military_service',emp_pancard_num='$pan_number',emp_dri_lice_exp_date='$dl_exp_date' WHERE employee_id='".$emp_id."';";
			$query=$this->db->query($sql);

  			$row=$this->db->affected_rows();

        	if($row == 1)
        	{
          		return 1;
        	}
        	else
        	{
          		return false;
        	}
    }

    function contact_update_mod($emp_id,$street1,$street2,$city,$state,$postal,$hometele,$mobile,$wrktele,$wmail,$omail)
    {
      $sql = "UPDATE hrms_employee SET emp_street1='$street1',emp_street2='$street2',city_code='$city',
      provin_code='$state',emp_zipcode='$postal',emp_hm_telephone='$hometele',emp_mobile='$mobile',
      emp_work_telephone='$wrktele',emp_work_email='$wmail',emp_other_email='$omail' WHERE employee_id='".$emp_id."'; ";

      $query = $this->db->query($sql);

      $row = $this->db->affected_rows();
      if($row == 1)
      {
        return TRUE;
      }
      else
      {
        return false;
      }
    }

    function emrg_contact_insert_mod($emp_id,$emp_num,$emrg_name,$emrg_relationship,$emrg_mob_num,
      $emrg_home_num,$emrg_work_num)
    {
      $sql = "INSERT INTO hrms_emp_emergency_contact values('','$emp_id','$emp_num','$emrg_name',
        '$emrg_relationship','$emrg_mob_num','$emrg_home_num','$emrg_work_num')";
      $query = $this->db->query($sql);
      $row = $this->db->affected_rows();
      if($row == 1)
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }
//  ------------------------------------------------------ Employee Emergency Contact  Model------------------- /
    function getall_emergency_contact_mod($emp_id)
    {
      $sql = "SELECT * FROM hrms_emp_emergency_contact WHERE employee_id = '".$emp_id."';";

      $query = $this->db->query($sql);
      $row = $this->db->affected_rows();
      if($row != 0)
      {
        foreach ($query->result() as $row) 
        {
          $data[] = $row;
        }
        return $data;
      }
      else
      {
        return FALSE;
      }
    }
//  ------------------------------------------------------ Employee Emergency Contact Delete Model------------------- /
    function emp_emrg_del_mod($emp_id,$emp_exp_row_id)
    {
      $sql = "DELETE FROM hrms_emp_emergency_contact WHERE employee_id ='".$emp_id."' AND id='".$emp_exp_row_id."'";
      $query = $this->db->query($sql);
      $row = $this->db->affected_rows();
      if($row == 1)
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }
//  ------------------------------------------------------ Employee Dependent Delete Model------------------- /
    function emp_dependent_del_mod($emp_id,$emp_exp_row_id)
    {
      $sql = "DELETE FROM hrms_emp_dependents WHERE employee_id ='".$emp_id."' AND id='".$emp_exp_row_id."'";
      $query = $this->db->query($sql);
      $row = $this->db->affected_rows();
      if($row == 1)
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }

//  ------------------------------------------------------ Employee Dependent Model------------------- /
    function dependent_insert_mod($emp_id,$emp_num,$dependent_name,
      $dependent_relationship,$dependent_dob)
    {
      $sql = "INSERT INTO hrms_emp_dependents values('','$emp_num','$emp_id','$dependent_name',
        '$dependent_relationship','$dependent_dob');";
      
      $query = $this->db->query($sql);
      $row = $this->db->affected_rows();
      if($row == 1)
      {
        return TRUE;
      }
      else
      {
        return false;
      }
    }

    function getall_dependent_mod($emp_id)
    {
      $sql = "SELECT * FROM hrms_emp_dependents WHERE employee_id = '".$emp_id."';";

      $query = $this->db->query($sql);
      $row = $this->db->affected_rows();
      if($row != 0)
      {
        foreach ($query->result() as $row) 
        {
          $data[] = $row;
        }
        return $data;
      }
      else
      {
        return FALSE;
      }
    }
// ----------------------------------------------------------- Employee Immigration model ------------- /
    function immigration_insert_mod($emp_num,$emp_id,$document_name,$im_numbr,$im_issue_date,$im_expiry_date,
        $im_eligible,$im_issuedby,$im_review_date,$im_comment)
    {
      $sql = " INSERT INTO hrms_emp_passport values('','$emp_num','$emp_id','$document_name','$im_numbr','$im_issue_date',
        '$im_expiry_date','$im_eligible','$im_issuedby','$im_review_date','$im_comment')";
      
      $query=$this->db->query($sql);
      $row = $this->db->affected_rows();
      if($row == 1)
      {
        return TRUE;
      }
      else
      {
        return false;
      }
    }

    function getall_immigration_mod($emp_id)
    {
      $sql="SELECT * FROM hrms_emp_passport WHERE employee_id='".$emp_id."';";
      $query=$this->db->query($sql);
      $row = $this->db->affected_rows();
      if($row == 1)
      {
        return $query;
      }
      else
      {
        return FALSE;
      }
    }

    function immigration_update_mod($emp_id,$document_name,$im_numbr,$im_issue_date,$im_expiry_date,
        $im_eligible,$im_issuedby,$im_review_date,$im_comment)
    {
      $sql = "UPDATE hrms_emp_passport SET doc_type='$document_name',passport_num='$im_numbr',issued_date='$im_issue_date',
      expiry_date='$im_expiry_date',eligible_status='$im_eligible',issued_country='$im_issuedby',review_date='$im_review_date',
      comments='$im_comment' WHERE employee_id='".$emp_id."';";
      $query=$this->db->query($sql);
      $row=$this->db->affected_rows();
      if($row == 1)
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }


//////testing
    function apply_leave_mod($emp_id,$apply_date,$leave_type,$date_from,$date_to)
    {
        $no_of_days=(strtotime($date_to) - strtotime($date_from)) / (60 * 60 * 24);
        if(strtotime($date_to)<strtotime($date_from))
        {
          echo "Date to must be greater than Date from";
        }
        else
        {
                  $query="select * from hrms_leave where employee_id='".$emp_id."' and leave_type='".$leave_type."' ";
                  //echo $query;
                    $q=$this->db->query($query);
                    if($q->num_rows()>0)
                    {
                      foreach($q->result() as $row)
                      {
                        $query="insert into hrms_leave_list values ('','".$emp_id."','".$apply_date."','".$leave_type."','".$row->leave_balance."','".$no_of_days."','".$date_from."','".$date_to."','pending','','')";
                         // echo $query;
                        $result=$this->db->query($query);
                       
                      }
                            return true;
                      
                    }
        }      
   }
    
//  ------------------------------------------------------ Employee  Work Experience Model ------------------- /
    function getall_emp_work_experience_mod($emp_id)
    {
      $sql = " SELECT * FROM hrms_emp_work_experience WHERE employee_id = '".$emp_id."';";
      $query = $this->db->query($sql);
      $row = $this->db->affected_rows();
      if($row != 0)
      {
        foreach ($query->result() as $row) 
        {
          $data[] = $row;
        }
        return $data;
      }
      else
      {
        return FALSE;
      }
    }
    

    function work_exp_insert_mod($emp_id,$work_exp_company_name,$work_exp_job_title,$work_exp_from_date,$work_exp_to_date,$work_exp_comment)
    {
      $emp_num = 3;
      $sql = " INSERT INTO hrms_emp_work_experience values('','$emp_num','$emp_id','$work_exp_company_name',
        '$work_exp_job_title','$work_exp_from_date','$work_exp_to_date','$work_exp_comment');";
      
      $query = $this->db->query($sql);
      $row = $this->db->affected_rows();
      if($row == 1)
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }

    function work_exp_del_mod($emp_id,$emp_exp_row_id)
    {
      $sql = "DELETE FROM hrms_emp_work_experience WHERE employee_id ='".$emp_id."' AND id='".$emp_exp_row_id."'";
      $query = $this->db->query($sql);
      $row = $this->db->affected_rows();
      if($row == 1)
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }

  
    function getall_emp_education_mod($emp_id)
    {
      $sql = "SELECT * FROM hrms_emp_education WHERE employee_id = '".$emp_id."';";

      $query = $this->db->query($sql);
      $row = $this->db->affected_rows();
      if($row != 0)
      {
        foreach ($query->result() as $row) 
        {
          $data[] = $row;
        }
        return $data;
      }
      else
      {
        return FALSE;
      }
    }

    function edu_del_mod($emp_id,$emp_edu_row_id)
    {
      $sql = "DELETE FROM hrms_emp_education WHERE employee_id ='".$emp_id."' AND id='".$emp_edu_row_id."'";
      $query = $this->db->query($sql);
      $row = $this->db->affected_rows();
      if($row == 1)
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }

    function lang_del_mod($emp_id,$emp_lang_row_id)
    {
      $sql = "DELETE FROM hrms_emp_languages WHERE employee_id ='".$emp_id."' AND id='".$emp_lang_row_id."'";
      $query = $this->db->query($sql);
      $row = $this->db->affected_rows();
      if($row == 1)
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }

    function skill_del_mod($emp_id,$emp_skill_row_id)
    {
      $sql = "DELETE FROM hrms_emp_skills WHERE employee_id ='".$emp_id."' AND id='".$emp_skill_row_id."'";
      $query = $this->db->query($sql);
      $row = $this->db->affected_rows();
      if($row == 1)
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }

    function getall_emp_skills_mod($emp_id)
    {
      $sql = "SELECT * FROM hrms_emp_skills WHERE employee_id = '".$emp_id."';";

      $query = $this->db->query($sql);
      $row = $this->db->affected_rows();
      if($row > 0)
      {
        foreach ($query->result() as $row) 
        {
          $data[] = $row;
        }
        return $data;
      }
      else
      {
        return FALSE;
      }
    }

    function getall_emp_languages_mod($emp_id)
    {
      $sql = "SELECT * FROM hrms_emp_languages WHERE employee_id = '".$emp_id."';";

      $query = $this->db->query($sql);
      $row = $this->db->affected_rows();
      if($row != 0)
      {
        foreach ($query->result() as $row) 
        {
          $data[] = $row;
        }
        return $data;
      }
      else
      {
        return FALSE;
      }
    }


    function education_insert_mod($emp_id,$emp_num,$edu_level,$edu_university,
        $edu_year,$edu_score,$edu_specilization)
    {
      $sql = "INSERT INTO hrms_emp_education values('','$emp_num','$emp_id','$edu_level','$edu_university',
        $edu_year,'$edu_score','$edu_specilization')";

      $query = $this->db->query($sql);
      $row = $this->db->affected_rows();
      if($row == 1)
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }

    function skill_insert_mod($emp_id,$emp_num,$skill,$experience,$skill_description)
    {
        $sql = " INSERT INTO hrms_emp_skills values('','$emp_num','$emp_id','$skill','$experience','$skill_description') ";
        $query = $this->db->query($sql);
        $row = $this->db->affected_rows();
        if($row == 1)
        {
          return TRUE;
        }
        else
        {
          return FALSE;
        }
    }
    
    function languages_insert_mod($emp_id,$emp_num,$language,$read,$write,$speak)
    {
      $sql = "INSERT INTO hrms_emp_languages values ('','$emp_num','$emp_id','$language','$read','$write','$speak') ";
      $query = $this->db->query($sql);
      $row = $this->db->affected_rows();
      if($row == 1)
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }

    function image_insert_mod($emp_id,$emp_num,$hi)
    {
/*
      $sql = "SELECT * FROM hrms_emp_image WHERE employee_id = '".$emp_id."'";
      $query = $this->db->query($sql);
      $row = $this->db->affected_rows();
      if($row == 0)
      { */
            $sql = "INSERT INTO hrms_emp_image values('','$emp_num','$emp_id','$hi')";
            $query = $this->db->query($sql);
            $row = $this->db->affected_rows();
        if($row == 1)
        {
          return TRUE;
        }
        else
        {
          return FALSE;
        }
 /*     }
      else
      {
        return FALSE;
      } */
    }

    function  getall_employee_image($emp_id)
    {
      $sql = "SELECT * FROM hrms_emp_image WHERE employee_id = '".$emp_id."' ORDER BY id DESC
 LIMIT 1";
      $query = $this->db->query($sql);
      $row = $this->db->affected_rows();
      if($row != 0)
      {
        foreach ($query->result() as $row) 
        {
          $data[] = $row;
        }
        return $data;
      }
      else
      {
        return FALSE;
      }
    }

    function emp_job_details_mod($emp_id)
    {
      $sql = "SELECT ";

    }

    function getall_leave_type_mod()
    {
      $sql = "SELECT * FROM hrms_leavetype";
      $query = $this->db->query($sql);
      $row = $this->db->affected_rows();
      if($row != 0)
      {
        foreach($query->result() as $row)
        {
          $data[] = $row;
        }
        return $data;
      }
      else
      {
        return FALSE;
      }
    }

     function getall_leave_list($emp_id)
    {
      $sql = "SELECT * FROM hrms_leave WHERE employee_id = '".$emp_id."'";
      $query = $this->db->query($sql);
      $row = $this->db->affected_rows();
      if($row != 0)
      {
        foreach($query->result() as $row)
        {
          $data[] = $row;
        }
        return $data;
      }
      else
      {
        return FALSE;
      }      
    }

      function change_password($old_password,$new_password)
  {
    $query="update hrms_user set user_password='".$new_password."' where user_password='".$old_password."'";
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
 
    function getall_emp_report_to_mod($emp_id)
    {
      $sql = "SELECT emp_supervisor_name FROM hrms_employee WHERE employee_id='".$emp_id."'";
      $query = $this->db->query($sql);
      $row = $this->db->affected_rows();
      if($row != 0)
      {
        foreach($query->result() as $row)
        {
          $data[] = $row;
        }
        return $data;
      }
      else
      {
        return FALSE;
      } 
    }

    function getall_employee_job_details($emp_id)
    {
      $sql = "SELECT * FROM hrms_emp_job_details WHERE employee_id='".$emp_id."'";
      $query = $this->db->query($sql);
      $row = $this->db->affected_rows();
      if($row != 0)
      {
        foreach($query->result() as $row)
        {
          $data[] = $row;
        }
        return $data;
      }
      else
      {
        return FALSE;
      } 
    }

        function getall_user_attendance($emp_id)
    {
      $sql = "SELECT * FROM hrms_attendance_record WHERE employee_id='".$emp_id."'";
      $query = $this->db->query($sql);
      $row = $this->db->affected_rows();
      if($row != 0)
      {
        foreach($query->result() as $row)
        {
          $data[] = $row;
        }
        return $data;
      }
      else
      {
        return FALSE;
      }      
    }

    function get_user_attendance_for_date($emp_id,$date)
    {
      $sql = "SELECT * FROM hrms_attendance_record WHERE employee_id='".$emp_id."' AND punch_date='".$date."' ";
      $query = $this->db->query($sql);
      $row = $this->db->affected_rows();
      if($row != 0)
      {
        foreach($query->result() as $row)
        {
          $data[] = $row;
        }
        return $data;
      }
      else
      {
        return FALSE;
      }      
    }


}
?>