<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    
    const HTTP_OK = 200;
    const HTTP_CREATED = 201;
    const HTTP_NOT_MODIFIED = 304;
    const HTTP_BAD_REQUEST = 400;
    const HTTP_UNAUTHORIZED = 401;
    const HTTP_FORBIDDEN = 403;
    const HTTP_NOT_FOUND = 404;
    const HTTP_METHOD_NOT_ALLOWED = 405;
    const HTTP_NOT_ACCEPTABLE = 406;
    const HTTP_UNPROCESSABLE_ENTITY = 422;
    const HTTP_INTERNAL_ERROR = 500;

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

        $this->ajax_request_validator();
    }

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

        if ($error) self::send_bad_request('Ajax request only!');
    }

    public static function send_response($data, $response_code = self::HTTP_OK)
    {
        http_response_code($response_code);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    public static function send_success_response($payload = FALSE)
    {
        $data['success'] = TRUE;

        if ($payload !== FALSE) {
            $data['data'] = $payload;
        }

        self::send_response($data, self::HTTP_OK);
    }

    public static function send_unprocessable_entity($payload = FALSE)
    {
        $data['success'] = FALSE;
        $data['error'] = 'Unprocessable Entity';

        if ($payload !== FALSE) {
            $data['data'] = $payload;
        }

        self::send_response($data, self::HTTP_UNPROCESSABLE_ENTITY);
    }

    public static function send_internal_server_error($error_message = FALSE)
    {
        $data['success'] = FALSE;
        $data['error'] = 'Internal Server Error';

        if ($error_message !== FALSE) {
            $data['error'] = $error_message;
        }

        self::send_response($data, self::HTTP_INTERNAL_ERROR);
    }

    public static function send_bad_request($error_message = FALSE)
    {
        $data['success'] = FALSE;
        $data['error'] = 'Bad Request';

        if ($error_message !== FALSE) {
            $data['error'] = $error_message;
        }

        self::send_response($data, self::HTTP_BAD_REQUEST);
    }
}
