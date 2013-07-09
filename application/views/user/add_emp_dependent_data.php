<div class="row_content_left_for_user">
  
  <div class="row_content_left_left_less">
    <div class="name_field_for_user">
      <b>Name :</b>
    </div>
  </div>
  <div class="row_content_left_right">
    <input type="text" class="span4me" id="dependent_name" name="dependent_name" placeholder="Name" />  
  </div>

  <div class="row_content_left_left_less">
    <div class="name_field_for_user">
      <b>Relationship :</b>
    </div>
  </div>
  <div class="row_content_left_right">
    <input type="text" class="span4me" id="dependent_relationship" name="dependent_relationship" placeholder="Relationship" />  
  </div>

  <div class="row_content_left_left_less">
    <div class="name_field_for_user">
      <b>Date of Birth :</b>
    </div>
  </div>
  <div class="row_content_left_right">
    <input type="text" class="span4me" id="dependent_dob" name="dependent_dob" placeholder="DD/MM/YYYY" />  
  </div>

</div><!--row_content_left_for_user-->

<br />
      <button class="btn btn-success button_medium_width " id="savebtn" name="savebtn">
      <i class="icon-edit icon-white"></i><strong> Save</strong></button>
      <button class="btn btn-danger button_medium_width " id="removebtn" name="removebtn">
      <i class="icon-edit icon-white"></i><strong> Cancel</strong></button>

<script type="text/javascript">
$('#dependent_dob').datepick();
    
     $("#savebtn").click(function(){
      wait();
      if($("#dependent_name").val()!='')
      {
        if($("#dependent_relationship").val()!='')
        {
          if($("#dependent_dob").val()!='')
          {
            
        $.post("emp_dependent_insert_ctrl",{dependent_name:$("#dependent_name").val(),dependent_relationship:$("#dependent_relationship").val(),dependent_dob:$("#dependent_dob").val()},
          function(data){ $("#message_showing_area").html(data);clearInput();show_data();
        });

          }
          else
          {
            alert("Please Fill Mobile Number!!")
            $("#dependent_dob").focus();
          }
        }
        else
        {
          alert("Please Fill Your Relationship With Given Name By You !!")
          $("#dependent_relationship").focus();
        }
      }
      else
      { 
        alert("Please Fill Name !!")
        $("#dependent_name").focus();
       // document.getElementById('dependent_name').innerHTML='Company Name !!';
      }


    });


  $('#removebtn').click(function(){
      wait();
      clearInput();
      
      $("#savebtn").hide();
      $("#removebtn").hide();
    
      $('#custom').hide();
      $("#addbtn").show();
    });  
</script>