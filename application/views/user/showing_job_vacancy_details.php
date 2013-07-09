<?php
//print_r($records) ;

if(isset($records))
{

?>
<table class="table table-striped">  
        <thead>  
<tr id="table_head">
<th>Vacancy</th>
<th>Job Title</th>
<th>Hiring Manager</th>
<th>Status</th>
</tr></thead>  
        <tbody>  
<?php
foreach($records as $row)
  {?>
  <tr id="<?php echo $row->id; ?>">
  <td><?php echo $row->no_of_positions; ?> </td>
  <td><?php echo $row->name; ?> </td>
  <td><?php echo $row->hiring_manager_id; ?> </td>
  <td><?php echo $row->status; ?> </td>
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
      $("#add_employment_status_form").show();
     }
     if($("#update_div").hide())
     {
      $("#update_div").show();
     }
       if($("#message_showing_area").show())
       {
        $("#message_showing_area").hide();
       }  
            $.post("index.php/admin_ctrl/show_edit_form_for_leave_type",{id:$(this).attr('id')},
      function(data){ $("#update_div").html(data);
      });
   });

$('tr').hover(function() {
$(this).css('cursor','pointer');
}, function() {
$(this).css('cursor','auto');
});
 </script>     