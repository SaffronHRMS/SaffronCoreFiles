
<!DOCTYPE html>
<html>
<head>
	<title>TechIndyeah&trade; HRMS</title>
	<link rel="shortcut icon" href="<?php echo(base_url()); ?>images/favicon.ico">
	<link rel="stylesheet" href="<?php echo(base_url()); ?>bootstrap/css/bootstrap.min.css" type="text/css" media="screen" />
               <link rel="stylesheet" href="<?php echo(base_url()); ?>css/admin_pannel.css" type="text/css" media="screen" />

                  <!-- jquery document are loaded here -->
<script src="<?php echo base_url('bootstrap/js/jquery-1.7.2.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/techindyeah.js');?>"></script>
</head>
<body>

   <div class="container-login">
	<div class="row">
		<div class="span4 offset4 well">
			<img src="<?php echo(base_url()); ?>images/logo_saffron_login.png"> 
			<div class="ver_show">ver 0.9</div> 
			<legend></legend>


	    <center>
                 	<?php echo validation_errors(); ?>
                 </center>	
                 <!-- </div></center> -->	
				<?php echo(form_open(base_url())); ?> 
			<input type="text" id="username" class="span4" name="username" placeholder="Username">
			<input type="password" id="password" class="span4" name="password" placeholder="Password">
            <!--<label class="checkbox">
            	<input type="checkbox" name="remember" value="1"> Remember Me
            </label>-->
            <label>
			<button type="submit" name="login" id="login" class="btn btn-success btn-block">Sign in</button>
			</label>
			<label>
			<button type="submit" name="punchin" id="punchin" class="btn btn-primary btn-block">Punch IN</button>
			</label>
			<label>
			<button type="submit" name="punchout" id="punchout" class="btn btn-warning btn-block">Punch OUT</button>
			</label>
			
			</form>
		</div>
	</div>
</div>

					
				</form>
</body>
<script type="text/javascript">

     $("#username").focusout(function(){
           $.post("welcome/checking_punch_in_or_not_during_logining",{username:$("#username").val(),},
           function(data){ 
            if(data=='punch_in'){ $("#punchin").fadeOut(800);$("#punchout").fadeIn(800);}else {$("#punchout").fadeOut(800);$("#punchin").fadeIn(800);} 
           });

     });
</script>
</html>