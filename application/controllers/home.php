<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	
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
		$this->login();    
	}
	

	/**
	 * login
	 * {@source }
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/login
	 * @access public
	 */

	public function login(){
		
		if( $this->input->post() ){
			
			$this->load->library('custom');
			
			$validation = $this->custom->login_process($post_array = $this->input->post());
			
			if( $validation['is'] == 'true'	){
				
					$newdata = array('user_id' => $validation['id'] );						
						
					$this->session->set_userdata($newdata);
					
					
					
						redirect('/main/index/');

				
					
						
								
			}else{
				
					$this->load->view('home/login_view',
					array(
						'validation'=> $validation,
						'post_array'=> $this->input->post()
					)
					);		
								
			};
			
		}else{
				$this->load->view('home/login_view');			
		};
		

	}
	
	
	/**
	 * logout
	 * {@source }
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/logout
	 * @access public
	 */

	public function logout(){	
		
		$this->session->sess_create();	
		
		redirect('/home/login');
		
	}

function t(){
	
	
$table = 'page_views_urls';

$this->my_database_model->	create_generic_table($table );



$fields_array = array(

											'url' => array(
                                               'type' => 'varchar(1024)'),
                      'name' => array(
                                               'type' => 'varchar(255)')
              ); 
              
              
              
$this->my_database_model->add_column_to_table_if_exist(
	$table, 
	$fields_array
);    	
	


}
}
/* End of file main.php */
/* Location: ./application/controllers/home.php */