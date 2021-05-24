<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
    
    // All method must called by ajax request
    protected $ajax_request_only = TRUE;

    /**
     * Limit method access with middlewares
     * For this example:
     * - index can only accessed by authenticated user (whatever it's role)
     * - show can only accessed by authenticated user with role 'admin'
     * 
     * You can use auth controller to make a login test with spesific role
     * example.com/index.php/api/v1/auth/test-login/admin
     */
    protected $middlewares = [
        ['name' => 'auth'],
        [
            'name' => 'role',
            'behavior' => [
                'type' => 'only', 
                'methods' => ['show']
            ],
            'extras' => [
                'roles' => ['admin']
            ]
        ]
    ];

    // Just example data
    // In the real case, this data from the DB
    private $users = [
        ['id' => 1, 'name' => 'Nur Muhammad'],
        ['id' => 2, 'name' => 'Nabil Muhammad Firdaus'],
        ['id' => 3, 'name' => 'Resqa Dahmurah'],
        ['id' => 4, 'name' => 'Dian Febrianto'],
    ];

    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        return send_success_response($this->users);
	}

    public function show($id)
    {
        $found = array_search($id, array_column($this->users, 'id'));

        if ($found !== FALSE) {
            $user = $this->users[$found];
            return send_success_response($user);
        }

        return send_response([
            'success' => FALSE,
            'error' => 'There is no user with the given ID.'
        ], HTTP_NOT_FOUND);
    }
}
