<?php     
    
include('db_connect.php');

	echo '<pre>';print_r( $get   );echo '</pre>';  

if($get['url_name'] ){
	
	echo '<pre>';print_r( $get   );echo '</pre>';  

		$query = 	"SELECT id
							 FROM 
							 	showpage_items
							 WHERE
							 	url_name = ".$get['url_name']."
						 ";
		
		$result = mysql_query($query);
		while ($row = mysql_fetch_assoc($result)) {
			foreach( $row  as  $key => $value){
				$showpage_item[$key] = $value;
			}
			$showpages_items[] = $showpage_item;
		}
		
		echo '<pre>';print_r(  $showpages_items  );echo '</pre>';  exit;

};

?>