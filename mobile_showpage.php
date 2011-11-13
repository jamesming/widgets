<?php     
    
include('db_connect.php');
include('convert_array_xml_class.php');
include('mobile_functions.php');
 
$showpage_item_id = 10;

$showpages['show'] = get_showpage($showpage_item_id);
$showpages['feature'] = get_showpage_feature($showpage_item_id);
$showpages['cast'] = get_cast($showpage_item_id);

	$iphone_gallery_photos = get_iphone_gallery_photos($showpage_item_id);
	
	$iphone_gallery_photos = group_arrays_by_primary_key( 
		$groups = $iphone_gallery_photos,  
		$primary_key = 'showpage_iphone_gallery_photo_item_id',
		$image_key = 'showpage_iphone_gallery_photo_items_image_id'
	);
	
	
	$image_types = array(
									'hero_iphone_3g', 
									'thumb_iphone_inactive_3g', 
									'thumb_iphone_active_3g',
									'hero_iphone_4g', 
									'thumb_iphone_inactive_4g', 
									'thumb_iphone_active_4g');

$showpages['iphone_gallery_photo'] = prepare_iphone_array(
	$crate = $iphone_gallery_photos,
	$directory = 'carousel_items_images',
	$image_types,
	$fields = array()
);


output_array(
	$array = $showpages,
	$format = ( isset( $_GET["output"] ) ? $_GET["output"]:'test' )
);
