<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Counter extends CI_Controller {
	
	
   public function __construct(){
        parent::__construct();
        
				$this->time = time();

				$page_views_urls = $this->query->page_views_urls(
					array(
						'name' => $this->uri->segment(3)
					)
				);
				
				$this->page_view_url_id = $page_views_urls[0]->id;
				

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

//					$this->custom->insert_page_views( 
//							array(
//								'page_views_url_id' => $this->page_view_url_id,
//								'ip_address' => $_SERVER['REMOTE_ADDR'],
//								'country' => $geo_array[4],
//								'state' => $geo_array[5],
//								'city' => $geo_array[6]
//								)
//						 );
						 
						 
					$this->custom->insert_page_views( 
							array(
								'page_views_url_id' => $this->page_view_url_id,
								'ip_address' => $_SERVER['REMOTE_ADDR']
								)
						 );		
		
					echo rand(5,12344);
		 
	}
	

	
	
	/**
	 * menu.
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/menu
	 * @access public
	 */
	 
	public function menu(){	
		?>
		<br /><br /><br />
		<a target='_blank' href='<?php  echo base_url()   ?>index.php/counter/report/homepage'>Home Page</a><br />
		<a target='_blank' href='<?php  echo base_url()   ?>index.php/counter/report/findnuvotv'>Find Nuvo</a><br />
		<a target='_blank' href='<?php  echo base_url()   ?>index.php/counter/report/ml4'>Model Latinas 4</a><br />
		<a target='_blank' href='<?php  echo base_url()   ?>index.php/counter/report/ml4video'>Model Latinas 4 Video</a><br />
		<?php     
		
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


		$website_data['date'] = date("m").'-'.date('j', $this->time).'-'.date("Y");

		$website_data['counts'] = $this->my_database_model->select_from_table( 
			$table = 'page_views', 
			$select_what = '*', 
			$where_array = array(
				'created >=' => date("Y").'-'.date("m").'-'.date('j', $this->time),
				'page_views_url_id' => $this->page_view_url_id
			), 
			$use_order = TRUE, 
			$order_field = 'state, city', 
			$order_direction = 'asc',
			$limit = -1
			);
			
		$website_data['tracking_title'] = $this->uri->segment(3);
		
		$website_data['page_views_url_name'] = $this->uri->segment(3);
		
		$website_data['page_views_url_redirect'] = $this->uri->segment(3).'_redirect';




		$this->load->view('counter/report/index_view',
		array('website_data'=>$website_data)
		);			
		 
	}
	
	
	public function get_unique_views(){
		

		
		$counts = $this->my_database_model->select_from_table( 
			$table = 'page_views',
			$select_what = '*', 
			$where_array = array(
				'created >=' => date("Y").'-'.date("m").'-'.date('j', $this->time),
				'page_views_url_id' => $this->page_view_url_id
			), 
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
			$where_array = array(
				'created >=' => date("Y").'-'.date("m").'-'.date('j', $this->time),
				'page_views_url_id' => $this->page_view_url_id
			), 
			$use_order = TRUE, 
			$order_field = 'created', 
			$order_direction = 'desc',
			$limit = -1
			);		
		
		echo $counts[0]->sum;
		
	}	
	
	public function get_unique_adbuys_views(){
		
		
		$counts = $this->my_database_model->select_from_table( 
			$table = 'page_views', 
			$select_what = '*', 
			$where_array = array(
				'created >=' => date("Y").'-'.date("m").'-'.date('j', $this->time),
				'page_views_url_id' => $this->page_view_url_id
			), 
			$use_order = TRUE, 
			$order_field = 'created', 
			$order_direction = 'desc',
			$limit = -1
			);		
		
		echo count($counts);
		
	}	


	public function get_total_adbuy_views(){
		
		$counts = $this->my_database_model->select_from_table( 
			$table = 'page_views', 
			$select_what = 'SUM( count ) AS sum', 
			$where_array = array(
				'created >=' => date("Y").'-'.date("m").'-'.date('j', $this->time),
				'page_views_url_id' => $this->page_view_url_id
			), 
			$use_order = TRUE, 
			$order_field = 'created', 
			$order_direction = 'desc',
			$limit = -1
			);		
		
		echo $counts[0]->sum;
		
	}	
	
}
/* End of file main.php */
/* Location: ./application/controllers/counter.php */