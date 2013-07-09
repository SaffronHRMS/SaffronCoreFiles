<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
     
</head>
<body>
<h3 style="font-family: Steinem;"><center>CUSTOMERS</center></h3>
<div id="inside_middle">
    <div id="message_showing_area">
    </div>
    <div id="menu_div">
     
                
                <div class="container-login" id="container-login">
                    <div class="rowme">
                        <div class="row_content_left">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Customer Id :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" id="addcustomerid" class="span4me" name="addcustomerid" placeholder="Customer ID">
                                      
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Name :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" id="addcustomername" class="span4me" name="addcustomername" placeholder="Customer Name">
                                      
                              </div>
                              
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Phone No :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  
                                      <input type="text" id="addcustomerphone" class="span4me" name="addcustomerphone" placeholder="Customer Phone no">
                                      
                              </div>
                                             
                        </div><!--row_content_left-->

                        <div class="row_content_right">
                               <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Address :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right_for_text_area">
                                  
                                      <textarea id="addcustomeraddress" class="span4me" name="addcustomeraddress" placeholder="Customer Address" cols="50" rows="3"></textarea>
                                      
                              </div> 

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Description :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right_for_text_area">
                                <!-- <div class="text_area_field1"> -->
                                     <textarea id="customer_description" class="span4me" name="customer_description" placeholder="Customer Description " cols="50" rows="3"></textarea>
                                <!-- </div>  --> 
                                
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <!-- <b>Description :</b> -->
                                  </div>  
                              </div>
                              <div class="row_content_left_right_for_text_area">
                                <!-- <div class="text_area_field1"> -->
                                     <!-- <textarea id="customer_description" class="span4me" name="customer_description" placeholder="Customer Description " cols="50" rows="3"></textarea> -->
                                <!-- </div>  --> 
                                
                              </div>

                        </div><!--row_content_right-->
                   <hr style="width:1130px; margin-left:80px">
                           
                            <div id="create_customer_button" class="button_field">
                                <button type="button" class="btn btn-success " id="create_customer">Create</button>&nbsp;&nbsp;
                                <button type="button" class="btn btn-info" id="cancel_customer">Cancel</button>
                             </div><!--end #create_employee_button-->
                    </div>                                            
                </div>
                      <input type="submit" class="btn btn-success" value="ADD" id="add_customer_form">
    </div><!-- end #menu_div -->
    
                

              
                 <div id="update_div">
                   <!--  <h1>Update div</h1> -->
                  </div><!-- end #update_div -->
                  <!-- <h3 style="font-family: Steinem;">Description</h3>  -->       
                  <div id="description_div">
                  </div><!-- end #description_div -->


</div> <!-- end #inside_middle -->

<script type="text/javascript">
    $.ajaxSetup ({
        cache: false
    });
    var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
    

    $(document).ready(function() {
        $("#create_customer_button").hide();

        $("#container-login").hide();
        customer_detail();
  });



      $("#add_customer_form").click(function(){
         if($("#message_showing_area").hide())
         {
          $("#message_showing_area").show();
         }
        if($("#update_div").show())
         {
          $("#update_div").hide();
         }           
        $("#add_customer_form").hide();

        $("#create_customer_button").show();
        $("#container-login").show();
      });


      $("#create_customer").click(function(){
        wait();//alert ($("#customer_description").val());
          if($("#message_showing_area").hide())
         {
          $("#message_showing_area").show();
         } 
         if($("#addcustomername").val()!='')
         {
            if($("#addcustomerid").val()!='')
            {
               if($("#customer_description").val()!='')
               {
                  if($("#addcustomeraddress").val()!='')
                  {
                    if($("#addcustomerphone").val().length==10)
                    {
                      $.post("index.php/admin_ctrl/show_submit_data_for_adding_customer",{addcustomername:$("#addcustomername").val(),
                      addcustomerid:$("#addcustomerid").val(),customer_description:$("#customer_description").val(),addcustomeraddress:$("#addcustomeraddress").val(),addcustomerphone:$("#addcustomerphone").val(),},
                      function(data){ $("#message_showing_area").html(data);clearInput();customer_detail();
                      });
                    }
                    else
                    {
                      document.getElementById("message_showing_area").innerHTML="Enter Valid Phone no";
                    } 
                  }
                  else
                  {
                    document.getElementById("message_showing_area").innerHTML="Enter Customer Address";
                  } 
                }
                else
                {
                  document.getElementById("message_showing_area").innerHTML="Fill some detail about Customer";
                }
            }
            else
             {
                document.getElementById("message_showing_area").innerHTML="Customer ID is blank";    
             }
         
         }
         else
         {    
            document.getElementById("message_showing_area").innerHTML="Customer name is blank";
         }   

      });     


      $("#cancel_customer ,#cancel_delete_employee").click(function(){
         $("#create_button").hide();
        $("#add_customer_form").show();
        $("#container-login").hide();
        clearInput();

      });     

   function clearInput()
   {
    $("#addcustomername").val('');
    $("#addcustomerid").val('');
    $("#customer_description").val('');
   }





  function customer_detail(){
   // wait();
      $.post("index.php/admin_ctrl/show_data_from_database_for_customer",
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