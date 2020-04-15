<?php

class Category_Model extends My_Model
{

    protected $table = 'tbl_category';
    public $id = '', $name = '', $slug = '', $status = '';

    public function rules($id)
    {
        $array = array(
            array(
                'field' => 'name',
                'label' => 'Category Name',
                'rules' => 'trim|required|unique[tbl_category.id.'.$id.']',
            )
        );

        return $array;
    }

    public function __construct()
    {
        parent::__construct();
    }


    public function getAllData()
    {
        $query = "select 
                    *
                    from `tbl_category`
                    ORDER BY id DESC ";
        return $this->query($query);
    }

}