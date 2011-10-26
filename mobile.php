<?php     
if( $_SERVER['HTTP_HOST'] == 'localhost'  ){
	$host = "localhost";
}else{
	$host = "192.168.110.211"; 
};

$user = "jamesming";  
$pw = "ourlady";     
$database = "mynuvotv_db";  

$db = mysql_connect($host,$user,$pw)
   or die("Cannot connect to mySQL.");

mysql_select_db($database,$db)
    or die("Cannot connect to database.");
 
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

$query = 	"SELECT
					 	carousel_items_sets.id  AS carousel_items_sets_id,
					 	carousel_items.name AS 	carousel_items_name,
					 	carousel_items_images.id AS carousel_items_image_id
					 FROM 
					 	carousel_sets_calendars,
					 	carousel_sets,
					 	carousel_items_sets,
					 	carousel_items,
					 	carousel_items_images
					 WHERE
					 	carousel_sets.id = carousel_sets_calendars.carousel_set_id
					 AND
					 	carousel_sets_calendars.day_of_year <= ". $day_to_view ."
					 AND
					 	carousel_sets_calendars.year = ". $year_to_view ."
					 AND
					 	carousel_items_sets.carousel_set_id = carousel_sets.id
					 AND
					 	carousel_items.id = carousel_items_sets.carousel_item_id
					 AND
					 	carousel_items_images.carousel_item_id = carousel_items.id
					 AND
					 	carousel_items_images.image_type_id in (7,8)
					 OR
					 	carousel_sets.id = carousel_sets_calendars.carousel_set_id
					 AND
					 	carousel_sets_calendars.day_of_year <= 365
					 AND
					 	carousel_sets_calendars.year = ". $year_to_view_minus_one_year ."
					 AND
					 	carousel_items_sets.carousel_set_id = carousel_sets.id
					 AND
					 	carousel_items.id = carousel_items_sets.carousel_item_id
					 AND
					 	carousel_items_images.carousel_item_id = carousel_items.id
					 AND
					 	carousel_items_images.image_type_id in (7,8)					 	
					 ORDER BY
					 	carousel_sets_calendars.day_of_year DESC,
					 	carousel_items_sets.id,
					 	carousel_items_sets.order,
					 	carousel_items_images.image_type_id ASC
					 	";

$result = mysql_query($query);

while ($row = mysql_fetch_assoc($result)) {
	$sets[] = $row;
}


$previous_id = "";

$count=0;
foreach( $sets  as  $set){
	$count++;
	if( $previous_id == $set['carousel_items_sets_id']	||
			$previous_id == ""
			){
		
			foreach( $set  as  $field => $value){
				
				$carousel_item[$field] = $set[$field];
				
				if( $field == 'carousel_items_image_id' 
				){
						$array[$field] = $value;
				};
				
				if( isset($array) && count($array) == 1 ){
						$image[] = $array;
						unset($array);			
				};

				
			};	
		$carousel_item['images'] = $image;			
		
	}else{
		$carousel_items[]=$carousel_item;			
		unset($image);

			foreach( $set  as  $field => $value){
				
				$carousel_item[$field] = $set[$field];
				
				if( $field == 'carousel_items_image_id' 
				){
						$array[$field] = $value;
				};
				
				if(  isset($array) && count($array) == 1 ){
						$image[] = $array;
						unset($array);			
				};
				
			};					
		
	};
	
	
	if( $count ==  count($sets) ){
		
		$carousel_items[]=$carousel_item;

	};
	
	$previous_id = $set['carousel_items_sets_id'];		
};


foreach( $carousel_items  as $carousel_item){
		foreach(  $carousel_item as  $key => $images){
			if( $key == 'images'){
				foreach( $images  as $carousel_items_array){ 
					foreach( $carousel_items_array  as  $carousel_items_id){
						$container[] = 'http://cms.mynuvotv.com/uploads/carousel_items_images/'.$carousel_items_id.'/image.png';
					}
				}
			};
		}
		$shows[] = $container;
		unset($container);
}

if( isset($_GET["json"]) && $_GET["json"] == 'true'){
	
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
		echo json_encode($shows);
	
}else{
	
	echo '<pre>';print_r(  $shows  );echo '</pre>';  exit;
	
};





?>