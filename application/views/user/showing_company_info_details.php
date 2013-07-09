                    <div class="rowme">
                          <?php
                              if(isset($records))
                              {
                              foreach($records as $row)
                                {?>

                          <div class="row_content_left">
                              <div class="row_content_left_left">
                                  <div class="name_field">
                                    <b>Organisation Name :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  <div class="name_field_right">
                                      <?php echo $row->organisation_name;?>
                                  </div>    
                              </div>

                              <div class="row_content_left_left">
                                  <div class="name_field">
                                     <b>Number of Employees :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <div class="name_field_right">
                                      <?php echo $row->no_of_employee;?>
                                  </div>    
                              </div>                  
                          </div><!--row_content_left-->

                          <div class="row_content_right">
                              <div class="row_content_left_left">
                                  <div class="name_field">
                                     <b>Tax ID :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <div class="name_field_right">
                                      <?php echo $row->tax_id;?>
                                  </div>    
                              </div>

                              <div class="row_content_left_left">
                                  <div class="name_field">
                                     <b>Registration Number :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <div class="name_field_right">
                                      <?php echo $row->registration_no;?>
                                  </div>    
                              </div>
                          </div><!--row_content_right-->  
                 <!--    </div>

                    <div class="rowme"> -->
                      <hr style="width:1130px; margin-left:80px">
                          <div class="row_content_left">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Phone :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  <div class="name_field_right">
                                      <?php if($row->country=='India') {echo "+91";}echo $row->phone;?>
                                  </div>    
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Email :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <div class="name_field_right">
                                      <?php echo $row->email;?>
                                  </div>    
                              </div>                  
                          </div><!--row_content_left-->

                          <div class="row_content_right">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Fax :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <div class="name_field_right">
                                      <?php echo $row->fax;?>
                                  </div>    
                              </div>

                              <div class="row_content_left_left">
                                  <div class="name_field">
                                     
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <div class="name_field_right">
                                      
                                  </div>    
                              </div>
                          </div><!--row_content_right-->  
          
                      <hr style="width:1130px; margin-left:80px">
                          <div class="row_content_left">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                    <b>Address 1 :</b>
                                  </div>
                              </div>
                              <div class="row_content_left_right">
                                  <div class="name_field_right">
                                      <?php echo $row->address1;?>
                                  </div>    
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>City :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <div class="name_field_right">
                                      <?php echo $row->city;?>
                                  </div>    
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Zipcode :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <div class="name_field_right">
                                      <?php echo $row->zipcode;?>
                                  </div>    
                              </div>                  
                          </div><!--row_content_left-->

                          <div class="row_content_right">
                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Address2 :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <div class="name_field_right">
                                      <?php echo $row->address2;?>
                                  </div>    
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>State/Province :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <div class="name_field_right">
                                      <?php echo $row->state;?>
                                  </div>    
                              </div>

                              <div class="row_content_left_left_less">
                                  <div class="name_field">
                                     <b>Nation :</b>
                                  </div>  
                              </div>
                              <div class="row_content_left_right">
                                  <div class="name_field_right">
                                      <?php echo $row->country;?>
                                  </div>    
                              </div>
                          </div><!--row_content_right-->
                          <?php } 
                              }
                              else  
                              {
                                echo "No Records Found";
                              }?>   
                    
                    <hr style="width:1130px; margin-left:80px">
                        <div class="button_field">
                          <input type="submit" class="btn btn-success" value="EDIT" id="edit_form_for_organisation">
                        </div>    
                    </div>
                  
<script type="text/javascript">
$("#edit_form_for_organisation").click(function(){
 
      $.post("index.php/admin_ctrl/show_edit_form_for_company_info",
      function(data){ $("#container-login_show").html(data);
      });
});


</script>                  