
 <div class="row_content_left_for_user">
  
  <div class="row_content_left_left_less">
    <div class="name_field_for_user">
      <b>Level :</b>
    </div>
  </div>
  <div class="row_content_left_right">
    <input type="text" class="span4me" id="edu_level" name="edu_level" placeholder="Level" />  
  </div>

  <div class="row_content_left_left_less">
    <div class="name_field_for_user">
      <b>University :</b>
    </div>
  </div>
  <div class="row_content_left_right">
    <input type="text" class="span4me" id="edu_university" name="edu_university" placeholder="School/College/University" />  
  </div>

  <div class="row_content_left_left_less">
    <div class="name_field_for_user">
      <b>Year :</b>
    </div>
  </div>
  <div class="row_content_left_right">
    <input type="text" class="span4me" id="edu_year" name="edu_year" placeholder="Year" />  
  </div>

</div><!--row_content_left_for_user-->

<div class="row_content_right_for_user">

  <div class="row_content_left_left_less">
    <div class="name_field_for_user">
      <b>Score :</b>
    </div>  
  </div>
  <div class="row_content_left_right">
    <input type="text" class="span4me" id="edu_score" name="edu_score" placeholder="GPA/Score"  />
  </div>

  <div class="row_content_left_left_less">
    <div class="name_field_for_user">
      <b>Specilization :</b>
    </div>  
  </div>
  <div class="row_content_left_right">
    <input type="text" class="span4me" id="edu_specilization" name="edu_specilization" placeholder="Specilization" />
  </div>

</div><!--row_content_right_for_user-->

<br />
      <button class="btn btn-success button_medium_width " id="edu_savebtn" name="edu_savebtn">
      <i class="icon-edit icon-white"></i><strong> Save</strong></button>
      <button class="btn btn-danger button_medium_width " id="edu_removebtn" name="edu_removebtn">
      <i class="icon-edit icon-white"></i><strong> Cancel</strong></button>

      <script type="text/javascript">
           $("#edu_savebtn").click(function(){
      wait();
      if($("#edu_level").val()!='')
      {
        if($("#edu_university").val()!='')
        {
          if($("#edu_year").val()!='')
          {
            if($("#edu_score").val()!='')
            {
              if($("#edu_specilization").val()!='')
              {

        $.post("emp_edu_insert_ctrl",{edu_level:$("#edu_level").val(),edu_university:$("#edu_university").val(),edu_year:$("#edu_year").val(),edu_score:$("#edu_score").val(),edu_specilization:$("#edu_specilization").val()},
          function(data){ $("#message_showing_area").html(data);clearInput();show_data();
        });

        
              }
              else
              {
                alert("Please Fill Your Specilization !!");
                $("#edu_specilization").focus();
              }
            }
            else
            {
              alert("Please Fill Your Score  !!");
              $("#edu_score").focus();
            }
          }
          else
          {
            alert("Please Fill Year Of Passing!!");
            $("#edu_year").focus();
          }
        }
        else
        {
          alert("Please Fill Your University Name!!");
          $("#edu_university").focus();
        }
      }
      else
      { 
        alert("Please Fill Your Education Level !!");
        $("#edu_level").focus();
       // document.getElementById('edu_level').innerHTML='Company Name !!';
      }


    });

    $('#edu_removebtn').click(function(){
      wait();
      clearInput();
      $("#edu").hide();
      $("#edu_savebtn").hide();
      $("#edu_removebtn").hide();
    
      $("#edu_addbtn").show();
      $("#skill_addbtn").show();
      $("#lang_addbtn").show();
    }); 

    function clearInput()
   {
    $("#edu_level").val('');
    $("#edu_university").val('');
    $("#edu_year").val('');
    $("#edu_score").val('');
    $("#edu_specilization").val('');
   } 

      </script>   