<?php
//print_r($records) ;

?>
<!-- <table class="table table-striped">  
        <thead>  
<tr>

</tr></thead>  
        <tbody>   -->
<?php
//print_r($records);
foreach($records as $row)
  {?>
 <!--  <tr id="<?php //echo $row->id; ?>">
  <td ><input type="text" id="leavetype_id" value="<?php //echo $row->leave_type_id; ?>"></td>

  <td><input type="text" id="leavetype_name" value="<?php //echo $row->leave_type_name; ?>"> </td>
  <input type="hidden" id="id_field" value="<?php //echo $row->id; ?>">
  </tr> -->
  <?php }
  ?>
<!-- </tbody>  
      </table> 

  <button type="button" class="btn btn-success " id="update">UPDATE</button>
  <button type="button" class="btn btn-info" id="reset">RESET</button>     
    <button type="button" class="btn btn-danger " id="delete_data">DELETE</button> -->

 <script type="text/javascript">

 //$(document).ready(function() {
//$("#update_div").hide();
//alert ($(this).attr('id'));    
// });

// $('tr').click(function(){      $('tr').removeClass("highlight_line");
       var id=$(this).attr('id')
      $("#"+id).addClass("highlight_line");if($(this).attr('id')=='table_head')
          { return ;}
//   var id = $(this).attr('id');

//    });
//  $("#update").click(function(){
//       if($("#message_showing_area").show())
//          {
//           $("#message_showing_area").hide();
//          }
//      $.post("index.php/admin_ctrl/show_update_form_for_leave_type",
//       {id:$("#id_field").val(),leave_name:$("#leavetype_name").val(),leave_id:$("#leavetype_id").val()},
//       function(data){ $("#update_div").html(data);leave_type_detail();
//       });
//    }); 

//  $("#delete_data").click(function(){
//       if($("#message_showing_area").show())
//          {
//           $("#message_showing_area").hide();
//          }
//      $.post("index.php/admin_ctrl/delete_data_for_leave_type",
//       {id:$("#id_field").val()},
//       function(data){ $("#update_div").html(data);leave_type_detail();
//       });
//    }); 




 </script>     