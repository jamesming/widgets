		<style>
			
			
		iframe#iframe_src{
		width:850px;
		height:620px;	
		}
					
					
		img#addCarouselItem{
			width:30px;	
			margin:23px 23px 10px 23px;
			}
			
			
			#carousel_item_outside_container{
				clear:both;
				margin:0px 20px;
				border-top:1px solid lightgray;
				border-left:1px solid lightgray;	
				border-right:1px solid lightgray;
				width:892px;
			}
			
					#carousel_item_outside_container div.carousel_item_row{
					border-bottom:1px solid lightgray;
					padding:5px;
					}
			
								#carousel_item_outside_container   .carousel_item_row .name_of{
								width:110px;
								font-weight:bold;
								font-size:20px;
								padding-top:0px;
								text-align:center;
								color:gray;
								}
								
	
											
								#carousel_item_outside_container   .carousel_item_row .carousel_item_trash{
								width:46px;
								padding-top:90px;
								}
								
											#carousel_item_outside_container   .carousel_item_row .carousel_item_trash img{
											width:30px;
											}	
		</style>
		<img  class='clearfix ' href='#fancy_zoom_div'  title='Add Carousel Item'  id='addCarouselItem' src='<?php   echo base_url()  ?>images/add.png'    />
			
  	
  	<div  id='carousel_item_outside_container'  class='clearfix ' >
				
			<div   id='carousel_item_container'>
				
				<?php 
				

				foreach( $data['carousel_items']  as  $carousel_item ){?>
				
					<div  class='clearfix carousel_item_row'>
						
						<div  class='float_left name_of '  carousel_item_id='<?php echo $carousel_item['id']   ?>'  href='#fancy_zoom_div' >
							<?php echo $carousel_item['name']    ?>
						</div>
						
						<div class='float_left hero_div' >
							<img src='<?php   echo base_url()  ?>uploads/carousel_items_images/<?php echo $carousel_item['hero_carousel_items_image_id']   ?>/image_tiny.png'  />
						</div>

						<div class='float_left right_tab_div' >
							<img src='<?php   echo base_url()  ?>uploads/carousel_items_images/<?php echo $carousel_item['right_tab_carousel_items_image_id']   ?>/image_tiny.png'  />
						</div>
						
						<div class='float_left tune_in_div' >
							<img src='<?php   echo base_url()  ?>uploads/carousel_items_images/<?php echo $carousel_item['tune_in_carousel_items_image_id']   ?>/image_tiny.png'  />
						</div>
						
						<div  class='float_left  carousel_item_trash' >
							<img src='<?php   echo base_url()  ?>images/trash.gif'   carousel_item_id='<?php echo $carousel_item['id']   ?>' >
						</div>						
						
					
					</div>
					
				<?php } ?>				
				
			</div>
		
  	</div>

		
		<script type="text/javascript" language="Javascript">  
			
			$(document).ready(function() {

				$('#addCarouselItem').css({cursor:'pointer'}).fancyZoom().click(function(event) {

						$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
							table:'carousel_items',
							crud:'insert'
							},function(xml) {
							
								var status = $(xml).find('status').text();
								var message = $(xml).find('message').text();
								$("#iframe_src").attr('src','<?php echo base_url();    ?>index.php/main/get_carousel_form?carousel_item_id=' + $(xml).find('db_response').text()  );
								
						});	
				
				});		
				
				
				$('#carousel_item_outside_container   .carousel_item_row .name_of').css({cursor:'pointer'}).fancyZoom().click(function(event) {

						$("#iframe_src").attr('src','<?php echo base_url();    ?>index.php/main/get_carousel_form?carousel_item_id=' + $(this).attr('carousel_item_id')  );
				
				});		

				$('.carousel_item_trash img').css({cursor:'pointer'}).click(function(event) {


					  if(  confirm('Do you really want to remove this item?')  ){
									$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
										table:'carousel_items',
										crud:'delete_carousel_item',
										carousel_item_id:$(this).attr('carousel_item_id')
										
										},function(xml) {
										
											var db_response = $(xml).find('db_response').text();
										
											if( db_response == 'ok'){
												document.location.reload(true);
											}else{
												alert(db_response);
											};
										
											
											
									});						    
					  }

					
					
				});	

  		});
		</script>		