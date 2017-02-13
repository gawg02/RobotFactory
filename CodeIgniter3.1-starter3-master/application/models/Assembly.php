<?php

class assembly extends CI_Model {

	// mock data of a list of stocks
	private $stock = array(	
		array(
			'partId' 		=> 'abc123',
			'partCode'      => 'a1',
            'caCode'        => '123abc',
            'plantBuiltAt'  => 'Strawberry',
            'dateTimeBuilt' => "2010-07-05T06:00:00Z"
		),
		
		array(
              'partId'        => 'abc123',
              'partCode'      => 'b2',
              'caCode'        => '123abc',
              'plantBuiltAt'  => 'Strawberry',
              'dateTimeBuilt' => "2010-07-05T06:00:00Z"
		),
		
		array(
              'partId'        => 'abc123',
              'partCode'      => 'c3',
              'caCode'        => '123abc',
              'plantBuiltAt'  => 'Strawberry',
              'dateTimeBuilt' => "2010-07-05T06:00:00Z"
		),
	
		array(
              'partId'        => 'abc123',
              'partCode'      => 'm1',
              'caCode'        => '123abc',
              'plantBuiltAt'  => 'Strawberry',
              'dateTimeBuilt' => "2010-07-05T06:00:00Z"
		),
		
		array(
              'partId'        => 'abc123',
              'partCode'      => 'r2',
              'caCode'        => '123abc',
              'plantBuiltAt'  => 'Strawberry',
              'dateTimeBuilt' => "2010-07-05T06:00:00Z"
		),
		
		array(
              'partId'        => 'abc123',
              'partCode'      => 'a3',
              'caCode'        => '123abc',
              'plantBuiltAt'  => 'Strawberry',
              'dateTimeBuilt' => "2010-07-05T06:00:00Z"
		),
				array(
              'partId'        => 'abc123',
              'partCode'      => 'a3',
              'caCode'        => '123abc',
              'plantBuiltAt'  => 'Strawberry',
              'dateTimeBuilt' => "2010-07-05T06:00:00Z"
		)
	);
	
	//list of completed bots
	private $completedBots = array(
		array(
			'completed'	=>	'a',
			array(
				'partId' 		=> 'abc123',
				'partCode'      => 'a1',
				'caCode'        => '123abc',
				'plantBuiltAt'  => 'Strawberry',
				'dateTimeBuilt' => "2010-07-05T06:00:00Z"
			),
		
			array(
				'partId'        => 'abc123',
				'partCode'      => 'a2',
				'caCode'        => '123abc',
				'plantBuiltAt'  => 'Strawberry',
				'dateTimeBuilt' => "2010-07-05T06:00:00Z"
			),
			array(
				'partId'        => 'abc123',
				'partCode'      => 'a3',
				'caCode'        => '123abc',
				'plantBuiltAt'  => 'Strawberry',
				'dateTimeBuilt' => "2010-07-05T06:00:00Z"
			)
		),
		array(
			'completed'	=>	'c',
			array(
				'partId'        => 'abc123',
				'partCode'      => 'c1',
				'caCode'        => '123abc',
				'plantBuiltAt'  => 'Strawberry',
				'dateTimeBuilt' => "2010-07-05T06:00:00Z"
			),
		
			array(
				'partId'        => 'abc123',
				'partCode'      => 'c2',
				'caCode'        => '123abc',
				'plantBuiltAt'  => 'Strawberry',
				'dateTimeBuilt' => "2010-07-05T06:00:00Z"
			),
		
			array(
				'partId'        => 'abc123',
				'partCode'      => 'c3',
				'caCode'        => '123abc',
				'plantBuiltAt'  => 'Strawberry',
				'dateTimeBuilt' => "2010-07-05T06:00:00Z"
			)
		)
	);
	
	
	
	
	// templates for robot building
	private $templates = array(
		array(
              
              'head'    =>'a1',
              'torso'	=>'a2',
			  'legs'	=>'a3'
		),
		array(
              'head'    =>'b1',
              'torso'	=>'b2',
			  'legs'	=>'b3'
		),
		array(
              'head'    =>'c1',
              'torso'	=>'c2',
			  'legs'	=>'c3'
		),
		array(
              'head'    =>'m1',
              'torso'	=>'m2',
			  'legs'	=>'m3'
		),
		array(
              'head'    =>'r1',
              'torso'	=>'r2',
			  'legs'	=>'r3'
		),
		array(
              'head'    =>'w1',
              'torso'	=>'w2',
			  'legs'	=>'w3'
		)
	);

 	private $partId;    // unique
	private $partCode;
	private $caCode;    // Cert of Authenticity
	private $plantBuiltAt;
	private $dateTimeBuilt;
  
	private $templateData;
	
	
	public function __construct(){
		parent::__construct();	
		
	}
	
	public function get ($which){
		foreach ($this->stock as $part){
			if($record['id'] == $which)
				return $part;
		}
		return null;
	}
	
	public function all(){
		return $this->stock;
	}
	
	public function completed(){
		return $this->completedBots;
	}
  
    public function getModel($partCode){
		return substr($partCode, 0, 1);
	}

	public function getPartType($partCode){
		if(substr($partCode, 1, 2) == 1){
			return "head";
		}else if(substr($partCode, 1, 2) == 2){
			return "torso";
		}else if(substr($partCode, 1, 2) == 3){
			return "body";
		}
		return substr($partCode, 1, 2);
	}
	
	private function sort($data){
		foreach($data as $part) {
		$pType = $this->getPartType($part['partCode']);
		$part['model'] = $this->getModel($part['partCode']);
		$part['partType'] = $pType;

		switch ($pType) {
			case '1':         
				array_push($this->heads, $part);
				break;
			case '2':
				array_push($this->torsos, $part);
				break;
			case '3':
				array_push($this->legs, $part);
				break;
			default:
				throw new Exception("Parts Model error in sorting"); 
      }
    }
  }
}