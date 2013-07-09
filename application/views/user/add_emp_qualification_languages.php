 <div class="row_content_left_for_user">
  
  <div class="row_content_left_left_less">
    <div class="name_field_for_user">
      <b>Language :</b>
    </div>
  </div>
  <div class="row_content_left_right">
    <input type="text" class="span4me" id="language" name="language" placeholder="Language" />  
  </div>

  <div class="row_content_left_left_less">
    <div class="name_field_for_user">
      <b>Read :</b>
    </div>
  </div>
  <div class="row_content_left_right">
    <input type="checkbox" class="span4me" id="read" name="read" value="1" />  
  </div>

  <div class="row_content_left_left_less">
    <div class="name_field_for_user">
      <b>Write :</b>
    </div>
  </div>
  <div class="row_content_left_right">
    <input type="checkbox" class="span4me" id="write" name="write" value="2" />  
  </div>

  <div class="row_content_left_left_less">
    <div class="name_field_for_user">
      <b>Speak :</b>
    </div>  
  </div>
  <div class="row_content_left_right">
    <input type="checkbox" class="span4me" id="speak" name="speak" value="3"  />
  </div>

</div><!--row_content_left_for_user-->

      <button class="btn btn-success button_medium_width " id="lang_savebtn" name="lang_savebtn">
      <i class="icon-edit icon-white"></i><strong> Save</strong></button>
      <button class="btn btn-danger button_medium_width " id="lang_removebtn" name="lang_removebtn">
      <i class="icon-edit icon-white"></i><strong> Cancel</strong></button>

      <script type="text/javascript">
           $("#lang_savebtn").click(function(){
      wait();
      if($("#language").val()!='')
      {
        if($("#read").attr('checked') && $("#write").attr('checked') && $("#speak").attr('checked'))
        {

          $.post("emp_lang_insert_ctrl",{language:$("#language").val(),read:$("#read").val(),write:$("#write").val(),speak:$("#speak").val()},
            function(data){ $("#message_showing_area").html(data);clearInput();show_data();
          });
          // Insert Read Write Speak
        }
        else
        {
          if($("#read").attr('checked') && $("#write").attr('checked'))
          {
            $.post("emp_lang_insert_ctrl",{language:$("#language").val(),read:$("#read").val(),write:$("#write").val()},
              function(data){ $("#message_showing_area").html(data);clearInput();show_data();
            });
            // Insert Read and Write
          }
          else
          {
            if($("#read").attr('checked') && $("#speak").attr('checked'))
            {
              $.post("emp_lang_insert_ctrl",{language:$("#language").val(),read:$("#read").val(),speak:$("#speak").val()},
                function(data){ $("#message_showing_area").html(data);clearInput();show_data();
              });
              //Insert Read and Speak
            }
            else
            {
              if($("#write").attr('checked') && $("#speak").attr('checked'))
              {
                $.post("emp_lang_insert_ctrl",{language:$("#language").val(),write:$("#write").val(),speak:$("#speak").val()},
                  function(data){ $("#message_showing_area").html(data);clearInput();show_data();
                });
                //Insert Writeand Speak
              }
              else
              {
                if($("#read").attr('checked'))
                {
                  $.post("emp_lang_insert_ctrl",{language:$("#language").val(),read:$("#read").val()},
                    function(data){ $("#message_showing_area").html(data);clearInput();show_data();
                  });
                  //insert read
                }
                else
                {
                  if($("#write").attr('checked'))
                  {
                    $.post("emp_lang_insert_ctrl",{language:$("#language").val(),write:$("#write").val()},
                      function(data){ $("#message_showing_area").html(data);clearInput();show_data();
                    });
                    //insert write
                  }
                  else
                  {
                    if($("#speak").attr('checked'))
                    {
                      $.post("emp_lang_insert_ctrl",{language:$("#language").val(),speak:$("#speak").val()},
                        function(data){ $("#message_showing_area").html(data);clearInput();show_data();
                      });
                      //insert speak
                    }
                    else
                    {
                      alert("Please Choose Atleast One Language proficiency !!");
                    }
                  }
                }
              }
            }
          }
        }
      }
      else
      { 
        alert("Please Fill Language Name !!");
        $("#language").focus();
       // document.getElementById('language').innerHTML='Company Name !!';
      }


    });

    $('#lang_removebtn').click(function(){
      wait();
      clearInput();
      $("#lang").hide();
      $("#lang_savebtn").hide();
      $("#lang_removebtn").hide();
    
      $("#edu_addbtn").show();
      $("#skill_addbtn").show();
      $("#lang_addbtn").show();
    }); 

    function clearInput()
   {
    $("#language").val('');
    $("#read").removeAttr('checked');
    $("#write").removeAttr('checked');
    $("#speak").removeAttr('checked');
   } 

      </script>   