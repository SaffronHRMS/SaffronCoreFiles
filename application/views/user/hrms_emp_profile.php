<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Profile</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>" media="screen" >
<link type="text/css" href="<?php echo base_url('bootstrap/css/jquery.datepick.css'); ?>" rel="stylesheet" media="screen">
</head>
<body>
<div class="navbar">
  <div class="navbar-inner">
    <a class="brand" href="#">Techindyeah</a>
    <ul class="nav">
      <li class="active"><a href="#">Profile</a></li>
      <li><a href="#">Leave</a></li>
      <li><a href="#">Performance</a></li>
    </ul>
  </div>
</div>
<!--
<form name="emp-info" method="POST" <a href="home/resubmit_emp_profile"></a>
-->
<div class="span3">
  <div class="well well-large">
    <h2 class="muted">Personal</h2>
    <div class="emp-profile-list">
    <ul>
      <li><button type="submit" class="btn btn-block" name="personal" id="personal">Personal Details</button></li>
      <li><button type="submit" class="btn btn-block" name="contact" id="contact">Contact Details</button></li>
      <li><button type="submit" class="btn btn-block" name="emergency" id="emergency">Emergency Contacts</button></li>
      <li><button type="submit" class="btn btn-block" name="dependents" id="dependents">Dependents</button></li>
      <li><button type="submit" class="btn btn-block" name="immigration" id="immigration">Immigration</button></li>
      <li><button type="submit" class="btn btn-block" name="job" id="job">Job</button></li>
      <li><button type="submit" class="btn btn-block" name="salary" id="salary">Salary</button></li>
      <li><button type="submit" class="btn btn-block" name="report_to" id="report_to">Report-to</button></li>
      <li><button type="submit" class="btn btn-block" name="qualification" id="qualification">Qualification</button></li>
      <li><button type="submit" class="btn btn-block" name="membership" id="membership">Membership</button></li>
    </ul>
    </div>
    </div>
</div>
<!--
</form>
-->
<?php
//if(isset($_POST['personal']))
//{
?>
<div class="container-personal-detail well">
  <div id="message" class="" style="display: none;"></div>
  <div id="waiting" class="" style="display: none;">
    <img src="<?php echo base_url('bootstrap/img/ajax-loader.gif') ?>" title="Loader" alt="Loader" />
  </div>

  <form name="emp_personal" id="emp_personal" method="POST" action="">
    <fieldset>
      <?php //echo validation_errors(); ?>
      <?php //echo form_open('hrms_emp_detail_controller'); ?>
          <!--******************** write edit view navbar *********************-->
          <!--    <div class="span1 container-contact-detail-btn-view">
            <a href="#" class="btn btn-primary btn-block btn-view">
            <i class="icon-eye-open icon-white"></i>
            <span><strong>View</strong></span>          
            </a>
          </div>
          <div class="span1 container-contact-detail-btn-edit">
            <a href="#" class="btn btn-primary btn-block btn-edit">
            <i class="icon-edit icon-white"></i>
            <span><strong>Edit</strong></span>       
            </a>  
          </div>
          -->
          <!--*****************************************************************-->
      <h4>Personal details</h4>
      <legend></legend>
    
      <label>First Name</label>

	    <input type="text" id="fname" name="fname" placeholder="type first name" />
    
  
	  
      <label>Middle Name</label>
	    <input type="text" id="mname" name="mname" placeholder="type middle name" />
    

	  
      <label>Last Name</label>
	    <input type="text" id="lname" name="lname" placeholder="type last name" />
    
    
      <legend></legend>
    
      <p>
        <label>Date of Birth</label><input type="text" id="popupDatepicker">
      </p>
      
      <legend></legend>

	    <p>
        <label>Gender</label>
        <select name="gender" id="gender">
          <option value="">Select</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>
      </p>
      <!--	   <input type="radio" id="m" name="m" value="male" />&nbsp;&nbsp;Male&nbsp;&nbsp;
               <input type="radio" id="m" name="m" value="female" />&nbsp;&nbsp;Female</label>
      --> 
      <legend></legend>

      <p>
        <label>Marital Status</label>
        <select name="marital" id="marital">
          <option value="">Select</option>
          <option value="single">Single</option>
          <option value="married">Married</option>
          <option value="other">Other</option>
        </select>
      </p>
    
      <legend></legend>

      <p>
        <label>Nationality</label>
        <select name="nationality" id="nationality">
          <option value="">Select</option>
          <option value="ind">India</option>
        </select>
      </p>

      <input id="personal_btn" name="personal_btn" type="submit" value="Submit Data" class="btn" >
      <!--
      <button type="submit" id="personal_btn" name="personal_btn" class="btn">Submit</button>
      onClick="callAJAX('http://local.tech.com/index.php/hrms_emp_detail_controller','displaydiv')"
      -->
    </fieldset>
  </form>
</div> <!-- End Container -->
<?php
//}
?>

                  <!-- jquery document are loaded here -->
<script src="<?php echo base_url('bootstrap/js/jquery-latest.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('bootstrap/js/jquery-1.3.2.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('bootstrap/js/jquery.datepick.js'); ?>"></script>

<!--  ****** Scripting for date picker  -->
<script type="text/javascript">
  $(function()
  {
    $('#popupDatepicker').datepick();
  });
  /*
  function showDate(date) {
  alert('The date chosen is ' + date);
  }
*/
</script>

<!-- Ajax script for form data submit-->
<script type="text/javascript">
$(document).ready(function()
{
  $('#personal_btn').click(function()
  {
    $('#waiting').show(500);
    //$('#emp_personal').hide(0);
    $('#message').hide(0);

    $.ajax(
    {
      type : 'POST',
      url : 'http://local.tech.com/index.php/hrms_emp_detail_controller',
      dataType : 'json',
      data: 
      {
        fname : $('#fname').val(),
        mname : $('#mname').val(),
        lname : $('#lname').val(),
        gender : $('#m').val(),
        dob : $('#popupDatepicker').val(),
        marital : $('#marital').val(),
        nationality : $('#nationality').val()
      },
      success : function(data)
      {
        $('#waiting').hide(500);
        $('#message').removeClass().addClass((data.error === true) ? 'error' : 'success')
        .text(data.msg).show(500);
        
        if (data.error === true)
        $('#emp_personal').show(500);
      },
      error : function(XMLHttpRequest, textStatus, errorThrown)
      {
        $('#waiting').hide(500);
        $('#message').removeClass().addClass('error')
        .text('There was an error.').show(500);
        $('#emp_personal').show(500);
      }
    });
    return false;
  });
});

</script>
</body>
</html>