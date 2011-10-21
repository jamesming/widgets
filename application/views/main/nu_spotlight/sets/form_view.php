<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php     	
$this->load->view('header/blueprint_css.php');  
$this->load->view('header/common_css.php');  
?>
<style>
body{
background:white;	
font-size:16px;
}
div.name_div{
padding-top:20px;	
}
div.name_div input{
padding:6px 5px;
width:376px;	
border:1px solid lightgray;
}
div.row{
	margin-left:30px;
	width:100%;
	height:40px;
}
							
div.row div.thumbs_container{
	width:auto;
	margin-top:5px;
	
}
											
div.row div.thumbs_container div.thumb{
	
	width:69px;
	height:37px;
	margin-right:20px;
	border:1px dotted gray;
}

div.choice_thumbs_container_div{
	overflow-y:hidden;
	overflow-x:scroll;
	border:1px dotted lightblue;
	height:70px;
	width:436px;
	margin-top:15px;
	margin-bottom:25px;
}
div.choice_thumbs_container_div div.thumbs_container{
	width:5000px;
}

.submit_div{
	margin-top:15px;
}
#submit{
padding:5px 20px;
width:100px;	
}
</style>
</head>  		
<body>  		
<form 
	id='form0' 
	name='form0' 
	action='<?php  echo base_url()   ?>index.php/main/update_nu_spotlight_set_order' 
	method='post'
>
<div  class='container ' >
					<div class='row name_div'>
					Name&nbsp;&nbsp;<input name="name" type="" value="<?php
					
					if( isset($data['nu_spotlight_sets'][0]['name'] )){
						
					  echo $data['nu_spotlight_sets'][0]['name'];
						
					};
 
					  
					  ?>" >
					</div>
	
  				<div  class='row thumbs_container_div' >
			
						<div class='float_left thumbs_container'  >


<?php if( isset($data['nu_spotlight_sets'])  ){
	
							foreach( $data['nu_spotlight_sets'][0]['nu_spotlight_items_sets'] as  $nu_spotlight_items_set ){?>
									<div order_num = '<?php echo $nu_spotlight_items_set->order;   ?>' class='float_left thumb designate' >
											<img src='<?php   echo base_url()  ?>uploads/nu_spotlight_items_images/<?php  echo $nu_spotlight_items_set->nu_spotlight_items_image_id;   ?>/image.png' />
									</div>
		
							<?php }
}else{
	
							for($i=1; $i <=5; $i++){?>
									<div order_num = '<?php echo $i;   ?>' class='float_left thumb designate' >
											
									</div>
							<?php }
	
} ?>


							

						</div>
						
					</div>	
					
					
  				<div  class='clearfix row choice_thumbs_container_div' >
			
						<div class='float_left thumbs_container'  >
							

							<?php foreach( $data['nu_spotlight_items']  as  $nu_spotlight_item){?>
							
									<div class='float_left thumb choice_thumb' nu_spotlight_item_id='<?php echo $nu_spotlight_item['id']    ?>'>
										<img  src='<?php echo base_url()    ?>uploads/nu_spotlight_items_images/<?php  echo $nu_spotlight_item['thumb_nu_spotlight_items_image_id']   ?>/image.png'/>
									</div>
									
							<?php } ?>
							


						</div>
						
					</div>	
					
					<div  class='submit_div row clearfix '    >
						
						<input name="nu_spotlight_set_id" type="hidden" value="<?php echo $data['nu_spotlight_set_id']    ?>">
						
<?php if( isset($data['nu_spotlight_sets'])  ){	
	 foreach( $data['nu_spotlight_sets'][0]['nu_spotlight_items_sets'] as  $nu_spotlight_items_set ){?>
		<input name="order<?php echo $nu_spotlight_items_set->order;   ?>" id="order<?php echo $nu_spotlight_items_set->order;   ?>" type="hidden" value="<?php  echo $nu_spotlight_items_set->nu_spotlight_item_id;   ?>">
		<?php }
}else{
		for($i=1; $i <=5; $i++){?>
				<input name="order<?php echo $i  ?>" id="order<?php echo $i ?>" type="hidden" value="">
		<?php }
} ?>

						<input id="submit" type="submit" value="submit">
					</div>
</div>
</form>
  		
</body>	
<script type="text/javascript" language="Javascript" src = "<?php echo  base_url();   ?>js/jquery.js"></script>		
		<script type="text/javascript" language="Javascript">  
			order_num = 1;	

			$(document).ready(function() {

				$('.designate[order_num=1]').css({'border':'1px solid red'});

				$('.designate').css({cursor:'pointer'}).each(function(event) {
					
						$(this).click(function(event) {	
							
									$('.designate').css({'border':'1px dotted gray'})	
									$(this).css({'border':'1px solid red'});
									
									order_num = $(this).attr('order_num');
									
						});	
				});	
				
				$('.choice_thumb').css({cursor:'pointer'}).each(function(event) {
						$(this).click(function(event) {	
								$('.designate[order_num='+order_num+']').html( 
										$(this).html()
								);
								$('#order'+order_num).val( $(this).attr('nu_spotlight_item_id'));
								
								
								
								
								order_num++;
								
								$('.designate').css({'border':'1px dotted gray'});	
								$('.designate[order_num='+order_num+']').css({'border':'1px solid red'});	
								
								
								
								
								
								
								
						});			
				});	



  		});
		</script>		