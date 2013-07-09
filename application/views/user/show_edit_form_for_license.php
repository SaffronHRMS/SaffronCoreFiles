<?php
//print_r($records) ;




?>
<table class="table table-striped">  
 
        <tbody>  
<?php
//print_r($records);
foreach($records as $row)
  {?>
  <tr>
  <td ><input type="text" id="license_name_field" class="span4" value="<?php echo $row->name; ?>" placeholder="license name"> </td>
  <td ><input type="text" id="license_desc_field" class="span4" value="<?php echo $row->description; ?>" placeholder="license Description"> </td>
    <input type="hidden" id="id_field" value="<?php echo $row->id; ?>">

  </tr>
  <?php }
  ?>
</tbody>  
      </table> 

  <button type="button" class="btn btn-success " id="update">UPDATE</button>
  <button type="button" class="btn btn-info" id="reset">RESET</button>     
   <button type="button" class="btn btn-danger " id="delete_data">DELETE</button>

 <script type="text/javascript">

 $(document).ready(function() {
//$("#update_div").hide();
//alert ($(this).attr('id'));    
});


 $("#update").click(function(){
        if($("#message_showing_area").show())
         {
          $("#message_showing_area").hide();
         }
     $.post("index.php/admin_ctrl/show_update_form_for_license",{id:$("#id_field").val(),
      license_name_field:$("#license_name_field").val(),license_desc_field:$("#license_desc_field").val()},
      function(data){ $("#update_div").html(data);license_detail();
      });
   }); 

 $("#delete_data").click(function(){
     if($("#message_showing_area").show())
         {
          $("#message_showing_area").hide();
         }
      $.post("index.php/admin_ctrl/delete_data_for_license",
        {id:$("#id_field").val()},
      function(data){ $("#update_div").html(data);clearInput();license_detail();
       });
   }); 


 </script>     