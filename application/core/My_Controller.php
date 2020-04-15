<?php

class My_Controller extends CI_Controller
{

    public $template = '';
    public $data = array();
    public $global_config;
    public $all_child_modules = array();
    public $all_parent_modules = array();

    public function __construct()
    {
        parent::__construct();
        $this->template = BACKENDFOLDER.'//layout/default';

        $this->load->model('module_model', 'module');

        $current_user_role = get_userdata('role_id');

        if($current_user_role && $current_user_role != 1)
            $sql = "SELECT * FROM tbl_module m WHERE m.id IN(SELECT module_id FROM `tbl_role_module` rm WHERE rm.role_id = {$current_user_role})";
        else
            $sql = "SELECT * FROM tbl_module";
        $current_user_modules = $this->module->query($sql);

        $this->data['active_module_id'] = 0;
        foreach($current_user_modules as $parent_module) {
        
            if($parent_module->parent_id == 0) {
                if(segment(2) == $parent_module->slug) {
                    $this->data['active_module_id'] = $parent_module->id;
                    $this->data['active_module_name'] = $parent_module->slug;
                }
                $allowed_module_slugs[] = $parent_module->slug;
                $parent_modules[] = $parent_module;
            }
            foreach($current_user_modules as $child_module) {
                if($parent_module->id == $child_module->parent_id) {
                    if(segment(2) == $child_module->slug) {
                        $this->data['active_module_id'] = $child_module->id;
                        $this->data['active_module_name'] = $child_module->slug;
                    }
                    $allowed_module_slugs[] = $child_module->slug;
                    $child_modules[$parent_module->id][] = $child_module;
                }
            }
        }
        
        $this->data['activeModulePermission'] = $this->checkModulePermission($this->data['active_module_id']);

        if(segment(2) != 'logout' && segment(2) != 'login' && segment(2) != 'dashboard' && segment(2) != 'retrieve-password') {
            if(!$this->data['activeModulePermission']['view']) {
                set_flash('msg', 'Sorry, you don\'t have the necessary permission.');
                redirect(BACKENDFOLDER.'/dashboard');
            }
        }
        $child_modules='';
        $this->all_parent_modules = $parent_modules;
        $this->all_child_modules = $child_modules;

        define('SITENAME', 'Chatbot');
        define('SITEMAIL', 'rojeena@gmail.com');

        $this->data['user_id'] = $current_user_role;
        $this->data['meta_title'] = SITENAME;
        $this->data['show_add_link'] = false;
        $this->data['show_sort_link'] = false;

        // Login check
        $exception_uris = array(
            'login',
            'logout',
            'retrieve-password'
        );
        if (!in_array(segment(2), $exception_uris )) {
            if(!in_array(segment(2), $allowed_module_slugs) && segment(2) != 'dashboard' && $this->data['activeModulePermission']['view'] !=1)  {
                set_flash('msg', 'Sorry, you don\'t have the necessary permission.');
                redirect(BACKENDFOLDER.'/dashboard');
            }
            if (!logged_in('user_id')) {
                redirect(BACKENDFOLDER.'/login');
            }
        } else {
            if(segment(2) != 'social') {
                if (logged_in('user_id') && segment(2) != 'logout') {
                    redirect(BACKENDFOLDER.'/dashboard');
                }
            }
        }
    }

    public function render()
    {
        $this->load->view($this->template, $this->data);
    }

    public function partialRender($view)
    {
        $this->load->view($view, $this->data);
    }

    public function form($id, $module)
    {
        $this->$module->__construct();
        $this->data['body'] = BACKENDFOLDER.'/'.$module.'/_form';

        if($_POST) {
            $this->data[$module] = (object) $_POST;
        } elseif($id != '') {
            $this->data[$module] = $this->$module->get(1, array('id' => $id));
        } else {
            $this->data[$module] = $this->$module;
        }
        if($id == '')
            $this->data['sub_module_name'] = ucwords($module).' Add';
        else
            $this->data['sub_module_name'] = ucwords($module).' Edit';

        $this->render();
    }

    public function changeStatus($module)
    {
        $status = segment(4) == 'InActive' ? 'Active' : 'InActive';
        $id = segment(5);
        $data = array('status' => $status);
        $condition = array('id' => $id);

        return $this->$module->save($data, $condition);
    }

    public function checkModulePermission($module)
    {
        $roleId = get_userdata('role_id');
        // all access to superadmin
        if($roleId == '1') {
            $permission = [
                'add' => true,
                'edit' => true,
                'view' => true,
                'delete' => true
            ];
            return $permission;
        }

        $this->load->model('rolemodule_model', 'rolemodule');

        $permission = [
            'add' => false,
            'edit' => false,
            'view' => false,
            'delete' => false
        ];
        $permissions = $this->rolemodule->get('1', ['module_id' => $module, 'role_id' => $roleId]);

        if($permissions) {
            $permission = [
                'view' => substr($permissions->permission, 0, 1) ? true : false,
                'add' => substr($permissions->permission, 1, 1) ? true : false,
                'edit' => substr($permissions->permission, 2, 1) ? true : false,
                'delete' => substr($permissions->permission, 3, 1) ? true : false,
            ];
        }
        
        return $permission;
    }

    function checkSocialIntegrationStatus($module)
    {
        $moduleData = $this->module->get('1', array('id' => $module));
        $status = ($moduleData && $moduleData->social == 'On') ? true : false;

        return $status;
    }

    function sort()
    {
        $module = segment(2);
        $this->load->model($module . '_model', $module);
        $orderData = $this->input->post();
        if(!empty($orderData)) {
            foreach($orderData['id'] as $order => $id) {
                $order = $order + 1;
                $this->$module->save(array('orderNumber' => $order), array('id' => $id));
            }
        } else {
            $this->data['allDataSort'] = $this->$module->get('', '', 'orderNumber ASC');
            $this->data['modal_title'] = 'Sort Data';
            $this->data['modal_body'] = $this->load->view(BACKENDFOLDER . '/sort/_index', $this->data, true);
            echo $this->load->view(BACKENDFOLDER . '/layout/bootstrap_modal', $this->data, true);
        }
    }

    public function parse_email_template($raw_template, $replace)
    {
        $pattern = '{{%s}}';
        $map = array();
        if($replace) {
            foreach($replace as $var => $value) {
                $map[sprintf($pattern, $var)] = $value;
            }
            $template = strtr($raw_template, $map);
        }
        return $template;
    }

}