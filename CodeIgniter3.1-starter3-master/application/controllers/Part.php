<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Part extends Application {
  
  function __construct(){
    parent::__construct();
  }

  public function index(){

    


    //$this->data = array_merge($this->data, $partsArray);
    

    /*
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

    $rows = $this->table->make_columns($topCells, 2);
    $this->data['topTable'] = $this->table->generate($rows);

    $rows = $this->table->make_columns($torsoCells, 2);
    $this->data['torsoTable'] = $this->table->generate($rows);

    $rows = $this->table->make_columns($bottomCells, 2);
    $this->data['bottomTable'] = $this->table->generate($rows);


    
    
    */
   
    $this->data['pagebody'] = 'part';
    //$this->render();

  }

  public function display($id){
    
    $this->load->model('parts');

    $this->data = array_merge($this->data, $this->parts->getPart($id));

    $this->data['pagebody'] = 'part';

    $this->render();
    

  }


}