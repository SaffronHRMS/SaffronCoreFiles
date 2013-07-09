<?php
//print_r($records) ;

if(isset($records))
{
?>
<div class="div_section_for_displaying_employee_detail_information" >
    <div class="rowme_heading_for_details_from_database">
      <b>  
        <div class="div_for_heading_of_showing_details">Date</div>
        <div class="div_for_heading_of_showing_details_for_description"> Employee Name</div>
        <div class="div_for_heading_of_showing_details">Leave Type Name</div>
        <div class="div_for_heading_of_showing_details">Leave Balance(days)</div>
        <div class="div_for_heading_of_showing_details">No of Days</div>
        <div class="div_for_heading_of_showing_details">status</div>
        <div class="div_for_heading_of_showing_details">comment</div>
        <div class="div_for_heading_of_showing_details">Date from</div>
        <div class="div_for_heading_of_showing_details">Date to</div>

      </b>
    </div>
</div>
<?php
foreach($records as $row)
  {
     $formated_date=explode("-", $row->apply_date);
    $apply_date = $formated_date[2]."-".$formated_date[1]."-".$formated_date[0];
     $formated_date_from=explode("-", $row->date_from);
    $date_from = $formated_date_from[2]."-".$formated_date_from[1]."-".$formated_date_from[0];
    $formated_date_to=explode("-", $row->date_to);
    $date_to = $formated_date_to[2]."-".$formated_date_to[1]."-".$formated_date_to[0];
  ?>
 <div class="div_section_for_displaying_employee_detail_information" > 
          <div class="rowme_for_details_from_database_for_job_title">
              <div id="<?php echo $row->id; ?>" title="id_selector_div">
                  <span class="normalTip exampleTip" title="Click Here For Edit">
                        <div class="div_for_showing_details_center"><?php echo $apply_date; ?></div>
                        <div class="div_for_showing_details_for_description_center"><?php echo $row->emp_first_name ." ".$row->emp_middle_name." ".$row->emp_last_name; ?> <?php //echo $row->employee_id; ?></div>
                        <div class="div_for_showing_details_center"><?php echo $row->leave_type; ?></div>
                        <div class="div_for_showing_details_center"><?php echo $row->leave_balance; ?></div>
                        <div class="div_for_showing_details_center"><?php echo $row->no_of_days; ?></div>
                        <div class="div_for_showing_details_center"><?php echo $row->status; ?></div>
                        <div class="div_for_showing_details_center"><?php echo $row->comment; ?></div>
                        <div class="div_for_showing_details_center"><?php echo $date_from; ?></div>
                        <div class="div_for_showing_details_center"><?php echo $date_to; ?></div>
   
                  </span>
              </div>
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
      $("#add_leave_list_form").show();
     }
     if($("#update_div").hide())
     {
      $("#update_div").show();
     }
       if($("#message_showing_area").show())
       {
        $("#message_showing_area").hide();
       }
            $.post("index.php/admin_ctrl/show_edit_form_for_leave_list",{id:$(this).attr('id') },
      function(data){ $("#update_div").html(data);
      });
   });
$('div[title=id_selector_div]').hover(function() {
$(this).css('cursor','pointer');
}, function() {
$(this).css('cursor','auto');
});
 </script>     