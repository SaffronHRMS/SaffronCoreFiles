<!DOCTYPE html>
<html>
<head>
<title>My Form</title>
<!--<link rel="stylesheet" type="text/css" href="js/style.css">-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>" media="screen" >
<!--<link rel="stylesheet" type="text/css" href="<?php //echo base_url('bootstrap/css/style.css'); ?>" media="screen" >

<link rel="stylesheet" type="text/css" href="<?php //echo base_url('bootstrap/js/bootstrap.min.js'); ?>" media="screen" >
<link rel="stylesheet" type="text/css" href="<?php //echo base_url('bootstrap/js/jquery-latest.js'); ?>" media="screen" >
<link rel="stylesheet" type="text/css" href="<?php //echo base_url('bootstrap/img/glyphicons-halflings.PNG'); ?>" media="screen" >
-->
</head>
<body>

<div class="container-login">
	<div class="row">
		<div class="span4 offset4 well">
			<legend>Please Sign In</legend>
<!--          	<div class="alert alert-error">
                <a class="close" data-dismiss="alert" href="#">×</a>Incorrect Username or Password!
            </div>-->
			
				<?php echo validation_errors(); ?>
				<?php echo(form_open('admin_ctrl')); ?> 
			<input type="text" id="username" class="span4" name="username" placeholder="Username">
			<input type="password" id="password" class="span4" name="password" placeholder="Password">
            <label class="checkbox">
            	<input type="checkbox" name="remember" value="1"> Remember Me
            </label>
            <label>
			<button type="submit" name="login" id="login" class="btn btn-success btn-block">Sign in</button>
			</label>
			<label>
			<button type="submit" name="punchin" id="punchin" class="btn btn-primary btn-block">Punch IN</button>
			</label>
			<label>
			<button type="submit" name="punchout" id="punchout" class="btn btn-warning btn-block">Puch OUT</button>
			</label>
			
			</form>
		</div>
	</div>
</div>

<!--	<div class="control-group">
		<div class="controls">
  			<button class="span4" class="btn btn-large btn-primary" type="button">IN</button>
 	</div>
  	</div>
  	<div class="control-group">
  		<div class="controls">
	  		<button class="span4" class="btn btn-large btn-primary" type="button">OUT</button>
	  	<div class="controls">
	</div>
-->
</form>

</body>
</html>