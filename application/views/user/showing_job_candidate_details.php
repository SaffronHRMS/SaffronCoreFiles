<?php
//print_r($records) ;


if(isset($records))
{

?>
<table class="table table-striped">  
        <thead>  
<tr id="table_head">
<th>Name</th>
<th>Email</th>
<th>Contact number</th>
<th>Applied for</th>
<th>Skill</th>
<th>Comment</th>
</tr></thead>  
        <tbody>  
<?php
foreach($records as $row)
  {?>
  <tr id="<?php echo $row->id; ?>">
  <td><?php echo $row->first_name." "; echo $row->middle_name." "; echo $row->last_name; ?> </td>
  <td><?php echo $row->email; ?> </td>
  <td><?php echo $row->contact_number; ?></td>
  <td><?php echo $row->applied_for; ?></td>
  <td><?php echo $row->keywords; ?></td>
  <td><?php echo $row->comment; ?></td>
  </tr>
  <?php }
  ?>
</tbody>  
      </table> 

 <?php }
else  
{
  echo "No Records Found";
}     
?>

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
      $("#search_form").show();
     }
     if($("#update_div").hide())
     {
      $("#update_div").show();
     }
       if($("#message_showing_area").show())
       {
        $("#message_showing_area").hide();
       }  
            $.post("index.php/admin_ctrl/show_edit_form_for_job_candidate",{id:$(this).attr('id')},
      function(data){ $("#update_div").html(data);
      });
   });

$('tr').hover(function() {
$(this).css('cursor','pointer');
}, function() {
$(this).css('cursor','auto');
});
 </script>     