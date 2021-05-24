<?php 

class Role_middleware {
    
    private $ci;
    private $controller;
    private $extras;

    /**
     * Accepting codeigniter instance & controller
     */
    public function __construct($ci, $controller, $extras)
    {
        $this->ci = $ci;
        $this->controller = $controller;
        $this->extras = $extras;
    }

    public function run()
    {
        $this->ci->load->helper([
            'api',
            'auth'
        ]);

        $allowed_roles = $this->extras['roles'];

        $userdata = userdata();
        $role = $userdata->role ?? NULL;
        
        if (!in_array($role, $allowed_roles)) {
            return send_response([
                'success' => FALSE,
                'error' => 'Sorry, you don\'t have access to this resource.'
            ], HTTP_FORBIDDEN);
        }
    }
}