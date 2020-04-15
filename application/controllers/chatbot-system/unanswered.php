<?php

/**
 * @property string username
 * @property string password
 * @property string workspace
 * @property string messageURL
 */
class Unanswered extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->username = 'a01fca35-a3c5-4e9d-b9f2-18b88a06e6f9';
        $this->password = '8jv5cqMfBA5C';
        $this->workspace = '0b468330-0ba9-4f9d-a279-9ec6f98ddd86';

        $this->load->model('faq_model', 'faq');
        $this->load->model('category_model', 'category');
        $this->data['module_name'] = 'Faq Manager';
        $this->data['show_add_link'] = false;
        $this->data['show_sort_link'] = true;
        $this->header['page_name']	= $this->router->fetch_class();
    }

    public function index()
    {
        $this->data['sub_module_name'] = 'Unanswered Questions List';
        $this->data['faqs'] = $this->faq->getunanswered();
        $this->data['body'] = BACKENDFOLDER . '/faq/_list';
        $this->render();
    }    
}
