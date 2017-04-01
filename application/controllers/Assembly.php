<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Assembly extends Application
{
  //  function __construct()
  //  {
//		parent::__construct();
 //   }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/
	 * 	- or -
	 * 		http://example.com/welcome/index
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$filter = $this->session->userdata('filter');
		echo "why ",'('.$filter.')',$filter, "huh";
		$this->data['pagebody'] = 'assembly';
		$this->load->model('Assemble');
		$stock = $this->Assemble->all();
		
		if($filter != FILTER_ALL){
		$a = $this->Assemble->get($filter);
		$this->data['partTable'] = $this->buildTables($a);
	
		}else{
		$this->data['partTable'] = $this->buildTables($stock);
		}
		
		$this->render(); 
	}

	function buildTables($parts){
		foreach($parts as $part){
			$items[] = array(
			'part'		=>$this->Assemble->getPartType($part['partCode']),
			'partCode'	=>$part['partCode'],
			'caCode'	=>$part['caCode'],
			'plant'		=>$part['plantBuiltAt']
			
			);
		}
		return $items;
	}
}