<?php

/**
 * @property string username
 * @property string password
 * @property string workspace
 * @property string messageURL
 */
class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->username = 'a01fca35-a3c5-4e9d-b9f2-18b88a06e6f9';
        $this->password = '8jv5cqMfBA5C';
        $this->workspace = '0b468330-0ba9-4f9d-a279-9ec6f98ddd86';
        $this->messageURL='https://gateway.watsonplatform.net/assistant/api/v1/workspaces/'.$this->workspace.'/message?version=2018-02-16';

    }

    public function index()
    {
       
        $this->load->view('home');
    }


    public function getAnswer()
    {
        $params1 = json_encode($this->input->post());
        $ch1 = curl_init();
        curl_setopt($ch1, CURLOPT_URL, $this->messageURL);
        curl_setopt($ch1, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch1, CURLOPT_POST, true);
        curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch1, CURLOPT_POSTFIELDS, $params1);
        curl_setopt($ch1, CURLOPT_USERPWD, "$this->username:$this->password");
        $result = curl_exec($ch1);
        curl_close($ch1);

        echo json_encode($result);
    }

}
