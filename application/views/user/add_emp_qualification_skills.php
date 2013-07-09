<!-- <div class="row_content_left_for_user">
  
  <div class="row_content_left_left_less">
    <div class="name_field_for_user"> -->
      <b>Skill :</b>
 <!--    </div>
  </div>
  <div class="row_content_left_right"> -->
    <input type="text" class="span4me" id="skill_field" name="skill_field" placeholder="Skill" />  
<!--   </div>

  <div class="row_content_left_left_less">
    <div class="name_field_for_user"> -->
      <b>Year of Experience :</b>
<!--     </div>
  </div>
  <div class="row_content_left_right"> -->
    <input type="text" class="span4me" id="experience" name="experience" placeholder="Year of Experience" />  
<!--   </div>

  <div class="row_content_left_left_less">
    <div class="name_field_for_user"> -->
      <b>Year :</b>
<!--     </div>
  </div>
  <div class="row_content_left_right"> -->
    <textarea id="skill_description" name="skill_description" placeholder="Comments"></textarea>
<!--   </div>

</div> --><!--row_content_left_for_user-->

<br />
      <button class="btn btn-success button_medium_width " id="skill_savebtn" name="skill_savebtn">
      <i class="icon-edit icon-white"></i><strong> Save</strong></button>
      <button class="btn btn-danger button_medium_width " id="skill_removebtn" name="skill_removebtn">
      <i class="icon-edit icon-white"></i><strong> Cancel</strong></button>


     <script type="text/javascript">
           $("#skill_savebtn").click(function(){
      wait();
      if($("#skill_field").val()!='')
      {
        if($("#experience").val()!='')
        {
          if($("#skill_description").val()!='')
          {

            $.post("emp_skill_insert_ctrl",{skill_field:$("#skill_field").val(),experience:$("#experience").val(),skill_description:$("#skill_description").val()},
              function(data){ $("#message_showing_area").html(data);clearInput();show_data();
            });

          }
          else
          {
            alert("Please Give some Description Anout Your Skill !!");
            $("#skill_description").focus();
          }
        }
        else
        {
          alert("Please Fill Your Year of Experience in this field !!");
          $("#experience").focus();
        }
      }
      else
      { 
        alert("Please Fill Your Skill Name Level !!");
        $("#skill_field").focus();
       // document.getElementById('skill').innerHTML='Company Name !!';
      }


    });

    $('#skill_removebtn').click(function(){
      wait();
      clearInput();
      $("#skill").hide();
      $("#skill_savebtn").hide();
      $("#skill_removebtn").hide();
    
      $("#edu_addbtn").show();
      $("#skill_addbtn").show();
      $("#lang_addbtn").show();
    }); 

    function clearInput()
   {
    $("#skill").val('');
    $("#experience").val('');
    $("#skill_description").val('');
   } 

      </script>   