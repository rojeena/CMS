<?php

class Upload_files  {
	var $table = 'tbl_form_submission_fields';
	
	function upload($form_submission_id)
	{ 
	
		if( ! isset($_FILES['field_name']))
			return '';
		
		$CI =& get_instance();
				
		//uploading files
		$CI->load->library('upload');
		
		$config['upload_path'] 	= 'uploads/files/';
		$config['allowed_types'] = '*';
		$config['encrypt_name'] = TRUE;

		$CI->upload->initialize($config);
		
		foreach($_FILES['field_name']['name'] as $i=>$value)
		{
			$_FILES['userfile']['name'] 	= $_FILES['field_name']['name'][$i];
			$_FILES['userfile']['type']		= $_FILES['field_name']['type'][$i];
			$_FILES['userfile']['tmp_name']	= $_FILES['field_name']['tmp_name'][$i];
			$_FILES['userfile']['error'] 	= $_FILES['field_name']['error'][$i];
			$_FILES['userfile']['size'] 	= $_FILES['field_name']['size'][$i];
						
			if($CI->upload->do_upload())
			{
				
				$data_image = $CI->upload->data();
				
				unset($insert_data);
				$insert_data['form_submission_id'] = $form_submission_id;
				$insert_data['form_field_id']	 = $i;
				
				if($CI->db->where($insert_data)->count_all_results($this->table))
				{
					$CI->db->where($insert_data);
					$insert_data['form_field_value'] = $data_image['file_name'];
					$CI->db->update($this->table, $insert_data);
				}
				else
				{
					$insert_data['form_field_value'] = $data_image['file_name'];
					$CI->db->insert($this->table, $insert_data);
				}
				$data['action'] = 'success';
				return $data;
			}
			else
			{
				echo $CI->upload->display_errors('', '');
				die('error');
				
			}
		}
	}
}
	