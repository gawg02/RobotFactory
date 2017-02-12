<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Application
{
    function __construct()
    {
        parent::__construct();
    }

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
        $this->load->model('Team');
		
        $source = $this->Team->all();
        $members = array();
        foreach ($source as $record)
        {
            $members[] = array ('name' => $record['name'], 'face' => $record['face'], 'quote' => $record['quote'], 'blurb' => $record['blurb']);
        }

        $this->data['team'] = $members;
        $this->data['pagebody'] = 'about';
		$this->render(); 
	}
}