<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    
    /**
     * Defining if the request must an ajax request
     * 
     * Boolean: affecting to all methods
     * Array: affecting only the specified methods
     */
    protected $ajax_request_only = FALSE;

    /**
     * Middlewares to manage access
     * 
     * Formatted as an array that contains these keys:
     * - name       Middleware name (required)
     * - behavior   An array of validation behavior. (optional)
     *              Format: ['type' => except or only, 'methods' => [...]]
     *              If empty or not defined, will applied to all methods
     *              except: applied to all methods except the given 
     *              only: applied only to the given methods
     * - extras     Extra paramaters to passing to the run method. (optional)
     */
    protected $middlewares = [];

    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper('api');

        $this->ajax_request_validator();
        $this->run_middlewares();
    }

    /**
     * Checking if the current requested method 
     * must be called by ajax
     */
    private function ajax_request_validator()
    {
        $error = FALSE;
        $is_ajax_request = $this->input->is_ajax_request();

        if ($this->ajax_request_only === TRUE && !$is_ajax_request) {
            $error = TRUE;
        } elseif (is_array($this->ajax_request_only)) {
            // Make checking with case insensitive
            $ajax_request_only = array_map('strtolower', $this->ajax_request_only);

            // Get current requested method
            $requested_method = $this->router->fetch_method();

            if (!$is_ajax_request &&
                !empty($ajax_request_only) && 
                in_array(strtolower($requested_method), $ajax_request_only)
            ) {
                $error = TRUE;
            }
        }

        if ($error) send_bad_request('Ajax request only!');
    }

    /**
     * Run middlewares validation
     */
    private function run_middlewares()
    {
        foreach ($this->middlewares as $middleware) {
            $name = $middleware['name'];
            $behavior = isset($middleware['behavior'])
                        ? $middleware['behavior'] 
                        : NULL;
            $extras = isset($middleware['extras'])
                        ? $middleware['extras'] 
                        : [];

            $run = TRUE;
            if (!empty($behavior)) {
                $type = $behavior['type'];
                $methods = $behavior['methods'];

                // Get current requested method
                $requested_method = $this->router->fetch_method();

                if ($type == 'except' && in_array($requested_method, $methods)) {
                    $run = FALSE;
                } elseif ($type == 'only' && !in_array($requested_method, $methods)) {
                    $run = FALSE;
                }
            }

            if ($run) {
                $class_name = ucfirst(strtolower($name)) . '_middleware'; 
                $file_name = $class_name . '.php';
                $file_path = APPPATH . 'middlewares/' . $file_name;
                if (file_exists($file_path)) {
                    require $file_path;
                    $ci =& get_instance();
                    $obj = new $class_name($ci, $this, $extras);
                    $obj->run();
                } else {
                    if (ENVIRONMENT == 'development') {
                        throw new Exception('Unable to find middleware: ' . $file_name);
                    } else {
                        throw new Exception('Sorry something went wrong.');
                    }
                }
            }
        }
    }
}
