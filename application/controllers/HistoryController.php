<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * History description
*/
class HistoryController extends Application
{
    private $sort = "timestamp";
    private $filterModel = 'all';
    private $filterLine = 'all';
	private $items_per_page = 20;
    
	//Index page for history controller
    public function index()
    {
        $this->page(1);
    }
	
	//Show page of history
    private function show_page($source)
    {
        $this->data['pagebody'] = 'history'; //view file
        $history = array();
        foreach ($source as $record)
        {
            $history[] = array (
                'cost' => $record->cost,
				'transactionType' => $record->transactionType,
				'item' => $record->item,
                'series' => $record->series,
                'model' => $record->model,
                'piece' => $record->piece,       
				'shipment' => $record->shipment,
				'timestamp' => $record->timestamp
                );
        }
        $this->data['history'] = $history;
        $this->render();
    }
	
	//Page navigation for list of history transactions
	private function pagenav($num) {
        $lastpage = ceil($this->history->size() / $this->items_per_page);
        $parms = array(
            'first' => 1,
            'previous' => (max($num-1,1)),
            'next' => min($num+1,$lastpage),
            'last' => $lastpage
        );
        return $this->parser->parse('itemnav',$parms,true);
    }
	
    function page($num = 1) {
		//time filter
        $sort = $this->input->post('order');
        if($this->session->userdata('sort') == null) {
            $this->session->set_userdata('sort', $this->sort);
        } else if($sort != null) {
            $this->session->set_userdata('sort', $sort);
        }
        $this->sort = $this->session->userdata('sort');
		
        //model filter
        $filterModel = $this->input->post('filterModel');
        if($this->session->userdata('filterModel') == null) {
            $this->session->set_userdata('filterModel', $this->filterModel);
        } else if($filterModel != null) {
            $this->session->set_userdata('filterModel', $filterModel);
        }
        $this->filterModel = $this->session->userdata('filterModel');
        $filterLine = $this->input->post('filterLine');
        if($this->session->userdata('filterLine') == null) {
            $this->session->set_userdata('filterLine', $this->filterLine);
        } else if($filterLine != null) {
            $this->session->set_userdata('filterLine', $filterLine);
        }
		//line filter
        $this->filterLine = $this->session->userdata('filterLine');

        $records = $this->history->all($this->sort, $this->filterModel, $this->filterLine);
        $historyItems = array();
        $index = 0;
        $count = 0;
        $start = ($num - 1) * $this->items_per_page;
        foreach($records as $entry) {
            if ($index++ >= $start) {
                $historyItems[] = $entry;
                $count++;
            }
            if ($count >= $this->items_per_page) 
				break;
        }
		//add pagination to transaction history list
        $this->data['pagination'] = $this->pagenav($num);
		
        //setting selected order using javascript
        $this->data['sort_script'] = '
			<script>
				window.onload = function () {
					var textToFind = "' . $this->sort . '";
			
					var dd = document.getElementById("order");
					dd.selectedIndex = 0;
					for (var i = 0; i < dd.options.length; i++) {
						if (dd.options[i].value === textToFind) {
							dd.selectedIndex = i;
							break;
						}
					}
				';
        $this->data['filterModel_script'] = '
					var textToFind = "' . $this->filterModel . '";
			
					var dd = document.getElementById("filterModel");
					dd.selectedIndex = 0;
					for (var i = 0; i < dd.options.length; i++) {
						if (dd.options[i].value === textToFind) {
							dd.selectedIndex = i;
							break;
						}
					}';
        $this->data['filterLine_script'] = '
					var textToFind = "' . $this->filterLine . '";
			
					var dd = document.getElementById("filterLine");
					dd.selectedIndex = 0;
					for (var i = 0; i < dd.options.length; i++) {
						if (dd.options[i].value === textToFind) {
							dd.selectedIndex = i;
							break;
						}
					}
				};
			</script>';
        $this->show_page($historyItems);
    }
}