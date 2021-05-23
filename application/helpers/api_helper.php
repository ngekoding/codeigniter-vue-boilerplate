<?php

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

function send_response($data, $response_code = HTTP_OK)
{
    http_response_code($response_code);
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

function send_success_response($payload = FALSE)
{
    $data['success'] = TRUE;

    if ($payload !== FALSE) {
        $data['data'] = $payload;
    }

    send_response($data, HTTP_OK);
}

function send_unprocessable_entity($payload = FALSE)
{
    $data['success'] = FALSE;
    $data['error'] = 'Unprocessable Entity';

    if ($payload !== FALSE) {
        $data['data'] = $payload;
    }

    send_response($data, HTTP_UNPROCESSABLE_ENTITY);
}

function send_internal_server_error($error_message = FALSE)
{
    $data['success'] = FALSE;
    $data['error'] = 'Internal Server Error';

    if ($error_message !== FALSE) {
        $data['error'] = $error_message;
    }

    send_response($data, HTTP_INTERNAL_ERROR);
}

function send_bad_request($error_message = FALSE)
{
    $data['success'] = FALSE;
    $data['error'] = 'Bad Request';

    if ($error_message !== FALSE) {
        $data['error'] = $error_message;
    }

    send_response($data, HTTP_BAD_REQUEST);
}
