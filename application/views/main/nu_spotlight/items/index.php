		<style>
		img#addNuSpotlightItem{
			width:30px;	
			margin:23px 23px 10px 23px;
			}
			
			
			#nu_spotlight_item_outside_container{
				clear:both;
				margin:0px 20px;
				border-top:1px solid lightgray;
				border-left:1px solid lightgray;	
				border-right:1px solid lightgray;
				width:892px;
			}
			
					#nu_spotlight_item_outside_container div.nu_spotlight_item_row{
					border-bottom:1px solid lightgray;
					padding:5px;
					}
			
								#nu_spotlight_item_outside_container   .nu_spotlight_item_row .name_of{
								width:110px;
								font-weight:bold;
								font-size:20px;
								padding-top:90px;
								text-align:center;
								color:gray;
								}
								
								
								#nu_spotlight_item_outside_container   .nu_spotlight_item_row .feature_image{
								height:222px;
								border:1px solid lightgray;
								width:242px;	
								
								}
								
								
								
								#nu_spotlight_item_outside_container   .nu_spotlight_item_row .nu_spotlight_item_content{
								width:456px;
								padding:10px;
								}
								
								
											#nu_spotlight_item_outside_container   .nu_spotlight_item_row .nu_spotlight_item_title{
											font-size:16px;
											font-weight:bold;
											}
											#nu_spotlight_item_outside_container   .nu_spotlight_item_row .nu_spotlight_item_blurb{
											height:140px;	
											}
											#nu_spotlight_item_outside_container   .nu_spotlight_item_row .nu_spotlight_item_image_thumb{
											height:100%;
											}
											
								#nu_spotlight_item_outside_container   .nu_spotlight_item_row .nu_spotlight_item_trash{
								width:46px;
								padding-top:90px;
								}
								
											#nu_spotlight_item_outside_container   .nu_spotlight_item_row .nu_spotlight_item_trash img{
											width:30px;
											}	
		</style>
		<img  class='clearfix ' href='#fancy_zoom_div'  title='Add Nu Spotlight Item'  id='addNuSpotlightItem' src='<?php echo base_url()    ?>images/add.png'    />
			
  	
  	<div  id='nu_spotlight_item_outside_container'  class='clearfix ' >
				
			<div   id='nu_spotlight_item_container'>
				
				<?php foreach( $data['nu_spotlight_items']  as  $nu_spotlight_item ){?>
				
					<div  class='clearfix nu_spotlight_item_row'>
						
						<div  class='float_left name_of '  nu_spotlight_item_id='<?php echo $nu_spotlight_item['id']   ?>'  href='#fancy_zoom_div' >
							<?php echo $nu_spotlight_item['name']    ?>
						</div>
						
						<div  class='float_left feature_image'    >
							<img src='<?php echo base_url();    ?>uploads/nu_spotlight_items_images/<?php  echo $nu_spotlight_item['feature_nu_spotlight_items_image_id']   ?>/image.png' />
						</div>
						
						<div class='float_left nu_spotlight_item_content' >
							
							<div  class=' nu_spotlight_item_title'  >
								<?php  echo $nu_spotlight_item['title']  ?>
							</div>
							
							<div  class=' nu_spotlight_item_blurb' >
								<?php  echo $nu_spotlight_item['blurb']  ?>
							</div>
							
							<div class='  nu_spotlight_item_image_thumb'>
								<img src='<?php echo base_url();    ?>uploads/nu_spotlight_items_images/<?php  echo $nu_spotlight_item['thumb_nu_spotlight_items_image_id']   ?>/image.png' />
							</div>
							
						</div>
						
						<div  class='float_left  nu_spotlight_item_trash' >
							<img src='<?php echo base_url()    ?>images/trash.gif'   nu_spotlight_item_id='<?php echo $nu_spotlight_item['id']   ?>' >
						</div>						
						
					
					</div>
					
				<?php } ?>				
				
			</div>
		
  	</div>

		
		<script type="text/javascript" language="Javascript">  
			
			$(document).ready(function() {

				$('#addNuSpotlightItem').css({cursor:'pointer'}).fancyZoom().click(function(event) {

						$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
							table:'nu_spotlight_items',
							crud:'insert'
							},function(xml) {
							
								var status = $(xml).find('status').text();
								var message = $(xml).find('message').text();
								$("#iframe_src").attr('src','<?php echo base_url();    ?>index.php/main/get_nu_spotlight_form?nu_spotlight_item_id=' + $(xml).find('db_response').text()  );
								
						});	
				
				});		
				
				
				$('#nu_spotlight_item_outside_container   .nu_spotlight_item_row .name_of').css({cursor:'pointer'}).fancyZoom().click(function(event) {

						$("#iframe_src").attr('src','<?php echo base_url();    ?>index.php/main/get_nu_spotlight_form?nu_spotlight_item_id=' + $(this).attr('nu_spotlight_item_id')  );
				
				});		

				$('.nu_spotlight_item_trash img').css({cursor:'pointer'}).click(function(event) {


					  if(  confirm('Do you really want to delete this item?')  ){
									$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
										table:'nu_spotlight_items',
										crud:'delete_nu_spotlight_item',
										nu_spotlight_item_id:$(this).attr('nu_spotlight_item_id')
										
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