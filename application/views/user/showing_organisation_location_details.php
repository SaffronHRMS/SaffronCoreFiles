<!DOCTYPE html>
<html>
<head>
 
              
<?php
if(isset($records))
{

?>
<div class="rowme_heading_for_details_from_database">
    <b>  
      <div class="div_for_heading_of_showing_details">Name</div>
      <div class="div_for_heading_of_showing_details_for_description">Address</div>
      <div class="div_for_heading_of_showing_details">Country</div>
      <div class="div_for_heading_of_showing_details">Phone</div>
      <div class="div_for_heading_of_showing_details">No. of Employees</div>
      <div class="div_for_heading_of_showing_details"></div>
      <div class="div_for_heading_of_showing_details"></div>
      <!-- <div class="div_for_heading_of_showing_details"></div> -->
    </b>
</div>
<?php
foreach($records as $row)
  {
    ?>
<div class="rowme_for_details_from_database_for_company_location">
    <div id="<?php echo $row->id; ?>" title="id_selector_div">
        <span class="normalTip exampleTip" title="Click Here For Edit">  
          <div class="div_for_showing_details"><?php echo $row->name; ?></div>
          <div class="div_for_showing_details_for_description"><?php echo $row->address1."<br>".$row->address2."<br>".$row->city."-".$row->pincode; ?> </div> 
          <div class="div_for_showing_details"><?php echo $row->country; ?> </div>
          <div class="div_for_showing_details"><?php if($row->country=='India'){echo "+91";}echo $row->phone; ?> </div>
          <div class="div_for_showing_details"><?php echo $row->no_of_employee; ?> </div>
        </span>  
          <!-- <div class="div_for_showing_details"> </div> -->
          <div class="div_for_showing_details"></div>
          <div class="div_for_showing_details"></div> 
        
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

$('div[title=id_selector_div]').click(function(){      
  $('div[title=id_selector_div]').removeClass("highlight_line");
       var id=$(this).attr('id')
      $("#"+id).addClass("highlight_line");if($(this).attr('id')=='table_head')
          { return ;}
     if($("#container-login").show())
     {
      $("#container-login").hide();
      $("#add_location_form").show();
     }
      if($("#update_div").hide())
         {
          $("#update_div").show();
         }
       if($("#message_showing_area").show())
       {
        $("#message_showing_area").hide();
       }  
            $.post("index.php/admin_ctrl/show_edit_form_for_company_location",{id:$(this).attr('id')},
      function(data){ $("#update_div").html(data);
      });
   });

$('div[title=id_selector_div]').hover(function() {
$(this).css('cursor','pointer');
}, function() {
$(this).css('cursor','auto');
});
 </script>     


 

</body>
</html>