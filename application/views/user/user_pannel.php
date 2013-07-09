<body>
<?php include("user_header.php"); ?>
<?php // include("show_emp_image.php"); ?>
<?php include("left_nav.php"); ?>
<!-- <div id="left_nav_menu_div">
</div> -->
<?php //$this->load->view($include); ?>

<div id="data">
  
</div>

<input type="hidden" id="emp_id" value="<?php echo $emp_id;?>">
</body>
</html>

<script type="text/javascript">
$(document).ready(function() {
        
        $('#user_pic').hide();
        $('#submit').hide();
        $('#punchin').hide();
        $('#punchout').hide();
      $.post("show_image_from_database",
      function(data){ $("#image_show").html(data);
      });

       $.post("emp_data",
      function(data){ $("#data").html(data);
      });
      $.post("<?php echo base_url();?>index.php/welcome/checking_punch_in_or_not",{emp_id:$("#emp_id").val(),},
      function(data){
      if(data=='punch_in'){ $("#punchin").hide();$("#punchout").show();}else {$("#punchout").hide();$("#punchin").show();} 
      }); 

      //  $.post("<?php echo base_url();?>index.php/user_ctrl/show_image_from_database",
      // function(data){ $("#image_show").html(data);
      // });
           });

$("#image").click(function(){
  $('#user_pic').show();
  $('#submit').hide();
});

$("#user_pic").click(function(){
  $('#user_pic').hide();
  $('#submit').show();
});

$("#punchin").click(function(){ 

  $.post("<?php echo base_url();?>index.php/welcome/punchin_from_profile",{emp_id:$("#emp_id").val(),},
      function(data){ 
        $("#message_showing_area_for_punch_in_out").html(data);$('#message_showing_area_for_punch_in_out').show();
      $("#punchin").hide();$("#punchout").show();
      $('#message_showing_area_for_punch_in_out').delay(5000).hide('slow');
      });
});

$("#punchout").click(function(){ 

  $.post("<?php echo base_url();?>index.php/welcome/punchout_from_profile",{emp_id:$("#emp_id").val(),},
      function(data){ $("#message_showing_area_for_punch_in_out").html(data);$('#message_showing_area_for_punch_in_out').show();
      $("#punchout").hide();$("#punchin").show();
      $('#message_showing_area_for_punch_in_out').delay(5000).hide('slow');
      });
});

  function MyLeave()
  {
    $("#data").hide();
      $.post("emp_leave_view",
       function(data){ $("#show_page").html(data);
       });
  }

 function MyTimesheet()
  {
    $("#data").hide();
      $.post("show_emp_timesheet_data",
       function(data){ $("#show_page").html(data);
       });
  }

  function ChangePassword()
  {
    $("#data").hide();
      $.post("view_change_password",
       function(data){ $("#show_page").html(data);
       });
  }


$("#personal").click(function(){

$("#data").hide();
   $.post("emp_data",
       function(data){ $("#show_page").html(data);
       });

});

$("#contact").click(function(){

$("#data").hide();

   $.post("emp_contact_view_ctrl",
       function(data){ $("#show_page").html(data);
       });

});

$("#emergency").click(function(){

$("#data").hide();

   $.post("emp_emrg_contact_view_ctrl",
       function(data){ $("#show_page").html(data);
       });

});

$("#dependents").click(function(){

$("#data").hide();

   $.post("emp_dependent_view_ctrl",
       function(data){ $("#show_page").html(data);
       });

});

$("#immigration").click(function(){

$("#data").hide();

   $.post("emp_immigration_view_ctrl",
       function(data){ $("#show_page").html(data);
       });

});

$("#job").click(function(){

$("#data").hide();

   $.post("emp_job_view_ctrl",
       function(data){ $("#show_page").html(data);
       });

});

$("#qualification").click(function(){

$("#data").hide();

   $.post("emp_qualification_view_ctrl",
       function(data){ $("#show_page").html(data);
       });

});

$("#workExp").click(function(){

$("#data").hide();

   $.post("emp_work_experience_view_ctrl",
       function(data){ $("#show_page").html(data);
       });

});
</script>