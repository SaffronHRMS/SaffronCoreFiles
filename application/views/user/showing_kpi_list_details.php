
<?php

if(isset($records))
{

?>
<table class="table table-striped">  
        <thead>  
<tr id="table_head">
<th>Name</th>
</tr></thead>  
        <tbody>  
<?php
foreach($records as $row)
  {?>
  <tr id="<?php echo $row->id; ?>">
  <td><?php echo $row->job_title; ?> </td>
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
*/ 
 <script type="text/javascript">

 $(document).ready(function() {
//$("#update_div").hide();    
});

$('tr').click(function(){if($(this).attr('id')=='table_head')
          { return ;}
     if($("#container-login").show())
     {
      $("#container-login").hide();
      $("#add_languages_form").show();
     }
      if($("#update_div").hide())
         {
          $("#update_div").show();
         }
       if($("#message_showing_area").show())
       {
        $("#message_showing_area").hide();
       }  
            $.post("index.php/admin_ctrl/show_edit_form_for_languages",{id:$(this).attr('id')},
      function(data){ $("#update_div").html(data);
      });
   });

$('tr').hover(function() {
$(this).css('cursor','pointer');
}, function() {
$(this).css('cursor','auto');
});
 </script>     
 