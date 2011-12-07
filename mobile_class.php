<?php     

class Mobile_api{
				
				function get_sets(
					$day_to_view,
					$year_to_view,
					$year_to_view_minus_one_year
				){
					$query = 	"SELECT
											carousel_items_sets.id  AS carousel_items_sets_id,
										 	carousel_items.name AS 	carousel_items_name,
										 	carousel_items.iphone_directTo as directTo,
										 	carousel_items.videoID,
										 	carousel_items.showpage_item_id,
										 	carousel_items.page_link,
										 	carousel_items_images.image_type,
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
										 	carousel_items_images.image_type_id in (7,8,9,32)
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
										 	carousel_items_images.image_type_id in (7,8,9,32)					 	
										 ORDER BY
										 	carousel_sets_calendars.day_of_year DESC,
										 	carousel_items_sets.id,
										 	carousel_items_sets.order,
										 	carousel_items_images.image_type_id ASC
										 LIMIT 0, 16
										 	";
										 	
					 // LIMIT 16 =  4 shows/sets of 4 images(7,8,9,32)

					$result = mysql_query($query);
					
					
					while ($row = mysql_fetch_assoc($result)) {
						$sets[] = $row;
					}
					return $sets;  
				}


				function get_sets_ipad(
					$day_to_view,
					$year_to_view,
					$year_to_view_minus_one_year
				){
					$query = 	"SELECT
											carousel_items_sets.id  AS carousel_items_sets_id,
										 	carousel_items.name AS 	carousel_items_name,
										 	carousel_items.iphone_directTo as directTo,
										 	carousel_items.videoID,
										 	carousel_items.showpage_item_id,
										 	carousel_items.page_link,
										 	carousel_items_images.image_type,
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
										 	carousel_items_images.image_type_id in (33,43,46,47)
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
										 	carousel_items_images.image_type_id in (33,43,46,47)				 	
										 ORDER BY
										 	carousel_sets_calendars.day_of_year DESC,
										 	carousel_items_sets.id,
										 	carousel_items_sets.order,
										 	carousel_items_images.image_type_id ASC
										 LIMIT 0, 16
										 	";
										 	
					 // LIMIT 16 =  4 shows/sets of 4 images(33,43,46,47)

					$result = mysql_query($query);
					
					
					while ($row = mysql_fetch_assoc($result)) {
						$sets[] = $row;
					}
					return ( isset( $sets) ? :array() );  
				}

				function get_showpages(){
					$query = 	"SELECT
											showpage_items.id as showpage_item_id,
											showpage_items.name,
											showpage_items.isHot,
											showpage_items.iphone_directTo as directTo,
											showpage_items.url_name as url_name,
											showpage_items_images.id as showpage_items_image_id
										 FROM 
										 	showpage_items,
										 	showpage_items_images
										 WHERE
										 	showpage_items.id = showpage_items_images.showpage_item_id
										 AND
										 	showpage_items_images.image_type_id = 30
										 ORDER BY
										 	showpage_items.isHot desc,
										 	showpage_items.name asc
										 ";

					$result = mysql_query($query);
					while ($row = mysql_fetch_assoc($result)) {
						foreach( $row  as  $key => $value){
							$showpage[$key] = $value;
						}
						$showpages[]=$showpage;
					}
					return $showpages;
				}
				
				function get_showpage($showpage_item_id){
					$query = 	"SELECT
											showpage_items.id as showpage_item_id,
											showpage_items.name,
											showpage_items.about,
											showpage_items_images.image_type,
											showpage_items_images.id as showpage_items_image_id
										 FROM 
										 	showpage_items,
										 	showpage_items_images
										 WHERE
										 	showpage_items.id = $showpage_item_id
										 AND
										 	showpage_items.id = showpage_items_images.showpage_item_id
										 AND
										 	showpage_items_images.image_type_id in (11, 29, 30)
										 ORDER BY
										 	showpage_items_images.image_type_id
										 ";
					
					$result = mysql_query($query);
					while ($row = mysql_fetch_assoc($result)) {
						foreach( $row  as  $key => $value){
							$showpage[$key] = $value;
						}
						$showpages[] = $showpage;
					}
					
					return ( isset( $showpages) ? $showpages:array() );
				}
				
				function get_showpage_feature($showpage_item_id){
					$query = 	"SELECT
											showpage_feature_items.name,
											showpage_feature_items.title,
											showpage_feature_items.content
										 FROM 
										 	showpage_feature_items
										 WHERE
										 	showpage_feature_items.showpage_item_id = $showpage_item_id
										 ";
					
				
					$result = mysql_query($query);
					while ($row = mysql_fetch_assoc($result)) {
						foreach( $row  as  $key => $value){
							$showpage_feature[$key] = $value;
						}
					}
					return ( isset( $showpage_feature) ? $showpage_feature:array() );
				}
				
				function get_iphone_gallery_photos($showpage_item_id){
						$query = 	"SELECT
												showpage_iphone_gallery_photo_items.id as showpage_iphone_gallery_photo_item_id,
												showpage_iphone_gallery_photo_items.name,
												showpage_iphone_gallery_photo_items.id as showpage_iphone_gallery_photo_item_id,
												showpage_iphone_gallery_photo_items_images.image_type,
												showpage_iphone_gallery_photo_items_images.id as showpage_iphone_gallery_photo_items_image_id
											 FROM 
											 	showpage_iphone_gallery_photo_items,
											 	showpage_iphone_gallery_photo_items_images
											 WHERE
											 	showpage_iphone_gallery_photo_items.showpage_item_id = $showpage_item_id
											 AND
											 	showpage_iphone_gallery_photo_items.id = showpage_iphone_gallery_photo_items_images.showpage_iphone_gallery_photo_item_id
											 AND
											 	showpage_iphone_gallery_photo_items_images.image_type_id in (23, 24, 25)
											 ORDER BY 
											 	showpage_iphone_gallery_photo_items.id,
											 	showpage_iphone_gallery_photo_items_images.image_type_id
											 ";
						
						$result = mysql_query($query);
						while ($row = mysql_fetch_assoc($result)) {
							foreach( $row  as  $key => $value){
								$iphone_gallery_photo[$key] = $value;
							}
							 	$showpage[] = $iphone_gallery_photo;
							 	
							 	
						}
				return ( isset( $showpage) ? $showpage:array() );	
				}
				
				function get_cast($showpage_item_id){
					$query = 	"SELECT
											showpage_cast_items.name,
											showpage_cast_items.content,
											showpage_cast_items_images.id as showpage_cast_items_image_id
										 FROM 
										 	showpage_cast_items,
										 	showpage_cast_items_images
										 WHERE
										 	showpage_cast_items.showpage_item_id = $showpage_item_id
										 AND
										 	showpage_cast_items.id = showpage_cast_items_images.showpage_cast_item_id
										 AND
										 	showpage_cast_items_images.image_type_id in (13)
										 ";

				
					$result = mysql_query($query);
					while ($row = mysql_fetch_assoc($result)) {
						foreach( $row  as  $key => $value){
							$cast[$key] = $value;
						}
						 	$showpage[] = $cast;
					}
					return ( isset( $showpage) ? $showpage:array() );
				}
				
				function group_arrays_by_primary_key( 
					$groups,  
					$primary_key,
					$image_key	
				){
					
					$previous_id = "";
					
					$count=0;
					
					foreach( ( isset( $groups) ? $groups:array() )  as  $key =>  $group){
						$count++;
						if( $previous_id == $group[$primary_key]	||
								$previous_id == ""
								){
							
								foreach( $group  as  $field => $value){
									
									$grouping[$field] = $group[$field];
									
									if( $field == $image_key
									){
											$array[$field] = $value;
									};
									
									if( isset($array) && count($array) == 1 ){
											$image[] = $array;
											unset($array);			
									};
					
									
								};	
							$grouping['images'] = $image;			
							
						}else{
							$groupings[]=$grouping;			
							unset($image);
					
								foreach( $group  as  $field => $value){
									
									$grouping[$field] = $group[$field];
									
									if( $field == $image_key 
									){
											$array[$field] = $value;
									};
									
									if(  isset($array) && count($array) == 1 ){
											$image[] = $array;
											unset($array);			
									};
									
								};					
							
						};
						
						
						if( $count ==  count($groups) ){
							
							$groupings[]=$grouping;
							return $groupings;
					
						};
						
						$previous_id = $group[$primary_key];	
							
					};
				}
				
				
				function prepare_iphone_array_with_one_image_type(
					$array,
					$directory,
					$image_types,
					$image_id_field,
					$fields
				){
							foreach( ( isset( $array) ? $array:array() )  as $key => $value){
								$count=0;
								if( $key == $image_id_field){
												$container[  $image_types[$count]   ] = 'http://cms.mynuvotv.com/uploads/'.$directory.'/'.$value.'/image.png';
												$count++;
												$container[  $image_types[$count]   ] = 'http://cms.mynuvotv.com/uploads/'.$directory.'/'.$value.'/image@2x.png';
								}
								
								foreach( $fields  as  $field){
									if( $key == $field
									){
										$container[$key] = $value;
									};			
								}
								
							}
					return $container;
				}
								
				function prepare_iphone_array_with_more_than_one_image_type(
					$crate,
					$directory,
					$image_types,
					$fields
				){
					
						foreach( ( isset( $crate) ? $crate:array() )  as $box){
							
								foreach(  $box as  $key0 => $values0){
									
									if( $key0 == 'images'){
										$count=0;
										foreach( $values0  as $key1 => $image_ids){ 
											foreach( $image_ids  as  $key2 => $image_id){
												$container[  $image_types[$count]   ] = 'http://cms.mynuvotv.com/uploads/'.$directory.'/'.$image_id.'/image.png';
												$count++;
											}
										}
										foreach( $values0  as $key1 => $image_ids){ 
											foreach( $image_ids  as  $key2 => $image_id){
												$container[  $image_types[$count]   ] = 'http://cms.mynuvotv.com/uploads/'.$directory.'/'.$image_id.'/image@2x.png';
												$count++;
											}
										}				
									};
									
				
									
									foreach( $fields  as  $field){
										if( $key0 == $field
										){
											$container[$key0] =$values0;
										};			
									}
									
															
								}
						
								$results[] = $container;
								unset($container);
						}
						return ( isset( $results) ? $results:array() );
				}
				
				
				function prepare_iphone_array_with_more_than_one_image_type_ipad(
					$crate,
					$directory,
					$image_types,
					$fields
				){
					
						foreach( ( isset( $crate) ? $crate:array() )  as $box){
							
								foreach(  $box as  $key0 => $values0){
									
									if( $key0 == 'images'){
										$count=0;
										foreach( $values0  as $key1 => $image_ids){ 
											foreach( $image_ids  as  $key2 => $image_id){
												$container[  $image_types[$count]   ] = 'http://cms.mynuvotv.com/uploads/'.$directory.'/'.$image_id.'/image.png';
												$count++;
											}
										}
		
									};
									
				
									
									foreach( $fields  as  $field){
										if( $key0 == $field
										){
											$container[$key0] =$values0;
										};			
									}
									
															
								}
						
								$results[] = $container;
								unset($container);
						}
						return ( isset( $results) ? $results:array() );
				}
				
				function output_array(
					$array,
					$format
				){
					
						switch ( $format ) {
				
					    case 'json':
					    
								header('Cache-Control: no-cache, must-revalidate');
								header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
								header('Content-type: application/json');
								echo json_encode($array);
								 
					    break;
				
					    case 'xml':
					    
								try 
								{
								    $xml = new array2xml('my_node');
								    $xml->createNode( $array );
								    echo  $xml ;
								} 
								catch (Exception $e) 
								{
								    echo $e->getMessage();
								}
								 
					    break;
					    
					    case 'test':
					    
					    	echo '<pre>';print_r(  $array  );echo '</pre>';  exit;
								 
					    break;	    	    
					    
					  }
					
					
				}
				
}				


$mobile_api = new mobile_api();
?>


