<?php

class Register extends CI_Model
{
    function reboot()
    {
        //this is the function that will send a request to the server and get a response for reboot
    }

    function makeForm()
    {
        //this function is to check and submit the registration form on the manage page to the PRC servers
        $this->load->helper(['html', 'form']);

        //simple form, all it requires is our team name and our secret token
        $former = array
        ( //form_open('manage/handle_form');
            'heading' => heading('Server Login'),
            'teamname' => form_label("Team Name:") . form_input(['name' => 'name']) . br(),
            'secrettoken'=> form_label("Secret Access Token:") . form_input(['token' => 'token']).br(),
            'submit' => form_submit('submit', 'Login')
        );
        //$former = form_close();

        return $former;//$this->parser->parse("_registerForm", $parse);
    }

    function submit()
    {
        
    }
	
    /*function handle_form()
    {
        
    }*/
}

