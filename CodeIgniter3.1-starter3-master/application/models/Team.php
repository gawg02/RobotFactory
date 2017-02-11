<?php

class Team extends CI_Model
{
    private $team = array(
        array(
            'id' => '1',
            'name' => 'Jay Coughlan',
            'face' => 'jcoughlan.jpg',
            'quote' => 'Yes, I exist',
            'blurb' => 'jblurb.txt'
        )
    );

    public function getMember($which)
    {
        foreach($this->data as $record)
            if($record['id'] == $which)
                return $record;
        return null;
    }

    public function all()
    {
        return $this->team;
    }
}