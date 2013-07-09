 
 <div class="row_content_left_for_user">
  
  <div class="row_content_left_left_less">
    <div class="name_field_for_user">
      <b>Compnay Name :</b>
    </div>
  </div>
  <div class="row_content_left_right">
    <input type="text" class="span4me" id="work_exp_company_name" name="work_exp_company_name" placeholder="Company Name" />  
  </div>

  <div class="row_content_left_left_less">
    <div class="name_field_for_user">
      <b>Job title :</b>
    </div>
  </div>
  <div class="row_content_left_right">
    <input type="text" class="span4me" id="work_exp_job_title" name="work_exp_job_title" placeholder="Job Title" />  
  </div>

  <div class="row_content_left_left_less">
    <div class="name_field_for_user">
      <b>Join Date :</b>
    </div>
  </div>
  <div class="row_content_left_right">
    <input type="text" class="span4me" id="work_exp_from_date" name="work_exp_from_date" placeholder="DD/MM/YYYY" />  
  </div>

</div><!--row_content_left_for_user-->

<div class="row_content_right_for_user">

  <div class="row_content_left_left_less">
    <div class="name_field_for_user">
      <b>Leave Date :</b>
    </div>  
  </div>
  <div class="row_content_left_right">
    <input type="text" class="span4me" id="work_exp_to_date" name="work_exp_to_date" placeholder="DD/MM/YYYY"  />
  </div>

  <div class="row_content_left_left_less">
    <div class="name_field_for_user">
      <b>Description :</b>
    </div>  
  </div>
  <div class="row_content_left_right">
    <input type="text" class="span4me" id="work_exp_comment" name="work_exp_comment" placeholder="Description" />
  </div>

</div><!--row_content_right_for_user-->

<br />
      <button class="btn btn-success button_medium_width " id="savebtn" name="savebtn">
      <i class="icon-edit icon-white"></i><strong> Save</strong></button>
      <button class="btn btn-danger button_medium_width " id="removebtn" name="removebtn">
      <i class="icon-edit icon-white"></i><strong> Cancel</strong></button>

      <script type="text/javascript">
        $('#work_exp_from_date').datepick();
      $('#work_exp_to_date').datepick();
    
     $("#savebtn").click(function(){
      wait();
      if($("#work_exp_company_name").val()!='')
      {
        if($("#work_exp_job_title").val()!='')
        {
          if($("#work_exp_from_date").val()!='')
          {
            if($("#work_exp_to_date").val()!='')
            {
              if($("#work_exp_comment").val()!='')
              {

        $.post("emp_work_experience_insert_ctrl",{work_exp_company_name:$("#work_exp_company_name").val(),work_exp_job_title:$("#work_exp_job_title").val(),work_exp_from_date:$("#work_exp_from_date").val(),work_exp_to_date:$("#work_exp_to_date").val(),work_exp_comment:$("#work_exp_comment").val()},
          function(data){ $("#message_showing_area").html(data);show_data();
        });

        
              }
              else
              {
                alert("Please Give Some description of Your Job !!")
                $("#work_exp_comment").focus();
              }
            }
            else
            {
              alert("Please Fill End Date of Job  !!")
              $("#work_exp_to_date").focus();
            }
          }
          else
          {
            alert("Please Fill Start of Your Job!!")
            $("#work_exp_from_date").focus();
          }
        }
        else
        {
          alert("Please Fill Job title !!")
          $("#work_exp_job_title").focus();
        }
      }
      else
      { 
        alert("Company Name left Blank !!")
        $("#work_exp_company_name").focus();
       // document.getElementById('work_exp_company_name').innerHTML='Company Name !!';
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