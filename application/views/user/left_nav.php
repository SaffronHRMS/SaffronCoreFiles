
<div class="container-left_nav well">
<div class="alert-error">
                 <?php if(isset($error)) { echo $error; } ?>
 </div>
<?php echo form_open_multipart('user_ctrl/do_upload');?>
<input type="file" class="btn btn-success span4me" name="userfile" id="user_pic"/>
<input type="submit" class="btn btn-success" id="submit" value="Upload" />
<?php echo form_close(); ?>

<div id="image_show"> 
</div>
 
    <div class="emp-profile-list">
      <ul >
        <li><button type="submit" class="btn btn-block btn-info" name="image" id="image">Image Upload</button></li>

          <?php // echo form_open('user_ctrl/btn_click_check'); ?>
          
          

        <li><button type="submit" class="btn btn-block btn-info" name="personal" id="personal">Personal Details</button></li>
        <li><button type="submit" class="btn btn-block btn-info" name="contact" id="contact">Contact Details</button></li>
        <li><button type="submit" class="btn btn-block btn-info" name="emergency" id="emergency">Emergency Contacts</button></li>
        <li><button type="submit" class="btn btn-block btn-info" name="dependents" id="dependents">Dependents</button></li>
        <li><button type="submit" class="btn btn-block btn-info" name="immigration" id="immigration">Immigration</button></li>
        <li><button type="submit" class="btn btn-block btn-info" name="job" id="job">Job</button></li>
        <li><button type="submit" class="btn btn-block btn-info" name="qualification" id="qualification">Qualification</button></li>
        <li><button type="submit" class="btn btn-block btn-info" name="workExp" id="workExp">Work Experience</button></li>
      </ul>
    </div>
  
  <?php //echo form_close(); ?>
</div>

<script type="text/javascript">
// $(function() {                       //run when the DOM is ready
//   // $(".btn btn-block btn-info").click(function() {  //use a class, since your ID gets mangled
//   //   $(this).addClass("btn-primary");      //add the class to the clicked element
//   // });

//   $('button[type=submit]').click(function(){
//     // alert($(this).attr('id'));
//       $('button[type=submit]').removeClass("btn-info");
//        var id=$(this).attr('id')
//       $("#"+id).addClass("btn-primary"); 
//   });

// });
</script>