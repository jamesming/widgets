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


function prepare_carousel_items( $segment4, $get_array){
	
			
				switch ( $segment4 ) {
		
			    case 'items':
		
						$carousel_items = $this->CI->query->get_carousel_items();	
												
						$data['carousel_items'] = $carousel_items;
					
			    break;
			    
			    case 'sets':
		
						$data['carousel_sets'] = $this->CI->query->get_carousel_sets( );
					
			    break;

			
				};
				
				$data['segment4'] = $segment4;
				$data['segment3'] = 'carousel';
				
				return $data;
	
}
	



function prepare_nu_spotlight_items( $segment4, $get_array){
	
			
				switch ( $segment4 ) {
		
			    case 'items':
		
						$nu_spotlight_items = $this->CI->query->get_nu_spotlight_items();	
												
						$data['nu_spotlight_items'] = $nu_spotlight_items;
					
			    break;
			    
			    case 'sets':
		
						$data['nu_spotlight_sets'] = $this->CI->query->get_nu_spotlight_sets( );
					
			    break;

			
				};
				
				$data['segment4'] = $segment4;
				$data['segment3'] = 'nu_spotlight';
				
				return $data;
	
}
	

function prepare_feature_items( $segment4, $get_array){
	
		
				$feature_items = $this->CI->query->get_feature_items();	
										
				$data['feature_items'] = $feature_items;
					

				
				$data['segment4'] = $segment4;
				$data['segment3'] = 'feature';
				
				return $data;
	
}



function prepare_calendar($get_array){
	

						if( $get_array['year']){			
							$data['year'] = $get_array['year'];
						}else{
							$data['year'] = date("Y");						
						};
						
						if( $get_array['goto_month']){			
							$data['month'] = $get_array['goto_month'];
						}else{
							$data['month'] = date("m");						
						};
						
						
						$time = time();
						$data['today'] = date('j',$time);
	
	
						$data['prev_or_next'] = array(
							"<b   class='directional_control'   onclick=switch_month('last')>&laquo;</b>" => "", 
							"<b   class='directional_control'   onclick=switch_month('next')>&raquo;</b>" => ""
						);
						
						
						$data['last'] = $data['month'] - 1;
						$data['next'] = $data['month'] + 1;
						
						if( $data['next'] == 14){
							 $data['next'] = 2;
							 $data['month'] = 1;
							 $data['year']  = $data['year'] + 1;
						};
						
						if( $data['last'] == -1){
							 $data['last'] = 11;
							 $data['month'] = 12;
							 $data['year']  = $data['year'] - 1;
						};
						
						
						$data['nu_spotlight_sets_calendars'] = $this->CI->query->get_nu_spotlight_sets_calendars(
							$month = $data['month'],
							$year = $data['year']
						);	
						
						
						$data['carousel_sets_calendars'] = $this->CI->query->get_carousel_sets_calendars(
							$month = $data['month'],
							$year = $data['year']
						);	
						
						
						
						
						$data['nu_spotlight_videos_calendars'] = $this->CI->query->get_nu_spotlight_videos_calendars(
								$where_array = array(
									'nu_spotlight_videos_calendars.month' => $data['month'],
									'nu_spotlight_videos_calendars.year' => $data['year'] 
								)
						);	
						
						
						$data['segment3'] = 'calendar';
						
						return $data;
						
}




	
	/**
	 * login_process
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @access public
	 */
	
	
	public function login_process(  $post_array ){
		
		$table = 'users';
		
		if( $post_array['email'] == ''){
			return array(
				'is'=>'false',
				'key'=>'email',
				'message'=>'Email field must not be blank.'
			);
		};

		if( $post_array['password'] == ''){
			return array(
				'is'=>'false',
				'key'=>'password',
				'message'=>'Password field must not be blank.'
			);
		};
		
	  if( !$this->CI->my_database_model->check_if_exist(
	  	$where_array = array('email' => $post_array['email']), 
	  	$table
	  )){
	   	
			return array(
				'is'=>'false',
				'key'=>'email',
				'message'=>'Account is not found in system.'
			);

	  }


		$where_array = array(
			'email' => $post_array['email'],
			'password' => md5($post_array['password'])
		);
		
		$users = $this->CI->my_database_model->select_from_table( 
			$table, 
			$select_what =  'id', 
			$where_array, 
			$use_order = FALSE, 
			$order_field = '', 
			$order_direction = 'desc', 
			$limit = 1
			);

	  if( count( $users ) > 0 ){
		
					return array(
						'is'=>'true',
						'id'=>$users[0]->id
					);	
		
		}else{
		
			return array(
				'is'=>'false',
				'key'=>'password',
				'message'=>'Wrong password submitted.'
			);		
		
		};
						
	}
		



	
	/**
	 * get_polls_questions
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @access public
	 */
	
	
	public function get_polls_questions(){
		
			return $this->CI->my_database_model->select_from_table( 
			$table = 'polls_questions', 
			$select_what = '*', 
			$where_array = array(), 
			$use_order = TRUE, 
			$order_field = 'created', 
			$order_direction = 'desc',
			$limit = -1
			); 
		
	}
	
	
	
	/**
	 * get_responses
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @access public
	 */
	
	
	public function get_responses(){
		
		
		$join_array = array(
						'polls_responders' => 'polls_answers.polls_responder_id = polls_responders.id',
						'polls_questions' => 'polls_answers.polls_question_id = polls_questions.id'
						);
	
	
		$polls_answers = $this->CI->my_database_model->select_from_table( 
														$table = 'polls_answers', 
														$select_what = 'polls_responders.email, polls_questions.question, polls_answers.*',
														$where_array = array(), 
														$use_order = TRUE, 
														$order_field = 'polls_answers.polls_responder_id, polls_answers.polls_question_id', 
														$order_direction = 'asc', 
														$limit = -1,
														$use_join = TRUE, 
														$join_array
														);
		
		

			
			return $polls_answers;
		
	}
	
	
}


/* End of file Query.php */ 
/* Location: \system\application\libraries\Custom.php */
