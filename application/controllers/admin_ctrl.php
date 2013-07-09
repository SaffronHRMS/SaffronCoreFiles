<?php
session_start();
class Admin_ctrl extends CI_Controller
{
	function  __construct()
	{
	parent::__construct();
	$this->load->library('form_validation');
	$this->load->model('admin_mod');
	$this->load->helper('form');
	$this->load->helper('date');
	$this->load->library('session');
	$this->load->helper('url');
	$this->load->library('encrypt');
	$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
    $this->output->set_header("Pragma: no-cache"); 
	
	if ( ! $this->session->userdata('logged_in') ) { redirect("welcome","refresh");}
	}
	
	function index()
	{
	         $get_id = $this->session->userdata('logged_in');
                       $user_name  =  $get_id['username'];
                       //echo $user_name;
                       //$data=array();
                       $data['session_user_name'] = $user_name;
                       //$this->load->vars($data);
                       $this->load->view('admin_pannel',$data);
	     //$this->login();	
	}
	
	









    function show_blank()
    {
    	//echo "blank";
    }



	function show_general_information()
	{
                //        if($this->session->userdata('logged_in')) 
	               // {
		         // $get_id = $this->session->userdata('logged_in');
	          //              $user_name  =  $get_id['username'];
	          //              $data['session_user_name'] = $user_name;	               	
                                           $this->load->view('company_info');
 
	           //     }
	           // else
	           // 	{
	           // 		redirect('welcome');
	           // 	}
		
	}

	// function show_organization()
	// {
	// 	  // if($this->session->userdata('logged_in')) 
	// 	  //  {

 //          $this->load->view('company_info');
 //           // }
 //           // else
 //           // 	{
 //           // 		echo "session is not set";
 //           // 	}
		 
	// }

	function show_structure()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('company_structure');
		  // }
    //       else
    //       	{
    //       		$this->load->view('login');
    //       	}	
	}

	function show_location()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('company_location');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_job_title()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		$tablename='hrms_job_category';
		$data['records'] = $this->admin_mod->getAll($tablename);
		  $this->load->view('job_info',$data);
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	// function show_job()
	// {
	// 	// if($this->session->userdata('logged_in')) 
	// 	//   {
	// 	  	$this->load->view('job_info');
	//       // }
 //       //    else
 //       //    	{
 //       //    		$this->load->view('login');
 //       //    	}
	// }

	function show_pay_grades()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		$tablename='hrms_currency_type';
		$data['records'] = $this->admin_mod->getAll($tablename);
		  $this->load->view('pay_grades',$data);
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_employeement_status()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('employeement_status');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_job_categories()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('job_categories');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_work_shift()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('work_shift');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_skills()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('skills');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_education()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('education');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_license()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('license');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_languages()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('languages');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}


	function show_user()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		$tablename='roles';
		$tablename2='hrms_work_shift';
		$data['role'] = $this->admin_mod->getAll($tablename);
		$data['work_shift'] = $this->admin_mod->getAll($tablename2);
		$data['records'] = $this->admin_mod->get_not_added_data();
		  	$this->load->view('user_info',$data);
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_notification()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('notification');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_project_info()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
			$this->load->view('project_info');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_customer()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('customer');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_projects()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		$tablename='hrms_employee';
		$tablename2='hrms_customer';
		$data['project_admin'] = $this->admin_mod->getAll($tablename);
		$data['customer'] = $this->admin_mod->getAll($tablename2);  
		 //print_r($data['customer']); 	
		  	$this->load->view('projects',$data);
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_employee_list()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		$tablename='hrms_employee';
		$data['records'] = $this->admin_mod->getAll($tablename);
                        $data['distinct_city'] = $this->admin_mod->getAll_Distinct_city($tablename);
		$this->load->view('employee_list',$data);
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_add_candidate()
	{
		$this->load->view('add_candidate');
	}

	function show_add_employee()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('add_employee');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}


	function show_add_job_for_employee()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('add_job_for_employee');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_employee_report()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('employee_report');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_leave_type()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('leave');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_leave_list()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('leave_list');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_leave_summary()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('leave_summary');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_leave_calender()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('leave_calender');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_assign_leave()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		    $tablename='hrms_leavetype';
		    $data['leave_type'] = $this->admin_mod->getAll($tablename);
		    // $tablename='hrms_leave';
		    // $data['leave'] = $this->admin_mod->getAll($tablename);		  	
		  	$this->load->view('assign_leave',$data);
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_time()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('time');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_attendance()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('attendance');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_candidate()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$tablename='hrms_job_title';
		    $data['job_title'] = $this->admin_mod->getAll($tablename);
		    $tablename='hrms_job_candidate';
		    $data['job_candidate'] = $this->admin_mod->getAll($tablename);
		  	$this->load->view('candidate',$data);
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_vacancies()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('vacancies');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_view_training()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('view_training');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_add_training()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('add_training');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_kpi_list()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		$tablename='hrms_job_title';
		$data['records'] = $this->admin_mod->getAll($tablename);
		  	$this->load->view('kpi_list',$data);
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_add_kpi()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('add_kpi');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_copy_kpi()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('copy_kpi');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_reviews()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('reviews');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_employee_leave_report()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('employee_leave_report');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_employee_turnover_hiring_report()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('employee_turnover_hiring_report');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_employee_turnover_termination()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('employee_turnover_termination');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_head_count_report()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('head_count_report');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_vacancy_succession_report()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('vacancy_succession_report');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_pending_leave_request()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('pending_leave_request');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_scheduled_interview()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('scheduled_interview');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_change_password()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  
	         $get_id = $this->session->userdata('logged_in');
                       $user_name  =  $get_id['username'];
                       $data['session_user_name'] = $user_name;
		  	$this->load->view('change_password',$data);
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_logout()
	{
		  	$this->session->sess_destroy();
		  
           if ( ! $this->session->userdata('logged_in') )
           { 
           	redirect('welcome');
           	//redirect('welcome', 'refresh');
           }
          
	}

	function show_company_history()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('company_history');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_company_philosphy()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('company_philosphy');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_life_at_techindyeah()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('life_at_techindyeah');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_vision_and_mission()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('vision_and_mission');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_add_job()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('add_job');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}

	function show_delete_job()
	{
		// if($this->session->userdata('logged_in')) 
		//   {
		  	$this->load->view('delete_job');
	      // }
       //    else
       //    	{
       //    		$this->load->view('login');
       //    	}
	}
function backup()
{
        //echo $this->db->database;
   $this->admin_mod->backup($this->db->hostname,$this->db->username,$this->db->password,$this->db->database);

}


function show_autocomplete_for_name()
{
        if (isset($_GET['q']))
        {
            $q = strtolower($_GET['q']);
            $data['auto_complete_details']=$this->admin_mod->getAutocomplete_Data_for_name($q);
         }
    //$this->admin_mod->getAutocomplete_Data();
  $this->load->view('autocomplete_for_name',$data);
}

function show_autocomplete_for_employee_id()
{
        if (isset($_GET['q']))
        {
            $q = strtolower($_GET['q']);
            $data['auto_complete_details']=$this->admin_mod->getAutocomplete_Data_for_employee_id($q);
         }
    //$this->admin_mod->getAutocomplete_Data();
  $this->load->view('autocomplete_for_employee_id',$data);
}

function show_autocomplete_for_supervisor_name()
{
        if (isset($_GET['q']))
        {
            $q = strtolower($_GET['q']);
            $data['autocomplete_details_for_supervisor_name']=$this->admin_mod->getAutocomplete_Data_for_supervisor_name($q);
         }
    //$this->admin_mod->getAutocomplete_Data();
  $this->load->view('autocomplete_for_name',$data);
}

function show_autocomplete_for_country()
{
        if (isset($_GET['q']))
        {
            $q = strtolower($_GET['q']);
            $data['auto_complete_details']=$this->admin_mod->getAutocomplete_Data_for_country($q);
         }
    //$this->admin_mod->getAutocomplete_Data();
  $this->load->view('autocomplete_for_country',$data);
}
	function show_data_from_database()
	{
		return;
	}

	function show_add_pay_grades()
	{
	    $pay_grades_field=$_POST['pay_grades_field'];
	    echo "$pay_grades_field";
	}

	function show_add_candidate_submit_data()
	{
		$candidate_first_name = $_POST['candidate_first_name'];
		$candidate_middle_name = $_POST['candidate_middle_name'];
		$candidate_last_name = $_POST['candidate_last_name'];
		$candidate_email = $_POST['candidate_email'];
		$candidate_contact_number = $_POST['candidate_contact_number'];
		$candidate_applied_for = $_POST['candidate_applied_for'];
		$candidate_skills = $_POST['candidate_skills'];
		$candidate_comment = $_POST['candidate_comment'];

		if($this->admin_mod->submit_candidate_details($candidate_first_name,$candidate_middle_name,
			$candidate_last_name,$candidate_email,$candidate_contact_number,$candidate_applied_for,
			$candidate_skills,$candidate_comment))
		{
			?><center><div class="alert-success width_of_showing_message">
			<?php echo "Successfully Added";
			?></div></center><?php
		}
		else
		{
			?><center><div class="alert-error width_of_showing_message">
			<?php echo "Training detail already Exist" ;
			?></div></center><?php
		}

	}
	function show_add_training_submit_data()
	{
		$training_name_field = $_POST['training_name_field'];
		$training_duration_field = $_POST['training_duration_field'];
		$training_fee_field = $_POST['training_fee_field'];
		$training_note_field = $_POST['training_note_field'];

		if($this->admin_mod->submit_training_details($training_name_field,$training_duration_field,
			$training_fee_field,$training_note_field))
		{
			?><center><div class="alert-success width_of_showing_message">
			<?php echo "Successfully Added";
			?></div></center><?php
		}
		else
		{
			?><center><div class="alert-error width_of_showing_message">
			<?php echo "Training detail already Exist" ;
			?></div></center><?php
		}
	}
	
   function show_submit_data_for_attendance_record()
	{

		$employee_id=$_POST['employee_id'];
		$datepicker=$_POST['datepicker'];
        //modifying date formate
		$formated_date=explode("/", $datepicker);
		// echo $formated_date[0]."<br />";
		// echo $formated_date[1]."<br />";
		// echo $formated_date[2]."<br />";

		$final_date = $formated_date[2]."-".$formated_date[1]."-".$formated_date[0];
        $data['records'] = $this->admin_mod->search_attendance_details($employee_id,$final_date);
        $this->load->view('user/showing_attendance_details',$data);

	}

   function show_submit_data_for_attendance_record_from_to()
	{

		$employee_id=$_POST['employee_id'];
		$datepicker=$_POST['datepicker'];
		$to_datepicker=$_POST['to_datepicker'];

	        //modifying date formate
			$formated_date=explode("/", $datepicker);
			$final_date = $formated_date[2]."-".$formated_date[1]."-".$formated_date[0];
			$to_formated_date=explode("/", $to_datepicker);
			$final_to_date = $to_formated_date[2]."-".$to_formated_date[1]."-".$to_formated_date[0];
		if(strtotime($final_to_date)>strtotime($final_date))
		{			
	        		$data['records'] = $this->admin_mod->search_attendance_details_from_to($employee_id,$final_date,$final_to_date);
	       		 $this->load->view('user/showing_attendance_details',$data);
		}
		else
		{
			echo "Date To must be greater than from";
		}		

	}

   function show_submit_data_for_assign_leave()
	{

		$employee_name=$_POST['employee_id'];
		$leave_type=$_POST['leave_type'];
		$leave_comment=$_POST['leave_comment'];
		$datepicker=$_POST['datepicker'];
		$to_datepicker=$_POST['to_datepicker'];
        //modifying date formate
		$formated_date=explode("/", $datepicker);

		$final_date = $formated_date[2]."-".$formated_date[1]."-".$formated_date[0];
		$to_formated_date=explode("/", $to_datepicker);
		$final_to_date = $to_formated_date[2]."-".$to_formated_date[1]."-".$to_formated_date[0];

		$tablename='hrms_employee';
		$records = $this->admin_mod->getEmployee_id_for_Employee_name($tablename,$employee_name);
		if($records)
		{
			foreach ($records as $row) {
				$employee_id=$row->employee_id;
			}
		}
		// echo $employee_id."<br />";echo $leave_type."<br />";echo $leave_comment."<br />";echo $final_date."<br />";echo $final_to_date."<br />";
		if(strtotime($final_to_date)>strtotime($final_date))
		{
			if($this->admin_mod->assign_leave($employee_id,$leave_type,$final_date,$final_to_date,$leave_comment))
			{
				?><center><div class="alert-success width_of_showing_message">
				<?php echo "Successfully assigned";
				?></div></center><?php
			}
			else
			{
				?><center><div class="alert-error width_of_showing_message">
				<?php echo "There is no leave balance for this leave type for this employee" ;
				?></div></center><?php
			}
		}
		else
		{
			echo "Date To must be greater than from";
		}				
	}

   function show_submit_data_for_attendance_record_by_date()
	{

		$datepicker=$_POST['datepicker'];
                           //  echo $datepicker;
                             //modifying date formate
		$formated_date=explode("/", $datepicker);
		// echo $formated_date[0]."<br />";
		// echo $formated_date[1]."<br />";
		// echo $formated_date[2]."<br />";

		$final_date = $formated_date[2]."-".$formated_date[1]."-".$formated_date[0];
		$data['on_date']=$datepicker;
                      $data['records'] = $this->admin_mod->search_attendance_details_by_date($final_date);
                      $this->load->view('user/showing_attendance_details',$data);

	}


   function show_submit_data_for_attendance_record_by_name()
	{

		$employee_name=$_POST['employee_id'];
		//echo $employee_id;
	           $data['employee_name']=$employee_name;
		// $data['employee_name']=$this->admin_mod->search_employee_full_name_by_name($employee_id);
                       $data['records'] = $this->admin_mod->search_attendance_details_by_name($employee_name);
                       $this->load->view('user/showing_attendance_details',$data);

	}

   function show_submit_data_for_leave_summary_search_by_name()
	{

		$employee_name=$_POST['employee_name'];
		$tablename='hrms_leave';
		$tablename2='hrms_employee';
		$data['records'] = $this->admin_mod->getAll_filter_data_by_name_fromtwo_tables($tablename,$tablename2,$employee_name);
		
		$this->load->view('user/showing_leave_summary_details',$data);

	}

   function show_submit_data_for_leave_summary_search_by_id()
	{

		$employee_id=$_POST['employee_id'];
		$tablename='hrms_leave';
		$tablename2='hrms_employee';
		$data['records'] = $this->admin_mod->getAll_filter_data_fromtwo_tables($tablename,$tablename2,$employee_id);
		
		$this->load->view('user/showing_leave_summary_details',$data);
	}

	function show_submit_data_for_adding_pay_grades()
	{

		$pay_grade_name=$_POST['pay_grade_name'];
		$currency_id=$_POST['currency_id'];
		$min_salary=$_POST['min_salary'];
		$max_salary=$_POST['max_salary'];

		if($this->admin_mod->add_pay_grades($pay_grade_name,$currency_id,$min_salary,$max_salary))
		{
			?><center><div class="alert-success width_of_showing_message">
			<?php echo "Successfully Added";
			?></div></center><?php
		}
		else
		{
			?><center><div class="alert-error width_of_showing_message">
			<?php echo "Pay Grade already Exist" ;
			?></div></center><?php
		}

	}

	function show_submit_data_for_adding_location()
	{

        $add_location_name=$_POST['add_location_name'];
        $address1=$_POST['address1'];
		$address2=$_POST['address2'];
		$city=$_POST['city'];
		$state=$_POST['state'];
		$pincode=$_POST['pincode'];
		$country=$_POST['country'];
		$phone=$_POST['phone'];
		$fax=$_POST['fax'];
		$no_of_employee=$_POST['no_of_employee'];
		// $note=$_POST['note'];
        // echo $add_location_name."<br>";echo $address1."<br>";echo $address2."<br>";echo $city."<br>";echo $state."<br>";
        // echo $pincode."<br>";echo $country."<br>";echo $phone."<br>";echo $fax."<br>";echo $note."<br>";
		if($this->admin_mod->add_company_location($add_location_name,$address1,$address2,$city,$state,$pincode,$country,$phone,$fax,$no_of_employee))
		{
			?><center><div class="alert-success width_of_showing_message">
			<?php echo "Successfully Added";
			?></div></center><?php
		}
		else
		{
			?><center><div class="alert-error width_of_showing_message">
			<?php echo "Failed" ;
			?></div></center><?php
		}

	}

	function show_submit_data_for_adding_leave_type()
	{

		$leave_name=$_POST['leave_name'];
		$leave_id=$_POST['leave_id'];

		if($this->admin_mod->add_leave_type($leave_id,$leave_name))
		{
			?><center><div class="alert-success width_of_showing_message">
			<?php echo "Successfully Added";
			?></div></center><?php
		}
		else
		{
			?><center><div class="alert-error width_of_showing_message">
			<?php echo "Pay Grade already Exist" ;
			?></div></center><?php
		}

	}

	function show_submit_data_for_adding_project()
	{
                      $project_id=$_POST['project_id'];
		$project_name=$_POST['project_name'];
		$project_description=$_POST['project_description'];
		$customer_id=$_POST['customer_id'];
		$project_admin=$_POST['project_admin'];
                     // echo $project_id."<br>".$project_name."<br>".$project_description."<br>".$customer_id."<br>".$project_admin."<br>";
		if($this->admin_mod->add_project($project_id,$project_name,$project_description,$customer_id,$project_admin))
		{
			?><center><div class="alert-success width_of_showing_message">
			<?php echo "Successfully Added";
			?></div></center><?php
		}
		else
		{
			?><center><div class="alert-error width_of_showing_message">
			<?php echo "Project Name already Exist" ;
			?></div></center><?php
		}

	}



	function show_submit_data_for_employee_add()
	{

		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$employee_id=$_POST['employee_id'];
//echo $firstname."<br>";echo $lastname."<br>";echo $employee_id."<br>";
		if($this->admin_mod->employee_add($firstname,$lastname,$employee_id))
		{
			?><center><div class="alert-success width_of_showing_message">
			<?php echo "Successfully Added";
			?></div></center><?php
		}
		else
		{
			?><center><div class="alert-error width_of_showing_message">
			<?php echo "Name already Exist" ;
			?></div></center><?php
		}

	}

	function show_submit_data_for_employee_add_except_image_field()
	{

		$firstname=$_POST['firstname'];
		$middlename=$_POST['middlename'];
		$lastname=$_POST['lastname'];
		$employee_id=$_POST['employee_id'];
		//echo $firstname."<br>";echo $middlename."<br>";echo $lastname."<br>";echo $employee_id."<br>";

		//echo "Image is not selected";
        //image_setting($image_field);
		if($this->admin_mod->employee_add_except_image_field($firstname,$middlename,$lastname,$employee_id))
		{
			?><center><div class="alert-success width_of_showing_message">
			<?php echo "Successfully Added";
			?></div></center><?php
		}
		else
		{
			?><center><div class="alert-error width_of_showing_message">
			<?php echo "Name already Exist" ;
			?></div></center><?php
		}

	}

// 	function show_submit_data()
// 	{
// return;
// 		// $job_category_field=$_POST['job_category_field'];
// 		// if($this->admin_mod->add_job_category($job_category_field))
// 		// {
// 		// 	
            // echo "Successfully Added";
           
// 		// }
// 		// else
// 		// {
// 		// 	echo "Name already Exist" ;
// 		// }
	    
// 	}

	function show_submit_data_for_adding_employment_status()
	{
		//$this->load->view('submit_data');
		$employment_status_name=$_POST['employment_status_name'];

	    if($this->admin_mod->add_employment_status($employment_status_name))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
			<?php echo "Successfully Created";
			?></center></div><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
			<?php echo "Already Exist"."<br >";
			?></center></div><?php
	    }
	}


	function show_submit_data_for_adding_user()
	{
		//$this->load->view('submit_data');
		$addusername=$_POST['addusername'];
		$addpassword=md5($_POST['addpassword']);
		$employee_id=$_POST['employee_id'];
		$employee_role=$_POST['employee_role'];
		$work_shift=$_POST['work_shift'];
        //echo $employee_id."<br>"; echo $addusername."<br>";echo $addpassword."<br>";
	    if($this->admin_mod->add_employee_user($addusername, $addpassword,$employee_id,$employee_role,$work_shift))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
			<?php echo "Successfully Created";
			?></center></div><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
			<?php echo "User already Exist"."<br >";
			?></center></div><?php
	    }
	}

	function show_submit_data_for_adding_customer()
	{
		//$this->load->view('submit_data');
		$addcustomername=$_POST['addcustomername'];
		$addcustomerid=$_POST['addcustomerid'];
		$addcustomeraddress=$_POST['addcustomeraddress'];
		$addcustomerphone=$_POST['addcustomerphone'];
		$customer_description=$_POST['customer_description'];

	    if($this->admin_mod->add_customer($addcustomername, $addcustomerid,$customer_description, $addcustomeraddress, $addcustomerphone))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
			<?php echo "Successfully Created";
			?></center></div><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
			<?php echo "Customer ID already Exist"."<br >";
			?></center></div><?php
	    }
	}

	function show_job_category_submit_data()
	{

		$job_category_field=$_POST['job_category_field'];

		if($this->admin_mod->add_job_category($job_category_field))
		{
			?><center><div class="alert-success width_of_showing_message">
			<?php echo "Successfully Added";
			?></div></center><?php
		}
		else
		{
			?><center><div class="alert-error width_of_showing_message">
			<?php echo "Name already Exist" ;
			?></div></center><?php
		}
	}


    function show_workshift_submit_data()
	{

		$workshift_name_field=$_POST['workshift_name_field'];
		$starting_time_field=$_POST['starting_time_field'];
		$ending_time_field=$_POST['ending_time_field'];

		if($this->admin_mod->add_workshift($workshift_name_field,$starting_time_field,$ending_time_field))
		{
			?><center><div class="alert-success width_of_showing_message">
			<?php echo "Successfully Added";
			?></div></center><?php
		}
		else
		{
			?><center><div class="alert-error width_of_showing_message">
			<?php echo "Work shift already Exist" ;
			?></div></center><?php
		}
	}
    

   
    function show_job_title_submit_data()
	{

		$job_title_field=$_POST['job_title_field'];
		$job_desc_field=$_POST['job_desc_field'];
		$job_note_field=$_POST['job_category_field'];

		if($this->admin_mod->add_job_title($job_title_field,$job_desc_field,$job_note_field))
		{
			?><center><div class="alert-success width_of_showing_message">
			<?php echo "Successfully Added";
			?></div></center><?php
		}
		else
		{
			?><center><div class="alert-error width_of_showing_message">
			<?php echo "Name already Exist" ;
			?></div></center><?php
		}
	}
   
    function show_skill_submit_data()
	{

		$skill_field=$_POST['skill_field'];
        $skill_desc=$_POST['skill_desc'];
		if($this->admin_mod->add_skill($skill_field,$skill_desc))
		{
			?><center><div class="alert-success width_of_showing_message">
			<?php echo "Successfully Added";
			?></div></center><?php
		}
		else
		{
			?><center><div class="alert-error width_of_showing_message">
			<?php echo "Name already Exist" ;
			?></div></center><?php
		}
	}

    function show_license_submit_data()
	{

		$license_field=$_POST['license_field'];
        $license_desc=$_POST['license_desc'];
		if($this->admin_mod->add_license($license_field,$license_desc))
		{
			?><center><div class="alert-success width_of_showing_message">
			<?php echo "Successfully Added";
			?></div></center><?php
		}
		else
		{
			?><center><div class="alert-error width_of_showing_message">
			<?php echo "Name already Exist" ;
			?></div></center><?php
		}
	}   

    function show_languages_submit_data()
	{

		$languages_field=$_POST['languages_field'];
		if($this->admin_mod->add_languages($languages_field))
		{
			?><center><div class="alert-success width_of_showing_message">
			<?php echo "Successfully Added";
			?></div></center><?php
		}
		else
		{
			?><center><div class="alert-error width_of_showing_message">
			<?php echo "Name already Exist" ;
			?></div></center><?php
		}
	}

    function show_education_submit_data()
	{

		$education_field=$_POST['education_field'];
        $education_desc=$_POST['education_desc'];
		if($this->admin_mod->add_education($education_field,$education_desc))
		{
			?><center><div class="alert-success width_of_showing_message">
			<?php echo "Successfully Added";
			?></div></center><?php
		}
		else
		{
			?><center><div class="alert-error width_of_showing_message">
			<?php echo "Name already Exist" ;
			?></div></center><?php
		}
	}    


    function search_employee_detail()
    {
    	return;
    }

	function show_search_candidate_detail_select_keywords()
	{
		$select_keywords =$_POST['select_keywords'];
//echo $select_keywords;
		$data['records'] = $this->admin_mod->search_candidate_detail_by_data_select_keywords($select_keywords);
		//print_r($data['records']);
		$this->load->view('user/showing_job_candidate_details',$data);

	}


	function show_search_candidate_detail_select_job_title()
	{
		$select_job_title =$_POST['select_job_title'];
//echo $select_job_title;
		$data['records'] = $this->admin_mod->search_candidate_detail_by_data_select_job_title($select_job_title);
		//print_r($data['records']);
		$this->load->view('user/showing_job_candidate_details',$data);

	}

	function show_search_candidate_detail_search_by_name()
	{
		$search_by_name =$_POST['search_by_name'];

		$data['records'] = $this->admin_mod->search_candidate_detail_by_data_search_by_name($search_by_name);
		//print_r($data['records']);
		$this->load->view('user/showing_job_candidate_details',$data);


	}

	function show_search_employee_detail_search_by_name()
	{
		$search_by_name =$_POST['search_by_name'];
                            $data['search_by_name']=$search_by_name ;
		$data['records'] = $this->admin_mod->search_employee_detail_by_data_search_by_name($search_by_name);
		//print_r($data['records']);
		$this->load->view('user/showing_employee_details',$data);


	}

	function show_search_employee_detail_search_by_id()
	{
		$search_by_id =$_POST['search_by_id'];
                       $data['search_by_id']=$search_by_id ;
	    $data['records']= $this->admin_mod->search_employee_detail_by_data_search_by_id($search_by_id);
		$this->load->view('user/showing_employee_details',$data);
	}

	function show_search_employee_detail_search_by_supervisor_name()
	{
		$search_by_supervisor_name =$_POST['search_by_supervisor_name'];
                        $data['search_by_supervisor_name']=$search_by_supervisor_name ;
	    $data['records']=$this->admin_mod->search_employee_detail_by_data_search_by_supervisor_name($search_by_supervisor_name);
		$this->load->view('user/showing_employee_details',$data);
	}    

	function show_search_employee_detail_job_title()
	{
		$job_title =$_POST['job_title'];
                          $data['job_title']=$job_title ;
	    $data['records']= $this->admin_mod->search_employee_detail_by_data_job_title($job_title);
		$this->load->view('user/showing_employee_details',$data);
	}

	function show_search_employee_detail_city_code()
	{
		$city_code =$_POST['city_code'];
		$data['city_code']=$city_code ;
	    $data['records'] = $this->admin_mod->search_employee_detail_by_data_city_code($city_code);
		$this->load->view('user/showing_employee_details',$data);
	}

	function show_search_employee_detail_emp_status()
	{
		$emp_status =$_POST['emp_status'];
		//echo $emp_status;
		$data['emp_status']=$emp_status ;
	    $data['records']= $this->admin_mod->search_employee_detail_by_data_emp_status($emp_status);
		$this->load->view('user/showing_employee_details',$data);
	}

	function show_data_from_database_for_leave_list_search_by_checkbox()
	{
		$checkbox_name =$_POST['checkbox_name'];//echo $checkbox_name;
		$tablename='hrms_leave_list';
		$tablename2='hrms_employee';
		$data['records'] = $this->admin_mod->search_leave_list_detail_search_by_checkbox($checkbox_name,$tablename,$tablename2);
		$this->load->view('user/showing_leave_list_details',$data);
	}






//**************************section for displaying data from database	


	function show_data_from_database_for_add_training()
	{/*
		$tablename='hrms_training';
		$data['records'] = $this->admin_mod->getAll($tablename);
		
		$this->load->view('user/showing_training_details',$data);
	*/
	}

	function show_data_from_database_for_location()
	{
		$tablename='organisation_location';
		$data['records'] = $this->admin_mod->getAll($tablename);
		$this->load->view('user/showing_organisation_location_details',$data);
	}	

	function show_data_from_database_for_kpi_list()
	{
		$tablename='hrms_job_title';
		$data['records'] = $this->admin_mod->getAll($tablename);
		
		$this->load->view('user/showing_kpi_list_details',$data);
	}
	
	function show_data_from_database_for_employment_status()
	{
		$tablename='hrms_employment_status';
		$data['records'] = $this->admin_mod->getAll($tablename);
		
		$this->load->view('user/showing_employment_status_details',$data);
	}

	/*function show_data_from_database_for_leave_calender()
	{
		$tablename='hrms_employment_status';
		$data['records'] = $this->admin_mod->getAll($tablename);
=======
	// function show_data_from_database_for_leave_calender()
	// {
	// 	$tablename='hrms_employment_status';
	// 	$data['records'] = $this->admin_mod->getAll($tablename);
>>>>>>> .r16
		
	// 	$this->load->view('user/showing_leave_calender_details',$data);
	// }
*/
	function show_data_from_database_for_license()
	{
		$tablename='hrms_license';
		$data['records'] = $this->admin_mod->getAll($tablename);
		
		$this->load->view('user/showing_license_details',$data);
	}

	function show_data_from_database_for_languages()
	{
		$tablename='hrms_language';
		$data['records'] = $this->admin_mod->getAll($tablename);
		
		$this->load->view('user/showing_languages_details',$data);
	}

	function show_data_from_database_for_skill()
	{
		$tablename='hrms_skill';
		$data['records'] = $this->admin_mod->getAll($tablename);
		
		$this->load->view('user/showing_skill_details',$data);
	}

	function show_data_from_database_for_education()
	{
		$tablename='hrms_education';
		$data['records'] = $this->admin_mod->getAll($tablename);
		
		$this->load->view('user/showing_education_details',$data);
	}

	function show_data_from_database_for_attendance()
	{
		$tablename='hrms_attendance_record';
		$data['records'] = $this->admin_mod->getAll($tablename);
		
		$this->load->view('user/showing_attendance_details',$data);
	}


	function show_data_from_database_for_leave_type()
	{
		$tablename='hrms_leavetype';
		$data['records'] = $this->admin_mod->getAll($tablename);
		
		$this->load->view('user/showing_leave_type_details',$data);
	}

	function show_data_from_database_for_leave_calender()
	{
		$tablename='hrms_leave';
		$tablename2='hrms_employee';
		$data['records'] = $this->admin_mod->getAllDetail_for_leave_calender($tablename,$tablename2);
		
		$this->load->view('user/showing_leave_calender_details',$data);
	}
	
	function show_data_from_database_for_leave_list()
	{
		$tablename='hrms_leave_list';
		$tablename2='hrms_employee';
		$data['records'] = $this->admin_mod->getAllDetail_for_leave_list($tablename,$tablename2);
		//$data['emp_name'] = $this->admin_mod->getAll($tablename);
		
		$this->load->view('user/showing_leave_list_details',$data);
	}

//showing details for employee
	function show_data_from_database_for_adding_employee()
	{
		$tablename='hrms_employee';
		$data['records'] = $this->admin_mod->getAll($tablename);
		
		$this->load->view('user/showing_added_employee_details',$data);
	}

//showing details for employee
	function show_data_from_database_for_adding_employee_for_job()
	{
		// echo "Testing";
		$tablename='hrms_employee';
		$data['records'] = $this->admin_mod->getAll($tablename);
		
		$this->load->view('user/showing_added_employee_details_for_job',$data);
	}

//showing the details for user
	function show_data_from_database_for_add_employee()
	{
		$tablename='hrms_user';
		$data['records'] = $this->admin_mod->getAll($tablename);
		
		$this->load->view('user/showing_add_employee_details',$data);
	}
    
    function show_data_from_database_for_workshift()
	{
		$tablename='hrms_work_shift';
		$data['records'] = $this->admin_mod->getAll($tablename);
		
		$this->load->view('user/showing_work_shift_details',$data);
	}

	function show_data_from_database_for_pay_grades()
	{
		$tablename='hrms_pay_grade';
		$data['records'] = $this->admin_mod->getAll($tablename);
		
		$this->load->view('user/showing_pay_grades_details',$data);
	}

	function show_data_from_database_for_job_category()
	{
		$tablename='hrms_job_category';
		$data['records'] = $this->admin_mod->getAll($tablename);
		
		$this->load->view('user/showing_job_category_details',$data);
	}

	function show_data_from_database_for_job_vacancy()
	{
		$tablename='hrms_job_vacancy';
		$data['records'] = $this->admin_mod->getAll($tablename);
		
		$this->load->view('user/showing_job_vacancy_details',$data);
	}

    function show_data_from_database_for_job_title()
	{
		$tablename='hrms_job_title';
		$data['records'] = $this->admin_mod->getAll($tablename);
		
		$this->load->view('user/showing_job_title_details',$data);
	}

    function show_data_from_database_for_job_candidate()
	{
		$tablename='hrms_job_candidate';
		$data['records'] = $this->admin_mod->getAll($tablename);
		
		$this->load->view('user/showing_job_candidate_details',$data);
	}

    function show_data_from_database_for_company_info()
	{
		$tablename='organisation';
		  $data['records'] = $this->admin_mod->getAll($tablename);
          $this->load->view('user/showing_company_info_details',$data);
	}

    function show_data_from_database_for_customer()
	{
		$tablename='hrms_customer';
		$data['records'] = $this->admin_mod->getAll($tablename);
		
		$this->load->view('user/showing_customer_details',$data);
	}

    function show_data_from_database_for_project()
	{
		$tablename='hrms_project';
		$data['records'] = $this->admin_mod->getAll($tablename);
		
		$this->load->view('user/showing_project_details',$data);
	}

    function show_data_from_database_for_leave_summary()
	{
		$tablename='hrms_leave';
		$tablename2='hrms_employee';
		$data['records'] = $this->admin_mod->getAll_data_fromtwo_tables($tablename,$tablename2);
		
		$this->load->view('user/showing_leave_summary_details',$data);
	}

//*******************************Edit functions*************************************

    function show_edit_form_for_job_category()
	{
	$id =$_POST['id'];
		$tablename='hrms_job_category';
		$data['records'] = $this->admin_mod->getAll_filter_data($tablename,$id);
		$this->load->view('user/edit_form_for_job_category',$data);
	}

    function show_edit_form_for_education()
	{
	$id =$_POST['id'];
		$tablename='hrms_education';
		$data['records'] = $this->admin_mod->getAll_filter_data($tablename,$id);
		$this->load->view('user/edit_form_for_education',$data);
	}

    function show_edit_form_for_skill()
	{
	$id =$_POST['id'];
		$tablename='hrms_skill';
		$data['records'] = $this->admin_mod->getAll_filter_data($tablename,$id);
		$this->load->view('user/edit_form_for_skill',$data);
	}

    function show_edit_form_for_license()
	{
	$id =$_POST['id'];
		$tablename='hrms_license';
		$data['records'] = $this->admin_mod->getAll_filter_data($tablename,$id);
		$this->load->view('user/edit_form_for_license',$data);
	}

    function show_edit_form_for_languages()
	{
	$id =$_POST['id'];
		$tablename='hrms_language';
		$data['records'] = $this->admin_mod->getAll_filter_data($tablename,$id);
		$this->load->view('user/edit_form_for_languages',$data);
	}

    function show_edit_form_for_leave_summary()
	{
	$id =$_POST['id'];
	//echo $id;
	
		$tablename='hrms_leave';
		$data['records'] = $this->admin_mod->getAll_filter_data($tablename,$id);
		$this->load->view('user/edit_form_for_leave_summary',$data);
	}

 //    function show_edit_form_for_attendance_details()
	// {
	// $id =$_POST['id'];
	// 	$tablename='hrms_attendance_record';
	// 	$data['records'] = $this->admin_mod->getAll_filter_data($tablename,$id);
	// 	$this->load->view('user/edit_form_for_attendance_details',$data);
	// }	

    function show_edit_form_for_leave_type()
	{
	$id =$_POST['id'];
	//echo $id;
		$tablename='hrms_leavetype';
		$data['records'] = $this->admin_mod->getAll_filter_data($tablename,$id);

		//print_r($data);
		$this->load->view('user/edit_form_for_leave_type',$data);
	}	
	
    function show_edit_form_for_leave_list()
	{
	$id =$_POST['id'];
	//echo $id;
		$tablename='hrms_leave_list';
		$data['records'] = $this->admin_mod->getAll_filter_data($tablename,$id);
		$this->load->view('user/edit_form_for_leave_list',$data);
	}

    function show_edit_form_for_job_title()
	{
	$id =$_POST['id'];
	//echo $id;
		$tablename='hrms_job_title';
		$data['records'] = $this->admin_mod->getAll_filter_data($tablename,$id);

		//print_r($data);
		$this->load->view('user/edit_form_for_job_title',$data);
	}

    function show_edit_form_for_pay_grades()
	{
	$id =$_POST['id'];
	//echo $id;
		 $tablename='hrms_pay_grade';
		 $data['records'] = $this->admin_mod->getAll_filter_data($tablename,$id);

		//print_r($data);
		$this->load->view('user/edit_form_for_pay_grades',$data);
	}

    function show_edit_form_for_work_shift()
	{
	$id =$_POST['id'];
	//echo $id;
		 $tablename='hrms_work_shift';
		 $data['records'] = $this->admin_mod->getAll_filter_data($tablename,$id);

		//print_r($data);
		$this->load->view('user/edit_form_for_work_shift',$data);
	}

    function show_edit_form_for_user()
	{
	$id =$_POST['id'];
	//echo $id;
		 $tablename='hrms_user';
		 $tablename2='roles';
		 $data['records'] = $this->admin_mod->getAll_filter_data($tablename,$id);
                        $data['role'] = $this->admin_mod->getAll($tablename2);
		//print_r($data);
		$this->load->view('user/edit_form_for_add_employee',$data);
	}

    function show_edit_form_for_employee_details()
	{
	$id =$_POST['id'];
	//echo $id;
		 $tablename='hrms_employee';
		 // $data['employee_detail'] = $this->admin_mod->getAll_filter_data($tablename,$id);
		 

		//print_r($data);
		
		
		$records = $this->admin_mod->getAll_filter_data($tablename,$id);
		if($records)
		{
			foreach ($records as $row) {
				$employee_id=$row->employee_id;
				$tablename='hrms_emp_job_details';
		                         $data['records'] = $this->admin_mod->getAll_filter_data_for_employee_id($tablename,$employee_id);
			}
		}
		$this->load->view('user/edit_form_for_employee_details',$data);
	}

    function show_edit_form_for_employee()
	{
	$id =$_POST['id'];
	//echo $id;
		 $tablename='hrms_employee';
		 $data['records'] = $this->admin_mod->getAll_filter_data($tablename,$id);

		//print_r($data);
		$this->load->view('user/edit_form_for_added_employee',$data);
	}

    function show_edit_form_for_employee_for_job()
	{
	$id =$_POST['id'];
	//echo $id;
		 $tablename='hrms_employee';
		 $tablename2='hrms_job_title';
		 $tablename3='hrms_job_category';
		  $tablename4='hrms_employment_status';
		  $data['job_title'] = $this->admin_mod->getAll($tablename2);
                            $data['job_category'] = $this->admin_mod->getAll($tablename3);
                            $data['employeement_status'] = $this->admin_mod->getAll($tablename4);
                            $data['only_employee_id']=$this->admin_mod->getAll_filter_data($tablename,$id);
		 $records = $this->admin_mod->getAll_filter_data($tablename,$id);
		if($records)
		{
			foreach ($records as $row) {
				$employee_id=$row->employee_id;
				$tablename='hrms_emp_job_details';
		                         $data['records'] = $this->admin_mod->getAll_filter_data_for_employee_id($tablename,$employee_id);
			}
		}

		//print_r($data);
		$this->load->view('user/edit_form_for_added_employee_for_job',$data);
	}

    function show_edit_form_for_employment_status()
	{
	$id =$_POST['id'];
	//echo $id;
		 $tablename='hrms_employment_status';
		 $data['records'] = $this->admin_mod->getAll_filter_data($tablename,$id);

		//print_r($data);
		$this->load->view('user/edit_form_for_employment_status',$data);
	}

    function show_edit_form_for_company_location()
	{
	      $id =$_POST['id'];
	      $tablename='organisation_location';
		  $data['records'] = $this->admin_mod->getAll_filter_data($tablename,$id);
          $this->load->view('user/edit_form_for_company_location',$data);
	}

    function show_edit_form_for_company_info()
	{
		$tablename='organisation';
		  $data['records'] = $this->admin_mod->getAll($tablename);
          $this->load->view('user/edit_form_for_company_info',$data);
	}

    function show_edit_form_for_customer()
	{
	$id =$_POST['id'];
	//echo $id;
		 $tablename='hrms_customer';
		 $data['records'] = $this->admin_mod->getAll_filter_data($tablename,$id);

		//print_r($data);
		$this->load->view('user/edit_form_for_customer',$data);
	}

    function show_edit_form_for_job_candidate()
	{
	$id =$_POST['id'];
	//echo $id;
		 $tablename='hrms_job_candidate';
		 $data['records'] = $this->admin_mod->getAll_filter_data($tablename,$id);

		//print_r($data);
		$this->load->view('user/edit_form_for_job_candidate',$data);
	}


    function show_edit_form_for_project()
	{
	$id =$_POST['id'];
	//echo $id;
		 $tablename='hrms_project';
		 $data['records'] = $this->admin_mod->getAll_filter_data($tablename,$id);

		//print_r($data);
		$this->load->view('user/edit_form_for_project',$data);
	}

	function show_submit_data_for_updating_company_location()
	{
	$id =$_POST['id'];
    $add_location_name=$_POST['add_location_name_field'];
    $address1=$_POST['address1_field'];
    $address2=$_POST['address2_field'];
    $city=$_POST['city_field'];    
    $phone=trim($_POST['phone_field']);
    $fax=trim($_POST['fax_field']);
    $state=$_POST['state_field'];
    $country=$_POST['country_field'];
    $pincode=trim($_POST['pincode_field']);
    $no_of_employee=$_POST['no_of_employee_field'];
    // $note=$_POST['note_field'];
    // echo $id."<br>";
    // echo $add_location_name."<br>";echo $address1."<br>";echo $no_of_employee."<br>";echo $phone."<br>";
    // echo $fax."<br>";echo $address1."<br>";echo $address2."<br>";echo $city."<br>";echo $state."<br>";
    // echo $pincode."<br>";echo $country."<br>";echo $note."<br>";
	    if($this->admin_mod->update_company_location($id,$add_location_name,$no_of_employee,$phone,$fax,$address1,$address2,$city,$state,$pincode,$country))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Successfully Updated";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "No Changes made";
	    	?></div></center><?php
	    }
	}

	function show_submit_data_for_updating_company_info()
	{
	//$id =$_POST['id'];
    $organisation_name=$_POST['organisation_name'];
    $tax_id=$_POST['tax_id'];
    $no_of_employee=$_POST['no_of_employee'];
    $registration_no=$_POST['registration_no'];    
    $phone=$_POST['phone'];
    $fax=$_POST['fax'];
    $email=$_POST['email'];
    $address1=$_POST['address1'];
    $address2=$_POST['address2'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $zipcode=$_POST['zipcode'];
    $country=$_POST['country'];
    $note='NULL';
    // echo $organisation_name."<br>";echo $tax_id."<br>";echo $no_of_employee."<br>";echo $registration_no."<br>";echo $phone."<br>";
    // echo $fax."<br>";echo $email."<br>";echo $address1."<br>";echo $address2."<br>";echo $city."<br>";echo $state."<br>";
    // echo $zipcode."<br>";echo $country."<br>";echo $note."<br>";
	    if($this->admin_mod->update_company_info($organisation_name,$tax_id,$no_of_employee,$registration_no,$phone,$fax,$email,$address1,$address2,$city,$state,$zipcode,$country,$note))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Successfully Updated";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "No Changes made";
	    	?></div></center><?php
	    }
	}

	function show_submit_data_for_change_password()
	{
	//$id =$_POST['id'];
    $user_name=$_POST['user_name'];
    $old_password=md5($_POST['old_password']);
    $new_password=md5($_POST['new_password']);
    
    //echo $user_name."<br>";
    //echo $old_password."<br>";echo $new_password."<br>";
    // echo $fax."<br>";echo $address1."<br>";echo $address2."<br>";echo $city."<br>";echo $state."<br>";
    // echo $pincode."<br>";echo $country."<br>";echo $note."<br>";
	    if($this->admin_mod->change_password($user_name,$old_password,$new_password))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Successfully Updated";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "No Changes made";
	    	?></div></center><?php
	    }
	}

	function show_update_form_for_leave_summary()
	{
	$id =$_POST['id'];
	$leave_entitle =$_POST['leave_entitle'];
	$leave_scheduled =$_POST['leave_scheduled'];
	$leave_taken =$_POST['leave_taken'];
    //echo $id."<br>";echo $leave_entitle."<br>";echo $leave_scheduled."<br>";echo $leave_taken."<br>";
	    if($this->admin_mod->update_leave_summary($id,$leave_entitle,$leave_scheduled,$leave_taken))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Successfully Updated";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
	}

	function show_update_form_for_job_category()
	{
	$id =$_POST['id'];
	$job_category_name =$_POST['job_category_name'];

	    if($this->admin_mod->update_job_category($id,$job_category_name))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Successfully Updated";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
	}

	function show_update_form_for_leave_type()
	{
	$id =$_POST['id'];
	$leave_name =$_POST['leave_name'];
    $leave_id =$_POST['leave_id'];
    //echo $id."<br>";echo $leave_name."<br>";echo $leave_id."<br>";
	    if($this->admin_mod->update_leave_type($id,$leave_name,$leave_id))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Successfully Updated";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
	}

	function show_update_form_for_leave_list()
	{
	$id =$_POST['id'];
    $leave_list_comment =$_POST['leave_list_comment'];
    $status =$_POST['leave_list_action'];
    $formated_date_from=explode("-", $_POST['date_from']);
    $date_from = $formated_date_from[2]."-".$formated_date_from[1]."-".$formated_date_from[0];
    $formated_date_to=explode("-", $_POST['date_to']);
    $date_to = $formated_date_to[2]."-".$formated_date_to[1]."-".$formated_date_to[0];
    //echo $id."<br>";echo $date_from."<br>";echo $date_to."<br>";echo $leave_list_comment."<br>";echo $status."<br>";
	    if($this->admin_mod->update_leave_list($id,$date_from,$date_to,$status,$leave_list_comment))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Successfully Updated";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
	}

	function show_update_form_for_job_candidate()
	{
	$id =$_POST['id'];
	$comment_field =$_POST['comment_field'];
    //echo $id."<br>";echo $comment_field."<br>";echo $leave_id."<br>";
	    if($this->admin_mod->update_job_candidate($id,$comment_field))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Successfully Updated";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
	}

	function show_update_form_for_customer()
	{
	$id =$_POST['id'];
	$customer_id =$_POST['customer_id'];
	$customer_name =$_POST['customer_name'];
	$customer_address =$_POST['customer_address'];
	$customer_phone =$_POST['customer_phone'];
	$desc =$_POST['desc'];
   
	    if($this->admin_mod->update_customer($id,$customer_id,$customer_name,$desc,$customer_address,$customer_phone))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Successfully Updated";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
	}

	function show_update_form_for_project()
	{
	$id =$_POST['id'];
	$project_id=$_POST['projectid'];
	$customer_id =$_POST['customer_id'];
	$project_name =$_POST['projectname'];
	$desc =$_POST['desc'];
	$project_admin =$_POST['projectadmin'];
	$completed =$_POST['completed'];
   //echo $id."<br>";echo $project_id."<br>";echo $customer_id."<br>";echo $project_name."<br>";echo $desc."<br>";echo $project_admin."<br>";echo $completed."<br>";
		    if($this->admin_mod->update_project($id,$project_id,$customer_id,$project_name,$desc,$project_admin,$completed))
		    {
		    	?><center><div class="alert-success width_of_showing_message">
		    	<?php echo "Successfully Updated";
		    	?></div></center><?php
		    }
		    else
		    {
		    	?><center><div class="alert-error width_of_showing_message">
		    	<?php echo "Failed";
		    	?></div></center><?php
		    }
	}


	function show_update_form_for_job_title()
	{
	$id =$_POST['id'];
	$job_title_name_field =$_POST['job_title_name_field'];
	$job_description_field =$_POST['job_description_field'];
	$job_category_field =$_POST['job_category_field'];

    // echo $id."<br>".$job_title_name_field."<br>".$job_description_field."<br>".$job_category_field."<br>";	
   
	    if($this->admin_mod->update_job_title($id,$job_title_name_field,$job_description_field,$job_category_field))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Successfully Updated";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
	}

	function show_update_form_for_employment_status()
	{
	$id =$_POST['id'];
	$job_category_name =$_POST['job_category_name'];

	    if($this->admin_mod->update_employment_status($id,$job_category_name))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Successfully Updated";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
	}

	function show_update_form_for_education()
	{
	$id =$_POST['id'];
	$education_name_field =$_POST['education_name_field'];
    $education_desc_field =$_POST['education_desc_field'];
    //echo $id."<br>";echo $education_name_field."<br>";echo $education_desc_field."<br>";
	    if($this->admin_mod->update_education($id,$education_name_field,$education_desc_field))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Successfully Updated";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
	}

	function show_update_form_for_skill()
	{
	$id =$_POST['id'];
	$skill_name_field =$_POST['skill_name_field'];
    $skill_desc_field =$_POST['skill_desc_field'];
    //echo $id."<br>";echo $skill_name_field."<br>";echo $skill_desc_field."<br>";
	    if($this->admin_mod->update_skill($id,$skill_name_field,$skill_desc_field))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Successfully Updated";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
	}

	function show_update_form_for_license()
	{
	$id =$_POST['id'];
	$license_name_field =$_POST['license_name_field'];
    $license_desc_field =$_POST['license_desc_field'];
    //echo $id."<br>";echo $license_name_field."<br>";echo $license_desc_field."<br>";
	    if($this->admin_mod->update_license($id,$license_name_field,$license_desc_field))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Successfully Updated";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
	}

	function show_update_form_for_languages()
	{
	$id =$_POST['id'];
	$languages_name_field =$_POST['languages_name_field'];
    //echo $id."<br>";echo $languages_name_field."<br>";echo $languages_desc_field."<br>";
	    if($this->admin_mod->update_languages($id,$languages_name_field))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Successfully Updated";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
	}

	function show_update_form_for_pay_grade()
	{
	$id =$_POST['id'];
	$pay_grade_name =$_POST['pay_grade_name_field'];
	$min_salary_field =$_POST['min_salary_field'];
	$max_salary_field =$_POST['max_salary_field'];
   //echo $id."<br>";echo $pay_grade_name."<br>";echo $min_salary_field."<br>";echo $max_salary_field."<br>";
	    if($this->admin_mod->update_pay_grade($id,$pay_grade_name,$min_salary_field,$max_salary_field))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Successfully Updated";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
	}

	function show_update_form_for_work_shift()
	{
	$id =$_POST['id'];
	$work_shift_name =$_POST['work_shift_name'];
	$starting_time =$_POST['starting_time'];
	$ending_time =$_POST['ending_time'];
   //echo $id."<br>";echo $pay_grade_name."<br>";echo $min_salary_field."<br>";echo $max_salary_field."<br>";
	    if($this->admin_mod->update_work_shift($id,$work_shift_name,$starting_time,$ending_time))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Successfully Updated";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
	}

	function show_update_form_for_add_employee()
	{
	$id =$_POST['id'];
	$user_name =$_POST['user_name'];
	$user_role =$_POST['user_role'];
	$status =$_POST['status'];
	$work_shift =$_POST['work_shift'];
  // echo $id."<br>";echo $user_name."<br>";echo $user_role."<br>";echo $status."<br>";echo $work_shift."<br>";
	    if($this->admin_mod->update_add_employee($id,$user_name,$user_role,$status,$work_shift))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Successfully Updated";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
	}
	
	function show_update_form_for_added_employee()
	{
	$id =$_POST['id'];
	$employee_id =$_POST['employee_id'];
	$emp_firstname =$_POST['emp_firstname'];
	$emp_middlename =$_POST['emp_middlename'];
	$emp_lastname =$_POST['emp_lastname'];
   //echo $id."<br>";echo $employee_id."<br>";echo $emp_firstname."<br>";echo $emp_middlename."<br>";echo $emp_lastname."<br>";
	    if($this->admin_mod->update_added_employee($id,$employee_id,$emp_firstname,$emp_middlename,$emp_lastname))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Successfully Updated";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
	}

	function show_update_form_for_added_employee_for_job()
	{
	$emp_id =$_POST['emp_id'];
	$job_title =$_POST['job_title'];
	$job_specification =$_POST['job_specification'];
	$joined_date =$_POST['joined_date'];
	$sub_unit =$_POST['sub_unit'];
	$job_start_date =$_POST['job_start_date'];
	$job_category =$_POST['job_category'];
	$employeement_status =$_POST['employeement_status'];
	$location =$_POST['location'];
	$contract =$_POST['contract'];
	$job_end_date =$_POST['job_end_date'];

	$formated_date=explode("/", $joined_date);
	$joined_date = $formated_date[2]."-".$formated_date[1]."-".$formated_date[0];
	$formated_date=explode("/", $job_start_date);
	$job_start_date = $formated_date[2]."-".$formated_date[1]."-".$formated_date[0];
	$formated_date=explode("/", $job_end_date);
	$job_end_date = $formated_date[2]."-".$formated_date[1]."-".$formated_date[0];	
   // echo $emp_id."<br>";echo $job_title."<br>";echo $job_specification."<br>";echo $joined_date."<br>";echo $sub_unit."<br>";
   // echo $job_start_date."<br>";echo $job_category."<br>";echo $employeement_status."<br>";echo $location."<br>";echo $contract."<br>";
   //   echo $job_end_date."<br>";
     	    if($this->admin_mod->update_added_employee_for_job($emp_id,$job_title,$job_specification,$joined_date,$sub_unit,$job_start_date,$job_category,$employeement_status,$location,$contract,$job_end_date))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Successfully Updated";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
	}

	// function create_user()
	// {

	// 	$username=$this->input->post('username');
	//     $password=$this->input->post('password');
	//     $role_id=$this->input->post('role');
	//     if($this->admin_mod->check_exists_username_password($username,$password))
	//       {
 //            //$table='login';
	//         //$data['records'] = $this->admin_mod->getAll($table);
	//         $data['error']="Username already exist";
	//         $this->load->view('admin_pannel',$data);
	//       }
	//        // elseif (!$this->admin_mod->check_exists_username_password($username,$password))
	//        //  {
	//        // 	if($this->admin_mod->create_user($role_id,$username,$password))
	//        // 	   {
 //        //            echo "testing";
	//        // 	   }
	//        //  }
	//       else
	//       {
	//       	$table='bf_roles';
	//         $data['records'] = $this->admin_mod->getAll($table);
	//       	$this->load->view('create_user',$data);
	//       }
		      
	// }

   function delete_data_for_employment_status()
   {
   	$id =$_POST['id'];
   	$tablename='hrms_employment_status';


   	   if($this->admin_mod->delete_data($id,$tablename))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Deleted Successfully!";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
   }

   function delete_data_for_skill()
   {
   	$id =$_POST['id'];
   	$tablename='hrms_skill';


   	   if($this->admin_mod->delete_data($id,$tablename))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Deleted Successfully!";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
   }

   function delete_data_for_license()
   {
   	$id =$_POST['id'];
   	$tablename='hrms_license';


   	   if($this->admin_mod->delete_data($id,$tablename))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Deleted Successfully!";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
   }

   function delete_data_for_languages()
   {
   	$id =$_POST['id'];
   	$tablename='hrms_language';


   	   if($this->admin_mod->delete_data($id,$tablename))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Deleted Successfully!";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
   }

   function delete_data_for_education()
   {
   	$id =$_POST['id'];
   	$tablename='hrms_education';


   	   if($this->admin_mod->delete_data($id,$tablename))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Deleted Successfully!";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
   }

    function delete_data_for_job_title()
	{
   	$id =$_POST['id'];
   	$tablename='hrms_job_title';


   	   if($this->admin_mod->delete_data($id,$tablename))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Deleted Successfully!";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
	}

	function delete_data_for_organisation_location()
	{
   	$id =$_POST['id'];
   	$tablename='organisation_location';


   	   if($this->admin_mod->delete_data($id,$tablename))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Deleted Successfully!";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
	}

    function delete_data_for_job_candidate()
	{
   	$id =$_POST['id'];
   	$tablename='hrms_job_candidate';


   	   if($this->admin_mod->delete_data($id,$tablename))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Deleted Successfully!";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
	}

	function delete_data_for_pay_grades()
	{
   	$id =$_POST['id'];
   	$tablename='hrms_pay_grade';


   	   if($this->admin_mod->delete_data($id,$tablename))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Deleted Successfully!";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
	}

    function delete_data_for_job_category()
	{
   	$id =$_POST['id'];
   	$tablename='hrms_job_category';


   	   if($this->admin_mod->delete_data($id,$tablename))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Deleted Successfully!";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
	}

    function delete_data_for_work_shift()
	{
   	$id =$_POST['id'];
   	$tablename='hrms_work_shift';


   	   if($this->admin_mod->delete_data($id,$tablename))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Deleted Successfully!";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
	}

	function delete_data_for_user()
	{
   	$id =$_POST['id'];
//echo $id;
   	$tablename='hrms_user';
   	$tablename2='hrms_employee';
   	//updating user='No' in hrms_employee
    $employee_id=$this->admin_mod->find_data($id,$tablename);
    //echo $employee_id;
   	    if($this->admin_mod->update_user_or_not($employee_id,$tablename2))
	    {

		   	   if($this->admin_mod->delete_data($id,$tablename))
			    {
			    	?> <center><div class="alert-success width_of_showing_message">
			      	<?php echo "Deleted Successfully!";
			    	?> </div> </center><?php
			    }
			    else
			    {
			    	?> <center><div class="alert-error width_of_showing_message">
			     	<?php echo "Failed";
			    	?> </div> </center><?php
			    }
	   
	     }
	    else
	    {
	    	?> <center><div class="alert-error width_of_showing_message">
	     	<?php echo "Failed";
	     	?> </div> </center><?php
	     }
	}


	function delete_data_for_employee()
	{
   	$id =$_POST['id'];
   	$tablename='hrms_employee';

   	$employee_id =$_POST['employee_id'];
   	$tablename2='hrms_leave';

    //echo $id."<br>";echo $employee_id."<br>";
   	   if($this->admin_mod->delete_data_for_leave_summary($employee_id,$tablename2))
	    {
	   	   if($this->admin_mod->delete_data($id,$tablename))
		    {
		    	?><center><div class="alert-success width_of_showing_message">
		    	<?php echo "Deleted Successfully!";
		    	?></div></center><?php
		    }
		    else
		    {
		    	?><center><div class="alert-error width_of_showing_message">
		    	<?php echo "Failed";
		    	?></div></center><?php
		    }
	    }   
	}

	function delete_data_for_leave_summary()
	{
   	$employee_id =$_POST['employee_id'];
   	$tablename='hrms_leave';


   	   if($this->admin_mod->delete_data_for_leave_summary($employee_id,$tablename))
	    {
	    	return true;
	    }
	    else
	    {
	    	return false;
	    }
	}

    function delete_data_for_customer()
	{
   	$id =$_POST['id'];
   	$tablename='hrms_customer';


   	   if($this->admin_mod->delete_data($id,$tablename))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Deleted Successfully!";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
	}


    function delete_data_for_project()
	{
   	$id =$_POST['id'];
   	$tablename='hrms_project';


   	   if($this->admin_mod->delete_data($id,$tablename))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Deleted Successfully!";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
	}

    function delete_data_for_leave_type()
	{
   	$id =$_POST['id'];
   	$tablename='hrms_leavetype';


   	   if($this->admin_mod->delete_data($id,$tablename))
	    {
	    	?><center><div class="alert-success width_of_showing_message">
	    	<?php echo "Deleted Successfully!";
	    	?></div></center><?php
	    }
	    else
	    {
	    	?><center><div class="alert-error width_of_showing_message">
	    	<?php echo "Failed";
	    	?></div></center><?php
	    }
	}

	function personal_detail()
	{
		$this->load->view('personal_detail');
	}

//code for uploading image
		function image_upload()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= 0;
		$config['max_width']  = 0;
		$config['max_height']  = 0;
		//echo $config['upload_path'];

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());

			$this->load->view('upload_success');
		}
	}





}//class end
?>