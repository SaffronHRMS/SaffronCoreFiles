<div class="message_showing_area">
  </div>

<div class="container-personal-detail well" >

<h4>Dependents</h4>
  <legend></legend>
    <div class="rowme_heading_for_details_from_database">
      <b>  
        <div class="div_for_heading_of_showing_details_for_description">Name</div>
        <div class="div_for_heading_of_showing_details">Relationship</div>
        <div class="div_for_heading_of_showing_details">Date of Birth</div>
        <div class="div_for_heading_of_showing_details"></div>
        <div class="div_for_heading_of_showing_details"></div>
      </b>
    </div>


<?php if($records != FALSE) { ?>
<?php foreach($records as $row) { ?> 
<div class="rowme_for_details_from_database_for_job_title">
  <div class="div_for_showing_details_for_description"><?php echo $row->dependent_name; ?></div> 
  <div class="div_for_showing_details_for_job_title"><?php echo $row->dependent_relationship; ?> </div>  
  <div class="div_for_showing_details_for_job_title"><?php echo $row->dependent_dob;?> </div>
  <div class="div_for_showing_details_for_job_title"></div>  
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
       // $("#savebtn").hide();
       // $("#removebtn").hide();

      $('div#row_id button').click(function(){
          $.post("emp_dependent_del_ctrl",{emp_exp_id:$(this).val()},
          function(data){ $("#message_showing_area").html(data);show_data();
          });
      });

  $('#addbtn').click(function(){
    wait();
      
      $("#addbtn").hide();
      $("#custom").show();

      add_dependent_row();
  });


});

function add_dependent_row()
{
  wait();
  $.post("emp_dependent_add_row_ctrl",function(data){ $("#custom").html(data);});
}
function clearInput()
   {
    $("#dependent_name").val('');
    $("#dependent_relationship").val('');
    $("#dependent_dob").val('');
   }

function wait(){
       var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
       $("#message_showing_area").html(ajax_load);

    }
</script>

