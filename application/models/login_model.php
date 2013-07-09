<?php
Class Login_model extends CI_Model
{
 function login($username, $password)
 {  
  $sql="SELECT * FROM hrms_user WHERE user_name='".$username."' AND user_password='".$password."'";
  $query=$this->db->query($sql);
  $row=$this->db->affected_rows();
        if($row == 1)
        {
          return $query;
        }
        else
        {
          return false;
        }
        //$this->insert_user($username, $password,$email);
  }


function punchin($username, $password)
  {  
 $query="SELECT * FROM hrms_user WHERE user_name='".$username."' AND user_password='".$password."'";
    //$query=$this->db->query($sql);
    //$row=$this->db->affected_rows();
    $result=$this->db->query($query);
      $row = $result->row();
    if($row)
    {
          //echo "User Authenticated";
          $emp_num = $row->id;
          $emp_id = $row->employee_id;
          $query="SELECT * FROM hrms_work_shift WHERE name='".$row->work_shift."'";
           //echo $query;
            $result=$this->db->query($query);
            $row = $result->row();
            if($row)
             {
              $punch_time=$row->starting_time;
              date_default_timezone_set('UTC');
              $today = mktime(date('H')+5,date('i')+30,date('s'));
               $time=date("H:i:s",$today);
              //echo date('Y-m-d H:i:s' ,$today);
              $date=date("Y/m/d");
             //$today = mktime(date('H')+12,date('i')-30,date('s'));
              //$time=date("H:i:s",$today);
              $server_date_time= date('Y-m-d H:i:s');

              $sql="SELECT * FROM hrms_attendance_record WHERE employee_id='".$emp_id."' AND punch_out_user_time='00:00:00'";
              $query=$this->db->query($sql);
              $row=$this->db->affected_rows();
              if ($row == 0)
                 {
                   $punch_status = "in";
                  // database query to insert
                  $sql="INSERT INTO hrms_attendance_record values('','$emp_num','$emp_id','$date','$punch_time','$server_date_time','$time','','','$punch_status')";
                  $query=$this->db->query($sql);
                  $msg=1;
                  return $msg;
                 }


             }
     }
    else
    {
      $msg=3;
      return $msg;
    }
  }

  function punchin_from_profile($employee_id)
  {
$query="SELECT * FROM hrms_user WHERE employee_id='".$employee_id."' ";
    $result=$this->db->query($query);
      $row = $result->row();
    if($row)
    {
          //echo "User Authenticated";
          $emp_num = $row->id;
          $emp_id = $row->employee_id;
          $query="SELECT * FROM hrms_work_shift WHERE name='".$row->work_shift."'";
           //echo $query;
            $result=$this->db->query($query);
            $row = $result->row();
            if($row)
             {
              $punch_time=$row->starting_time;
              date_default_timezone_set('UTC');
              $today = mktime(date('H')+5,date('i')+30,date('s'));
               $time=date("H:i:s",$today);
              $date=date("Y/m/d");
              $server_date_time= date('Y-m-d H:i:s');

              $sql="SELECT * FROM hrms_attendance_record WHERE employee_id='".$emp_id."' AND punch_out_user_time='00:00:00'";
              $query=$this->db->query($sql);
              $row=$this->db->affected_rows();
              if ($row == 0)
                 { 
                  // echo "testing";
                   $punch_status = "in";
                  // database query to insert
                  $sql="INSERT INTO hrms_attendance_record values('','$emp_num','$emp_id','$date','$punch_time','$server_date_time','$time','','','$punch_status')";
                  $query=$this->db->query($sql);
                  $row = $result->row();
                    if($row)
                     {
                         return true;
                      }
                      else 
                      {
                        return false;
                      }   
                 }
             }
     }
    else
    {
      return false;
    }      
  }

  function punchout_from_profile($employee_id)
  {
       $query="SELECT * FROM hrms_user WHERE employee_id='".$employee_id."' ";
    $result=$this->db->query($query);
      $row = $result->row();
    if($row)
    {
          //echo "User Authenticated";
          $emp_num = $row->id;
          $emp_id = $row->employee_id;
              date_default_timezone_set('UTC');
              $today = mktime(date('H')+5,date('i')+30,date('s'));
              $time=date("H:i:s",$today);
              $server_date_time= date('Y-m-d H:i:s');

              $sql="SELECT * FROM hrms_attendance_record WHERE employee_id='".$emp_id."' AND punch_out_user_time='00:00:00'";
              $query=$this->db->query($sql);
              $row=$this->db->affected_rows();
              if ($row)
                 {
                    // database query to insert
                      $sql="UPDATE hrms_attendance_record SET punch_out_user_time='$time' ,punch_out_utc_time='$server_date_time' WHERE employee_id='".$emp_id."' AND punch_out_user_time='00:00:00'";
                      $query=$this->db->query($sql);
                  $row = $result->row();
                    if($row)
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
      return false;
    }

  }

  function punchout($username, $password)
  {  
       $query="SELECT * FROM hrms_user WHERE user_name='".$username."' AND user_password='".$password."'";
    $result=$this->db->query($query);
      $row = $result->row();
    if($row)
    {
          //echo "User Authenticated";
          $emp_num = $row->id;
          $emp_id = $row->employee_id;
     
              //$date=date("Y/m/d");
              date_default_timezone_set('UTC');
              $today = mktime(date('H')+5,date('i')+30,date('s'));
              $time=date("H:i:s",$today);
               //echo date('Y-m-d H:i:s' ,$today);
              //$today = mktime(date('H')+12,date('i')-30,date('s'));
              //$time=date("H:i:s",$today);
              $server_date_time= date('Y-m-d H:i:s');

              $sql="SELECT * FROM hrms_attendance_record WHERE employee_id='".$emp_id."' AND punch_out_user_time='00:00:00'";
              $query=$this->db->query($sql);
              $row=$this->db->affected_rows();
              if ($row)
                 {
                    // database query to insert
                      $sql="UPDATE hrms_attendance_record SET punch_out_user_time='$time' ,punch_out_utc_time='$server_date_time' WHERE employee_id='".$emp_id."' AND punch_out_user_time='00:00:00'";
                      $query=$this->db->query($sql);
                      return $row;
                 }  
     }
    else
    {
      $msg=3;
      return $msg;
    }

  }
  
  function checking_punch_in_or_not($employee_id)
  {
    // date_default_timezone_set('UTC');
    // $date=date("Y/m/d");
$query="SELECT * FROM hrms_attendance_record WHERE employee_id='".$employee_id."' AND punch_out_user_time='00:00:00'";
    $result=$this->db->query($query);
      $row = $result->row();
    if($row)
    {
      return true;
     }
    else
    {
      return false;
    }
  }

    function getEmployee_id_for_username($tablename,$username)
  {
     $query="select * from ".$tablename." where user_name='".$username."'";
    //echo $query."<br>";
      $q=$this->db->query($query);    
      if($q->num_rows() > 0) {
        foreach ($q->result() as $row) {
            $data[] = $row;
        }
      return $data;
      }
      return false;
  }
}
?>