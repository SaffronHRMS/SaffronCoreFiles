<!DOCTYPE html>
<html>
<head>
    <title></title>
  <link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?php echo(base_url()); ?>css/jquery.autocomplete.css" />
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
     
      <script type="text/javascript" src="<?php echo(base_url()); ?>js/jquery-1.7.2.min.js"></script>
     <script type="text/javascript" src="<?php echo(base_url()); ?>js/jquery.autocomplete.js"></script>
     
</head>
<body>
<h3 style="font-family: Steinem;"><center>GENERAL INFORMATION</center></h3>

<div id="inside_middle">
    <div id="message_showing_area">
    </div>

    <div id="menu_div">
     
               <!--form  for edit company profile--> 
                <div class="container-login" id="container-login_show">

                </div>
                    
                
    </div><!-- end #menu_div -->

</div> <!-- end #inside_middle -->


<script type="text/javascript">
    $(document).ready(function(){
      show_company_details();
    });


    function show_company_details()
    {
      // wait();
      $.post("index.php/admin_ctrl/show_data_from_database_for_company_info",
      function(data){ $("#container-login_show").html(data);
      });
    }
</script>

</body>
</html>