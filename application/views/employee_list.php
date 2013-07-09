<!DOCTYPE html>
<html>
<head>
    <title></title>
  <link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?php echo(base_url()); ?>css/jquery.autocomplete.css" />
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
     
      <script type="text/javascript" src="<?php echo(base_url()); ?>js/jquery-1.7.2.min.js"></script>
     <script type="text/javascript" src="<?php echo(base_url()); ?>js/jquery.autocomplete.js"></script>
    
     
</head>
<body>
<h3 style="font-family: Steinem;"><center >Employee Information</center></h3>
<div id="inside_middle">
    <div id="message_showing_area">
      <!-- <h1>message showing area<h1> -->
    </div>

     
                
            <div class="container-login" id="container-login">
                <div class="rowme">
                   <div class="row_content_left">
                        <div class="row_content_left_left">
                          <div class="name_field">
                            Search by Name
                          </div> 
                        </div>
                        <div class="row_content_left_right">
                           <input type="text" id="search_by_name" class="span4me" name="search_by_name " placeholder="Search by Name ">
                        </div>
                        <div class="row_content_left_left">
                           <div class="name_field">
                             Search by Supervisor Name
                           </div>  
                        </div>
                        <div class="row_content_left_right">
                         <input type="text" id="search_by_supervisor_name" class="span4me" name="search_by_supervisor_name" placeholder="Search by Supervisor Name">
                        </div>
                        <div class="row_content_left_left">
                           <div class="name_field">
                             Search by location
                           </div>  
                        </div>
                        <div class="row_content_left_right">
                             <select name="city_code" id="city_code">
                              <option value="">-------Select-------</option>
                              <?php 
                          if(isset($distinct_city)) :
                          foreach($distinct_city as $row) : ?>       
                          <option value="<?php echo($row->city_code)?>"><?php echo($row->city_code)?></option>
                          <?php endforeach;
                              else : ?>   
                              <option value="">No Data</option>
                              <?php endif; ?>
                          </select>
                        </div>               
                   </div><!-- row_content_left -->
                   <div class="row_content_right">
                        <div class="row_content_left_left">
                          <div class="name_field">
                            Search by Employee Id
                          </div>  
                       </div>
                       <div class="row_content_left_right">
                        <input type="text" id="search_by_id" class="span4me" name="search_by_id" placeholder="Search by Employee ID">
                       </div>
                       <div class="row_content_left_left">
                           <div class="name_field">
                            Search by Status
                           </div> 
                       </div>
                       <div class="row_content_left_right">
                            <select name="emp_status" id="emp_status">
                              <option value="">-------Select-------</option>
                              <option value="0">Active</option>
                              <option value="1">Not Active</option>
                         </select>
                       </div>

                       <div class="row_content_left_left">
                          <div class="name_field">
                           <!--  Search by Job title -->
                          </div>  
                       </div>
                       <div class="row_content_left_right">
                           <!--  <select name="job_title" id="job_title">
                            <option value="">Select</option>  
                         <?php 
                         if(isset($records)) :
                         foreach($records as $row) : ?>
                         <option value="<?php //echo($row->job_title_code)?>"><?php //echo($row->job_title_code)?></option>
                         <?php endforeach;
                             else : ?>   
                             <option value="">No Data</option>
                             <?php endif; ?>
                          </select> -->
                       </div>
                    </div><!-- row_content_right -->
                  <hr style="width:1150px; margin-left:80px">
                    <div id="search_employee_button" class="button_field">
                        <button type="button" class="btn btn-success " id="search_employee">Search</button>&nbsp;&nbsp;
                        <button type="button" class="btn btn-info" id="cancel_employee">Cancel</button>
                    </div><!--end #create_employee_button-->
                </div> 
            </div><!--container-login-->
             
                 <div id="update_div">
                    <!-- <h1>Update div</h1> -->
                  </div><!-- end #update_div -->    

                  <div id="description_div">
                    <!-- <h1>description div</h1> -->
                  </div><!-- end #description_div -->
</div> <!-- end #inside_middle -->


<script type="text/javascript">
    $.ajaxSetup ({
        cache: false
    });
    var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
    

    $(document).ready(function() {
        
        $("#container-login").show();
        $("#search_by_name").autocomplete("index.php/admin_ctrl/show_autocomplete_for_name", { });
        $("#search_by_id").autocomplete("index.php/admin_ctrl/show_autocomplete_for_employee_id", { });
        $("#search_by_supervisor_name").autocomplete("index.php/admin_ctrl/show_autocomplete_for_supervisor_name", { });
  });


  $("#search_employee").click(function(){
        wait();
        if($("#search_by_name").val()!='')
        {
            if($("#description_div").hide())
              {
                 $("#description_div").show();
              }

             if($("#message_showing_area").show())
             {
               $("#message_showing_area").hide();
             } 
              
              $.post("index.php/admin_ctrl/show_search_employee_detail_search_by_name",
            {
              search_by_name :$("#search_by_name").val(),
            },
            function(data){ $("#description_div").html(data);clearInput();
            });          
        }
        else
        {
            if($("#description_div").hide())
              {
                 $("#description_div").show();
              }
             if($("#message_showing_area").show())
             {
               $("#message_showing_area").hide();
             } 

          //search_by_name not found
          if($("#search_by_id").val()!='')
           {
              $.post("index.php/admin_ctrl/show_search_employee_detail_search_by_id",
              {search_by_id :$("#search_by_id").val(), },
              function(data){ $("#description_div").html(data);clearInput();
              });          
           }
           else
           {
            //search_by_id not found
              if($("#search_by_supervisor_name").val()!='')
              {
                  $.post("index.php/admin_ctrl/show_search_employee_detail_search_by_supervisor_name",
                  {
                    search_by_supervisor_name :$("#search_by_supervisor_name").val(),
                  },
                  function(data){ $("#description_div").html(data);clearInput();
                  });          
              }
              else
              {
                //search_by_supervisor_name not found
                 if($("#job_title").val()!='')
                 {
                    $.post("index.php/admin_ctrl/show_search_employee_detail_job_title",
                    {
                      job_title :$("#job_title").val(),
                    },
                    function(data){ $("#description_div").html(data);clearInput();
                    });                          
                 }
                 else
                 {
                    //job_title not found
                    if($("#city_code").val()!='')
                    {
                      $.post("index.php/admin_ctrl/show_search_employee_detail_city_code",
                      {
                        city_code :$("#city_code").val(),
                      },
                      function(data){ $("#description_div").html(data);clearInput();
                      });                          
                    }
                    else
                    {
                        //city_code not found
                       if($("#emp_status").val()!='')
                       {
                        $.post("index.php/admin_ctrl/show_search_employee_detail_emp_status",
                        {
                         emp_status:$("#emp_status").val(),
                        },
                           function(data){ $("#description_div").html(data);clearInput();
                           });
                       }
                       else
                       {
                         if($("#message_showing_area").hide())
                         {
                           $("#message_showing_area").show();
                         } 
                        //emp_status not found
                        alert ("One Field is Required !")
                        $("#description_div").hide();
                       }
                    }
             
                 }
              }
           }

        }

      });//end search search_employee_button click


           


      $("#cancel_employee").click(function(){
         clearInput();

      });     

   function clearInput()
   {
    $("#search_by_name").val('');
    $("#search_by_id").val('');
    $("#search_by_supervisor_name").val('');
   }



    $("#delete_employee").click(function(){
        wait();
            if($("#addusername").val()!='')
            {
               $.post("index.php/admin_ctrl/show_delete_employee",{addusername:$("#addusername").val()},
               function(data){ $("#message_showing_area").html(data);clearInput();add_employee_detail();
               });

            }
            else
             {
                document.getElementById("message_showing_area").innerHTML="Username is blank";    
             }
         
    });




  function add_employee_detail(){
   // wait();
      $.post("index.php/admin_ctrl/show_data_from_database_for_add_employee",
      function(data){ $("#description_div").html(data);
      });
   }
        
  function wait(){
       var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
       $("#description_div").html(ajax_load);

    }

    </script>
</body>
</html>