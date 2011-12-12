<?php     
    
include('db_connect.php');
include('convert_array_xml_class.php');
include('mobile_class.php');

if( isset($_GET['date']) ){
	
		$date_array = explode('-', $_GET['date']);
		$year_to_view = $date_array[0];
		$year_to_view_minus_one_year = $year_to_view - 1;
	 
		$day_to_view = date('z',  strtotime($_GET['date']));
		
}else{
		$year_to_view = date('Y');
		$year_to_view_minus_one_year = $year_to_view - 1;
		$day_to_view = date('z',  strtotime( date('Y').'-'.date('m').'-'.date('d') ));	
};

$sets = $mobile_api->get_sets(
	$day_to_view,
	$year_to_view,
	$year_to_view_minus_one_year
);



$carousel_items = $mobile_api->group_arrays_by_primary_key( 
	$groups = $sets,  
	$primary_key = 'carousel_items_sets_id',
	$image_key = 'carousel_items_image_id'
);




	$fields = array(
		'directTo',
		'carousel_items_name',
		'videoID',
		'showpage_item_id',
		'page_link'
	);
	
	$image_types = array(
	
									0 => 'hero_iphone_3g', 
									1 => 'thumb_iphone_inactive_3g', 
									2 => 'thumb_iphone_active_3g',
									3 => 'hero_android_3g',
									
									4 => 'hero_iphone_4g', 
									5 => 'thumb_iphone_inactive_4g', 
									6 => 'thumb_iphone_active_4g',
									7 => 'hero_android_4g',
									
									8 => 'ipad_hero_portrait',
									9 => 'ipad_hero_landscape',
									10 => 'ipad_hero_thumb_inactive',
									11 => 'ipad_hero_thumb_active'	
									
									);
	
$shows = $mobile_api->prepare_mobile_array_for_carousel(
	$crate = $carousel_items,
	$directory  = 'carousel_items_images',
	$image_types,
	$fields
);



$mobile_api->output_array(
	$array = $shows,
	$format = ( isset( $_GET["output"] ) ? $_GET["output"]:'test' )
);

?>