
<div class="container-personal-detail well" id="right" name="right">

          <h4>Immigration</h4>
                    <legend></legend>
                         <div class="row_content_left_for_user">
                              <div class="row_content_left_left_less_for_user_view">
                                    <b> Document :</b>
                              </div>
                              <div class="row_content_left_right_for_user_view">
                                         <?php echo $im_document; ?>
                              </div>

                              <div class="row_content_left_left_less_for_user_view">
                                     <b>Issued Date :</b>
                              </div>
                              <div class="row_content_left_right_for_user_view">
                                       <?php echo $im_issue_date; ?>
                              </div>
                              <div class="row_content_left_left_less_for_user_view"> 
                                      <b>Eligible Status :</b> 
                              </div>
                              <div class="row_content_left_right_for_user_view">
                                   <?php echo $im_eligible; ?>    
                              </div>
                              <div class="row_content_left_left_less_for_user_view"> 
                                      <b>Eligible Review Date:</b> 
                              </div>
                              <div class="row_content_left_right_for_user_view">
                                 <?php echo $im_review_date; ?>    
                              </div>                                                                             
                        </div><!--row_content_left_for_user-->

                        <div class="row_content_right_for_user">
                              <div class="row_content_left_left_less_for_user_view">
                                     <b>Number :</b> 
                              </div>
                              <div class="row_content_left_right_for_user_view">
                                       <?php echo $im_numbr; ?>     
                              </div> 
                              <div class="row_content_left_left_less_for_user_view">
                                    <b>Expiry Date :</b>
                              </div>
                              <div class="row_content_left_right_for_user_view">
                                  <?php echo $im_expiry_date; ?>     
                              </div>
                              <div class="row_content_left_left_less_for_user_view">
                                    <b>Issued By :</b> 
                              </div>
                              <div class="row_content_left_right_for_user_view">
                                 <?php echo $im_issuedby; ?>      
                              </div> 
                              <div class="row_content_left_left_less_for_user_view">
                                    <b>Notes :</b> 
                              </div>
                              <div class="row_content_left_right_for_user_view">
                                 <?php echo $im_comment; ?>      
                              </div>                                                                                
                        </div><!--row_content_right_for_user-->

          <legend></legend>
    <!-- <button class="btn btn-primary btn-block btn-edit " id="edit-btn"> -->
    <button class="btn btn-primary button_medium_width " id="immig_editbtn">
    <i class="icon-edit icon-white"></i><strong> Edit</strong></button>
 
                      </div>
 <div class="container-personal-detail well" id="immig_edit" name="immig_edit">
</div>


<script type="text/javascript">

 $.ajaxSetup ({
        cache: false
    });
    var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";

$(document).ready(function(){
  wait();  
  $("#immig_edit").hide();
});

$("#immig_editbtn").click(function(){
  wait();
  $("#right").hide();
  $("#immig_edit").show();

       $.post("emp_immigration_edit_ctrl",
       function(data){ $("#immig_edit").html(data);
       });
     });

   function wait(){
       var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
       $("#message_showing_area").html(ajax_load);
    }
</script>

                                 
  
