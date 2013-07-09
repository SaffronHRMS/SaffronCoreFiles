<?php ?>
<html>
<head>
	<title>TechIndyeah&trade; HRMS</title>
	<link rel="shortcut icon" href="<?php echo(base_url()); ?>images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>" media="screen" >
</head>
<body>

   <div class="container-login">
	<div class="row">
		<div class="span4 offset4 well">
			<legend>Add employee</legend>
<!--          	<div class="alert alert-error">
                <a class="close" data-dismiss="alert" href="#">×</a>Incorrect Username or Password!
            </div>-->
			
				<?php echo validation_errors(); ?>
				<?php echo(form_open('admin_ctrl/show_add_employee_form')); ?> 
			<input type="text" id="addusername" class="span4" name="addusername" placeholder="Username">
			<input type="password" id="addpassword" class="span4" name="addpassword" placeholder="Password">
           
            <label>
			<button type="submit" class="btn btn-success btn-block">Create</button>
			</label>
		
			
			</form>
		</div>
	</div>
</div>

					
				</form>
</body>
</html>