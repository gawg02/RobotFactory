<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PartsFactory extends Application {

  $errorMsg = "There are no parts";

  function __construct(){
    parent::__construct();
  }

  public function index(){

    $this->load->model('parts');


    //$this->data = array_merge($this->data, $partsArray);
    $topCells="";
	$torsoCells="";
	$bottomCells="";

    $partsArray = $this->parts->getTopParts();
    foreach($partsArray as $part )
      $topCells[] = $this->parser->parse('_partCell', (array) $part , true);

    $partsArray = $this->parts->getTorsoParts();
    foreach($partsArray as $part )
      $torsoCells[] = $this->parser->parse('_partCell', (array) $part , true);

    $partsArray = $this->parts->getBottomParts();
    foreach($partsArray as $part )
      $bottomCells[] = $this->parser->parse('_partCell', (array) $part , true);

    $this->load->library('table'); 
    $parms = array(
                'table_open' => '<table class="table sortable">',
                'cell_start' => '<td class="parts_cell">'
              );
    
    $this->table->set_template($parms);

    if ( isset($topCells) ){
      $rows = $this->table->make_columns($topCells, 4);
      $this->data['topTable'] = $this->table->generate($rows);
    } else {
      $this->data['topTable'] = $errorMsg;
    }

    if ( isset($torsoCells) ){
      $rows = $this->table->make_columns($torsoCells, 4);
      $this->data['torsoTable'] = $this->table->generate($rows);
    } else {
      $this->data['torsoTable'] = $errorMsg;
    }

    if ( isset($bottomCells) ){
      $rows = $this->table->make_columns($bottomCells, 4);
      $this->data['bottomTable'] = $this->table->generate($rows);
    } else {
      $this->data['bottomTable'] = $errorMsg;
    }


    $this->data['pagebody'] = 'parts';
    $this->render();


  }


}