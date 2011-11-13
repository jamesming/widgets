<?php     
    
include('db_connect.php');
include('convert_array_xml_class.php');
include('mobile_functions.php');

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

$sets = get_sets(
	$day_to_view,
	$year_to_view,
	$year_to_view_minus_one_year
);

$carousel_items = group_arrays_by_primary_key( 
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
									'hero_iphone_3g', 
									'thumb_iphone_inactive_3g', 
									'thumb_iphone_active_3g',
									'hero_iphone_4g', 
									'thumb_iphone_inactive_4g', 
									'thumb_iphone_active_4g');
	
$shows = prepare_iphone_array(
	$crate = $carousel_items,
	$directory  = 'carousel_items_images',
	$image_types,
	$fields
);



output_array(
	$array = $shows,
	$format = $_GET["output"]
);

?>