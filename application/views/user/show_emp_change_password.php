
<div id="message_showing_area">
    </div>





<div class="container-personal-detail well" >

<h4>CHANGE PASSWORD</h4>
                                
    

        <input type="password" id="old_password" class="span3" name="old_password" placeholder="Enter current password"><br />
        <input type="password" id="new_password" class="span3" name="new_password" placeholder="Enter new password"> <br />
        <input type="password" id="confirm_new_password" class="span3" name="confirm_new_password" placeholder="Confirm password"><br />


    <div class="span1">
      <button class="btn btn-success btn-block btn-edit " id="changepass_btn" name="changepass_btn">
      <i class="icon-edit icon-white"></i><strong> Submit</strong></button>
    </div>

</div>


 <script type="text/javascript">

        $("#changepass_btn").click(function(){
        wait();
         if($("#old_password").val()!='')
         {
           if($("#new_password").val().length>=6)
           {
             if($("#new_password").val()==$("#confirm_new_password").val())
             {
               $.post("show_submit_data_for_change_password",{old_password:$("#old_password").val(),new_password:$("#new_password").val()},
               function(data){ $("#message_showing_area").html(data);clearInput();
               // alert ('Password Changed Successfully!');window.close();
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

function clearInput()
   {
    $("#old_password").val('');
    $("#new_password").val('');
    $("#confirm_new_password").val('');
   } 

 </script>