<?php

class Faq_Model extends My_Model
{

	protected $table = 'tbl_faq';

	public $id = '',
			$question = '',
			$category_id = '',
			$answer = '',
			$status = '';

	public function __construct()
	{
		parent::__construct();
		$this->created_timestamp = true;
		$this->updated_timestamp = true;
		$this->created_by = true;
		$this->updated_by = true;
	}

	public function rules($id)
	{
		$array = array(
				array(
						'field' => 'question',
						'label' => 'Question',
						'rules' => 'trim|required|unique[tbl_faq.question.'.$id.']',
				),
				array(
						'field' => 'category_id',
						'label' => 'Slug',
						'rules' => 'trim|required|',
				),
				array(
						'field' => 'answer',
						'label' => 'Answer',
						'rules' => 'trim|required|xss_clean',
				)
		);

		return $array;
	}

	public function getunanswered()
	{
		$query = "SELECT * FROM tbl_faq WHERE answer IS NULL AND category_id IS NULL";
        return $this->query($query);
    }

    public function addUnansweredQuestions($question)
    {
        return $this->db->insert('tbl_faq', array(
            'question' => $question,
            'category_id' => NULL,
            'answer' => NULL,
            'status' => 'ACTIVE'
        ));
    }
}
?>