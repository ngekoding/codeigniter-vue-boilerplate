<?php

define('AUTH_SESS_NAME', 'app_logged_in');

function set_userdata($data) { 
    $_ci =& get_instance();
    $_ci->session->set_userdata(AUTH_SESS_NAME, $data);
} 

function userdata() { 
    $_ci =& get_instance();

    $userdata = $_ci->session->userdata(AUTH_SESS_NAME);

    return $userdata;
}

function clear_userdata() { 
    $_ci =& get_instance();
    $_ci->session->unset_userdata(AUTH_SESS_NAME);
}
