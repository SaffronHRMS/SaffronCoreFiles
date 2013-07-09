<div class="message_showing_area">
  </div>
<div class="container-personal-detail well" >
  <h4>Education</h4>
  <legend></legend>
<div class="rowme_heading_for_details_from_database">
  <b>  
    <div class="div_for_heading_of_showing_details">Level</div>
    <div class="div_for_heading_of_showing_details">School/University</div>
    <div class="div_for_heading_of_showing_details">Year</div>
    <div class="div_for_heading_of_showing_details">GPA/Score</div>
    <div class="div_for_heading_of_showing_details">Specialization</div>
  </b>
</div>


<?php if(is_array($education)) { ?>
<?php foreach($education as $row) { ?> 

<div class="rowme_for_details_from_database_for_job_title">
      <div class="div_for_showing_details_for_job_title"><?php echo $row->edu_level; ?></div> 
      <div class="div_for_showing_details_for_job_title"><?php echo $row->edu_university; ?> </div>  
      <div class="div_for_showing_details_for_job_title"><?php echo $row->edu_year; ?> </div>
      <div class="div_for_showing_details_for_job_title"><?php echo $row->edu_score; ?></div>  
      <div class="div_for_showing_details_for_job_title"> <?php echo $row->edu_specilization; ?></div>
      <div class="div_for_showing_details_for_job_title" id="edu_row_id">
      <button class="btn btn-danger" id="delete" name="delete" value="<?php echo $row->id; ?>">Delete</button></div>
</div>             
<?php } } else { } ?>
<legend></legend>
      <button class="btn btn-primary button_medium_width " id="edu_addbtn" name="edu_addbtn">
      <i class="icon-edit icon-white"></i><strong> Add</strong></button>

<div id="edu"> 
</div>





<h4>Skills</h4>
<legend></legend>
<div class="rowme_heading_for_details_from_database">
  <b>  
    <div class="div_for_heading_of_showing_details">Skill</div>
    <div class="div_for_heading_of_showing_details">Year of Experience</div>
    <div class="div_for_heading_of_showing_details">Description</div>
    <div class="div_for_heading_of_showing_details"></div>
    <div class="div_for_heading_of_showing_details"></div>
  </b>
</div>


<?php if(is_array($skills)) { ?>
<?php foreach($skills as $row) { ?> 

<div class="rowme_for_details_from_database_for_job_title">
      <div class="div_for_showing_details_for_job_title"><?php echo $row->skill; ?></div> 
      <div class="div_for_showing_details_for_job_title"><?php echo $row->experience; ?> </div>  
      <div class="div_for_showing_details_for_job_title"><?php echo $row->skill_description; ?> </div>
      <div class="div_for_showing_details_for_job_title"></div>  
      <div class="div_for_showing_details_for_job_title"></div>
      <div class="div_for_showing_details_for_job_title" id="skill_row_id">
      <button class="btn btn-danger" id="delete" name="delete" value="<?php echo $row->id; ?>">Delete</button></div>
</div>             
<?php } } else { } ?>
<legend></legend>
      <button class="btn btn-primary button_medium_width " id="skill_addbtn" name="skill_addbtn">
      <i class="icon-edit icon-white"></i><strong> Add</strong></button>

        <div id="skill">
        </div>



<h4>Languages</h4>
<legend></legend>
<div class="rowme_heading_for_details_from_database">
  <b>  
    <div class="div_for_heading_of_showing_details">language</div>
    <div class="div_for_heading_of_showing_details">Read</div>
    <div class="div_for_heading_of_showing_details">Write</div>
    <div class="div_for_heading_of_showing_details">Speak</div>
    <div class="div_for_heading_of_showing_details"></div>
  </b>
</div>

<?php if(is_array($languages)) { ?>
<?php foreach($languages as $row) { ?> 
<div class="rowme_for_details_from_database_for_job_title">
      <div class="div_for_showing_details_for_job_title"><?php echo $row->language; ?></div> 
      <div class="div_for_showing_details_for_job_title"><?php if($row->read ==1) { echo "".'<i class="icon-ok"></i>'; } ?></div>  
      <div class="div_for_showing_details_for_job_title"><?php if($row->write ==2) { echo "".'<i class="icon-ok"></i>'; } ?></div>
      <div class="div_for_showing_details_for_job_title"><?php if($row->speak ==3) { echo "".'<i class="icon-ok"></i>'; } ?></div>  
      <div class="div_for_showing_details_for_job_title"></div>
      <div class="div_for_showing_details_for_job_title" id="lang_row_id">
      <button class="btn btn-danger" id="delete" name="delete" value="<?php echo $row->id; ?>">Delete</button></div>
</div>             
<?php } } else { } ?>
<legend></legend>
      <button class="btn btn-primary button_medium_width " id="lang_addbtn" name="lang_addbtn">
      <i class="icon-edit icon-white"></i><strong> Add</strong></button>

<div id="lang">
  
</div>
</div>  

<script type="text/javascript">

 $.ajaxSetup ({
        cache: false
    });
    var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";

$(document).ready(function(){
    wait();
    $("#edu").hide();
    $("#skill").hide();
    $("#lang").hide();

      $('div#edu_row_id button').click(function(){
        $.post("emp_edu_del_ctrl",{edu_row_id:$(this).val()},
        function(data){ $("#message_showing_area").html(data);show_data();
        });
      });

      $('div#skill_row_id button').click(function(){
        $.post("emp_skill_del_ctrl",{skill_row_id:$(this).val()},
        function(data){ $("#message_showing_area").html(data);show_data();
        });
      });

      $('div#lang_row_id button').click(function(){
        $.post("emp_lang_del_ctrl",{lang_row_id:$(this).val()},
        function(data){ $("#message_showing_area").html(data);show_data();
        });
      });

  $('#edu_addbtn').click(function(){
    wait();
      
      $("#edu_addbtn").hide();
      $("#skill_addbtn").hide();
      $("#lang_addbtn").hide();

      $("#edu").show();
      add_emp_edu_row();
  });

  $('#skill_addbtn').click(function(){
    wait();
      
      $("#edu_addbtn").hide();
      $("#skill_addbtn").hide();
      $("#lang_addbtn").hide();

      $("#skill").slideDown();
      add_emp_skill_row();
  });

  $('#lang_addbtn').click(function(){
    wait();
      
      $("#edu_addbtn").hide();
      $("#skill_addbtn").hide();
      $("#lang_addbtn").hide();

      $("#lang").slideDown();
      add_emp_lang_row();
  });

});

function add_emp_edu_row()
{
  wait();
  $.post("emp_edu_add_row_ctrl",function(data){ $("#edu").html(data); });
}

function add_emp_skill_row()
{
  wait();
  $.post("emp_skill_add_row_ctrl",function(data){ $("#skill").html(data); });
}

function add_emp_lang_row()
{
  wait();
  $.post("emp_lang_add_row_ctrl",function(data){ $("#lang").html(data); });
}

function wait(){
       var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
       $("#message_showing_area").html(ajax_load);

    }
</script>


