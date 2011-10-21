<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php  
			$this->load->view('header/blueprint_css.php');
	?>
	
	<script type="text/javascript" language="Javascript" src = "<?php echo  base_url();   ?>js/jquery.js"></script>

	<script type="text/javascript" language="Javascript">
	
			$(document).ready(function() { 
				
									

							$('#select_file').change(function(e){
								$('#uploadForm').submit();
							});
							
			
			});
			 
			 
	</script>
<style>
.float_left{
float:left;	
}

#uploadForm {
    margin-left: 43px;
    margin-top: 15px;
}
#uploadForm div#input_container {
}
#uploadForm div#input_container div {
}
#uploadForm div#input_container div.first {
    width: 234px;
		padding-top: 11px;
		padding-left: 29px;
}

</style>
</head>

<body   style='background:lightgray'  >
	<?php  
	
	
	   

	
	?>
<form id='uploadForm' 
	name='uploadForm' action='<?php echo  base_url();   ?>index.php/main/upload_carousel_image' 
	method='post' 
	enctype='multipart/form-data'>	
	<div id='input_container'    >
			<div  class='first float_left' >
				<input id='select_file' type="file" name="Filedata" size="20"      />

				<input name="carousel_items_image_id" id="carousel_items-image_id" type="hidden" value="<?php 
				
				if( isset($data['carousel_item_id'])){
				echo $data['carousel_items_image_id'];
				}else{
				echo '0';
				};
				
				    ?>">
				<input name="carousel_item_id" id="carousel_item_id" type="hidden" value="<?php echo $data['carousel_item_id']    ?>">
				<input name="image_type" id="image_type" type="hidden" value="<?php echo $data['image_type']    ?>">
				<input name="image_type_id" id="image_type_id" type="hidden" value="<?php echo $data['image_type_id']    ?>">

			</div>
	
	</div>


</form>
	
</body>
</html>