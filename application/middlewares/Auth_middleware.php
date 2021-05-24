<?php 

class Auth_middleware {
    
    private $ci;
    private $controller;
    private $extras;

    /**
     * Accepting codeigniter instance, current controller & extras
     */
    public function __construct($ci, $controller, ...$extras)
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

        if (empty(userdata())) {
            return send_response([
                'success' => FALSE,
                'error' => 'Login required!'
            ], HTTP_UNAUTHORIZED);
        }
    }
}