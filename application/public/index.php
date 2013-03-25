<?php
session_start();
error_reporting(-1);

if (defined('DS') === false) {
    define('DS', DIRECTORY_SEPARATOR);
}

chdir(__DIR__);

define('BASE', realpath('..'.DS.'..').DS);
define('APPLICATION', BASE . 'application' . DS);
define('SYSTEM', BASE . 'restwork' . DS);

require_once SYSTEM.'application.php';
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