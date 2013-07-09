 
 <div class="row_content_left_for_user">
  
  <div class="row_content_left_left_less">
    <div class="name_field_for_user">
      <b>Name :</b>
    </div>
  </div>
  <div class="row_content_left_right">
    <input type="text" class="span4me" id="emrg_name" name="emrg_name" placeholder="Name" />  
  </div>

  <div class="row_content_left_left_less">
    <div class="name_field_for_user">
      <b>Relationship :</b>
    </div>
  </div>
  <div class="row_content_left_right">
    <input type="text" class="span4me" id="emrg_relationship" name="emrg_relationship" placeholder="Relationship" />  
  </div>

  <div class="row_content_left_left_less">
    <div class="name_field_for_user">
      <b>Mobile :</b>
    </div>
  </div>
  <div class="row_content_left_right">
    <input type="text" class="span4me" id="emrg_mob_num" name="emrg_mob_num" placeholder="Mobile" />  
  </div>

</div><!--row_content_left_for_user-->

<div class="row_content_right_for_user">

  <div class="row_content_left_left_less">
    <div class="name_field_for_user">
      <b>Home Telephone :</b>
    </div>  
  </div>
  <div class="row_content_left_right">
    <input type="text" class="span4me" id="emrg_home_num" name="emrg_home_num" placeholder="Home Telephone"  />
  </div>

  <div class="row_content_left_left_less">
    <div class="name_field_for_user">
      <b>Work Telephone :</b>
    </div>  
  </div>
  <div class="row_content_left_right">
    <input type="text" class="span4me" id="emrg_work_num" name="emrg_work_num" placeholder="Work Telephone" />
  </div>

</div><!--row_content_right_for_user-->

<br />
      <button class="btn btn-success button_medium_width " id="savebtn" name="savebtn">
      <i class="icon-edit icon-white"></i><strong> Save</strong></button>
      <button class="btn btn-danger button_medium_width " id="removebtn" name="removebtn">
      <i class="icon-edit icon-white"></i><strong> Cancel</strong></button>

      <script type="text/javascript">
           $("#savebtn").click(function(){
      wait();
      if($("#emrg_name").val()!='')
      {
        if($("#emrg_relationship").val()!='')
        {
          if($("#emrg_mob_num").val()!='')
          {
            if($("#emrg_home_num").val()!='')
            {
              if($("#emrg_work_num").val()!='')
              {

        $.post("emp_emrg_contact_insert_ctrl",{emrg_name:$("#emrg_name").val(),emrg_relationship:$("#emrg_relationship").val(),emrg_mob_num:$("#emrg_mob_num").val(),emrg_home_num:$("#emrg_home_num").val(),emrg_work_num:$("#emrg_work_num").val()},
          function(data){ $("#message_showing_area").html(data);clearInput();show_data();
        });

        
              }
              else
              {
                alert("Please Fill Your Work Number !!")
                $("#emrg_work_num").focus();
              }
            }
            else
            {
              alert("Please Fill Your Home Number  !!")
              $("#emrg_home_num").focus();
            }
          }
          else
          {
            alert("Please Fill Mobile Number!!")
            $("#emrg_mob_num").focus();
          }
        }
        else
        {
          alert("Please Fill Your Relationship With Given Name By You !!")
          $("#emrg_relationship").focus();
        }
      }
      else
      { 
        alert("Please Fill Name !!")
        $("#emrg_name").focus();
       // document.getElementById('emrg_name').innerHTML='Company Name !!';
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