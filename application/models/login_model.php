<?php

class Login_Model extends My_Model
{
    public function __construct()
    {
        parent::__construct();

        // password hashing library for older PHP version
        require APPPATH . '/third_party/password.php';
    }

    public function validateUser($userData, $returnUserData = '')
    {
        $loginStatus = false;
        $getUser = $this->query("select profilePicture, id, password, email, phoneNumberResidential, fullName from nvp_volunteer where (email = '{$userData['username']}' or phoneNumberResidential = '{$userData['username']}') and status = 'Active'");

        if ($getUser) {
            $res = $getUser[0];
            if (password_verify($userData['password'], $res->password)) {
                set_userdata(array(
                    'active_user' => $res->id,
                    'userType' => 'Volunteer',
                    'userName' => $res->fullName
                ));

                if (strpos($res->profilePicture, 'https') !== false || strpos($res->profilePicture, 'http') !== false) {
                    set_userdata(array(
                        'profilePicture' => $res->profilePicture
                    ));
                } else {
                    set_userdata(array(
                        'profilePicture' => ($res->profilePicture) ? base_url($res->profilePicture) : base_url('assets/img/icon/icon-user-default.png')
                    ));

                    $loginStatus = true;
                }
            } else {
                $getUser = $this->query("select logo, name, id, password, email, phoneNumber from nvp_agency where (email = '{$userData['username']}' or phoneNumber = '{$userData['username']}') and status = 'Active'");
                if ($getUser) {
                    $res = $getUser[0];
                    if (password_verify($userData['password'], $res->password)) {
                        set_userdata(array(
                            'active_user' => $res->id,
                            'userType' => 'Agency',
                            'userName' => $res->name,
                            'profilePicture' => $res->logo
                        ));

                        if (strpos($res->logo, 'https') !== false || strpos($res->logo, 'http') !== false) {
                            set_userdata(array(
                                'profilePicture' => $res->logo
                            ));
                        } else {
                            set_userdata(array(
                                'profilePicture' => ($res->logo) ? base_url($res->logo) : base_url('assets/img/icon/icon-user-default.png')
                            ));
                        }
                        $loginStatus = true;
                    }
                }
            }

            if ($getUser && $returnUserData) {
                if (get_userdata('userType') == 'Volunteer') {
                    $loginStatus = array(
                        'userId' => $getUser[0]->id,
                        'name' => $getUser[0]->fullName,
                        'email' => $getUser[0]->email,
                        'phone' => $getUser[0]->phoneNumberResidential,
                        'profilePicture' => $getUser[0]->profilePicture,
                        'userType' => get_userdata('userType')
                    );
                } else if (get_userdata('userType') == 'Agency') {
                    $loginStatus = array(
                        'userId' => $getUser[0]->id,
                        'name' => $getUser[0]->name,
                        'email' => $getUser[0]->email,
                        'phone' => $getUser[0]->phoneNumber,
                        'profilePicture' => $getUser[0]->profilePicture,
                        'userType' => get_userdata('userType')
                    );
                }
            }

            return $loginStatus;
        }
    }
}