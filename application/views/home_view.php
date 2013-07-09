<html>
<head>
<title>My Form</title>
<link rel="stylesheet" type="text/css" href=" <?php echo base_url('js/style.css'); ?>" media="screen" >
<script type="text/javascript" src="<?php echo base_url('js/jquery-latest.js'); ?>"></script>
<!--<script src="http://code.jquery.com/jquery-latest.js"></script>-->


</head>
<body>


<h3 style="font-family: Steinem;">Your are successfully Login!</h3>
<h2>Welcome <?php echo $username; ?>!</h2>
<p><?php //echo anchor('form', 'Try it again!'); ?></p>
<a href="home/logout">Logout</a>

<?php
	$today = mktime(date('g')+5,date('i')+30,date('s'));                 
	$data=date(" Y-m-d",$today);
	$time=date("g:i A",$today);
	echo "<br /> Date: ".$data."<br />";
	echo "<br /> Time: ".$time."<br />";
?>
<?php
$date = new DateTime();
$date1=explode("/", $date);
echo $date1[0]."<br />";
echo $date1[1]."<br />";
echo $date1[2]."<br />";

$var3 = $date1[2]."-".$date1[1]."-".$date1[0];
echo $var3."<br />";
//echo $date->getTimestamp()."<br />";
?>
Note: <br />

<textarea style="height:220px" name="note" id="note" class="text_area"></textarea>
<br />
<hr />
<script type="text/javascript">
function validate_me()
{
	document.getElementById('me').disabled=true;
	document.getElementById('you').disabled=false;
}
	function validate_you()
{
	document.getElementById('you').disabled=true;
	document.getElementById('me').disabled=false;
}
</script>

<button type="submit" class="positive" name="me" id="me" onclick="validate_me(this)">IN</button>
<button type="submit" class="negative" name="you" id="you" onclick="validate_you(this)">OUT</button>

</body>
</html>
