<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Custom Library Related to SceneCredit
 * @autoloaded YES
 * @path \system\application\libraries\Custom.php
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @copyright 2010 Prospace LLC
 * @version 1.0
 * 
 */
class Custom {

private $CI;			// CodeIgniter instance


function custom(){
	
	$this->CI =& get_instance();	
	

	
}


	/**
	 * insert_page_views
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @access public
	 */
	 
	function insert_page_views( $the_array ){		
		
		$table = $the_array['table'];
		
	  $where_array = array('ip_address' => $the_array['ip_address']);

		$page_views = $this->CI->my_database_model->select_from_table( 
					$table, 
					$select_what = '*', 
					$where_array, 
					$use_order = FALSE, 
					$order_field = '', 
					$order_direction = 'asc', 
					$limit = -1, 
					$use_join = FALSE, 
					$join_array = array(), 
					$group_by_array = array(),
					$or_where_array = array()
					);

	  if(  count( $page_views ) > 0){
	   	
					$this->CI->my_database_model->update_table_where(
								$table, 
								$where_array = array('id' => $page_views[0]->id ), 
								$set_what_array =  array(
										'count' => (int)$page_views[0]->count + 1
									)
								);

	  }else{
		
			$insert_what = array(
			                        'ip_address' =>  $the_array['ip_address'],
			                        'country' =>  $the_array['country'],
			                        'state' =>  $the_array['state'],
			                        'city' =>  $the_array['city']
			                );
			
			return $this->CI->my_database_model->insert_table(
											$table, 
											$insert_what
													); 		
		
		
		
		}
		
		
		
		
		


		
	}
	
}


/* End of file Query.php */ 
/* Location: \system\application\libraries\Custom.php */
