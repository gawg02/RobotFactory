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
        ),

        array(
            'id' => '2',
            'name' => 'Bryn Newman',
            'face' => 'jcoughlan.jpg',
            'quote' => 'Howdy do?',
            'blurb' => 'jblurb.txt'
        ),

        array(
            'id' => '3',
            'name' => 'Greg Little',
            'face' => 'jcoughlan.jpg',
            'quote' => 'Gwent, man, gwent.',
            'blurb' => 'jblurb.txt'
        ),

        array(
            'id' => '4',
            'name' => 'Andrei Hristea',
            'face' => 'jcoughlan.jpg',
            'quote' => 'Sweet home Alabama!',
            'blurb' => 'jblurb.txt'
        ),

        array(
            'id' => '5',
            'name' => 'Renz Dionglay',
            'face' => 'jcoughlan.jpg',
            'quote' => '...',
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