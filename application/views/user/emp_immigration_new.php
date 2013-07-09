
  <div class="container-personal-detail well" id="right" name="right">
          
          <h4>Immigration</h4>
                    <legend></legend>
                         <div class="row_content_left_for_user">
                              <div class="row_content_left_left">
                                   <div class="name_field_for_user">
                                        <div class="checkbox_field"><input type="radio" id="im_document_pass" name="im_document" value="passport" /></div>
                                         <div class="checkbox_name_field">Passport</div>
                                   </div>
                               </div>    
                              <div class="row_content_left_right_less_for_user">
                                <div class="name_field_for_user">
                                    <div class="checkbox_field"><input type="radio" id="im_document_visa" name="im_document" value="visa" /></div>
                                   <div class="checkbox_name_field">Visa</div> 
                                </div> 
                               </div>                                                                            
                        </div><!--row_content_left_for_user-->

                        <div class="row_content_right_for_user">
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                     <!-- <b>Street 2 :</b> --> 
                              </div>
                              </div>
                              <div class="row_content_left_right">
                                       <!-- <input type="text" class="span4me" id="street2" name="street2"  value="<?php //echo $street2; ?>" placeholder="Street 2" />     -->
                              </div>                                                                                
                        </div><!--row_content_right_for_user-->

                         <div class="row_content_left_for_user">
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                    <b> Number :</b>
                              </div>
                              </div>
                              <div class="row_content_left_right">
                                         <input type="text" class="span4me" id="im_numbr" name="im_numbr"  placeholder="Input Nummber" />
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                     <b>Issued Date :</b>
                              </div>
                              </div>
                              <div class="row_content_left_right">
                                      <input type="text" class="span4me" id="im_issue_date" name="im_issue_date"  placeholder="DD/MM/YYYY" size="18">
                              </div>
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                     <b>Expiry Date :</b>
                              </div>
                              </div>
                              <div class="row_content_left_right">
                                      <input type="text" class="span4me" id="im_expiry_date" name="im_expiry_date"  placeholder="DD/MM/YYYY" size="18">
                              </div>                                                                                                       
                        </div><!--row_content_left_for_user-->

                        <div class="row_content_right_for_user">
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                     <b>Eligible Status :</b>
                              </div>
                              </div>
                              <div class="row_content_left_right">
                                       <input type="text" class="span4me" id="im_eligible" name="im_eligible"  placeholder="" />
                              </div>
                              <div class="row_content_left_left_less">
                                  <div class="name_field_for_user">
                                     <b>Issued By :</b>
                              </div>
                              </div>
                              <div class="row_content_left_right">
                                      <select name="im_issuedby" id="im_issuedby" >
                                      <option value="-1">Please select...</option>
                                      <?php foreach($records as $row) { ?>
                                      <option value="<?php echo $row->cou_name; ?>"><?php echo $row->cou_name; } ?></option>
                                          <?php  ?>
                                          </select>    
                              </div> 
                                   <div class="row_content_left_left">
                                  <div class="name_field_for_user">
                                     <b> Eligible Review Date :</b>
                              </div>
                              </div>
                              <div class="row_content_left_right">
                                       <input type="text" class="span4me" id="im_review_date" name="im_review_date"  placeholder="DD/MM/YYYY" size="18">
                              </div>                                                                              
                        </div><!--row_content_right_for_user-->

                        <textarea id="im_comment" name="im_comment"  placeholder="Your Message" rows="5"></textarea>
    
                         
          <legend></legend>
    <label>
                 <button class="btn btn-success button_medium_width " id="immig_savebtn">
              <i class="icon-eye-open icon-white"></i><strong> Save</strong></button>  
        </label>
  </div>
<!--  ****** Scripting for date picker  -->
<script type="text/javascript">
  $(function()
  {
    $('#im_issue_date').datepick();
    $('#im_expiry_date').datepick();
    $('#im_review_date').datepick();
  });


   $("#immig_savebtn").click(function(){
      wait();
      if($('input[name=im_document]:checked').length > 0)
      {
        // var test = $('input[name=im_document]:checked').val();
        // alert('The doc chosen is ' + test);
        // if($("#im_document").attr('checked'))
        // {
      if($("#im_numbr").val()!='')
      {
        if($("#im_issue_date").val()!='')
        {
          if($("#im_expiry_date").val()!='')
          {
            if($("#im_eligible").val()!='')
            {
              if($("#im_issuedby").val()!= -1)
              {
                if($("#im_review_date").val()!='')
                {

        $.post("emp_immigration_insert_ctrl",{document_name:$('input[name=im_document]:checked').val(),im_numbr:$("#im_numbr").val(),im_issue_date:$("#im_issue_date").val(),im_expiry_date:$("#im_expiry_date").val(),im_eligible:$("#im_eligible").val(),im_issuedby:$("#im_issuedby").val(),im_review_date:$("#im_review_date").val(),im_comment:$("#im_comment").val()},
          function(data){ $("#message_showing_area").html(data);show_data();
        });

                }
                else
                {
                  // alert("Please Select a date  !!")
                  $("#im_review_date").focus();
                }        
              }
              else
              {
                // alert("Please Give Some description of Your Job !!")
                $("#im_issuedby").focus();
              }
            }
            else
            {
              // alert("Please Fill End Date of Job  !!")
              $("#im_eligible").focus();
            }
          }
          else
          {
            // alert("Please Fill Start of Your Job!!")
            $("#im_expiry_date").focus();
          }
        }
        else
        {
          // alert("Please Fill Job title !!")
          $("#im_issue_date").focus();
        }
      }
      else
      { 
        // alert("Company Name left Blank !!")
        $("#im_numbr").focus();
       // document.getElementById('im_numbr').innerHTML='Company Name !!';
      }
    }
    else
    {
       alert("Please choose document type!!");
      // $("#im_document").focus();
    }

    });

</script>