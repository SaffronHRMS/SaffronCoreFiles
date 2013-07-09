<script type="text/javascript">
$(document).ready(function () { 
$('#leave_balance').html('<img src = "pes/img/ajax-loader.gif"></img>');
});
</script>

<?php

$q=$_GET["dq"];

$con = mysql_connect('localhost', 'root','');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("db_hrms_tis", $con);

$sql="SELECT * FROM hrms_leave WHERE leave_type = '".$q."'";

$result = mysql_query($sql);
?>
<table class="table table-striped">  
        <thead>  
<tr>
<th>Name</th>

</tr></thead>  
        <tbody>  
<?php
while($row = mysql_fetch_array($result))
  {?>
  <tr>
  <td><?php echo  $row['leave_balance'];?> </td>

  </tr>
  <?php }
  ?>
</tbody>  
      </table> 
<?php
mysql_close($con);
?> 