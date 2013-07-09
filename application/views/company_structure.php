
<html>
<head>
	<title></title>
<link rel="stylesheet" href="<?php echo(base_url()); ?>css/saffron.css" type="text/css" media="screen" />
     <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
       <script type="text/javascript" src="<?php echo(base_url()); ?>js/jquery-1.7.2.min.js"></script> 	
</head>
<body>
<h3 style="font-family: Steinem;">
COMPANY STRUCTURE
</h3>
Under construction
<div id="inside_middle">
    <div id="message_showing_area">
    </div>

   TechIndyeah Software Private Limited<a href='#' id="add_into_structure">[+]</a>
   <div id="show_structure_form">
   	<input type="text" id="input_field_name" class="span4" placeholder="Enter Name">
   	<input type="button" id="input_field_button" value="ADD">
   </div>                
<ul id="structure_map">
    <!-- <li id="som">som</li> -->
</ul>
   


</div> <!-- end #inside_middle -->
<script type="text/javascript">
   $(document).ready(function() {
       $("#show_structure_form").hide();
           });

    $("#add_into_structure").click(function() {
        $("#show_structure_form").show();
        //alert('+is clicked');
    });

    $('li').click(function() {
        //$("#show_structure_form").hide();
       // alert($(this).attr("id"));
        //alert('+ of first child is clicked');
    });

    $("#input_field_button").click(function() {
        $("#show_structure_form").hide();
        addStructure($(this));

    });

function addStructure(link) {

    // add new tab and related content
    $("#structure_map").append("<li id="+$("#input_field_name").val()+">"+$("#input_field_name").val()+"<a href='#' id='add_into_structure'>[+]</a></li>");

  
    // $show_funcadd='index.php/admin_ctrl/show_'+$(link).attr("id");

    //            $.post($show_funcadd,
    //            function(data){ $("#content").html(data);
    //            });
    

    
}
</script>
</body>
</html>
