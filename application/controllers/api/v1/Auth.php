<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('auth');
    }

    public function test_login($role)
    {
        /**
         * Make userdata object as you want
         * For this example, we need a role that will used
         * for role middleware
         */
        $userdata = (object) [
            'id' => 1,
            'name' => 'Nur Muhammad',
            'role' => $role
        ];

        set_userdata($userdata);

        return send_response([
            'success' => TRUE,
            'data' => $userdata
        ]);
    }
}