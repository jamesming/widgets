<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Api extends CI_Controller {
	
	
   public function __construct(){
        parent::__construct();
        
		// http://mynuvotv.com/api/v1/getScheduleByDateRange?start_date=2011-10-16&end_date=2011-10-24class Api extends CI_Controller {



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
		echo "testing for api.";   
	}
	


	
}
/* End of file main.php */
/* Location: ./application/controllers/api.php */