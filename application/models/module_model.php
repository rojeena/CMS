<?php

class Module_Model extends My_Model
{

    public $table = 'tbl_module';

    public $id = '',
            $name = '',
            $slug = '',
            $priority = '',
            $parent_id = '',
            $icon_class = '',
            $social = '',
            $show_in_navigation = '';

    public function __construct()
    {
        parent::__construct();
    }

    public $rules =
        array(
            array(
                'field' => 'name',
                'label' => 'Module Name',
                'rules' => 'trim|required',
            ),
            array(
                'field' => 'slug',
                'label' => 'Module Alias',
                'rules' => 'trim|required',
            ),
        );
}