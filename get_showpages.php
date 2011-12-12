<?php     
    
include('db_connect.php');
include('convert_array_xml_class.php');
include('mobile_class.php');




				$showpages_raw = $mobile_api->get_showpages();
				

				
				$showpages_raw = $mobile_api->group_arrays_by_primary_key( 
					$groups = $showpages_raw,  
					$primary_key = 'showpage_item_id',
					$image_key = 'showpage_items_image_id'
				);


				$image_types = array(
				
						0 => 'thumb_iphone3g',
						1 => 'thumb_iphone4g',
						2 => 'thumb_ipad'
							
				);
				
				$showpages = $mobile_api->prepare_mobile_array_for_get_showpages(
					$crate = $showpages_raw,
					$directory = 'showpage_items_images',
					$image_types,
					$fields =  array(
						'showpage_item_id', 
						'name',
						'isHot',
						'directTo',
						'url_name'
						) 
				);





$mobile_api->output_array(
	$array = $showpages,
	$format = ( isset( $_GET["output"] ) ? $_GET["output"]:'test' )
);

?>