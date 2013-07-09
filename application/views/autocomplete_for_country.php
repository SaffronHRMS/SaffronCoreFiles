<?php
    if(isset($auto_complete_details))
    {
	foreach($auto_complete_details as $row)
	{
		echo $row->cou_name."\n";
	}
     }
     // else
     // {
     // 	echo "No Records Found";
     // }
?>