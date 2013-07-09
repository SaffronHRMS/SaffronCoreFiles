<?php
    if(isset($auto_complete_details))
    {
	foreach($auto_complete_details as $row)
	{
		echo $row->emp_first_name." ".$row->emp_middle_name." ".$row->emp_last_name."\n";
	}
     }
    
    if(isset($autocomplete_details_for_supervisor_name))
    {
    foreach($autocomplete_details_for_supervisor_name as $row)
    {
        echo $row->emp_supervisor_name."\n";
    }
     }
?>