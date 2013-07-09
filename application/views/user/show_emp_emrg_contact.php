<div class="message_showing_area">
  </div>

  <div class="container-personal-detail well" >

<h4>Assigned Emergency Contacts</h4>
  <legend></legend>
    <div class="rowme_heading_for_details_from_database">
      <b>  
        <div class="div_for_heading_of_showing_details">Name</div>
        <div class="div_for_heading_of_showing_details">Relationship</div>
        <div class="div_for_heading_of_showing_details">Mobile</div>
        <div class="div_for_heading_of_showing_details">Home Telephone</div>
        <div class="div_for_heading_of_showing_details">Work Telephone</div>
      </b>
    </div>


<?php if($records != FALSE) { ?>
<?php foreach($records as $row) { ?> 

<div class="rowme_for_details_from_database_for_job_title">
  <div class="div_for_showing_details_for_job_title"><?php echo $row->emrg_name; ?></div> 
  <div class="div_for_showing_details_for_job_title"><?php echo $row->emrg_relationship; ?> </div>  
  <div class="div_for_showing_details_for_job_title"><?php echo $row->emrg_mob_num;?> </div>
  <div class="div_for_showing_details_for_job_title"><?php echo $row->emrg_home_num; ?></div>  
  <div class="div_for_showing_details_for_job_title"> <?php echo $row->emrg_work_num; ?></div>   
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
          $.post("emp_emrg_contact_del_ctrl",{emp_exp_id:$(this).val()},
          function(data){ $("#message_showing_area").html(data);show_data();
          });
      });

  $('#addbtn').click(function(){
    wait();
      
      $("#addbtn").hide();
      $("#custom").show();
      // $("#savebtn").show();
      // $("#removebtn").show();
      add_emrg_row();
});
});


function clearInput()
   {
    $("#emrg_name").val('');
    $("#emrg_relationship").val('');
    $("#emrg_mob_num").val('');
    $("#emrg_home_num").val('');
    $("#emrg_work_num").val('');
   }

function add_emrg_row()
{
  wait();
  $.post("emp_emrg_add_row_ctrl",function(data){ $("#custom").html(data); });
}
function wait(){
       var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
       $("#message_showing_area").html(ajax_load);

    }
</script>
