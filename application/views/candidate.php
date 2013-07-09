<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
     
</head>
<body>
<h3 style="font-family: Steinem;">CANDIDATE DETAIL</h3>
<div id="inside_middle">
    <div id="message_showing_area">
    </div>
    <div id="menu_div">
     
                
                <div class="container-login" id="container-login">
                    <div class="row">
                        <div class="span4 offset4 well">
                
                            
                                
                            <input type="text" id="search_by_candidate_name" class="span4" name="search_by_candidate_name" placeholder="Enter Candidate First Name ">
                            <!-- <input type="text" id="search_by_keyword" class="span4" name="search_by_keyword" placeholder="Enter Keywords"> -->
                           <input type="text" id="select_keywords" class="span4" name="select_keywords" placeholder="Enter Keyword">    
               <span id="select_heading">Select Job Title</span>
               <select name="select_job_title" id="select_job_title">
               <?php 
               if(isset($job_title)) :
               foreach($job_title as $row) : ?>
               <option value="<?php echo($row->id)?>"><?php echo($row->job_title)?></option>
               <?php endforeach;
                   else : ?>   
                   <option value="">No Data</option>
                   <?php endif; ?>
                </select>


             <!--   <span id="select_heading">keywords</span>
               <select name="select_keywords" id="select_keywords">
               <?php 
               if(isset($job_candidate)) :
               foreach($job_candidate as $row) : ?>
               <option value="<?php //echo($row->keywords)?>"><?php echo($row->keywords)?></option>
               <?php endforeach;
                   else : ?>   
                   <option value="">No Data</option>
                   <?php endif; ?>
                </select>                 -->

                        
                            <div id="create_workshift_button">
                            <button type="button" class="btn btn-success " id="search_candidate">Search</button>
                            <button type="button" class="btn btn-info" id="cancel_search_candidate">Reset</button>
                             </div><!--end #create_employee_button-->
                        
                            
                            <!-- </form> -->
                        </div>
                    </div>
                </div>
            <input type="submit" class="btn btn-success" value="SEARCH" id="search_form">
          <!--   <input type="submit" class="btn btn-danger" value="DELETE" id="delete_workshift_form"> -->
                    
                
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
        $("#create_workshift_button").hide();
        $("#container-login").hide();
        job_candidate_detail();
  });





      $("#search_form").click(function(){
   
        $("#search_form").hide();
        $("#create_workshift_button").show();
        $("#container-login").show();
      });

  


      $("#search_candidate").click(function(){
        wait();
        //alert ("testing");
        if($("#search_by_candidate_name").val()!='')
        {//alert ("name not null");
            if($("#description_div").hide())
              {
                 $("#description_div").show();
              }

             if($("#message_showing_area").show())
             {
               $("#message_showing_area").hide();
             } 
              $.post("index.php/admin_ctrl/show_search_candidate_detail_search_by_name",
            {
              search_by_name :$("#search_by_candidate_name").val(),
            },
            function(data){ $("#description_div").html(data);clearInput();
            });          
        }
        else
        {//alert ("name null");
            if($("#select_keywords").val()!='')
            {    
              if($("#description_div").hide())
              {
                 $("#description_div").show();
              }

             if($("#message_showing_area").show())
             {
               $("#message_showing_area").hide();
             }              
                  $.post("index.php/admin_ctrl/show_search_candidate_detail_select_keywords",
                {
                  select_keywords :$("#select_keywords").val(),
                },
                function(data){ $("#description_div").html(data);clearInput();
                });
          }
          else
          {//alert ("name null");
          if($("#select_job_title").val()!='')
          {   
              if($("#description_div").hide())
              {
                 $("#description_div").show();
              }

             if($("#message_showing_area").show())
             {
               $("#message_showing_area").hide();
             }     
                $.post("index.php/admin_ctrl/show_search_candidate_detail_select_job_title",
              {
                select_job_title :$("#select_job_title").val(),
              },
              function(data){ $("#description_div").html(data);clearInput();
              });          
          
            }
            else
            {
              document.getElementById("message_showing_area").
                        innerHTML="One Field is Required For Searching Details";
                        $("#description_div").hide();
            }
          }
         }
      });     


      $("#cancel_add_workshift ,#cancel_delete_workshift").click(function(){
         clearInput();

      });     

   function clearInput()
   {
    $("#search_by_candidate_name").val('');
    $("#starting_time_field").val('');
    $("#ending_time_field").val('');
   }



 


  function job_candidate_detail(){
   // wait();
      $.post("index.php/admin_ctrl/show_data_from_database_for_job_candidate",
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