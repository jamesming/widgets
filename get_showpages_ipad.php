<?php     
    
include('db_connect.php');
include('convert_array_xml_class.php');
include('mobile_class.php');




				$showpages_raw = $mobile_api->get_ipad_showpages();
				

				foreach( $showpages_raw as $showpage_raw){
					
					foreach( $showpage_raw  as  $key => $value){
						$showpage[$key]=$value;
						if( $key == 'showpage_items_image_id'){
							$showpage['ipad_thumb'] = 'http://cms.mynuvotv.com/uploads/showpage_items_images/'.$value.'/image.png';
						};
						if( $key == 'url_name'){
							$showpage['page_link'] = 'http://mynuvotv.com/shows/'.$value;
						};													
					}

				$showpages[]=$showpage;	
				}
				

$mobile_api->output_array(
	$array = $showpages,
	$format = ( isset( $_GET["output"] ) ? $_GET["output"]:'test' )
);

?>