<?php

function debug($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    die();
}

function logged_in($key)
{
    return (get_userdata($key)) ? true : false;
}

function get_userdata($key)
{
    $ci = &get_instance();

    $value = $ci->session->userdata($key);
    return $value ? $value : false;
}

function segment($segment)
{
    $ci = &get_instance();

    $value = $ci->uri->segment($segment);
    return $value;
}

function set_userdata($session_array)
{
    $ci = &get_instance();

    $ci->session->set_userdata($session_array);
}

function set_flash($key, $message)
{
    $ci = &get_instance();

    $ci->session->set_flashdata($key, $message);
}

function flash()
{
    $ci = &get_instance();

    $flash_message = $ci->session->flashdata('msg');

    if($flash_message) : ?>
        <div class="alert alert-info alert-dismissable fade in">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?php echo $flash_message ?>
        </div>
    <?php endif;
}

function frontFlash()
{
    $ci = &get_instance();

    $msg_flash_message = $ci->session->flashdata('msg');
    $error_flash_message = $ci->session->flashdata('error');

    $errorClass = ($msg_flash_message) ? 'alert-success' : 'alert-warning';

    if($msg_flash_message || $error_flash_message) : ?>
        <div class="message-holder">
            <div class="alert <?php echo $errorClass ?>">
                <span class="close right"><i class="mdi-content-clear"></i></span>
                <?php echo $msg_flash_message ? $msg_flash_message : $error_flash_message ?>
            </div>
        </div>
    <?php endif;
}

function get_mac_address()
{
    // Turn on output buffering
    ob_start();
    //Get the ipconfig details using system commond
    system('ipconfig /all');
    // Capture the output into a variable
    $mycom=ob_get_contents();
    // Clean (erase) the output buffer
    ob_clean();
    $findme = "Physical";
    //Search the "Physical" | Find the position of Physical text
    $pmac = strpos($mycom, $findme);
    // Get Physical Address
    $mac=substr($mycom,($pmac+36),17);
    //Display Mac Address
    return $mac;
}

function swiftsend($params)
{
    require_once APPPATH.'third_party/swiftmailer/swift_required.php';

    try {
        if($_SERVER['SERVER_NAME'] === 'localhost') {
            // Create the Transport
            $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
                ->setUsername('satish.localmail@gmail.com')
                ->setPassword('neversaydie');
        } else {
            $transport = Swift_SendmailTransport::newInstance();
        }

        // Create the Mailer using your created Transport
        $mailer = Swift_Mailer::newInstance($transport);

        // Create a message
        $message = Swift_Message::newInstance($params['subject'])
            ->setFrom(array($params['from'] => $params['fromname']))
            ->setTo(array($params['to'] => $params['toname']))
            ->setBody($params['message'], 'text/html');

        // Send the message
        $result = $mailer->send($message);

        return $result;
    } catch(Exception $e) {
        if(ENVIRONMENT == 'development') {
            debug($e);
        } else {
            //redirect();
        }
    }
}

function check_parent_active($children, $current_segment)
{
    foreach($children as $child) {
        if($child->slug == $current_segment) {
            return true;
            die;
        }
    }
}

function get_select($data, $default_value = '', $name_column = '', $id_column = '')
{
    $result = array();
    if(!empty($data)) {
        if($default_value != '')
            $result[''] = $default_value;
        if($name_column == '')
            $name_column = 'name';
        if($id_column == '')
            $id_column = 'id';
        foreach($data as $row) {
            $result[$row->$id_column] = $row->$name_column;
        }
    }
    return $result;
}

function getBrowser($u_agent)
{
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }

    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    }
    elseif(preg_match('/Firefox/i',$u_agent))
    {
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    }
    elseif(preg_match('/Chrome/i',$u_agent))
    {
        $bname = 'Google Chrome';
        $ub = "Chrome";
    }
    elseif(preg_match('/Safari/i',$u_agent))
    {
        $bname = 'Apple Safari';
        $ub = "Safari";
    }
    elseif(preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Opera';
        $ub = "Opera";
    }
    elseif(preg_match('/Netscape/i',$u_agent))
    {
        $bname = 'Netscape';
        $ub = "Netscape";
    }

    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
        ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }

    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }

    // check if we have a number
    if ($version==null || $version=="") {$version="?";}
    $data = array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => ucwords($platform),
        'pattern'    => $pattern
    );
    return $data;
}

function image_thumb($file_path, $width, $height, $class = "", $returnPath = false)
{
    $file_path = urlencode(base_url($file_path));
    $image_tag = '';
    $imagePath = base_url() . 'assets/timthumb/timthumb.php?q=100&amp;src=' . $file_path . "&amp;w=" . $width . "&amp;h=" . $height . "&amp;zc=1'";
    $image_tag .= "<img src='";
    $image_tag .= $imagePath;

    if($returnPath)
        return $imagePath;

    if($class != "" && !is_array($class))
        $image_tag .= $class;
    elseif($class != "" && is_array($class)) {
        foreach($class as $attribute => $property) {
            $image_tag .= $attribute . '="' . $property . '"';
        }
    }
    $image_tag .= " />";

    echo $image_tag;
}

function get_city_name($cities)
{
    $name = 'Kathmandu';
    foreach($cities as  $city) {
        if($city->id == get_userdata('current_city'))
            $name = $city->name;
    }
    return $name;
}

function getYoutubeVideoId($url)
{
    preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $matches);

    return !empty($matches) ? $matches[0] : '';
}

function checkProfileStatus($data)
{
    $profileComplete = true;
    $completion = 0;
    if($data) {
        $compulsoryFields = array(
            'fullName',
            'genderId',
            'dateOfBirth',
            'phoneNumberMobile',
            'emergencyContactFullName',
            'email',
            'emergencyContactPhoneNumber',
            'zoneId',
            'districtId',
            'municipalityId',
            'wardNumber',
            'volunteerType',
            'primaryModeOfCommunication'
        );
        foreach($data as $key => $value) {
            if(in_array($key, $compulsoryFields) && $value == '') {
                $profileComplete = false;
                break;
            }
        }
    } else {
        $profileComplete = false;
    }

    return $profileComplete;
}

function array2wherein($arr)
{
    $string = join(',', $arr);
    $array=array_map('intval', explode(',', $string));
    $array = implode("','",$array);

    return $array;
}

function mySubStr($string, $count)
{
    if (preg_match('/^.{1,'.$count.'}\b/s', $string, $match))
    {
        return trim($match[0]);
    }
    return $string;
}

function passwordHash($password)
{
    // password hashing library for older PHP version
    require APPPATH.'/third_party/password.php';

    $passwordHash = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));
    return $passwordHash;
}

function passwordVerify($passwordPlainText, $passwordHash)
{
    // password hashing library for older PHP version
    require APPPATH.'/third_party/password.php';

    return password_verify($passwordPlainText, $passwordHash) ? true : false;
}

function getHybridAuthConfig()
{
    /**
     * HybridAuth
     * http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
     * (c) 2009-2015, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
     */
    // ----------------------------------------------------------------------------------------
    //	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
    // ----------------------------------------------------------------------------------------

    return
        array(
            "base_url" => base_url('members/sociallogin/process'),
            "providers" => array(
                "Facebook" => array(
                    "enabled" => true,
                    "keys" => array("id" => "934308949957590", "secret" => "6ede848949e1bd8817dc639f1b00c67e"),
                    "trustForwarded" => false,
                    "scope" => "email, public_profile"
                ),
                "Twitter" => array(
                    "enabled" => true,
                    "keys" => array("key" => "73aNVrG8B8n4fwDYMg1JvSyrG", "secret" => "YbBEUos0B0PPeSCi1MoTfPpHozTCgIDIwWShwRH9mv2Ap6hJYr"),
                    "includeEmail" => false
                )
            ),
            // If you want to enable logging, set 'debug_mode' to true.
            // You can also set it to
            // - "error" To log only error messages. Useful in production
            // - "info" To log info and error messages (ignore debug messages)
            "debug_mode" => false,
            // Path to file writable by the web server. Required if 'debug_mode' is not false
            "debug_file" => "",
        );
}

function getaddress($lat, $lng)
{
    $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng=' . trim($lat) . ',' . trim($lng) . '&sensor=false';
    $json = @file_get_contents($url);
    $data = json_decode($json);
    $status = $data->status;
    if ($status == "OK")
        return $data->results[0]->address_components[1]->short_name.' '.$data->results[0]->address_components[3]->short_name ;
    else
        return false;
}

function get_pagination_config($type, $per_page = 4, $segment = 2)
{
    switch($type) {
        case 'blog':
            $config['full_tag_open'] = '<div class="defaultPager clearfix"><ul>';
            $config['full_tag_close'] = '</ul></div>';
            $config['first_link'] = false;
            $config['last_link'] = false;
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = '<span class="invisible992">Previous events</span>';
            $config['prev_tag_open'] = '<a class="arrowLink arrowLeft" href="#">';
            $config['prev_tag_close'] = '</a>';
            $config['next_link'] = '<span class="invisible992">Next events</span>';
            $config['next_tag_open'] = '<a class="arrowLink arrowRightRight" href="#">';
            $config['next_tag_close'] = '</a>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li><a href="#" class="active">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['per_page'] = $per_page;
            $config['uri_segment'] = $segment;
            break;
        case 'events':
            $config['full_tag_open'] = '<div class="defaultPager clearfix"><ul>';
            $config['full_tag_close'] = '</ul></div>';
            $config['first_link'] = false;
            $config['last_link'] = false;
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = '<span class="invisible992">Previous</span>';
            $config['prev_tag_open'] = '<a class="arrowLink arrowLeft" href="#">';
            $config['prev_tag_close'] = '</a>';
            $config['next_link'] = '<span class="invisible992">Next</span>';
            $config['next_tag_open'] = '<a class="arrowLink arrowRightRight" href="#">';
            $config['next_tag_close'] = '</a>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li><a href="#" class="active">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['per_page'] = $per_page;
            $config['uri_segment'] = $segment;
            break;
        default:
            $config['full_tag_open'] = '<div class="defaultPager clearfix"><ul>';
            $config['full_tag_close'] = '</ul></div>';
            $config['first_link'] = false;
            $config['last_link'] = false;
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = '<span class="invisible992">Previous posts</span>';
            $config['prev_tag_open'] = '<a class="arrowLink arrowLeft" href="#">';
            $config['prev_tag_close'] = '</a>';
            $config['next_link'] = '<span class="invisible992">Next posts</span>';
            $config['next_tag_open'] = '<a class="arrowLink arrowRightRight" href="#">';
            $config['next_tag_close'] = '</a>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li><a href="#" class="active">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['per_page'] = $per_page;
            $config['uri_segment'] = $segment;
            break;
    }
    return $config;
}
?>