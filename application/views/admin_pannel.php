<?php 
     if($this->session->userdata('logged_in'))
     {
 ?>       
<html>
<head>
	<title>TechIndyeah&trade; HRMS</title>
    <link rel="shortcut icon" href="<?php echo(base_url()); ?>image/favicon.ico">
    <link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo(base_url()); ?>css/dynamic_tab.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo(base_url()); ?>css/jMenu.jquery.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="<?php echo(base_url()); ?>css/atooltip.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="<?php echo(base_url()); ?>css/admin_pannel.css" type="text/css" media="screen"/>
    <link type="text/css" href="<?php echo base_url('bootstrap/css/jquery.datepick.css'); ?>" rel="stylesheet" media="screen">

     <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
       <script type="text/javascript" src="<?php echo(base_url()); ?>js/jquery-1.7.2.min.js"></script>  
        <script type="text/javascript" src="<?php echo(base_url()); ?>js/jMenu.jquery.js"></script>
        <script type="text/javascript" src="<?php echo(base_url()); ?>js/jquery.atooltip.js"></script>

         <!--<script type="text/javascript" src="<?php //echo base_url('bootstrap/js/jquery.datepick.js'); ?>"></script>-->

      <script type="text/javascript">
            $(function(){ 
                $('a.normalTip').aToolTip();
                
                
                $('a.fixedTip').aToolTip({
                    fixed: true
                });
                
                $('a.clickTip').aToolTip({
                    clickIt: true,
                    tipContent: 'Hello I am aToolTip with content from the "tipContent" param'
                });     
                
                $('a.callBackTip').aToolTip({
                    clickIt: true,
                    onShow: function(){alert('I fired OnShow')},
                    onHide: function(){alert('I fired OnHide')}
                });     
                
                
            }); 
        </script>
        
        
</head>
<body>

   <?php
   include_once("header.php"); 

   ?>

<div id="right-side">
    <!-- <h1>form will display here</h1> -->
    <div id="wrapper">
        <ul id="tabs">
            <!-- Tabs go here -->
        </ul>

        <div id="content">
            <!-- Tab content goes here -->
        </div>
        
        <div align="right">
            <!-- *Click on the text to Edit it<br> -->
            <?php //echo date('Y-m-d H:i:s') ; //H:i:s 
              //echo md5('somnath');
              ?>
  
             
                <!-- <ul>
                    <li><a href="#" class="normalTip exampleTip" title="Hello, I am aToolTip">Normal Tooltip</a> </li>
                    
                </ul>  -->       
    </div><!--end #doclist-->  
</div><!--end #right-side-->
<!-- </div>end .container -->
<!-- </center> -->	
<?php
include_once("footer.php"); 
?>    
    
<!-- JavaScript -->
    <script src="<?php echo(base_url()); ?>js/jquery-1.7.2.min.js"></script>
    <script src="<?php echo(base_url()); ?>js/techindyeah.js"></script>
<script type="text/javascript">

   $(document).ready(function() {
        $("#jMenu").jMenu();
           });

function OpenPopup (c) {
// window.open(c,
// 'window',
// 'width=480,height=480,scrollbars=yes,status=yes');
window.open(c,
'window',
'top=200,left=300,width=700,height=300');
}


   $.ajaxSetup ({
        cache: false
    });
    var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
    
    // $("#documents a, #company_info,#jMenu li ul li a ,#jMenu li a").click(function() {
    //     addTab($(this));
    // });
    $("#documents a, #company_info,#jMenu li ul li a ,#jMenu li ul li ul a").click(function() {
        // var varname = '<?php echo $session_user_name; ?>';

         addTab($(this));
        // alert (varname);
    });

function addTab(link) {

     //If tab already exist in the list, return
    if ($("#" + $(link).attr("rel")).length != 0)
    {
  
        alert ("Tab already open");
        return;
    }
    // hide other tabs
    $("#tabs li").removeClass("current");
   
    if($(link).attr("rel")=='JOB' || $(link).attr("rel")=='REPORTS' || $(link).attr("rel")=='PERFORMANCE' || $(link).attr("rel")=='TRAINING' || $(link).attr("rel")=='RECURITMENT' || $(link).attr("rel")=='TIME' || $(link).attr("rel")=='LEAVE' || $(link).attr("rel")=='PIM' || $(link).attr("rel")=='ADMIN' || $(link).attr("rel")=='ORGANIZATION' || $(link).attr("rel")=='QUALIFICATIONS' || $(link).attr("rel")=='PROJECT_INFO')
    {
        alert ('This tab will not for menu');
        return;
    }

    if($(link).attr("rel")=='BLOG')
    {
        return;
    }

    if($(link).attr("rel")=='NOTIFICATION' || $(link).attr("rel")=='REPORT' || $(link).attr("rel")=='LEAVE_CALENDER' || $(link).attr("rel")=='EMPLOYEE_TIMESHEETS' || $(link).attr("rel")=='CANDIDATE' || $(link).attr("rel")=='VACANCIES' || $(link).attr("rel")=='ADD_CANDIDATE' || $(link).attr("rel")=='ADD_TRAINING' || $(link).attr("rel")=='VIEW_TRAINING' || $(link).attr("rel")=='KPI_LIST' || $(link).attr("rel")=='ADD_KPI' || $(link).attr("rel")=='COPY_KPI' || $(link).attr("rel")=='REVIEWS' || $(link).attr("rel")=='EMPLOYEE_LEAVE_REPORT' || $(link).attr("rel")=='EMPLOYEE_TURNIVER_HIRING_REPORT' || $(link).attr("rel")=='EMPLOYEE_TURNOVER_TERMINATION' || $(link).attr("rel")=='HEAD_COUNT_REPORT' || $(link).attr("rel")=='VACANCY_SUCCESSION_REPORT' )
    {
        alert ("disabled");
        return;
    }
    // add new tab and related content
    wait_for_content();
    $("#tabs").append("<li class='current'><a class='tab' id='" + $(link).attr("rel") + "' href='#'>" + 
                     $(link).html() + "</a><a href='#' class='remove'><b>X<b></a></li>");

  
    $show_funcadd='index.php/admin_ctrl/show_'+$(link).attr("id");
// var varname = '<?php echo $session_user_name; ?>';
               $.post($show_funcadd,
               function(data){ 
                $("#content").html(data);
               });
        
}


if($("#tabs li").attr("class")!='current')
{
     var loadUrl = "<?php echo(base_url()); ?>index.php/admin_ctrl/show_employee_list";
     $("#content").html(ajax_load).load(loadUrl);
}

$('#tabs a.tab').live('click', function() {
    // Get the tab name
    var contentname = $(this).attr("id") + "_content";

    $("#tabs li").removeClass("current");
    $show_funcadd='index.php/admin_ctrl/show_'+$(this).attr("id");

               $.post($show_funcadd,
               function(data){ $("#content").html(data);
               });
 
    // show current tab
    //$("#" + contentname).show();
    $(this).parent().addClass("current");
});

$('#tabs a.remove').live('click', function() {
    $("#tabs li").removeClass("current");
    // Get the tab name
    var tabid = $(this).parent().find(".tab").attr("id");
     
    $show_funcadd='index.php/admin_ctrl/show_blank';
 
               $.post($show_funcadd,
               function(data){ $("#content").html(data);
               });
    // remove tab and related content
    var contentname = tabid + "_content";
    //$("#" + contentname).remove();
    $(this).parent().find(".tab,.remove").remove();
 });



    // if there is no current tab and if there are still tabs left, show the first one
if ($("#tabs li.current").length == 0 && $("#tabs li").length > 0) {
    // find the first tab
    var firsttab = $("#tabs li:first-child");
    firsttab.addClass("current");
    // get its link name and show related content
    var firsttabid = $(firsttab).find("a.tab").attr("id");
    // $show_funcadd='index.php/admin_ctrl/show_'+$(firsttab).find("a.tab").attr("id");
    //           $.post($show_funcadd,
    //            function(data){ $("#content p").html(data);
    //            });
    $("#" + firsttabid + "_content").show();


}


function wait_for_content(){
       var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
       $("#content").html(ajax_load);

    }

 function wait_for_data(){
       var ajax_load = "<img class='loading' src='<?php echo(base_url()); ?>images/load.gif' alt='loading...' />";
       $("#message_showing_area").html(ajax_load);

    }   
</script>




</body>
</html>
<?php 
}
else 
{
  echo "please login to access";
}
?>