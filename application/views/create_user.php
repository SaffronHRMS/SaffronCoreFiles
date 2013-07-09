<?php ?>
<html>
<head>
	<title>TechIndyeah&trade; HRMS</title>
	<link rel="shortcut icon" href="<?php echo(base_url()); ?>images/favicon.ico">
</head>
<body>
	<?php echo validation_errors(); ?>
     <?php 
             // if (isset($error))
             //  {
             //  	echo $error; 
             //  } 
      ?>
   <?php echo(form_open('admin_ctrl/create_user')); ?> 
				
					
					
					<p>
						<label>Username</label>
						<?php echo form_error('username'); ?>
					<input type="text" name="username">
					</p>
					<div class="clear"></div>
					<p>
						<label>Password</label>
						<input type="password" name="password">
					</p>
					
					<div class="clear"></div>
					<p>
									<label>Role</label>
										<select name="role">
                          <?php 
	                      if(isset($records)) :
	                      foreach($records as $row) : ?>
                          <option value="<?php echo($row->role_name)?>"><?php echo($row->role_id)?></option>
                          <?php endforeach;
	                      else : ?>	
                          <option value="No Data">No Data</option>
                          <?php endif; ?>
                          </select> 
								</p>
					<p>
						<input type="submit" value="Create" name="submit">
					</p>
					
				</form>

</body>
</html>