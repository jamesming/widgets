<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Counter extends CI_Controller {
	
	
   public function __construct(){
        parent::__construct();
        



   }

	
	/**
	 * index.
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/index
	 * @access public
	 */
	 
	public function index(){
		
		
					$this->load->library('curl');
					$geo_location =  $this->curl->simple_get('http://api.ipinfodb.com/v3/ip-city/?key=a644434b1b3c5ccc56d42931601df57c3ca668e40cb5bcc81be426e87ca10f51&ip=' . $_SERVER['REMOTE_ADDR']);
												
					$geo_array = explode(';',$geo_location);
	
						$this->custom->insert_page_views( 
							array(
								'ip_address' => $geo_array[2],
								'country' => $geo_array[4],
								'state' => $geo_array[5],
								'city' => $geo_array[6]
								)
						 );
		
		 
	}
	

	/**
	 * report.
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/report
	 * @access public
	 */
	 
	public function report(){

		$this->load->view('counter/report/index_view');			
		 
	}
	
	
	public function get_unique_page_views(){
		
		$counts = $this->my_database_model->select_from_table( 
			$table = 'page_views', 
			$select_what = '*', 
			$where_array = array(), 
			$use_order = TRUE, 
			$order_field = 'created', 
			$order_direction = 'desc',
			$limit = -1
			);		
		
		echo count($counts);
		
	}
	public function get_total_page_views(){
		
		$counts = $this->my_database_model->select_from_table( 
			$table = 'page_views', 
			$select_what = 'SUM( count ) AS sum', 
			$where_array = array(), 
			$use_order = TRUE, 
			$order_field = 'created', 
			$order_direction = 'desc',
			$limit = -1
			);		
		
		echo $counts->sum;
		
	}	
}
/* End of file main.php */
/* Location: ./application/controllers/counter.php */