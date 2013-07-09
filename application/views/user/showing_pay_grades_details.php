<?php
//print_r($records) ;
if(isset($records))
{

?>
<!-- <table class="table table-striped">  
        <thead>  
<tr id="table_head"> -->
<div class="rowme_heading_for_details_from_database">
    <b>  
      <div class="div_for_heading_of_showing_details">Name</div>
      <div class="div_for_heading_of_showing_details">Currency Id</div>
      <div class="div_for_heading_of_showing_details">Minimum Salary</div>
      <div class="div_for_heading_of_showing_details">Maximum Salary</div>
      <div class="div_for_heading_of_showing_details"></div>
      <div class="div_for_heading_of_showing_details"></div>
      <div class="div_for_heading_of_showing_details"></div>
      <div class="div_for_heading_of_showing_details"></div>
    </b>
</div>  

<!-- </tr></thead>  
        <tbody> -->  
<?php
foreach($records as $row)
  {?>
  <div class="rowme_for_details_from_database">
    <div id="<?php echo $row->id; ?>" title="id_selector_div">
        <span class="normalTip exampleTip" title="Click Here For Edit">  
          <div class="div_for_showing_details_for_pay_grade"><?php echo $row->pay_grade_name; ?></div>
          <div class="div_for_showing_details_for_pay_grade"><?php echo $row->currency_id; ?></div> 
          <div class="div_for_showing_details_for_pay_grade"><?php echo $row->min_salary; ?> </div> 
          <div class="div_for_showing_details_for_pay_grade"><?php echo $row->max_salary; ?> </div>
        </span> 
          <div class="div_for_showing_details_for_pay_grade"></div>  
          <div class="div_for_showing_details_for_pay_grade"> </div>
          <div class="div_for_showing_details_for_pay_grade"></div>
          <div class="div_for_showing_details_for_pay_grade"></div> 
        
    </div>
</div>
  </tr>
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
      $("#add_pay_grades_form").show();
     }
      if($("#update_div").hide())
         {
          $("#update_div").show();
         }
       if($("#message_showing_area").show())
       {
        $("#message_showing_area").hide();
       }  
            $.post("index.php/admin_ctrl/show_edit_form_for_pay_grades",{id:$(this).attr('id')},
      function(data){ $("#update_div").html(data);
      });
   });

$('div[title=id_selector_div]').hover(function() {
$(this).css('cursor','pointer');
}, function() {
$(this).css('cursor','auto');
});
 </script>     