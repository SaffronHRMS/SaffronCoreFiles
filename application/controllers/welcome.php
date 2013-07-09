<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function  __construct()
	{
		parent::__construct();
		$this->load->model('login_model','',TRUE);
           $this->load->model('user_model','',TRUE);
           $this->load->library('encrypt');
   // if ( ! $this->session->userdata('loggedIn') ) redirect("","refresh");
	}

	public function index()
	{
	  if ( ! $this->session->userdata('logged_in') )
    {  
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

        if ($this->form_validation->run() == FALSE)
        {
          $this->load->view('login');
        }
        else
        {
          redirect('user_ctrl/start',$sess_array);
        }
      }
      else
      {
        $get_id = $this->session->userdata('logged_in');
        $role_id =  $get_id['role_id'];
  
         if($role_id == 1)
         {
           redirect('admin_ctrl');
         }
         else
         {
           redirect('user_ctrl/start');
         }
      }

	}

	function check_database($password)
 	{
   		//Field validation succeeded.  Validate against database
   		$username = $this->input->post('username');
            $password= md5($password);
             // echo $password;
             // 
            //  date_default_timezone_set('Asia/Kolkata');
            // echo date('Y-m-d H:i:s');
   
   		// ***********  check for login button press
   		if(isset($_POST['login']))
    	{ 

    		
      		// ******** send username and password to models
      		$result = $this->login_model->login($username, $password);

          $user_detail = array();
          $user_detail['username'] = $username;
          $user_detail['password'] = $password;
      		if($result)
      		{
        		$sess_array = array();
        		foreach($result->result() as $row)
        		{
          			$sess_array = array
     	    		(
                'emp_num' => $row->emp_number,
          				'username' => $row->user_name,
                  'role_id' => $row->user_role_id,
                  'emp_id' => $row->employee_id
          			);
        		}
        			          			// ******** session create
          		
            if($sess_array['role_id'] == 1)
        		{
              //echo $sess_array['role_id'];
                $this->load->library('session');
              $this->session->set_userdata('logged_in',$sess_array);
            
        			// Go to Admin pannel
              redirect('admin_ctrl',$user_detail);
        		}
        		else
        		{
              $result = $this->user_model->getall($sess_array['emp_id']);
              if($result)
              {
                $emp_data = array();
                foreach($result->result() as $row)
                {
                  $emp_data = array
                  (
                    'emp_num' => $row->id,
                    'emp_id' => $row->employee_id,
                    'emp_first_name' => $row->emp_first_name,
                    'emp_middle_name' => $row->emp_middle_name,
                    'emp_last_name' => $row->emp_last_name,
                    'emp_gender' => $row->emp_gender,
                    'emp_dob' => $row->emp_birthday,
                    'emp_marital_status' => $row->emp_marital_status,
                    'emp_nationality' => $row->coun_code
                  );
                }
              }
              $this->load->library('session');
              $this->session->set_userdata('logged_in',$sess_array);
            
        			// Go to user paneel
              //session_start($sess_array);
        			//$this->load->view('user/user_pannel',$emp_data);
              return sess_array;
        		}
      		}
      		else
      		{
                  ?><!-- <center><div class="alert-error width_of_showing_message"> -->
                  <?php 
        		        $this->form_validation->set_message('check_database', '<div class="alert-error width_of_showing_message">Invalid username or password</div>');
        		        return false;
                  ?><!--</div></center>--><?php
      		}
    	}
    
		if (isset($_POST['punchin'])) 
    	{
      		$result = $this->login_model->punchin($username, $password);
      		if($result==1)
      		{
        		$this->form_validation->set_message('check_database', '<div class="alert-success width_of_showing_message">Successfully Punched IN</div>');
        		return false;
      		}
      		elseif ($result==3)
      		{
        		$this->form_validation->set_message('check_database', '<div class="alert-error width_of_showing_message">Invalid username or password</div>');
        		return false; 
      		}
          elseif($result==4)
          {
            $this->form_validation->set_message('check_database','<div class="alert-error width_of_showing_message">Successfully Punched In but You are Late Today!!</div> ');
            return false;
          }
          elseif($result==5)
          {
            $this->form_validation->set_message('check_database','<div class="alert-error width_of_showing_message">Oppss its afternoon!! Successfully Punched IN but you should contact HR</div>');
            return false;
          }
      		else
      		{
        		$this->form_validation->set_message('check_database', '<div class="alert-error width_of_showing_message">Punch Out first for Punch In</div>');
        		return false;
      		}
    	}

	    if (isset($_POST['punchout'])) 
    	{
      		$result = $this->login_model->punchout($username, $password);
      		if($result==1)
      		{
        		$this->form_validation->set_message('check_database', '<div class="alert-success width_of_showing_message">You have Successfully Punch Out</div>');
        		return false;
      		}
      		elseif ($result == 2)
      		{
        		$this->form_validation->set_message('check_database', '<div class="alert-error width_of_showing_message">You have already punch out for today</div>');
        		return false; 
      		}
      		elseif ($result==3)
      		{
        		$this->form_validation->set_message('check_database', '<div class="alert-error width_of_showing_message">Invalid username or password</div>');
        		return false; 
      		}
      		else
      		{
        		$this->form_validation->set_message('check_database', '<div class="alert-error width_of_showing_message">You have not Punch IN today</div>');
        		return false;
      		}
    	}    
  	}

  function punchin_from_profile()
  {
    $employee_id=$_POST['emp_id'];
    //echo $employee_id;
    //$this->login_model->punchin_from_profile($employee_id);
     if($this->login_model->punchin_from_profile($employee_id))
          {
            ?>
            <div class="alert-success ">Successfully Punched IN</div>
            <?php
          }
       else 
       {
            ?>
            <div class="alert-error ">Failed</div>
            <?php
       }   
  }
  
  function punchout_from_profile()
  {
    $employee_id=$_POST['emp_id'];
    //echo $employee_id;
    // $this->login_model->punchin_from_profile($employee_id);
     if($this->login_model->punchout_from_profile($employee_id))
          {
            ?>
            <div class="alert-success">Successfully Punched Out</div>
            <?php
          }
       else 
       {
            ?>
            <div class="alert-error ">Failed</div>
            <?php
       }   
  }
  
  function checking_punch_in_or_not()
  {
    $employee_id=$_POST['emp_id'];
    // echo $employee_id;  
     if($this->login_model->checking_punch_in_or_not($employee_id))
          {
               echo "punch_in";
          }
       else 
       {
            echo "punch_out";
       }   
  }

  function checking_punch_in_or_not_during_logining()
  {
    $username=$_POST['username'];
    //echo $username;
       $tablename='hrms_user';
      $records = $this->login_model->getEmployee_id_for_username($tablename,$username);
      if($records)
      {
        foreach ($records as $row) {
          $employee_id=$row->employee_id;
          // echo $employee_id;
        }
             if($this->login_model->checking_punch_in_or_not($employee_id))
                {
                     echo "punch_in";
                }
                 else 
                 {
                      echo "punch_out";
                 } 
      }
      else
      {
        echo "Username not found";
      }

  }

  function emp_profile_edit()
  {
    $this->load->view('welcome_message');
  }


	public function logout()
	{
    $this->session->sess_destroy();
		//$this->session->unset_userdata(array("login_id"=>""));
		redirect("","refresh");
		exit();
	}

}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */