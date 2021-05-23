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

    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper('api');

        $this->ajax_request_validator();
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
}
