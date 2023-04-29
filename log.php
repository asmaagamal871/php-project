<?php
$log_file = 'error.log';

function log_error($message, $file, $line)
{

    $date_time = date('Y-m-d H:i:s');
    $user_ip = $_SERVER['REMOTE_ADDR'];
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $log_message = "$date_time, $user_ip, $user_agent, $message, $file, $line\n";
    file_put_contents(__LOG__FILE__, $log_message, FILE_APPEND);
}

ini_set('error_reporting', E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', $log_file);

function custom_error_handler($errno, $errstr, $errfile, $errline)
{
    switch ($errno) {
        case E_USER_ERROR:
            log_error("Fatal error: $errstr", $errfile, $errline);
            exit(1);
            break;
        case E_USER_WARNING:
            log_error("Warning: $errstr", $errfile, $errline);
            break;
        case E_USER_NOTICE:
            log_error("Notice: $errstr", $errfile, $errline);
            break;
        default:
            log_error("Unknown error: $errstr", $errfile, $errline);
            break;
    }
}

set_error_handler('custom_error_handler');
