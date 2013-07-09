<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
     
</head>
<body>
<h3 style="font-family: Steinem;">CHANGE PASSWORD</h3>
<div id="inside_middle">
    <div id="message_showing_area">
    </div>
    <div id="menu_div">
     
                
                <div class="container-login" id="container-login">
                    <div class="row">
                        <div class="span4 offset4 well">
                
                            <?php //echo $session_user_name;?>
                            <input type="hidden" id="user_name" value="<?php echo $session_user_name;?>" name="user_name" >    
                            <input type="password" id="old_password" class="span2" name="old_password" placeholder="Enter current password">
                            <input type="password" id="new_password" class="span2" name="new_password" placeholder="Enter new password"> 
                           <input type="password" id="confirm_new_password" class="span2" name="confirm_new_password" placeholder="Confirm password">
                           <button type="button" class="btn btn-success " id="submit_password">SUBMIT</button>
                        </div>
                    </div>
                </div>
    </div>            


 <script type="text/javascript">

        $("#submit_password").click(function(){
 	    wait();//alert ($("#user_name").val());
 	     if($("#old_password").val()!='')
 	     {
           if($("#new_password").val().length>=6)
           {
             if($("#new_password").val()==$("#confirm_new_password").val())
             {
			   $.post("show_submit_data_for_change_password",{user_name:$("#user_name").val(),old_password:$("#old_password").val(),new_password:$("#new_password").val()},
			   function(data){ $("#message_showing_area").html(data);
			   alert ('Password Changed Successfully!');window.close();
			   });


// setTimeout(
//   function() 
//   {
//     //do something special
//   }, 5000);
             }
             else
             {
             	 document.getElementById("message_showing_area").innerHTML="Password donot match";
             }
           }
           else
           {
           	 document.getElementById("message_showing_area").innerHTML="Password should be of 6 digits";
           }
 	     }
 	     else
 	     {
 	     	 document.getElementById("message_showing_area").innerHTML="Old Password Required!";
 	     }
      
         //window.close();

      });     
function wait(){
       var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
       $("#message_showing_area").html(ajax_load);

    }


 </script>  


 </body>
</html>                           