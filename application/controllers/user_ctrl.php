<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class User_ctrl extends CI_Controller {
	function  __construct()
	{
		parent::__construct();
    $this->load->helper(array('form', 'url'));
    $this->load->library('image_lib');
		$this->load->model('user_model','',TRUE);

    $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
    $this->output->set_header("Pragma: no-cache");


    if ( ! $this->session->userdata('logged_in') ) redirect('welcome');
	}


//-------------------------------------------------------------- Employee profile View ---------------------/
  function start()
  {
    $get_id = $this->session->userdata('logged_in');
    $emp_id =  $get_id['emp_id'];
    $emp_data = array();
    $emp_data['emp_id'] = $emp_id;


      $this->load->view('user/user_pannel',$emp_data);
  }


	function show_emp_personal_view_ctrl()
  {
    $get_id = $this->session->userdata('logged_in');
    $emp_id =  $get_id['emp_id'];

    $result = $this->user_model->getall($emp_id);

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
                'emp_nationality' => $row->coun_code,
                'emp_military_service' => $row->emp_military_service,
                'emp_pancard_num' => $row->emp_pancard_num,
                'emp_dri_lice_num' => $row->emp_dri_lice_num,
                'emp_dri_lice_exp_date' => $row->emp_dri_lice_exp_date,
                'emp_nick_name' => $row->emp_nick_name
            );
        }
        if(!empty($emp_data['emp_dob']))
        {
            $dob = $emp_data['emp_dob'];
            $date = explode("-", $dob);
            $dob = $date[2]."/".$date[1]."/".$date[0];
            $emp_data['emp_dob'] = $dob;
        }
        if(!empty($emp_data['emp_dri_lice_exp_date']))
        {
            $dob = $emp_data['emp_dri_lice_exp_date'];
            $date = explode("-", $dob);
            $dob = $date[2]."/".$date[1]."/".$date[0];
            $emp_data['emp_dri_lice_exp_date'] = $dob;
        }
          $emp_data['image'] = $this->user_model->getall_employee_image($emp_id);
          $this->load->view('user/emp_personal_view',$emp_data);
        }
        else
        {
          echo "Invalid Entry";
        }

  }


  function emp_data()
	{
      $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];
      $emp_data = array();

      $emp_data['emp_id'] = $emp_id;

      $this->load->view('user/view_emp_personal_data',$emp_data);

	}

//------------------------------------------------------------ Employee Profile Edit ------------------ /
	function emp_profile_edit()
	{
    $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];
    $get_emp_data = $this->user_model->getall($emp_id);

        if($get_emp_data)
        {
          $emp_data = array();
          foreach($get_emp_data->result() as $row)
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
                    'emp_nationality' => $row->coun_code,
                    'emp_military_service' => $row->emp_military_service,
                'emp_pancard_num' => $row->emp_pancard_num,
                'emp_dri_lice_num' => $row->emp_dri_lice_num,
                'emp_dri_lice_exp_date' => $row->emp_dri_lice_exp_date,
                'emp_nick_name' => $row->emp_nick_name
              );
          }
        }
        if(!empty($emp_data['emp_dob']))
        {
            $dob = $emp_data['emp_dob'];
            $date = explode("-", $dob);
            $dob = $date[2]."/".$date[1]."/".$date[0];
            $emp_data['emp_dob'] = $dob;
        }
        if(!empty($emp_data['emp_dri_lice_exp_date']))
        {
            $dob = $emp_data['emp_dri_lice_exp_date'];
            $date = explode("-", $dob);
            $dob = $date[2]."/".$date[1]."/".$date[0];
            $emp_data['emp_dri_lice_exp_date'] = $dob;
        }

          $table_name = 'hrms_country';
          $data['records'] = $this->user_model->getall_from_table($table_name);
          $this->load->view('user/emp_profile_edit',$emp_data+$data);
	}


  function emp_profile_update()
  {
    $get_id = $this->session->userdata('logged_in');
    $emp_id =  $get_id['emp_id'];

      $fname = $this->input->post('fname');
      $mname = $this->input->post('mname');
      $lname = $this->input->post('lname');
      $dob = $this->input->post('emp_dob');
      $gender = $this->input->post('gender');
      $marital = $this->input->post('marital');
      $clist = $this->input->post('clist');
      $nick_name = $this->input->post('nick_name');
      $dl_num = $this->input->post('dl_num');
      $military_service = $this->input->post('military_service');
      $pan_number = $this->input->post('pan_number');
      $dl_exp_date = $this->input->post('dl_exp_date');

      if(!empty($dob))
      {
            $date = explode("/", $dob);
            $dob = $date[2]."-".$date[1]."-".$date[0];
      } 
      if(!empty($dl_exp_date))
      {
            $date = explode("/", $dl_exp_date);
            $dl_exp_date = $date[2]."-".$date[1]."-".$date[0];
      } 

        $result = $this->user_model->emp_update($emp_id,$fname,$mname,$lname,$gender,$dob,$marital,$clist,$nick_name,$dl_num,$military_service,$pan_number,$dl_exp_date);
        $this->emp_data();
  }

//---------------------------------------------------------------- Employee Contact View ------------------/
  function emp_contact_view_ctrl()
  {
     $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];
      $emp_data = array();

      $emp_data['emp_id'] = $emp_id;

    $this->load->view('user/view_emp_contact',$emp_data);
  }

  function show_emp_contact_ctrl()
  {
      $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];
      $emp_num = $get_id['emp_num'];

      $result = $this->user_model->getall($emp_id);
      $emp_data = array();
          foreach($result->result() as $row)
          {
              $emp_data = array
            (
                'street1' => $row->emp_street1,
                'street2' => $row->emp_street2,
                'city' => $row->city_code,
                'state' => $row->provin_code,
                'postal' => $row->emp_zipcode,
                'hometele' => $row->emp_hm_telephone,
                'mobile' => $row->emp_mobile,
                'wrktele' => $row->emp_work_telephone,
                'wmail' => $row->emp_work_email,
                'omail' => $row->emp_other_email
            );
          }
        $emp_data['emp_num'] = $emp_num;
        $emp_data['emp_id'] = $emp_id;

         $this->load->view('user/show_emp_contact',$emp_data);  
  }

  function emp_contact_edit_ctrl()
  {
   
        $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];
      $emp_num = $get_id['emp_num'];


      $result = $this->user_model->getall($emp_id);

        if($result)
        {
          $emp_data = array();
          foreach($result->result() as $row)
          {
              $emp_data = array
            (
                'street1' => $row->emp_street1,
                'street2' => $row->emp_street2,
                'city' => $row->city_code,
                'state' => $row->provin_code,
                'postal' => $row->emp_zipcode,
                'hometele' => $row->emp_hm_telephone,
                'mobile' => $row->emp_mobile,
                'wrktele' => $row->emp_work_telephone,
                'wmail' => $row->emp_work_email,
                'omail' => $row->emp_other_email
              );
          }
      }
      $this->load->view('user/emp_contact_update',$emp_data);
  }

    function emp_contact_update_ctrl()
  {

        $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];
      $emp_num = $get_id['emp_num'];


       $street1 = $this->input->post('street1');
       $street2 = $this->input->post('street2');
       $city = $this->input->post('city');
       $state = $this->input->post('state');
       $postal = $this->input->post('postal');
       $hometele = $this->input->post('hometele');
       $mobile = $this->input->post('mobile');
       $wrktele = $this->input->post('wrktele');
       $wmail = $this->input->post('wmail');
       $omail = $this->input->post('omail');

       $result = $this->user_model->contact_update_mod($emp_id,$street1,$street2,$city,$state,$postal,$hometele,$mobile,$wrktele,$wmail,$omail);
      $this->emp_contact_view_ctrl();
  }

//------------------------------------------------------------  Employee Emergency Contact view -------- / 
  function emp_emrg_contact_view_ctrl()
  {

    $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];
      $emp_data = array();

         $emp_data['emp_id'] = $emp_id;

        $this->load->view('user/emp_emrg_contact_view',$emp_data);

  }
 
 
  function show_emp_emrg_contact()
    {
     $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];
      $result['records'] = $this->user_model->getall_emergency_contact_mod($emp_id);
      $emp_data = array();
     $emp_data['emp_id'] = $emp_id;
     $this->load->view('user/show_emp_emrg_contact',$emp_data+$result);
    }

    function emp_emrg_add_row_ctrl()
    {
      $this->load->view('user/add_emp_emrg_contact');
    }

 //-------------------------------------------------------  Employee Emergency Contact Delete ctrl --------- /
  function emp_emrg_contact_del_ctrl()
  {
    $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];

      $emp_exp_row_id = $_POST['emp_exp_id'];

      $result = $this->user_model->emp_emrg_del_mod($emp_id,$emp_exp_row_id);
      $this->emp_emrg_contact_view_ctrl();

  }

//-------------------------------------------------------  Employee Emergency Contact Insert ctrl --------- / 
    function emp_emrg_contact_insert_ctrl()
  {
    $get_id = $this->session->userdata('logged_in');
    $emp_id =  $get_id['emp_id'];
    $emp_num = $get_id['emp_num'];

    $emrg_name = $this->input->post('emrg_name');
    $emrg_relationship = $this->input->post('emrg_relationship');
    $emrg_mob_num = $this->input->post('emrg_mob_num');
    $emrg_home_num = $this->input->post('emrg_home_num');
    $emrg_work_num = $this->input->post('emrg_work_num');

    $result = $this->user_model->emrg_contact_insert_mod($emp_id,$emp_num,$emrg_name,$emrg_relationship,$emrg_mob_num,
      $emrg_home_num,$emrg_work_num);
      $this->emp_emrg_contact_view_ctrl();
  }

//  ------------------------------------------------------ Employee Dependent View ctrl------------------- /
  function emp_dependent_view_ctrl()
    {
      $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];
      $emp_data = array();


      $emp_data['emp_id'] = $emp_id;

      $this->load->view('user/view_emp_dependent',$emp_data);

    }

    function emp_dependent_add_row_ctrl()
    {
      $this->load->view('user/add_emp_dependent_data');
    }

    //  ------------------------------------------------------ Employee Dependent Delete ctrl------------------- /
    function emp_dependent_del_ctrl()
    {
      $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];

      $emp_exp_row_id = $_POST['emp_exp_id'];

      $result = $this->user_model->emp_dependent_del_mod($emp_id,$emp_exp_row_id);
      $this->emp_dependent_view_ctrl();
    }
    //  ------------------------------------------------------ Employee Dependent Show ctrl------------------- /
  function show_emp_dependents_detail()
  {
    $get_id = $this->session->userdata('logged_in');
    $emp_id =  $get_id['emp_id'];
    $emp_data = array();

    $result['records'] = $this->user_model->getall_dependent_mod($emp_id);
    $emp_data['emp_id'] = $emp_id;
    $this->load->view('user/show_emp_dependent_data',$emp_data+$result);
  }

  //  ------------------------------------------------------ Employee Dependent Insert ctrl ------------------- /
  function emp_dependent_insert_ctrl()
  {
    $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];
      $emp_num = $get_id['emp_num'];

    $dependent_name = $this->input->post('dependent_name');
    $dependent_relationship = $this->input->post('dependent_relationship');
    $dependent_dob = $this->input->post('dependent_dob');
    
    if(!empty($dependent_dob))
      {
            $date = explode("/", $dependent_dob);
            $dependent_dob = $date[2]."-".$date[1]."-".$date[0];
      }

    $result = $this->user_model->dependent_insert_mod($emp_id,$emp_num,$dependent_name,
      $dependent_relationship,$dependent_dob);
    $this->emp_dependent_view_ctrl();
  }

// ----------------------------------------------------------- Employee Immigration View ------------- /
    function emp_immigration_view_ctrl()
    {

      $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];
      $emp_data = array();


      $emp_data['emp_id'] = $emp_id;

      $this->load->view('user/view_emp_immigration',$emp_data);
    }

function show_emp_immigration()
{
  $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];
      $emp_num = $get_id['emp_num'];

      $result = $this->user_model->getall_immigration_mod($emp_id);
      $emp_data = array();

      if($result != FALSE)
      {
      foreach($result->result() as $row)
          {
              $emp_data = array
            (
              'im_document' => $row->doc_type,
              'im_numbr' => $row->passport_num,
              'im_issue_date' => $row->issued_date,
              'im_expiry_date' => $row->expiry_date,
              'im_eligible' => $row->eligible_status,
              'im_issuedby' => $row->issued_country,
              'im_review_date' => $row->review_date,
              'im_comment' => $row->comments
              );
          }
            $dt_issue = $emp_data['im_issue_date'];
            $date = explode("-", $dt_issue);
            $dt_issue = $date[2]."/".$date[1]."/".$date[0];
            $emp_data['im_issue_date'] = $dt_issue;

            $dt_expiry = $emp_data['im_expiry_date'];
            $date = explode("-", $dt_expiry);
            $dt_expiry = $date[2]."/".$date[1]."/".$date[0];
            $emp_data['im_expiry_date'] = $dt_expiry;

            $dt_review = $emp_data['im_review_date'];
            $date = explode("-", $dt_review);
            $dt_review = $date[2]."/".$date[1]."/".$date[0];
            $emp_data['im_review_date'] = $dt_review;

          $emp_data['emp_num'] = $emp_num;
          $emp_data['emp_id'] = $emp_id;
    $this->load->view('user/show_emp_immigration_data_updated',$emp_data);
  }
  else
  {
    $table_name = 'hrms_country';
    $data['records'] = $this->user_model->getall_from_table($table_name);
    $this->load->view('user/emp_immigration_new',$data);
  }
  }




// ----------------------------------------------------------- Employee Immigration Edit Ctrl ------ /
  function emp_immigration_edit_ctrl()
  {
    $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];
      $emp_num = $get_id['emp_num'];


      $result = $this->user_model->getall_immigration_mod($emp_id);
      $emp_data = array();
        foreach($result->result() as $row)
          {
              $emp_data = array
            (
              'im_document' => $row->doc_type,
              'im_numbr' => $row->passport_num,
              'im_issue_date' => $row->issued_date,
              'im_expiry_date' => $row->expiry_date,
              'im_eligible' => $row->eligible_status,
              'im_issuedby' => $row->issued_country,
              'im_review_date' => $row->review_date,
              'im_comment' => $row->comments
              );
          }
            $dt_issue = $emp_data['im_issue_date'];
            $date = explode("-", $dt_issue);
            $dt_issue = $date[2]."/".$date[1]."/".$date[0];
            $emp_data['im_issue_date'] = $dt_issue;

            $dt_expiry = $emp_data['im_expiry_date'];
            $date = explode("-", $dt_expiry);
            $dt_expiry = $date[2]."/".$date[1]."/".$date[0];
            $emp_data['im_expiry_date'] = $dt_expiry;

            $dt_review = $emp_data['im_review_date'];
            $date = explode("-", $dt_review);
            $dt_review = $date[2]."/".$date[1]."/".$date[0];
            $emp_data['im_review_date'] = $dt_review;

          
          $emp_data['emp_num'] = $emp_num;
          $emp_data['emp_id'] = $emp_id;
          $table_name = 'hrms_country';
          $data['records'] = $this->user_model->getall_from_table($table_name);
          $this->load->view('user/emp_immigration_edit',$emp_data+$data);
  }


  // ------------------------------------------------------ Employee Immigration Update Ctrl ------------- /
    function emp_immigration_insert_ctrl()
    {
      $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];
      $emp_num = $get_id['emp_num'];

        $document_name = $this->input->post('document_name');
        $im_numbr = $this->input->post('im_numbr');
        $im_issue_date = $this->input->post('im_issue_date');
        $im_expiry_date = $this->input->post('im_expiry_date');
        $im_eligible = $this->input->post('im_eligible');
        $im_issuedby = $this->input->post('im_issuedby');
        $im_review_date = $this->input->post('im_review_date');
        $im_comment = $this->input->post('im_comment');

        if(!empty($im_issue_date))
        {
            $date = explode("/", $im_issue_date);
            $im_issue_date = $date[2]."-".$date[1]."-".$date[0];
        }
        if(!empty($im_expiry_date))
        {
            $date = explode("/", $im_expiry_date);
            $im_expiry_date = $date[2]."-".$date[1]."-".$date[0];
        }
        if(!empty($im_review_date))
        {
            $date = explode("/", $im_review_date);
            $im_review_date = $date[2]."-".$date[1]."-".$date[0];
        } 

          $result = $this->user_model->immigration_insert_mod($emp_num,$emp_id,$document_name,$im_numbr,$im_issue_date,$im_expiry_date,
          $im_eligible,$im_issuedby,$im_review_date,$im_comment);

       $this->emp_immigration_view_ctrl();
    }

    function emp_immigration_update_ctrl()
    {
      $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];
      $emp_num = $get_id['emp_num'];

        $document_name = $this->input->post('document_name');
        $im_numbr = $this->input->post('im_numbr');
        $im_issue_date = $this->input->post('im_issue_date');
        $im_expiry_date = $this->input->post('im_expiry_date');
        $im_eligible = $this->input->post('im_eligible');
        $im_issuedby = $this->input->post('im_issuedby');
        $im_review_date = $this->input->post('im_review_date');
        $im_comment = $this->input->post('im_comment');

        if(!empty($im_issue_date))
        {
            $date = explode("/", $im_issue_date);
            $im_issue_date = $date[2]."-".$date[1]."-".$date[0];
        }
        if(!empty($im_expiry_date))
        {
            $date = explode("/", $im_expiry_date);
            $im_expiry_date = $date[2]."-".$date[1]."-".$date[0];
        }
        if(!empty($im_review_date))
        {
            $date = explode("/", $im_review_date);
            $im_review_date = $date[2]."-".$date[1]."-".$date[0];
        } 

          $result = $this->user_model->immigration_update_mod($emp_id,$document_name,$im_numbr,$im_issue_date,$im_expiry_date,
          $im_eligible,$im_issuedby,$im_review_date,$im_comment);
        $this->emp_immigration_view_ctrl();
    }


// ----------------------------------------------------------- Employee Job details View ------------- /
    function emp_job_view_ctrl()
    {
      $this->load->view('user/view_emp_job');
    }

    function show_job_data_ctrl()
    {
      $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];

      $emp_data['job_details'] = $this->user_model->getall_employee_job_details($emp_id);
      $emp_data['report_to_details'] = $this->user_model->getall_emp_report_to_mod($emp_id);

      $this->load->view('user/emp_job_view',$emp_data);
    }
  // ---------------------------------------------------- Employee qualification view ctrl ---- /  

    function emp_qualification_view_ctrl()
    {
      $this->load->view('user/view_emp_qualification');
    }

    function show_emp_qualification()
    {
     $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];

      $result['education'] = $this->user_model->getall_emp_education_mod($emp_id);
      $result['skills'] = $this->user_model->getall_emp_skills_mod($emp_id);
      $result['languages'] = $this->user_model->getall_emp_languages_mod($emp_id);

     $this->load->view('user/show_emp_qualification',$result);
    }

  // ---------------------------------------------------- Employee Qualification Add ctrl ---- /  
    function emp_edu_add_row_ctrl()
    {
      $this->load->view('user/add_emp_qualification_education');
    }

    function emp_skill_add_row_ctrl()
    {
      $this->load->view('user/add_emp_qualification_skills');
    }

    function emp_lang_add_row_ctrl()
    {
      $this->load->view('user/add_emp_qualification_languages');
    }

  // ---------------------------------------------------- Employee Qualification Insert ctrl ---- /  
    function emp_edu_insert_ctrl()
    {
      $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];
      $emp_num = $get_id['emp_num'];
      $edu_level = $this->input->post('edu_level');
      $edu_university = $this->input->post('edu_university');
      $edu_year = $this->input->post('edu_year');
      $edu_score = $this->input->post('edu_score');
      $edu_specilization = $this->input->post('edu_specilization');

      $result = $this->user_model->education_insert_mod($emp_id,$emp_num,$edu_level,$edu_university,
        $edu_year,$edu_score,$edu_specilization);
      $this->emp_qualification_view_ctrl();
    }

    function emp_lang_insert_ctrl()
    {
      $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];
      $emp_num = $get_id['emp_num'];

      $language = $this->input->post('language');
      $read = $this->input->post('read');
      $write = $this->input->post('write');
      $speak = $this->input->post('speak');

      $result = $this->user_model->languages_insert_mod($emp_id,$emp_num,$language,$read,$write,$speak);
      $this->emp_qualification_view_ctrl();
    }

    function emp_skill_insert_ctrl()
    {
      $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];
      $emp_num = $get_id['emp_num'];

      $skill = $this->input->post('skill_field');
      $experience = $this->input->post('experience');
      $skill_description = $this->input->post('skill_description');

      $result = $this->user_model->skill_insert_mod($emp_id,$emp_num,$skill,$experience,$skill_description);
      $this->emp_qualification_view_ctrl();
    }

  // ---------------------------------------------------- Employee Qualification Delete ctrl ---- /  
    function emp_edu_del_ctrl()
    {
      $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];

      $emp_edu_row_id = $_POST['edu_row_id'];

      $result = $this->user_model->edu_del_mod($emp_id,$emp_edu_row_id);
      $this->emp_qualification_view_ctrl();
    }

    function emp_lang_del_ctrl()
    {
      $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];

      $emp_lang_row_id = $_POST['lang_row_id'];

      $result = $this->user_model->lang_del_mod($emp_id,$emp_lang_row_id);
      $this->emp_qualification_view_ctrl();
    }

    function emp_skill_del_ctrl()
    {
      $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];

      $emp_skill_row_id = $_POST['skill_row_id'];

      $result = $this->user_model->skill_del_mod($emp_id,$emp_skill_row_id);
      $this->emp_qualification_view_ctrl();
    }

  // ---------------------------------------------------- Employee Work Experience view ctrl ---- /  
    function emp_work_experience_view_ctrl()
    {
      $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];
      $emp_num = $get_id['emp_num'];
      $emp_data = array();

         $emp_data['emp_id'] = $emp_id; 

        $this->load->view('user/view_emp_work_experience',$emp_data);     
    }

    function show_emp_work_experience()
    {
     $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];
      $result['records'] = $this->user_model->getall_emp_work_experience_mod($emp_id);
      $emp_data = array();
     $emp_data['emp_id'] = $emp_id;
     $this->load->view('user/show_emp_work_experience_updated',$emp_data+$result);
    }

    function emp_work_experience_add_row_ctrl()
    {
      $this->load->view('user/add_emp_work_experience');      
    }
    
  // ----------------------------------------------------- Employee Work Experince Update Ctrl ------------- /

    function emp_work_experience_insert_ctrl()
    {
      $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];

      $work_exp_company_name = $this->input->post('work_exp_company_name');
      $work_exp_job_title = $this->input->post('work_exp_job_title');
      $work_exp_from_date = $this->input->post('work_exp_from_date');
      $work_exp_to_date = $this->input->post('work_exp_to_date');
      $work_exp_comment = $this->input->post('work_exp_comment');

      if(!empty($work_exp_from_date))
        {
            $date = explode("/", $work_exp_from_date);
            $work_exp_from_date = $date[2]."-".$date[1]."-".$date[0];
        }
        if(!empty($work_exp_to_date))
        {
            $date = explode("/", $work_exp_to_date);
            $work_exp_to_date = $date[2]."-".$date[1]."-".$date[0];
        }

        $result = $this->user_model->work_exp_insert_mod($emp_id,$work_exp_company_name,
          $work_exp_job_title,$work_exp_from_date,$work_exp_to_date,$work_exp_comment);
        $this->emp_work_experience_view_ctrl();
    }
 // ----------------------------------------------------- Employee Work Experince Delete Ctrl ------------- /
    function emp_work_experience_del_ctrl()
    {
      $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];

      $emp_exp_row_id = $_POST['emp_exp_id'];

      $result = $this->user_model->work_exp_del_mod($emp_id,$emp_exp_row_id);
      $this->emp_work_experience_view_ctrl();
    }

 // ----------------------------------------------------- Employee Leave View Ctrl ------------- /

    function emp_leave_view()
    {
      $this->load->view('user/view_emp_leave');
    }

    function show_emp_leave()
    {
      $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];
      $emp_num = $get_id['emp_num'];

 
      $emp_data['emp_num'] = $emp_num;
      $emp_data['emp_id'] = $emp_id;
      $emp_data['leave_type'] = $this->user_model->getall_leave_type_mod();
      $emp_data['leave_list'] = $this->user_model->getall_leave_list($emp_id);

        $this->load->view('user/emp_leave_view',$emp_data);
    }

 // ----------------------------------------------------- Employee Leave Apply Ctrl ------------- /  
    function leave_apply()
    {
      $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];
      $emp_num = $get_id['emp_num'];

      $apply_date = $this->input->post('apply_date');
      $leave_type = $this->input->post('leave_type');
      $date_from = $this->input->post('date_from');
      $date_to = $this->input->post('date_to');


            $date = explode("/", $apply_date);
            $apply_date = $date[2]."-".$date[1]."-".$date[0];
      
           $date = explode("/", $date_from);
            $date_from = $date[2]."-".$date[1]."-".$date[0];
            $date = explode("/", $date_to);
            $date_to = $date[2]."-".$date[1]."-".$date[0];

       //echo $apply_date."<br>".$leave_type."<br>".$date_from."<br>".$date_to;

      $result = $this->user_model->apply_leave_mod($emp_id,$apply_date,$leave_type,$date_from,$date_to);
      $this->start();      
     
    }

// ------------------------  Image upload ctrl ------------ /

  function do_upload()
  {
     $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];
      $emp_num = $get_id['emp_num'];

    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = '2048';
    $config['max_width']  = '1024';
    $config['max_height']  = '768';


    $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
          $error = array('error' => $this->upload->display_errors());
          //$this->show_image_error($error);
          $get_id = $this->session->userdata('logged_in');
          $emp_id =  $get_id['emp_id'];
           $emp_data = array();
           $emp_data['emp_id'] = $emp_id;
             $this->load->view('user/user_pannel',$emp_data+$error);
        }
        else
        {
          $data = array('upload_data' => $this->upload->data());
          $file_data = $this->upload->data();
          $data['img'] =$file_data['file_name'] ;
          $hi = $data['img'];
          
          $result = $this->user_model->image_insert_mod($emp_id,$emp_num,$hi);
          $data['image'] = $this->user_model->getall_employee_image($emp_id);
          $this->show_emp_data_with_image($data);

        }
  }
/* Show error for image*/
  // function show_image_error($error)
  //   {
  //   $get_id = $this->session->userdata('logged_in');
  //   $emp_id =  $get_id['emp_id'];

  //   $result = $this->user_model->getall($emp_id);

  //     if($result)
  //     {
  //       $emp_data = array();
  //       foreach($result->result() as $row)
  //       {
  //           $emp_data = array
  //           (
  //             'emp_num' => $row->id,
  //               'emp_id' => $row->employee_id,
  //               'emp_first_name' => $row->emp_first_name,
  //               'emp_middle_name' => $row->emp_middle_name,
  //               'emp_last_name' => $row->emp_last_name,
  //               'emp_gender' => $row->emp_gender,
  //               'emp_dob' => $row->emp_birthday,
  //               'emp_marital_status' => $row->emp_marital_status,
  //               'emp_nationality' => $row->coun_code,
  //               'emp_military_service' => $row->emp_military_service,
  //               'emp_pancard_num' => $row->emp_pancard_num,
  //               'emp_dri_lice_num' => $row->emp_dri_lice_num,
  //               'emp_dri_lice_exp_date' => $row->emp_dri_lice_exp_date,
  //               'emp_nick_name' => $row->emp_nick_name
  //           );
  //       }
  //       if(!empty($emp_data['emp_dob']))
  //       {
  //           $dob = $emp_data['emp_dob'];
  //           $date = explode("-", $dob);
  //           $dob = $date[2]."/".$date[1]."/".$date[0];
  //           $emp_data['emp_dob'] = $dob;
  //       }
  //         $emp_data['include'] = 'user/emp_personal_view';
  //           $this->load->vars($emp_data);
  //         $this->load->view('user/user_pannel',$emp_data+$error);
  //     }
  //     else
  //     {
  //         echo "Invalid Entry";
  //     }
  //   }




/* show image with data*/
    function show_emp_data_with_image($data)
    {
    $get_id = $this->session->userdata('logged_in');
    $emp_id =  $get_id['emp_id'];

    $result = $this->user_model->getall($emp_id);

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
                'emp_nationality' => $row->coun_code,
                'emp_military_service' => $row->emp_military_service,
                'emp_pancard_num' => $row->emp_pancard_num,
                'emp_dri_lice_num' => $row->emp_dri_lice_num,
                'emp_dri_lice_exp_date' => $row->emp_dri_lice_exp_date,
                'emp_nick_name' => $row->emp_nick_name
            );
        }
        if(!empty($emp_data['emp_dob']))
        {
            $dob = $emp_data['emp_dob'];
            $date = explode("-", $dob);
            $dob = $date[2]."/".$date[1]."/".$date[0];
            $emp_data['emp_dob'] = $dob;
        }
          $emp_data['include'] = 'user/emp_personal_view';
            $this->load->vars($emp_data);
          $this->load->view('user/user_pannel',$emp_data+$data);
      }
      else
      {
          echo "Invalid Entry";
      }
    }

    function show_image_from_database()
    {
      $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];
      $data['image'] = $this->user_model->getall_employee_image($emp_id);
      //$emp_data['include'] = 'user/show_emp_image';
      $this->load->view('user/show_emp_image',$data);
    }

/**************** Password Change ******************/


      function view_change_password()
      {
        $this->load->view('user/view_emp_change_password');
      }
      function show_change_password()
      {
        $this->load->view('user/show_emp_change_password');
      }

      function show_submit_data_for_change_password()
      {
        $old_password=md5($_POST['old_password']);
        $new_password=md5($_POST['new_password']);
    
      if($this->user_model->change_password($old_password,$new_password))
      {
        ?><div class="alert-success">
        <?php echo "Successfully Updated";
        ?></div><?php
        // $this->start();
      }
      else
      {
        ?><div class="alert-error">
        <?php echo "No Changes made";
        ?></div><?php
      }
    }

    function timesheet()
    {
      $get_id = $this->session->userdata('logged_in');
      $emp_id =  $get_id['emp_id'];
      $emp_data = array();

      $emp_data['records'] = $this->user_model->getall_user_attendance($emp_id);

        $emp_data['emp_id'] = $emp_id;
        $this->load->view('user/emp_attendance_view',$emp_data);
    }

    function show_emp_timesheet_data()
    {
      $this->load->view('user/view_emp_timesheet');
    }

    function show_attendance()
    {
       $get_id = $this->session->userdata('logged_in');
       $emp_id =  $get_id['emp_id'];
       $emp_data = array();


      $emp_data['records'] = $this->user_model->getall_user_attendance($emp_id);
      $this->load->view('user/show_emp_attendance',$emp_data);
    }

    function show_attendance_for_date()
    {
       $get_id = $this->session->userdata('logged_in');
       $emp_id =  $get_id['emp_id'];
       $emp_data = array();

      $date = $_POST['date'];

       $date = explode("/", $date);
      $dob = $date[2]."-".$date[1]."-".$date[0];
      $emp_data['records'] = $this->user_model->get_user_attendance_for_date($emp_id,$dob);

      $this->load->view('user/show_emp_attendance',$emp_data);
    }

}
?>