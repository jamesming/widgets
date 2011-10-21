<?php     

$host = "localhost"; 
$user = "jamesming";  
$pw = "ourlady";     
$database = "mynuvotv_db";  


$db = mysql_connect($host,$user,$pw)
   or die("Cannot connect to mySQL.");

mysql_select_db($database,$db)
    or die("Cannot connect to database.");

$query = 	"SELECT
						nu_spotlight_sets_calendars.day_of_year,
						nu_spotlight_sets.name AS nu_spotlight_sets_name,
					 	nu_spotlight_items_sets.id  AS nu_spotlight_items_sets_id,
					 	nu_spotlight_items_sets.order,
					 	nu_spotlight_items.name AS 	nu_spotlight_items_name,
					 	nu_spotlight_items.title AS 	nu_spotlight_items_title,
					 	nu_spotlight_items.blurb AS 	nu_spotlight_items_blurb,
					 	nu_spotlight_items_images.id AS nu_spotlight_items_image_id
					 FROM 
					 	nu_spotlight_sets_calendars,
					 	nu_spotlight_sets,
					 	nu_spotlight_items_sets,
					 	nu_spotlight_items,
					 	nu_spotlight_items_images
					 WHERE
					 	nu_spotlight_sets.id = nu_spotlight_sets_calendars.nu_spotlight_set_id
					 AND
					 	nu_spotlight_sets_calendars.day_of_year <= ".date('z',time())."
					 AND
					 	nu_spotlight_items_sets.nu_spotlight_set_id = nu_spotlight_sets.id
					 AND
					 	nu_spotlight_items.id = nu_spotlight_items_sets.nu_spotlight_item_id
					 AND
					 	nu_spotlight_items_images.nu_spotlight_item_id = nu_spotlight_items.id
					 AND
					 	nu_spotlight_items_images.image_type_id = 4
					 OR
					 	nu_spotlight_sets.id = nu_spotlight_sets_calendars.nu_spotlight_set_id
					 AND
					 	nu_spotlight_sets_calendars.day_of_year <= ".date('z',time())."
					 AND 	
					 	nu_spotlight_items_sets.nu_spotlight_set_id = nu_spotlight_sets.id
					 AND
					 	nu_spotlight_items.id = nu_spotlight_items_sets.nu_spotlight_item_id
					 AND
					 	nu_spotlight_items_images.nu_spotlight_item_id = nu_spotlight_items.id
					 AND
					 	nu_spotlight_items_images.image_type_id = 5
					 ORDER BY
					 	nu_spotlight_sets_calendars.day_of_year DESC,
					 	nu_spotlight_items_sets.id,
					 	nu_spotlight_items_sets.order,
					 	nu_spotlight_items_images.image_type_id ASC
					 LIMIT 0, 10
					 	";

$result = mysql_query($query);


//echo $query."<br />";exit;
					
while ($row = mysql_fetch_assoc($result)) {
	$sets[] = $row;
}


//echo '<pre>';print_r(  $sets  );echo '</pre>';  exit;

$previous_name = "";
foreach( $sets  as  $set){
	
	if( $previous_name != $set['nu_spotlight_items_sets_id']	){
		
			$item['day_of_year'] = $set['day_of_year'];
			$item['nu_spotlight_sets_name'] = $set['nu_spotlight_sets_name'];
			$item['order'] = $set['order'];
			$item['nu_spotlight_items_name'] = $set['nu_spotlight_items_name'];
			$item['nu_spotlight_items_title'] = $set['nu_spotlight_items_title'];
			$item['nu_spotlight_items_blurb'] = $set['nu_spotlight_items_blurb'];
				
			foreach( $set  as  $field => $value){
				if( $field == 'nu_spotlight_items_image_id'){

					$image['feature'] = $value;
				};
			};	

		
	}else{
		
			foreach( $set  as  $field => $value){
				if( $field == 'nu_spotlight_items_image_id'){

					$image['thumb'] = $value;
				};
			};			
			$item['images'] = $image;
			unset($image);
			$items[]=$item;		
		
	};
	$previous_name = $set['nu_spotlight_items_sets_id'];		
};

//echo '<pre>';print_r(  $items );echo '</pre>';  exit;


echo 'FIRST SPOT TITLE:' . $items[0]['nu_spotlight_items_title']."<br />";
echo 'FIRST SPOT BLURB:' . $items[0]['nu_spotlight_items_blurb']."<br />";
echo 'FIRST SPOT FEATURE:' . $items[0]['images']['feature']."<br />";
echo 'FIRST SPOT THUMB:' . $items[0]['images']['thumb']."<br />";

?>
