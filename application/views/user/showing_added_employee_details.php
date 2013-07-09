<?php
if(isset($records))
{
?>

<div class="rowme_heading_for_details_from_database">
    <b>  
      <div class="div_for_heading_of_showing_details">Employee ID</div>
      <div class="div_for_heading_of_showing_details_for_description">Name</div>
      <div class="div_for_heading_of_showing_details_for_description">Email</div>
      <!-- <div class="div_for_heading_of_showing_details"></div>
      <div class="div_for_heading_of_showing_details"></div> -->
      <div class="div_for_heading_of_showing_details"></div>
      <div class="div_for_heading_of_showing_details"></div>
      <div class="div_for_heading_of_showing_details"></div>
    </b>
</div>
<?php
foreach($records as $row)
  {
    ?>
<div class="rowme_for_details_from_database_for_job_title">
    <div id="<?php echo $row->id; ?>" title="id_selector_div">
        <span class="normalTip exampleTip" title="Click Here For Edit">  
          <div class="div_for_showing_details_center"><?php echo $row->employee_id; ?></div>
          <div class="div_for_showing_details_for_description_center"><?php echo $row->emp_first_name." ".$row->emp_middle_name." ".$row->emp_last_name; ?></div> 
          <div class="div_for_showing_details_for_description_center"><?php echo $row->emp_other_email; ?> </div> 
          <!-- <div class="div_for_showing_details_center"> </div> -->
          <!-- <div class="div_for_showing_details_center"></div> -->  
          <div class="div_for_showing_details_center"> </div>
          <div class="div_for_showing_details_center"></div>
          <div class="div_for_showing_details_center"></div> 
        </span> 
    </div>
</div>    
    <?php 
  } 
}
else  
{
  echo "No Records Found";
}?> 



 <script type="text/javascript">

 $(document).ready(function() {
//$("#update_div").hide();    
});

$('div[title=id_selector_div]').click(function(){      $('div[title=id_selector_div]').removeClass("highlight_line");
       var id=$(this).attr('id')
      $("#"+id).addClass("highlight_line");if($(this).attr('id')=='table_head')
          { return ;}
       if($("#container-login").show())
     {
      $("#container-login").hide();
      $("#add_user_form").show();
     }
      if($("#update_div").hide())
         {
          $("#update_div").show();
         }
       if($("#message_showing_area").show())
       {
        $("#message_showing_area").hide();
       }
       //alert ($(this).attr('id'));  
     $.post("index.php/admin_ctrl/show_edit_form_for_employee",{id:$(this).attr('id')},
      function(data){ $("#update_div").html(data);
      });
   });


$('div[title=id_selector_div]').hover(function() {
$(this).css('cursor','pointer');
}, function() {
$(this).css('cursor','auto');
});
 </script>     