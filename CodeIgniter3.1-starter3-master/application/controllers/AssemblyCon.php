<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AssemblyCon extends Application {
	
	
	 function __construct(){
    parent::__construct();
  }
  
	public function index(){
		$this->load->model('Assembly');
		
		$stock = $this->Assembly->all();
		$items = array();
		
		// loads the list of parts for assembly
		foreach($stock as $item){
			$items[] = array(
			'part'		=>$this->Assembly->getPartType($item['partCode']),
			'partCode'	=>$item['partCode'],
			'caCode'	=>$item['caCode'],
			'plant'		=>$item['plantBuiltAt']
			
			);
		}
		
		// makes a created table 
		$complete = $this->Assembly->completed();
		$finished = array();
		foreach($complete as $item){
			$finished[] = array(
			'part'	=>$item['completed']
			
			);
		}
		
		$this->data['completedBots'] = $finished;
		$this->data['partTable'] = $items;
		$this->data['pagebody'] = 'assembly';
		$this->render();
	}
}