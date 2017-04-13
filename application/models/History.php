<?php

/**
 * This is a "CMS" model for RobotFactory, but with bogus hard-coded data,
 * so that we don't have to worry about any database setup.
 * This would be considered a "mock database" model.
 *
 * @author Renz
 */
class history extends CI_Model {
	
	// Constructor
    public function __construct()
    {
            parent::__construct();
    }
	
    // retrieve a single transaction history
    public function get($which)
    {
        // Loop over the data until the one we need
        foreach ($this->db->get('salesHistory') as $record)
                if ($record->id == $which)
                        return $record;
        return null;
    }
    // retrieve all of the transaction history entries
    public function all($column = 'timestamp', $filterModel = 'all', $filterLine = 'all')
    {
        $this->db->order_by($column, 'asc');
        $this->db->from('salesHistory');
        if($filterLine != 'all') {
            $this->db->where('series', $filterLine);
        }
        if($filterModel != 'all') {
            $this->db->where('model', $filterModel);
        }
        $query = $this->db->get();
        return $query->result();
    }
	
	//filters the history entry 
    public function filter($filter, $column = 'timestamp') {
        $this->db->order_by($column, 'asc');
        $this->db->from('salesHistory');
        $this->db->where('series', "household");
        $query = $this->db->get();
        return $query->result();
    }
	//get the size of list
    public function size() {
        return sizeof($this->all());
    }
	
    // retrieves total amount spent
    public function totalSpent() {
        $total = 0;
        foreach ($this->all() as $record)
            if ($record->transactionType == 'purchase')
                $total += $record->cost;
        return $total;
    }
	
    // retrieves total amount earned
    public function totalEarned() {
        $total = 0;
        foreach ($this->all() as $record)
            if ($record->transactionType == 'return' || $record->transactionType == 'sold')
                $total += $record->cost;
        return $total;
    }
	
    //add transaction into the database
    public function add($transaction) {
        $this->db->insert('salesHistory', $transaction);
    }
	
    //deletes all rows from table
    public function deleteAll() {
        $this->db->empty_table('salesHistory');
    }
}