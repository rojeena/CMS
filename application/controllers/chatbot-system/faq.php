<?php

/**
 * @property string username
 * @property string password
 * @property string workspace
 * @property string messageURL
 */
class Faq extends My_Controller
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
        $this->data['show_add_link'] = true;
        $this->data['show_sort_link'] = true;
        $this->header['page_name']	= $this->router->fetch_class();
    }

    public function index()
    {
        $this->data['sub_module_name'] = 'Faqs List';
        $this->data['faqs'] = $this->faq->get();
        $this->data['body'] = BACKENDFOLDER . '/faq/_list';
        $this->render();
    }

     public function unanswered()
    {
        $this->data['sub_module_name'] = 'Unanswered Questions List';
        $this->data['faqs'] = $this->faq->getunanswered();
        $this->data['body'] = BACKENDFOLDER . '/faq/_list';
        $this->render();
    }

    public function addUnanswered()
    {
        $question = ($this->input->post('question'));


        $alreadyExists =  $this->db->where('LOWER(question)', "'".strtolower($question)."'", FALSE)->get('tbl_faq')->num_rows();

        if($alreadyExists < 1) {
            $result = $this->faq->addUnansweredQuestions($question);
            return $result;
        }
        else {
            return 0;
        }

    }

    public function create()
    {
        $id = segment(4);
        $this->data['categories'] = $this->category->getAllData();
        if ($id == '')
            $this->data['faq'] = $this->faq->get();
        else
            $this->data['faq'] = $this->faq->get('', array('id !=' => $id));
        if ($_POST) {
            $post = $_POST;
            $this->faq->id = $id;

            $this->form_validation->set_rules($this->faq->rules($id));
            if ($this->form_validation->run()) {

                $this->db->select('name');
                $this->db->where('id', $post['category_id']);
                $category_name = $this->db->get('tbl_category')->result_array()[0]['name'];

                $apiCall = $this->addEditDialogs($post, $category_name);
                if(!$apiCall) {
                    var_dump("Could not add in the IBM Watson API!! Please contact the developers!");
                    die();
                }

                if ($id == '') {
                    $res = $this->faq->save($post);
                } else {
                    $condition = array('id' => $id);
                    $res = $this->faq->save($post, $condition);
                }

                $res ? set_flash('msg', 'Data saved') : set_flash('msg', 'Data could not be saved');
                redirect(BACKENDFOLDER . '/faq');
            } else {
                $this->form($id, 'faq');
            }
        } else {
            $this->data['addJs'] = array('assets/datepicker/bootstrap-datepicker.js', 'assets/' . BACKENDFOLDER . '/dist/js/faqs.js', 'assets/' . BACKENDFOLDER . '/dist/js/jquery.textarea-counter.js');
            $this->data['addCss'] = array('assets/datepicker/datepicker3.css');
            $this->form($id, 'faq');
        }
    }

    public function delete()
    {
        $post = $_POST;

        $this->load->library('restrict_delete');

        $params = "";
        if(isset($post) && !empty($post)) {

            $selected_ids = $post['selected'];
            $deleted = 0;
            foreach($selected_ids as $selected_id){
                if($this->restrict_delete->check_for_delete($params, $selected_id)) {
                    $res = $this->faq->delete(array('id' => $selected_id));
                    if ($res) {
                        $deleted++;
                    }
                }
            }
            $deleted ? set_flash('msg', $deleted . ' out of ' . count($selected_ids) . ' data deleted successfully') : set_flash('msg', 'Data could not be deleted');

        } else {
            $id = segment(4);
            if($this->restrict_delete->check_for_delete($params, $id)) {
                $id = segment(4);

                $this->db->select('category_id');
                $this->db->where('id', $id);
                $category_id= $this->db->get('tbl_faq')->result_array()[0]['category_id'];
                $this->db->select('name');
                $this->db->where('id', $category_id);
                $category_name= $this->db->get('tbl_category')->result_array()[0]['name'];

                $apiCall = $this->deleteDialog($category_name);
                if(!$apiCall) {
                    var_dump("Could not delete in the IBM Watson API!! Please contact the developers!");
                    die();
                }



                $res = $this->faq->delete(array('id' => $id));

                $success_msg = $res ? 'Data deleted' : 'Error in deleting data';
            } else {
                $msg = 'This data cannot be deleted. It is being used in system.';
            }

            $success_msg ? set_flash('msg', $success_msg) : set_flash('msg', $msg);
        }

        redirect(BACKENDFOLDER . '/faq');
    }

    public function status()
    {
        $post = $_POST;
        $status = segment(4) == 'Active' ? 'InActive' : 'Active';

        if(isset($post) && !empty($post)) {
            $selected_ids = $post['selected'];
            $changed = 0;
            foreach($selected_ids as $selected_id) {
                $res = $this->faq->changeStatus('faq', $status, $selected_id);
                if($res) {
                    $changed++;
                }
            }
            $changed ? set_flash('msg', $changed . ' out of ' . count($selected_ids) . ' data status changed successfully') : set_flash('msg', 'Status could not be changed');
        } else {
            $id = segment(5);
            $res = $this->faq->changeStatus('faq', $status, $id);

            $res ? set_flash('msg', 'Status changed') : set_flash('msg', 'Status could not be changed');
        }

        redirect(BACKENDFOLDER . '/faq');
    }

    function sort_faq()
    {
        if ($this->input->post()) {
            $ids = explode(',', $this->input->post('sort_order'));
            for ($i = 0; $i < count($ids); $i++) {
                $data['sort_order'] = $i;
                $this->db->where('id', $ids[$i]);
                $this->db->update($this->faq, $data);
            }
        } else {
            $data['faqs'] = $this->faq_manager->get_faqs_for_sort();
            $this->load->view('cms/sort_faqs', $data);
        }
    }


    /**
     * This function makes an ajax call to send the data to the IBM Watson service
     * @param $post
     * @param $category
     * @return bool
     */
    public function addEditDialogs($post, $category) {
        $intent = $category;
        $example = $post['question'];
        $dialog_node = $intent;
        $conditions = '#'.$intent;

        $output = (object)array('text' => $post['answer']);//this is the answer

        //First check if the intent is already present or not
        $intentURL='https://gateway.watsonplatform.net/assistant/api/v1/workspaces/'.$this->workspace.'/intents/'.$intent.'?version=2018-02-16&export=true';
        $chIntent = curl_init();
        curl_setopt($chIntent, CURLOPT_URL, $intentURL);
        curl_setopt($chIntent, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($chIntent, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($chIntent, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($chIntent, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($chIntent, CURLOPT_USERPWD, "$this->username:$this->password");
        $intentExists = json_decode(curl_exec($chIntent));
        curl_close($chIntent);

        $intentResult = '';
        $dialogNodeResult = '';

        if( isset( $intentExists->error ) ) {
            //First adding the intent, which is the question
            $intentURL='https://gateway.watsonplatform.net/assistant/api/v1/workspaces/'.$this->workspace.'/intents?version=2018-02-16';
            $dialogURL='https://gateway.watsonplatform.net/assistant/api/v1/workspaces/'.$this->workspace.'/dialog_nodes?version=2018-02-16';

            $params1 = json_encode( array(
                "intent" => $intent,
                "examples" => array((object)["text" => $example])
            ) );
            $ch1 = curl_init();
            curl_setopt($ch1, CURLOPT_URL, $intentURL);
            curl_setopt($ch1, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
            curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch1, CURLOPT_POST, true);
            curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch1, CURLOPT_POSTFIELDS, $params1);
            curl_setopt($ch1, CURLOPT_USERPWD, "$this->username:$this->password");
            $intentResult=curl_exec ($ch1);
            curl_close ($ch1);


            // After adding the intent, we now add the dialog, which is the answer
            $params2 = json_encode( array(
                'dialog_node' => $dialog_node,
                'conditions' => $conditions,
                'output' => $output,
                'title' => $dialog_node
            ) );
            $ch2 = curl_init();
            curl_setopt($ch2, CURLOPT_URL, $dialogURL);
            curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch2, CURLOPT_POST, true);
            curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch2, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
            curl_setopt($ch2, CURLOPT_POSTFIELDS, $params2);
            curl_setopt($ch2, CURLOPT_USERPWD, "$this->username:$this->password");

            $dialogNodeResult=curl_exec ($ch2);
            curl_close ($ch2);

            if( isset($intentResult->error) && isset($dialogNodeResult->error) ) {
                return false;
            }

        }
        else {//This means intent already exists

            //Get the current intent details
            $intentEditURL='https://gateway.watsonplatform.net/assistant/api/v1/workspaces/'.$this->workspace.'/intents/'.$intent.'/examples?version=2018-02-16';
            $chUpdatedIntent = curl_init();
            curl_setopt($chUpdatedIntent, CURLOPT_URL, $intentEditURL);
            curl_setopt($chUpdatedIntent, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($chUpdatedIntent, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($chUpdatedIntent, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($chUpdatedIntent, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
            curl_setopt($chUpdatedIntent, CURLOPT_POSTFIELDS, json_encode( (object)array('text' => $example) ) );
            curl_setopt($chUpdatedIntent, CURLOPT_USERPWD, "$this->username:$this->password");
            $updateIntent = json_decode(curl_exec($chUpdatedIntent));
            curl_close($chUpdatedIntent);

            //First check if the dialog is already present or not
            $dialogExistURL='https://gateway.watsonplatform.net/assistant/api/v1/workspaces/'.$this->workspace.'/dialog_nodes/'.$dialog_node.'?version=2018-02-16';
            $chDialogIntent = curl_init();
            curl_setopt($chDialogIntent, CURLOPT_URL, $dialogExistURL);
            curl_setopt($chDialogIntent, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($chDialogIntent, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($chDialogIntent, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($chDialogIntent, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
            curl_setopt($chDialogIntent, CURLOPT_USERPWD, "$this->username:$this->password");
            $dialogExists = json_decode(curl_exec($chDialogIntent));
            curl_close($chDialogIntent);

            if( isset($dialogExists->error) ) {
                $dialogURL='https://gateway.watsonplatform.net/assistant/api/v1/workspaces/'.$this->workspace.'/dialog_nodes?version=2018-02-16';
            }
            else {

                $dialogURL='https://gateway.watsonplatform.net/assistant/api/v1/workspaces/'.$this->workspace.'/dialog_nodes/'.$dialog_node.'?version=2018-02-16';

                $output = isset($dialogExists->output->text->values)?$dialogExists->output->text->values: array($dialogExists->output->text);

                array_push($output, $post['answer']);

                $output = (object)array('text' => (object)array('values' => $output) );//this is the answer

            }


            $params2 = json_encode( array(
                'dialog_node' => $dialog_node,
                'conditions' => $conditions,
                'output' => $output,
                'title' => $dialog_node
            ) );



            $ch2 = curl_init();
            curl_setopt($ch2, CURLOPT_URL, $dialogURL);
            curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch2, CURLOPT_POST, true);
            curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch2, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
            curl_setopt($ch2, CURLOPT_POSTFIELDS, $params2);
            curl_setopt($ch2, CURLOPT_USERPWD, "$this->username:$this->password");

            $dialogNodeResult=curl_exec ($ch2);
            curl_close ($ch2);

            if( isset($dialogExists->error) && isset($dialogNodeResult->error) ) {
                return false;
            }
        }
        return true;
    }


    public function deleteDialog($dialog) {
        $url='https://gateway.watsonplatform.net/assistant/api/v1/workspaces/'.$this->workspace.'/dialog_nodes/'.$dialog.'?version=2018-02-16';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($ch, CURLOPT_USERPWD, "$this->username:$this->password");
        $result = curl_exec($ch);
        curl_close($ch);

        if( isset($result->error) ) {
            return false;
        }
        return true;
    }

}
