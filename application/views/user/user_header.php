<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Profile</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/techindyeah.css'); ?>" media="screen" >
<link type="text/css" href="<?php echo base_url('bootstrap/css/jquery.datepick.css'); ?>" rel="stylesheet" media="screen">

                  <!-- jquery document are loaded here -->
<script src="<?php echo base_url('bootstrap/js/jquery-1.7.2.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/techindyeah.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('bootstrap/js/jquery.datepick.js'); ?>"></script>


</head>

<div class="navbar">
  <div class="navbar-inner">
    <!-- <a class="brand" href="http://www.techindyeah.com">Techindyeah</a> -->
    <div class="apps_logo_div">
      <a  href="<?php echo(base_url()); ?>"><img src="<?php echo(base_url()); ?>images/logo_saffron_application.png"></a>
    </div>    
    <ul class="nav">
      <li class="admin_menu_container "> 
            <div class="dropdown">
                          <a href="<?php echo(base_url()); ?>">Profile</a>
            </div>
      </li> 
      <li class="admin_menu_container active"> 
            <div class="dropdown">
            <a id="myLink" href="#" onclick="MyLeave();return false;">Leave</a>
                          <!-- <a href="#">Leave</a> --> <?php //echo base_url('user_ctrl/leave')?>
            </div>
      </li>
       <li class="admin_menu_container"> 
            <div class="dropdown">
            <a id="myL" href="#" onclick="MyTimesheet();return false;">Timesheet</a>
                          <!-- <a href="#">Timesheet</a> --> <?php // echo base_url('user_ctrl/timesheet')?>
            </div>
      </li>      
<!--         <div class="menu_field_for_change_pass_for_user_blank">
   
        </div>   -->      
       <!-- <a href="<?php // echo(base_url()); ?>user_ctrl/show_change_password" onclick="OpenPopup(this.href); return false" id="change_password">Change Password</a> -->
     
    </ul>

     <div class="menu_field_for_change_pass_for_user">
             <div class="pull-right">
                <ul class="nav pull-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, User <?php //echo $session_user_name;?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a id="cp" href="#" onclick="ChangePassword();return false;">Change Password</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url('welcome/logout')?>"><i class="icon-off"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
              </div>
                    <!-- <i class="icon-edit"></i> -->
        </div>

        <div class="menu_field_for_change_pass">
                   <button name="punchin" id="punchin"class="btn btn-success">Punch In</button>
                   <button name="punchout" id="punchout" class="btn btn-danger">Punch OUT</button>
        </div>
        <!-- <div class="menu_field_for_change_pass"> -->
                   <span id="message_showing_area_for_punch_in_out"></span>
     <!--    </div>    -->     
  </div>
</div>

<div id="show_page">
  
  
</div>


<script type="text/javascript">


</script>