<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
     
</head>
<body>
<h3 style="font-family: Steinem;">KPI</h3>
<div id="inside_middle">
    <div id="message_showing_area">
    </div>
    <div id="menu_div">
     
                
                <div class="container-login" id="container-login">
                    <div class="row">
                        <div class="span4 offset4 well">
                			Job title*:
                            <select name="job_title_field" id="job_title_field">
               				<?php 
               					if(isset($records)) :
               					foreach($records as $row) : ?>
               				<option value="<?php echo($row->job_title)?>"><?php echo($row->job_title)?></option>
               					<?php endforeach;
                   				else : ?>   
                   				<option value="">No Data</option>
                   				<?php endif; ?>
                				</select>

                			Key Performance Indicator *:
                            <textarea id="kpi_field" class="span4" name="kpi_list" placeholder="Key Performance Indicator " cols="50" rows="3"></textarea><br>
                            Minimum Rating 
                            <input type="text" id="kpi_rate_min_field" class="span4" name="kpi_list" placeholder="Minimum Rating "><br />
                            Maximum Rating
                            <input type="text" id="kpi_rate_max_field" class="span4" name="kpi_list" placeholder="Maximum rating "><br />

                            <textarea id="job_note_field" class="span4" name="kpi_list" placeholder="Note " cols="50" rows="3"></textarea><br>
                           
                            <div id="create_kpi_list_button">
                            <button type="button" class="btn btn-success " id="create_kpi_list">Create</button>
                            <button type="button" class="btn btn-info" id="cancel_add_kpi_list">Reset</button>
                             </div><!--end #create_employee_button-->


                        </div>
                    </div>
                </div>
            <input type="submit" class="btn btn-success" value="ADD" id="add_kpi_list_form">
            <!-- <input type="submit" class="btn btn-danger" value="DELETE" id="delete_kpi_list_form"> -->
                    
                
    </div><!-- end #menu_div -->
    
                
  
          <div class="row">
              <div class="span4 offset4 well">      
                 <div id="update_div">
                   <!--  <h1>Update div</h1> -->
                  </div><!-- end #update_div -->
                  <!-- <h3 style="font-family: Steinem;">Description</h3>  -->       
                  <div id="description_div">
                  </div><!-- end #description_div -->
              </div>
          </div>    


</div> <!-- end #inside_middle -->

<script type="text/javascript">
    $.ajaxSetup ({
        cache: false
    });
    var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
    

    $(document).ready(function() {
        $("#create_kpi_list_button").hide();
        // $("#delete_kpi_list_button").hide();
        $("#container-login").hide();
        kpi_list_detail();
  });


      $("#add_kpi_list_form").click(function(){
          if($("#update_div").show())
         {
          $("#update_div").hide();
         }
        $("#add_kpi_list_form").hide();
        $("#job_desc_field").show();
        $("#job_note_field").show();
        $("#create_kpi_list_button").show();
        $("#container-login").show();

      });



      $("#create_kpi_list").click(function(){
         wait();
           if($("#message_showing_area").hide())
         {
          $("#message_showing_area").show();
         }          
         if($("#kpi_list_field").val()!='')
         {
            if($("#job_desc_field").val()!='')
             {
                if($("#job_note_field").val()!='')
                {
                
                   $.post("index.php/admin_ctrl/show_kpi_list_submit_data",{kpi_list_field:$("#kpi_list_field").val(),job_desc_field:$("#job_desc_field").val(),job_note_field:$("#job_note_field").val()},
                   function(data){ $("#message_showing_area").html(data);clearInput();kpi_list_detail();
                   });
               
                }
                else
                {    
                    document.getElementById("message_showing_area").innerHTML="Title field is blank";
                }
             }
             else
             {    
                document.getElementById("message_showing_area").innerHTML="Description field is blank";
             }      
         }
         else
         {    
            document.getElementById("message_showing_area").innerHTML="Note field is blank";
         }   

      });     


      $("#cancel_add_kpi_list ,#cancel_delete_kpi_list").click(function(){
         clearInput();

      });     

   function clearInput()
   {
    $("#kpi_list_field").val('');
    $("#job_desc_field").val('');
    $("#job_note_field").val('');
    $("#kpi_list_name_field").val('');
    $("#job_description_field").val('');
    $("#note_field").val('');
   }


  function kpi_list_detail(){
   // wait();
      $.post("index.php/admin_ctrl/show_data_from_database_for_kpi_list",
      function(data){ $("#description_div").html(data);
      });
   }
        
  function wait(){
       var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
       $("#message_showing_area").html(ajax_load);

    }

    </script>
</body>
</html>