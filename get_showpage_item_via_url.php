<?php     
    
include('db_connect.php');

if($_GET['url_name'] ){
	

		$query = 	"SELECT id
							 FROM 
							 	showpage_items
							 WHERE
							 	url_name = '".$_GET['url_name']."'
						 ";
		
		$result = mysql_query($query);
		while ($row = mysql_fetch_assoc($result)) {
			foreach( $row  as  $key => $value){
				$showpage_item[$key] = $value;
			}
			$showpages_items[] = $showpage_item;
		}
		
		echo ( count( $showpages_items) ?$showpages_items[0][id] :'0' );

};



?>