<?php
 if(is_array($image))
	{
        foreach($image as $row)
        {
?>
    		<img src="<?php  echo base_url();?>uploads/<?php echo $row->image_name;?>"/>
<?php
    	}
    }
    else
    {
?>
			<img src="<?php echo base_url(); ?>uploads/photo.jpg" />
<?php
	}
?>
