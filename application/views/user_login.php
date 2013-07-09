<?php ?>
<html>
<head>
	<title>TechIndyeah&trade; HRMS</title>
	<link rel="shortcut icon" href="<?php echo(base_url()); ?>images/favicon.ico">
</head>
<body>

   <?php echo(form_open('user_ctrl/login')); ?> 
				
					<div class="notification information png_bg">
						<div>
							Just click "Sign In" with your username and password.
						</div>
					</div>
					
					<p>
						<label>Username</label>
					<input type="text" name="username">
					</p>
					<div class="clear"></div>
					<p>
						<label>Password</label>
						<input type="password" name="password">
					</p>
					<div class="clear"></div>
					<p id="remember-password">
						<input type="checkbox" />Remember me
					</p>
					<div class="clear"></div>
					<p>
						<input type="submit" value="login" name="submit">
					</p>
					
				</form>
</body>
</html>