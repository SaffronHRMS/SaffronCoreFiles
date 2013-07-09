<?php //echo "string"; ?>
<?php if($records != FALSE)
{
?>
          <div class="rowme_heading_for_details_from_database">
              <b>
                <div class="div_for_heading_of_showing_details">Punch Date</div>
                <div class="div_for_heading_of_showing_details">Punch In Time</div>
                <div class="div_for_heading_of_showing_details">Punch Out Time</div>
                <div class="div_for_heading_of_showing_details">Duration(hours)</div>
              </b>
          </div>



<?php  
$total_working_hours=0;
$total_working_minutes=0;
$comment='';
foreach($records as $row)
{ ?> 


<?php

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
                    <div class="div_for_showing_details_for_job_title"><?php echo $row->punch_date; ?></div> 
                    <div class="div_for_showing_details_for_job_title"><?php echo $row->punch_in_user_time; ?> </div> 
                    <div class="div_for_showing_details_for_job_title"><?php echo $row->punch_out_user_time; ?></div>  
                    <div class="div_for_showing_details_for_job_title"> <?php echo round($hours,0)." hrs ".round($minutes,0)." min" ;?></div>
          </div>
<?php 
}

     $total_working_hours=$total_working_hours + ($total_working_minutes/60);
      $total_working_minutes=$total_working_minutes%60;

?>




          <div class="rowme_for_details_from_database_for_job_title">
                    <div class="div_for_showing_details_for_job_title"></div> 
                    <div class="div_for_showing_details_for_job_title"> </div> 
                    <div class="div_for_showing_details_for_job_title"></div>  
                    <div class="div_for_showing_details_for_description">TOTAL = <?php echo round($total_working_hours,0)." hrs ".round($total_working_minutes,0)." min"; ?></div>
          </div>

<?php 
}
else
{
	echo "Attendance Not Found";
}
?>