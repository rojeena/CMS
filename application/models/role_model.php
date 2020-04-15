<?php

class Role_Model extends My_Model
{

    public $table = 'tbl_role';

    public $id = '',
        $name = '',
        $description = '';

    public function __construct()
    {
        parent::__construct();
    }

    public function rules($id)
    {
        $array = array(
            array(
                'field' => 'name',
                'label' => 'Role',
                'rules' => 'trim|required|unique['.$this->table.'.name.'.$id.']',
            ),
            array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'trim|required',
            ),
            array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'trim|required',
            )
        );

        return $array;
    }

    public function getRoles() {
        $this->db->select('id, name');
        $result = $this->db->get($this->table)->result();

        return (isset($result) && !empty($result)) ? $result : array();
    }

}