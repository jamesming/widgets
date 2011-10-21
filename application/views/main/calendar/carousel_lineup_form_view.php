<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php     	
$this->load->view('header/blueprint_css.php');  
$this->load->view('header/common_css.php');  
?>
<style>	
				body{
				color:gray;
				background:none;	
				}
				a{
				text-decoration:underline;
				color:blue;	
				}
				a:hover{
				color:lightblue;	
				}
	
				
				#instruction{
				margin-left:20px;
				font-weight:bold;
				padding-top:30px;	
				clear:both;
				}
				#carousel_set_outside_container{
				clear:both;
				margin:10px 20px 0px;
				border-top:1px solid lightgray;
				border-left:1px solid lightgray;	
				border-right:1px solid lightgray;
				border-bottom:1px solid lightgray;
				width:570px;
				height:320px;
				overflow-y:scroll;
				}
				
							#carousel_set_outside_container div.row{
								width:100%;
								height:80px;
								border-bottom:1px solid lightgray;
							}
							
							
							#carousel_set_outside_container div.row .carousel_set_name_column{
								width:140px;
								padding-top:15px;
								text-align:left;
								color:gray;
								padding-left:8px;
							}
											#carousel_set_outside_container div.row div.thumbs_container{
												width:auto;
												margin:10px 0px 0px 10px;
											}
											
											#carousel_set_outside_container div.row div.thumbs_container div.thumb{
												width:69px;
												height:37px;
												margin-right:0px;
												margin-left:-14px;
											}
</style>
<script type="text/javascript" language="Javascript" src = "<?php echo  base_url();   ?>js/jquery.js"></script>		

</head>
<?php     
$this->load->view('main/calendar/nav_bar.php'); 
?>

		
		<div  id='instruction'>
			
			<?php if(  count($data['carousel_sets'])==1){?>
			
			<a id="remove">Remove</a> this set for 
			
			<?php } ?>

			
			
			
			<big><?php echo $data['month']. '/' . $data['day'] . '/' .   $data['year']. '</big>';  ?>
		</div>
  	<div  id='carousel_set_outside_container'  class='clearfix '>

  		<?php foreach( $data['carousel_sets']  as  $key => $carousel_set){?>
  		
  		
  		
  				<div  class='row ' carousel_set_id='<?php  echo $carousel_set['id']   ?>'>
			
						<div  href='#fancy_zoom_div'   class='float_left carousel_set_name_column'  carousel_set_id='<?php echo $carousel_set['id']    ?>' >
							<?php  echo $carousel_set['name']   ?>
						</div>
			
						<div href='#fancy_zoom_div'  class='float_left thumbs_container' carousel_set_id='<?php echo $carousel_set['id']    ?>' >


						<?php foreach( $carousel_set['carousel_items_sets'] as  $carousel_items_set ){?>
						
								<div class='float_left thumb'>
									<img src='<?php   echo base_url()  ?>uploads/carousel_items_images/<?php  echo $carousel_items_set->carousel_items_image_id   ?>/image_tiny.png' />
								</div>
						
						<?php } ?>



						</div>
						
					</div>
  		
				
  		
  		<?php } ?>
  		


  	</div>

		<form 
			name='form0'
			id='form0'
			method='get'
			action='<?php  echo base_url()   ?>index.php/main/update_carousel_calendar'
		>
			<input name="month" type="hidden" value="<?php  echo $data['month']   ?>">
			<input name="day" type="hidden" value="<?php  echo $data['day']   ?>">
			<input name="year"  type="hidden" value="<?php echo $data['year']    ?>">
			<input name="carousel_set_id" id="carousel_set_id" type="hidden" value="">
			<input name="delete" id="delete" type="hidden" value="0">
		</form>

		</script>		
<script type="text/javascript" language="Javascript">  

	$(document).ready(function() {
		
		


			$('.row').css({cursor:'pointer'}).each(function(e) {
					$(this).click(function(event) {
						
						$('#carousel_set_id').val($(this).attr('carousel_set_id'));
						
						$('#form0').submit();

					});	
			});
			
			$('#remove').click(function(event) {
						$('#delete').val('1');
						$('#form0').submit();
			});	


			<?php if( count($data['carousel_sets'])==1){?>
				
					$('#carousel_set_outside_container').height('auto').css({overflow:'hidden'});
				
			<?php } ?>



	});
</script>		