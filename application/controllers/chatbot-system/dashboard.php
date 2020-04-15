<?php

class Dashboard extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->data['module_name'] = 'Dashboard';
    }

    public function index()
    {
        $this->data['body'] = BACKENDFOLDER.'/dashboard/_index';
        $this->data['sub_module_name'] = 'Dashboard';
        $this->render();
    }

}