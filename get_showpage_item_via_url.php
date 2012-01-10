<?php     
    
include('db_connect.php');
echo "test";
	echo '<pre>';print_r( $_GET   );echo '</pre>';  

if($get['url_name'] ){
	
	echo '<pre>';print_r( $_GET   );echo '</pre>';  

		$query = 	"SELECT id
							 FROM 
							 	showpage_items
							 WHERE
							 	url_name = ".$_GET['url_name']."
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