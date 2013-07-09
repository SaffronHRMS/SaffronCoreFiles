<div class="message_showing_area">
  </div>

<div class="container-personal-detail well" >

<div class="rowme_heading_for_details_from_database">
  <b>  
    <div class="div_for_heading_of_showing_details">Company</div>
    <div class="div_for_heading_of_showing_details">Job Title</div>
    <div class="div_for_heading_of_showing_details">From</div>
    <div class="div_for_heading_of_showing_details">To</div>
    <div class="div_for_heading_of_showing_details">Comment</div>
  </b>
</div>


<?php if($records != FALSE) { ?>
<?php foreach($records as $row) { ?> 

<div class="rowme_for_details_from_database_for_job_title">
    <!-- <div class="div_for_showing_details_for_description"><?php //echo $row->employee_id; ?></div> -->
      <div class="div_for_showing_details_for_job_title"><?php echo $row->work_exp_company_name; ?></div> 
      <div class="div_for_showing_details_for_job_title"><?php echo $row->work_exp_job_title; ?> </div>  
      <div class="div_for_showing_details_for_job_title"><?php echo $row->work_exp_from_date; ?> </div>
      <div class="div_for_showing_details_for_job_title"><?php echo $row->work_exp_to_date; ?></div>  
      <div class="div_for_showing_details_for_job_title"> <?php echo $row->work_exp_comment; ?></div>
      <div class="div_for_showing_details_for_job_title" id="row_id">
      <button class="btn btn-danger" id="delete" name="delete" value="<?php echo $row->id; ?>">Delete</button></div>
</div>             
<?php } } else { } ?>
<legend></legend>
      <button class="btn btn-primary button_medium_width " id="addbtn" name="addbtn">
      <i class="icon-edit icon-white"></i><strong> Add</strong></button>


<div id="custom">

</div>


</div>
<script type="text/javascript">

 $.ajaxSetup ({
        cache: false
    });
    var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";

$(document).ready(function(){
  wait();
      $("#custom").hide();
       $("#savebtn").hide();
       $("#removebtn").hide();

$('div#row_id button').click(function(){
     $.post("emp_work_experience_del_ctrl",{emp_exp_id:$(this).val()},
          function(data){ $("#message_showing_area").html(data);show_data();
        });

});

  $('#addbtn').click(function(){
    wait();
      
      $("#addbtn").hide();
      $("#custom").show();

      add_work_experience_row();
  });


});


function clearInput()
   {
    $("#work_exp_company_name").val('');
    $("#work_exp_job_title").val('');
    $("#work_exp_from_date").val('');
    $("#work_exp_to_date").val('');
    $("#work_exp_comment").val('');
   }

function add_work_experience_row()
{
  wait();
  $.post("emp_work_experience_add_row_ctrl",function(data){ $("#custom").html(data);});
}
function wait(){
       var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
       $("#message_showing_area").html(ajax_load);

    }
</script>