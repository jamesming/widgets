		<style>
			
		iframe#iframe_src{
		width:850px;
		height:620px;	
		}
			
			
		img#addFeatureItem{
			width:30px;	
			margin:23px 23px 10px 23px;
			}
			
			
			#feature_item_outside_container{
				clear:both;
				margin:0px 20px;
				border-top:1px solid lightgray;
				border-left:1px solid lightgray;	
				border-right:1px solid lightgray;
				width:892px;
			}
			
					#feature_item_outside_container div.feature_item_row{
					border-bottom:1px solid lightgray;
					padding:5px;
					}
			

		</style>
		<img  class='clearfix ' href='#fancy_zoom_div'  title='Add Feature Item'  id='addFeatureItem' src='<?php echo base_url()    ?>images/add.png'    />
			
  	
  	<div  id='feature_item_outside_container'  class='clearfix ' >
				
			<div   id='feature_item_container'>
				
				<?php
				
				echo '<pre>';print_r(  $data['feature_items']   );echo '</pre>'; 
				
				 foreach( $data['feature_items']  as  $feature_item ){?>
				
					<div  class='clearfix feature_item_row'>
						
test
					
					</div>
					
				<?php } ?>				
				
			</div>
		
  	</div>

		
		<script type="text/javascript" language="Javascript">  
			
			$(document).ready(function() {

				$('#addFeatureItem').css({cursor:'pointer'}).fancyZoom().click(function(event) {

						$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
							table:'feature_items',
							crud:'insert'
							},function(xml) {
							
								var status = $(xml).find('status').text();
								var message = $(xml).find('message').text();
								$("#iframe_src").attr('src','<?php echo base_url();    ?>index.php/main/get_feature_form?feature_item_id=' + $(xml).find('db_response').text()  );
								
						});	
				
				});		
				
				
				$('#feature_item_outside_container   .feature_item_row .name_of').css({cursor:'pointer'}).fancyZoom().click(function(event) {

						$("#iframe_src").attr('src','<?php echo base_url();    ?>index.php/main/get_feature_form?feature_item_id=' + $(this).attr('feature_item_id')  );
				
				});		

				$('.feature_item_trash img').css({cursor:'pointer'}).click(function(event) {


					  if(  confirm('Do you really want to delete this item?')  ){
									$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
										table:'feature_items',
										crud:'delete_feature_item',
										feature_item_id:$(this).attr('feature_item_id')
										
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