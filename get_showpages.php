<?php     
    
include('db_connect.php');
include('convert_array_xml_class.php');
include('mobile_class.php');


$showpages = $mobile_api->get_showpages();

$mobile_api->output_array(
	$array = $showpages,
	$format = ( isset( $_GET["output"] ) ? $_GET["output"]:'test' )
);

?>