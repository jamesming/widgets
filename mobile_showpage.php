<?php     
    
include('db_connect.php');
include('convert_array_xml_class.php');
include('mobile_class.php');


$showpage_item_id = ( isset( $_GET["show_page_id"]) ? $_GET["show_page_id"]:'10' );

				$show = $mobile_api->get_showpage($showpage_item_id);
				
				$showpages['show'] = $mobile_api->prepare_iphone_array_with_one_image_type(
					$show,
					$directory = 'showpage_items_images',
					$image_types = array('hero_iphone_3g','hero_iphone_4g'),
					$image_id_field = 'showpage_items_image_id',
					$fields = array('name') 
				);

$showpages['feature'] = $mobile_api->get_showpage_feature($showpage_item_id);

				$casts_raw = $mobile_api->get_cast($showpage_item_id);
				
				foreach( $casts_raw  as $cast){
								$cast = $mobile_api->prepare_iphone_array_with_one_image_type(
																	$cast,
																	$directory = 'showpage_cast_items_images',
																	$image_types = array('photo_iphone_3g','photo_iphone_4g'),
																	$image_id_field = 'showpage_cast_items_image_id',
																	$fields = array('name', 'content')
																);
								$casts[] = $cast;
				}


$showpages['casts'] = $casts;

				$iphone_gallery_photos = $mobile_api->get_iphone_gallery_photos($showpage_item_id);
				
				$iphone_gallery_photos = $mobile_api->group_arrays_by_primary_key( 
					$groups = $iphone_gallery_photos,  
					$primary_key = 'showpage_iphone_gallery_photo_item_id',
					$image_key = 'showpage_iphone_gallery_photo_items_image_id'
				);
				
				$image_types = array(
												'photo_iphone_3g', 
												'thumb_iphone_inactive_3g', 
												'thumb_iphone_active_3g',
												'photo_iphone_4g', 
												'thumb_iphone_inactive_4g', 
												'thumb_iphone_active_4g');

$showpages['iphone_gallery_photo'] = $mobile_api->prepare_iphone_array_with_more_than_one_image_type(
	$crate = $iphone_gallery_photos,
	$directory = 'showpage_iphone_gallery_photo_items_images',
	$image_types,
	$fields = array()
);


$mobile_api->output_array(
	$array = $showpages,
	$format = ( isset( $_GET["output"] ) ? $_GET["output"]:'test' )
);
