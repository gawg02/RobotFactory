<?php

class Assemble extends CI_Model{
	
	private $stock = array(	
		array(
			'partId' 		=> '1',
			'partCode'      => 'a1',
            'caCode'        => '1a',
            'plantBuiltAt'  => 'Strawberry',
            'dateTimeBuilt' => "2010-07-05T06:00:00Z"
		),
		
		array(
              'partId'        => '2',
              'partCode'      => 'b2',
              'caCode'        => '2a',
              'plantBuiltAt'  => 'Strawberry',
              'dateTimeBuilt' => "2010-07-05T06:00:00Z"
		),
		
		array(
              'partId'        => '3',
              'partCode'      => 'c3',
              'caCode'        => '3a',
              'plantBuiltAt'  => 'Strawberry',
              'dateTimeBuilt' => "2010-07-05T06:00:00Z"
		),
	
		array(
              'partId'        => '4',
              'partCode'      => 'm1',
              'caCode'        => '4a',
              'plantBuiltAt'  => 'Strawberry',
              'dateTimeBuilt' => "2010-07-05T06:00:00Z"
		),
		
		array(
              'partId'        => '5',
              'partCode'      => 'r2',
              'caCode'        => '5a',
              'plantBuiltAt'  => 'Strawberry',
              'dateTimeBuilt' => "2010-07-05T06:00:00Z"
		),
		
		array(
              'partId'        => '6',
              'partCode'      => 'a3',
              'caCode'        => '6a',
              'plantBuiltAt'  => 'Strawberry',
              'dateTimeBuilt' => "2010-07-05T06:00:00Z"
		),
				array(
              'partId'        => '7',
              'partCode'      => 'a3',
              'caCode'        => '7a',
              'plantBuiltAt'  => 'Strawberry',
              'dateTimeBuilt' => "2010-07-05T06:00:00Z"
		)
	);
	
	public function all(){
		return $this->stock;
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
	
	
	public function get($type){
		$types = "";
		foreach($this->stock as $part){
			if(substr($part['partCode'],0,1) == $type)
				$types[] = $part;
				
		}
		return $types;
	
	
	}
	
}