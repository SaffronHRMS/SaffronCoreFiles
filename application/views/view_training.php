<html>
<head>
	<title></title>
	<link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
     
</head>
<body>
<h1>view training</h1>
<div id="inside_middle">
	<div id="menu_div">
	 
				
			<input type="submit" class="btn-primary" value="SEARCH" id="search_user">
			<input type="reset" class="btn-primary" value="RESET" id="reset">
					
			 
    </div><!-- end #menu_div -->
    <div id="description_div">
    	<h2>description section</h2>
    	<input type="submit" class="btn-success" value="ADD" id="add_job">
			<input type="submit" class="btn-danger" value="DELETE" id="delete_job">

    </div><!-- end #description_div -->
</div> <!-- end #inside_middle -->

<script type="text/javascript">
    $.ajaxSetup ({
        cache: false
    });
    var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
    

//     $(document).ready(function() {
//     var loadUrl = "<?php echo(base_url()); ?>index.php/admin_ctrl/show_vision_and_mission";
//         $("#inside_left").html(ajax_load).load(loadUrl);
//     });
// //  load() functions
//    var loadUrl = "company_info.php";
     $("#add_job").click(function(){
         var loadUrl = "<?php echo(base_url()); ?>index.php/admin_ctrl/show_add_job";
         $("#menu_div").html(ajax_load).load(loadUrl);
    });

     $("#delete_job").click(function(){
         var loadUrl = "<?php echo(base_url()); ?>index.php/admin_ctrl/show_delete_job";
         $("#menu_div").html(ajax_load).load(loadUrl);
    });
    </script>
</body>
</html>