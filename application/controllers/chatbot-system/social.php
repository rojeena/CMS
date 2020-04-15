<?php
class Social extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('social_model', 'social');
    }

    public function index()
    {
        if($this->input->post()) {
            $post = $this->input->post();
            $insertData = array(
                'title' => $post['facebook_title'],
                'description' => $post['facebook_description'],
                'image' => $post['facebook_image'],
                'link' => $post['facebook_link'],
                'module_id' => $post['activeModuleId'],
                'data_id' => $post['dataId'],
                'social_site' => 'Facebook'
            );
            $savedSocialData = $this->social->get('1', array('module_id' => $post['activeModuleId'], 'data_id' => $post['dataId'], 'social_site' => 'Facebook'));
            if(!$savedSocialData)
                $this->social->save($insertData);
            else
                $this->social->save($insertData, array('id' => $savedSocialData->id));
            $insertData = array(
                'title' => $post['twitter_title'],
                'description' => $post['twitter_description'],
                'image' => $post['twitter_image'],
                'link' => $post['twitter_link'],
                'module_id' => $post['activeModuleId'],
                'data_id' => $post['dataId'],
                'social_site' => 'Twitter'
            );
            $savedSocialData = $this->social->get('1', array('module_id' => $post['activeModuleId'], 'data_id' => $post['dataId'], 'social_site' => 'Twitter'));
            if(!$savedSocialData)
                $this->social->save($insertData);
            else
                $this->social->save($insertData, array('id' => $savedSocialData->id));
        }
    }

    public function getSocialData()
    {
        $dataId = $this->input->post('dataId');
        $moduleId = $this->input->post('moduleId');
        $socialData = $this->social->get('', array('module_id' => $moduleId, 'data_id' => $dataId));
        $resp = false;

        if($socialData) {
            foreach($socialData as $rowData) {
                $resp[$rowData->social_site] = array(
                    'link' => $rowData->link,
                    'title' => $rowData->title,
                    'description' => $rowData->description,
                    'image' => $rowData->image,
                );
            }
        }
        echo json_encode($resp);
    }

}