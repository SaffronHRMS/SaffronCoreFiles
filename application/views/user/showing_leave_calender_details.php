<?php
//print_r($records) ;

if(isset($records))
{
?>
<table class="table table-striped">  
        <thead>  
<tr id="table_head">


<th>Employee Name</th>
<th>Leave type</th>
<th>Leave Entitle(days)</th>
<th>Leave Scheduled(days)</th>
<th>Leave Taken(days)</th>
<th>Leave Balance(days)</th>

</tr></thead>  
        <tbody>  
<?php
foreach($records as $row)
  {?>
  <tr id="<?php echo $row->id; ?>">

  <td><span class="normalTip exampleTip" title="Click Here For Edit"><?php echo $row->emp_first_name." ".$row->emp_middle_name." ".$row->emp_last_name; ?></span> </td>
  <td><span class="normalTip exampleTip" title="Click Here For Edit"><?php echo $row->leave_type; ?></span> </td>
  <td><span class="normalTip exampleTip" title="Click Here For Edit"><?php echo $row->leave_entitle; ?></span></td>
  <td><span class="normalTip exampleTip" title="Click Here For Edit"><?php echo $row->leave_scheduled; ?></span></td>
  <td><span class="normalTip exampleTip" title="Click Here For Edit"><?php echo $row->leave_taken; ?></span></td>
  <td><span class="normalTip exampleTip" title="Click Here For Edit"><?php echo $row->leave_balance; ?></span></td>

  </tr>
  <?php }
  ?>
</tbody>  
      </table> 


 <?php 
}
else  
{
  echo "No Records Found";
}?>     

 <script type="text/javascript">

 $(document).ready(function() {
//$("#update_div").hide();    
});

$('tr').click(function(){      $('tr').removeClass("highlight_line");
       var id=$(this).attr('id')
      $("#"+id).addClass("highlight_line");if($(this).attr('id')=='table_head')
          { return ;}
       if($("#container-login").show())
     {
      $("#container-login").hide();
      $("#add_leave_summary_form").show();
     }
      if($("#update_div").hide())
         {
          $("#update_div").show();
         }
       if($("#message_showing_area").show())
       {
        $("#message_showing_area").hide();
       }
       //alert($(this).attr('id'));           
     $.post("index.php/admin_ctrl/show_edit_form_for_leave_summary",
      {id:$(this).attr('id')},
      function(data){ $("#update_div").html(data);
      });
   });

$('tr').hover(function() {
$(this).css('cursor','pointer');
}, function() {
$(this).css('cursor','auto');
});
 </script>     