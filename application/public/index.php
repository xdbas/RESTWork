<?php
session_start();
error_reporting(-1);

if (defined('DS') === false) {
    define('DS', DIRECTORY_SEPARATOR);
}

chdir(__DIR__);

define('PUBLIC_PATH', realpath('.').DS);
define('BASE', realpath('..'.DS.'..').DS);
define('APPLICATION_PATH', BASE . 'application' . DS);
define('SYSTEM_PATH', BASE . 'RESTWork' . DS);

require_once SYSTEM_PATH.'application.php';
\RESTWork\Application::run();



/**
 * Request
 * Router
 * Resource
 * Response
 *
 * Hooks
 *
 * -->beforeRequest()
 * -->request()
 *
 * -->beforeRouter()
 * -->router();
 *
 * -->beforeResource()
 * -->resource()
 * -->afterResource()
 *
 * -->response()
 */

/**
 * Models
 * -->PDO
 * -->MySQLi
 * -->Doctrine
 * -->fileWriter/Reader
 * -->jsonWriter/Reader
 */
/**
 * Representation
 *
 * -->json
 * -->xml
 */
/**
 * classes:
 *
 * Input
 *
 */