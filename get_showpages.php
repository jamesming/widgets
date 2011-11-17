<?php     
    
include('db_connect.php');
include('convert_array_xml_class.php');
include('mobile_class.php');




				$showpages_raw = $mobile_api->get_showpages();
				

				foreach( $showpages_raw as $showpage_raw){
					
					foreach( $showpage_raw  as  $key => $value){
						$showpage[$key]=$value;
						if( $key == 'showpage_items_image_id'){
							$showpage['photo_iphone_3g'] = 'http://cms.mynuvotv.com/uploads/showpage_items_images/'.$value.'/image.png';
							$showpage['photo_iphone_4g'] = 'http://cms.mynuvotv.com/uploads/showpage_items_images/'.$value.'/image@2x.png';
						};						
					}

				$showpages[]=$showpage;	
				}
				

$mobile_api->output_array(
	$array = $showpages,
	$format = ( isset( $_GET["output"] ) ? $_GET["output"]:'test' )
);

?>