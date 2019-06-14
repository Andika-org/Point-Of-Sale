<form method="post" action="<?php echo base_url('index.php/cbarcode/bikinbarcode/');?>">
<input type="text" name="bar">
<input type="submit">
</form>
<img src="<?php echo base_url();?>index.php/cbarcode/bikinbarcode/<?php echo $barcode;?>" width="50px" height="50px">
