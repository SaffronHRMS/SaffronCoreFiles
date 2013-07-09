<?php
    
if(isset($employee_name))
{
?>
<center>
  <b>Showing Results for :- </b><?php echo $employee_name; ?>
</center> 
<div class="rowme_heading_for_details_from_database">
    <b>  
      <div class="div_for_heading_of_showing_details"></div>
      <div class="div_for_heading_of_showing_details">Punch In Date</div>
      <div class="div_for_heading_of_showing_details">Punch In</div>
      <div class="div_for_heading_of_showing_details">Punch Out</div>
       <div class="div_for_heading_of_showing_details">Status</div>
      <div class="div_for_heading_of_showing_details">Duration(hrs)</div>
      <div class="div_for_heading_of_showing_details">Comment</div>
      <div class="div_for_heading_of_showing_details"></div>
      <!-- <div class="div_for_heading_of_showing_details_for_description"></div> -->
    </b>
</div>
<?php
$total_working_hours=0;
$total_working_minutes=0;
if(isset($records))
{
foreach($records as $row)
  {
$comment='';
    // calculating time difference
   $t1 = strtotime($row->punch_in_user_time);
   $t2 = strtotime($row->punch_out_user_time);
   $t3 = strtotime($row->punch_in_utc_time);
   $t4 = strtotime($row->punch_out_utc_time);
   //echo $t3."<br>".$t4;
   $punch_time=strtotime($row->punch_time);
if(($t1-$punch_time)>'1800')
{
  $comment='late';
}

  
   if($t4==strtotime('0000-00-00 00:00:00'))
   {
    $hours=0;
    $minutes=0;
    $total_working_hours=$total_working_hours+$hours;
    $total_working_minutes=$total_working_minutes+$minutes;
   }
   elseif($t4>$t3)
   {
     $hours = ($t4 - $t3)/3600; 
     $minutes=(($t4 - $t3)%3600)/60;
     //end calculating time difference
     $total_working_hours=$total_working_hours+$hours;
    $total_working_minutes=$total_working_minutes+$minutes;
    // $total_working_hours=$total_working_hours + ($total_working_minutes/60);
    // $total_working_minutes=$total_working_minutes%60;
    //echo $total_working_minutes/60;     
   }
   else
    {
      $hours=0;
    }

    ?>
<div class="rowme_for_details_from_database_for_job_title">
   <!--  <div id="<?php //echo $row->id; ?>" title="id_selector_div">
        <span class="normalTip exampleTip" title="Click Here For Edit">  
          <div class="div_for_showing_details_center"><?php //echo $row->emp_first_name." ".$row->emp_middle_name." ".$row->emp_last_name; ?></div>-->
          <div class="div_for_showing_details_center"></div>
          <div class="div_for_showing_details_center"><?php echo $row->punch_date; ?></div> 
          <div class="div_for_showing_details_center"><?php echo $row->punch_in_user_time; ?> </div> 
          <div class="div_for_showing_details_center"> <?php echo $row->punch_out_user_time; ?></div>
          <div class="div_for_showing_details_center"><?php echo $row->punch_status ;?> </div>
          <div class="div_for_showing_details_center"><?php echo round($hours,0)." hrs ".round($minutes,0)." min" ;?></div>  
          <!-- <div class="div_for_showing_details_center"></div> -->
          <div class="div_for_showing_details_center"><?php echo $comment;?></div>
          <div class="div_for_showing_details_center"></div> 
       <!--  </span> 
    </div> -->
</div>    
    <?php 
  }
}
else
{
  echo "No Records Found";
}
     $total_working_hours=$total_working_hours + ($total_working_minutes/60);
      $total_working_minutes=$total_working_minutes%60;
?>
<div class="rowme_for_details_from_database_for_job_title">
    <!-- <div id="<?php //echo $row->id; ?>" title="id_selector_div"> -->
        <!-- <span class="normalTip exampleTip" title="Click Here For Edit"> -->
          <div class="div_for_showing_details_center"></div> 
          <div class="div_for_showing_details_center"> </div> 
          <div class="div_for_showing_details_center"> </div>
          <div class="div_for_showing_details_center"> </div>
          <div class="div_for_showing_details_center"></div>
          <div class="div_for_showing_details_for_description">TOTAL = <?php echo round($total_working_hours,0)." hrs ".round($total_working_minutes,0)." min"; ?></div>   
          <div class="div_for_showing_details_center"></div>
          <!-- <div class="div_for_showing_details_center"></div> -->
           
        <!-- </span> 
    </div> -->
</div>
<?php
}
else  
{
  ?>
<center>
  <b>Showing Results for Date :- </b><?php echo $on_date; ?>
</center> 
<div class="rowme_heading_for_details_from_database">
    <b>  
      <div class="div_for_heading_of_showing_details_for_description">Name</div>
      <div class="div_for_heading_of_showing_details">Punch In Date</div>
      <div class="div_for_heading_of_showing_details">Punch In</div>
      <div class="div_for_heading_of_showing_details">Punch Out</div>
       <div class="div_for_heading_of_showing_details">Status</div>
      <div class="div_for_heading_of_showing_details">Duration(hrs)</div>
      <div class="div_for_heading_of_showing_details">Comment</div>
      <!-- <div class="div_for_heading_of_showing_details"></div> -->
      <!-- <div class="div_for_heading_of_showing_details_for_description"></div> -->
    </b>
</div>
<?php
$total_working_hours=0;
$total_working_minutes=0;
if(isset($records))
{
foreach($records as $row)
  {
$comment='';
    // calculating time difference
   $t1 = strtotime($row->punch_in_user_time);
   $t2 = strtotime($row->punch_out_user_time);
    $t3 = strtotime($row->punch_in_utc_time);
   $t4 = strtotime($row->punch_out_utc_time);
   $punch_time=strtotime($row->punch_time);
if(($t1-$punch_time)>'1800')
{
  $comment='late';
}

  
   if($t4==strtotime('0000-00-00 00:00:00'))
   {
    $hours=0;
    $minutes=0;
    $total_working_hours=$total_working_hours+$hours;
    $total_working_minutes=$total_working_minutes+$minutes;
   }
   elseif($t4>$t3)
   {
     $hours = ($t4 - $t3)/3600; 
     $minutes=(($t4 - $t3)%3600)/60;
     //end calculating time difference
     $total_working_hours=$total_working_hours+$hours;
    $total_working_minutes=$total_working_minutes+$minutes;     
   }
   else
    {
      $hours=0;
    }

    ?>
<div class="rowme_for_details_from_database_for_job_title">
   <!--  <div id="<?php //echo $row->id; ?>" title="id_selector_div">
        <span class="normalTip exampleTip" title="Click Here For Edit">-->  
          <div class="div_for_showing_details_for_description"><?php echo $row->emp_first_name." ".$row->emp_middle_name." ".$row->emp_last_name; ?></div>
          <!-- <div class="div_for_showing_details_center"></div> -->
          <div class="div_for_showing_details_center"><?php echo $row->punch_date; ?></div> 
          <div class="div_for_showing_details_center"><?php echo $row->punch_in_user_time; ?> </div> 
          <div class="div_for_showing_details_center"> <?php echo $row->punch_out_user_time; ?></div>
          <div class="div_for_showing_details_center"><?php echo $row->punch_status ;?> </div>
          <div class="div_for_showing_details_center"><?php echo round($hours,0)." hrs ".round($minutes,0)." min" ;?></div>  
          <!-- <div class="div_for_showing_details_center"></div> -->
          <div class="div_for_showing_details_center"><?php echo $comment;?></div>
         <!--  <div class="div_for_showing_details_center"></div> --> 
       <!--  </span> 
    </div> -->
</div>    
    <?php 
         $total_working_hours=$total_working_hours + ($total_working_minutes/60);
      $total_working_minutes=$total_working_minutes%60;
  }
}
else
{
  echo "No Records Found";
}
?>
<div class="rowme_for_details_from_database_for_job_title">
    <!-- <div id="<?php //echo $row->id; ?>" title="id_selector_div"> -->
        <!-- <span class="normalTip exampleTip" title="Click Here For Edit"> -->
          <div class="div_for_showing_details_center"></div> 
          <div class="div_for_showing_details_center"> </div> 
          <div class="div_for_showing_details_center"> </div>
          <div class="div_for_showing_details_center"> </div>
          <div class="div_for_showing_details_center"></div>
          <div class="div_for_showing_details_for_description">TOTAL = <?php echo round($total_working_hours,0)." hrs ".round($total_working_minutes,0)." min"; ?></div>   
          <!-- <div class="div_for_showing_details_center"></div> -->
          <!-- <div class="div_for_showing_details_center"></div> -->
           
        <!-- </span> 
    </div> -->
</div>
<?php
}?>



 <script type="text/javascript">
 

 //$(document).ready(function() {
//$("#update_div").hide();    
// });

// $('tr').click(function(){      $('tr').removeClass("highlight_line");
       var id=$(this).attr('id')
      $("#"+id).addClass("highlight_line");if($(this).attr('id')=='table_head')
          { return ;}
//      if($("#container-login").show())
//      {
//       $("#container-login").hide();
//       $("#add_attendance_form").show();
//      }
//      if($("#update_div").hide())
//      {
//       $("#update_div").show();
//      }
//        if($("#message_showing_area").show())
//        {
//         $("#message_showing_area").hide();
//        }  
//             $.post("index.php/admin_ctrl/show_edit_form_for_attendance_details",{id:$(this).attr('id')},
//       function(data){ $("#update_div").html(data);
//       });
//    });


$('tr').hover(function() {
$(this).css('cursor','pointer');
}, function() {
$(this).css('cursor','auto');
});
 </script>     