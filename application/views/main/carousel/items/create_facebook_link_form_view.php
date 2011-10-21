<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php   $this->load->view('header/blueprint_css.php');  ?>
<link rel="stylesheet" href="<?php  echo base_url();   ?>js/Jcrop/css/jquery.Jcrop.css" type="text/css"  type="text/css" >
   
<script type="text/javascript" language="Javascript" src = "<?php echo  base_url();   ?>js/jquery.js"></script>
<script type='text/javascript' src='<?php  echo base_url()   ?>js/Jcrop/js/jquery.Jcrop.min.js'></script>
<style>
.header{
	margin-top:15px;
	margin-bottom:15px;
	font-size:20px;
	font-weight:bold;
	color:gray;
	text-align:center;	
}
.input_div {
margin-bottom:20px;

}
.input_div input{
padding:5px;
width:610px;	
}
</style>
</head>

<html>



<body >
<div  class='header '>FACEBOOK HOTSPOT
</div>
<div  class='input_div '>
	Link <input name="facebook_link" id="facebook_link" type="text" value="<?php echo $data['carousel_items_images'][0]->facebook_link    ?>">
</div>

	<img   id='cropbox' src='<?php echo base_url()    ?>uploads/carousel_items_images/<?php echo $data['carousel_items_images'][0]->id   ?>/image.png'/>
	
</body>

<form id='corpForm' name='corpForm' action='<?php  echo base_url();   ?>index.php/upload/crop' onsubmit='return checkCoords();'>
	<input type="hidden" size="4" id="x" name="x" value="" />
	<input type="hidden" size="4" id="y" name="y" />
	<input type="hidden" size="4" id="x2" name="x2" />
	<input type="hidden" size="4" id="y2" name="y2" />
	<input type="hidden" size="4" id="w" name="w" />
	<input type="hidden" size="4" id="h" name="h" />

</form>
<div>
	<br /><br />
	<input id="submit" type="button" value="submit">
</div>
</html>

<script type="text/javascript" language="Javascript">
	

	$(document).ready(function() {
		
							jQuery('#cropbox').Jcrop({		
								onChange: showPreview,
								aspectRatio: 0,
//								setSelect:   [<?php echo $data['carousel_items_images'][0]->facebook_top   ?>,  <?php echo $data['carousel_items_images'][0]->facebook_left   ?> ,<?php echo $data['carousel_items_images'][0]->facebook_width   ?>, <?php echo $data['carousel_items_images'][0]->facebook_height   ?>]
								setSelect:   [<?php echo $data['carousel_items_images'][0]->facebook_left   ?>,<?php echo $data['carousel_items_images'][0]->facebook_top   ?>,<?php echo $data['carousel_items_images'][0]->facebook_left + $data['carousel_items_images'][0]->facebook_width   ?>,<?php echo $data['carousel_items_images'][0]->facebook_top + $data['carousel_items_images'][0]->facebook_height   ?>]
//								setSelect:   [10,10,40,40]
							}); 
							
							
							$('#submit').css({cursor:'pointer'}).click(function(event) {
								
										// AJAX UPDATE
										$.post("<?php echo base_url() . 'index.php/main/create_facebook_hotspot_on_tune_in_image';    ?>",{
											x_origin: $('#x').val(),
											y_origin: $('#y').val(),
											width: $('#w').val(),
											height: $('#h').val(),
											facebook_link:$('#facebook_link').val(),
											carousel_items_image_id: '<?php echo $data['carousel_items_images'][0]->id   ?>'
										},function(data) {
											
											
												window.parent.dialog_close();


										});		
							});	
				
  });

					function checkCoords(){
						if (parseInt($('#w').val())) return true;
						alert('Please select a crop region then press submit.');
						return false;
					};
					
					function showPreview(coords){
						$('#x').val(coords.x);
						$('#y').val(coords.y);
						$('#x2').val(coords.x2);
						$('#y2').val(coords.y2);
						$('#w').val(coords.w);
						$('#h').val(coords.h);
					};
</script>

<?php


