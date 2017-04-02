<?php

class Parts extends CI_Model {

  var $bot1 = array(
              'partId'        => 'abc123',
              'partCode'      => 'a1',
              'caCode'        => '123abc',
              'plantBuiltAt'  => 'Strawberry',
              'dateTimeBuilt' => "2010-07-05T06:00:00Z");
  
  var $bot2 = array(
              'partId'        => 'abc123',
              'partCode'      => 'b2',
              'caCode'        => '123abc',
              'plantBuiltAt'  => 'Strawberry',
              'dateTimeBuilt' => "2010-07-05T06:00:00Z");
  
  var $bot3 = array(
              'partId'        => 'abc123',
              'partCode'      => 'c3',
              'caCode'        => '123abc',
              'plantBuiltAt'  => 'Strawberry',
              'dateTimeBuilt' => "2010-07-05T06:00:00Z");

  var $bot4 = array(
              'partId'        => 'abc123',
              'partCode'      => 'm1',
              'caCode'        => '123abc',
              'plantBuiltAt'  => 'Strawberry',
              'dateTimeBuilt' => "2010-07-05T06:00:00Z");

  var $bot5 = array(
              'partId'        => 'abc123',
              'partCode'      => 'r2',
              'caCode'        => '123abc',
              'plantBuiltAt'  => 'Strawberry',
              'dateTimeBuilt' => "2010-07-05T06:00:00Z");

  var $bot6 = array(
              'partId'        => 'abc123',
              'partCode'      => 'a3',
              'caCode'        => '123abc',
              'plantBuiltAt'  => 'Strawberry',
              'dateTimeBuilt' => "2010-07-05T06:00:00Z");

  

  private $partId;    // unique
  private $partCode;
  private $caCode;    // Cert of Authenticity
  private $plantBuiltAt;
  private $dateTimeBuilt;

  private $data;

  private $topParts = array(), $torsoParts = array(), $bottomParts = array();

  public function __construct() {
    parent::__construct();

    $this->data = array($this->bot1, $this->bot2, $this->bot3, $this->bot4, $this->bot5, $this->bot6);

    $this->sort($this->data);

    $this->register();
  }

  public function register()
  {

    $response = file_get_contents('https://umbrella.jlparry.com/work/registerme/elderberry/47d1c9');

    $response = explode(' ', $response);

    if ( $response[0] != 'Ok' )
      $this->data['pagebody'] = 'error'; 
    else {
      $this->data['pagebody'] = 'parts';
      $apiKey = $response[1];
    }

    $data = array(
      'apiKey' => $apiKey,
      'alive' => 1
      );

    $this->db->insert("utility", $data);

  }

  public function getModel($partCode){

    return substr($partCode, 0, 1);

  }

  public function getPartType($partCode){

    return substr($partCode, 1, 2);

  }

  public function getRobotLine(){

  }

  public function getPart($partCode){

    foreach ($this->data as $part) {
      if ( $partCode == $part['partCode'])
        return $part;
    }

  }

  private function sort($data){
    
    foreach ($data as $part) {

      $pType = $this->getPartType($part['partCode']);
      $part['model'] = $this->getModel($part['partCode']);
      $part['partType'] = $pType;

      switch ($pType) {
        case '1':         
          array_push($this->topParts, $part);
        break;

        case '2':
          array_push($this->torsoParts, $part);
        break;

        case '3':
          array_push($this->bottomParts, $part);
        break;

        default:
          throw new Exception("Parts Model error in sorting"); 
      }
    }

  }

  public function getAllParts(){

    return $this->data;
  }

  public function getTorsoParts(){
    return $this->torsoParts;
  }

  public function getTopParts(){
    return $this->topParts;
  }

  public function getBottomParts(){
    return $this->bottomParts;
  }
}