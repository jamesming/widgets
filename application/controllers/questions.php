<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Questions extends CI_Controller {
	
	
   public function __construct(){
        parent::__construct();
        



   }

	
	/**
	 * index
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/index
	 * @access public
	 */
	 
	public function index(){
		 $this->inserts();    
	}
	
	/**
	 * questions
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/questions
	 * @access public
	 */
	 
	public function inserts(){
		
				$data = array();
		
				$this->load->view('questions/inserts_view', 
					array('data' => $data)
				);   
	}
	
	
	/**
	 * insert_questions
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/insert_questions
	 * @access public
	 */
	 
	public function insert_questions(){
		
		$db_response = $this->my_database_model->insert_table(
								'polls_questions', 
								$insert_what = array(
										'polls_name_id' => 1,
										'question' => $this->input->post('question') 
									)
								); 

		$this->show_list_of_questions();
				
	}	
	
	
	
	 /**
	 * show questions
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/show_questions
	 * @access public
	 */
	 
	public function show_list_of_questions(){

		$questions = $this->custom->get_polls_questions();
			
		foreach( $questions  as  $question){
			?><li> <?php  echo $question->question;   ?> </li><?php     

		}

	}
	
	
	
	/**
	 * ask
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/ask
	 * @access public
	 */
	 
	public function ask(){
		
		$data['questions'] = $this->custom->get_polls_questions();
			
		$this->load->view('questions/ask_view', 
			array('data' => $data)
		);   
				
	}		
	
	
	
	/**
	 * submit_answers
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/submit_answers
	 * @access public
	 */
	 
	public function submit_answers(){
		
		$polls_responder_id = $this->my_database_model->insert_table(
								'polls_responders', 
								$insert_what = array(
										'email' => $this->input->post('email') 
									)
								);

		foreach( $this->input->post()  as  $key => $value){
			
			if( $key != 'email'){
				
					$this->my_database_model->insert_table(
											'polls_answers', 
											$insert_what = array(
													'polls_responder_id' => $polls_responder_id,
													'polls_question_id' => $key,
													'answer' => $value
												)
											);		
				
			};
			
		}
		
?>	
<style>	
body { 
	font: 14px/1.5 Helvetica,Arial,'Liberation Sans',FreeSans,sans-serif;
	margin:0px;
	width:650px;
	}	
</style>
Thank you! We appreciate your feedback on Curvy Girls as we strive to bring nuvoTV's audience of vibrant, bold, driven bi-cultural Latinos the best in television entertainment.		
<?php     

	}		
	
	
	
	
	
	/**
	 * report
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/report
	 * @access public
	 */
	 
	public function report(){
		
		$data['responses'] = $this->custom->get_responses();
			
			
			echo '<pre>';print_r(  $data['responses']  );echo '</pre>';  exit;
			
			
			exit;
			
		$this->load->view('questions/report_view', 
			array('data' => $data)
		);   
				
	}	
	
	
	
	
	
	
		function t(){

			$table = 'polls_names';
			
			$this->my_database_model->	create_generic_table($table );
			
			
			
			$fields_array = array(
			                      'name' => array(
			                                               'type' => 'varchar(255)')
			              ); 
			              
			$this->my_database_model->add_column_to_table_if_exist(
				$table, 
				$fields_array
			);  			
			
			$table = 'polls_questions';
			
			$this->my_database_model->	create_generic_table($table );
			
			
			
			$fields_array = array(
			                      'question' => array(
			                                               'type' => 'blob'),
			                      'polls_name_id' => array(
			                                               'type' => 'int(11)')
			
			              ); 
			              
			$this->my_database_model->add_column_to_table_if_exist(
				$table, 
				$fields_array
			); 
			
			
			
			$table = 'polls_responders';
			
			$this->my_database_model->	create_generic_table($table );
			
			
			
			$fields_array = array(
			                      'email' => array(
			                                               'type' => 'varchar(255)')
			              ); 
			              
			$this->my_database_model->add_column_to_table_if_exist(
				$table, 
				$fields_array
			);			
			             


			$table = 'polls_answers';
			
			$this->my_database_model->	create_generic_table($table );
			
			
			
			$fields_array = array(
			                      'polls_question_id' => array(
			                                               'type' => 'int(11)'),
			                      'polls_responder_id' => array(
			                                               'type' => 'int(11)'),
			                      'answer' => array(
			                                               'type' => 'blob')
			
			              ); 
			              
			$this->my_database_model->add_column_to_table_if_exist(
				$table, 
				$fields_array
			);                       
			
			
		}
	
	
	
	
	
	
	
	
}
/* End of file main.php */
/* Location: ./application/controllers/questions.php */