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
    
    
    
class array2xml extends DomDocument
{

    public $nodeName;

    private $xpath;

    private $root;

    private $node_name;


    /**
    * Constructor, duh
    *
    * Set up the DOM environment
    *
    * @param    string    $root        The name of the root node
    * @param    string    $nod_name    The name numeric keys are called
    *
    */
    public function __construct($root='root', $node_name='node')
    {
        parent::__construct();

        /*** set the encoding ***/
        $this->encoding = "ISO-8859-1";

        /*** format the output ***/
        $this->formatOutput = true;

        /*** set the node names ***/
        $this->node_name = $node_name;

        /*** create the root element ***/
        $this->root = $this->appendChild($this->createElement( $root ));

        $this->xpath = new DomXPath($this);
    }

    /*
    * creates the XML representation of the array
    *
    * @access    public
    * @param    array    $arr    The array to convert
    * @aparam    string    $node    The name given to child nodes when recursing
    *
    */
    public function createNode( $arr, $node = null)
    {
        if (is_null($node))
        {
            $node = $this->root;
        }
        foreach($arr as $element => $value) 
        {
            $element = is_numeric( $element ) ? $this->node_name : $element;

            $child = $this->createElement($element, (is_array($value) ? null : $value));
            $node->appendChild($child);

            if (is_array($value))
            {
                self::createNode($value, $child);
            }
        }
    }
    /*
    * Return the generated XML as a string
    *
    * @access    public
    * @return    string
    *
    */
    public function __toString()
    {
        return $this->saveXML();
    }

    /*
    * array2xml::query() - perform an XPath query on the XML representation of the array
    * @param str $query - query to perform
    * @return mixed
    */
    public function query($query)
    {
        return $this->xpath->evaluate($query);
    }

} // end of class


 
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
					 	carousel_items.iphone_directTo,
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
					 	carousel_items_images.image_type_id in (7,8,9)
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
					 	carousel_items_images.image_type_id in (7,8,9)					 	
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


//echo '<pre>';print_r( $carousel_items  );echo '</pre>';  exit;

foreach( $carousel_items  as $carousel_item){
		foreach(  $carousel_item as  $key => $values){
			if( $key == 'images'){
				foreach( $values  as $carousel_items_array){ 
					foreach( $carousel_items_array  as  $carousel_items_id){
						$container[] = 'http://cms.mynuvotv.com/uploads/carousel_items_images/'.$carousel_items_id.'/image.png';
					}
				}
			};
			
			if( $key == 'carousel_items_name' ||
					$key == 'iphone_directTo'
			){
				$container[] =$values;
			};			
			
		}

		$shows[] = $container;
		unset($container);
}

if( isset($_GET["output"]) && $_GET["output"] == 'json'){
	
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
		echo json_encode($shows);
	
}elseif( isset($_GET["output"]) && $_GET["output"] == 'xml'){

		try 
		{
		    $xml = new array2xml('my_node');
		    $xml->createNode( $shows );
		    echo  $xml ;
		} 
		catch (Exception $e) 
		{
		    echo $e->getMessage();
		}


}elseif( isset($_GET["output"]) && $_GET["output"] == 'test'){
	
		echo '<pre>';print_r(  $shows  );echo '</pre>';  exit;
	
};





?>