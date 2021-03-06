<?php
//c:\etc\phpunit\phpunit.bat
//session_start();
error_reporting(-1);

if (defined('DS') === false) {
    define('DS', DIRECTORY_SEPARATOR);
}

chdir(__DIR__);

define('BASE', realpath('..').DS);
define('APPLICATION_PATH', BASE . 'application' . DS);
define('PUBLIC_PATH', APPLICATION_PATH . 'public'. DS);
define('SYSTEM_PATH', BASE . 'RESTWork' . DS);

require_once realpath('..').DS.'RESTWork'.DS. 'Autoloader.php';
$autoloader = new \RESTWork\Autoloader('RESTWork', BASE);
$autoloader->register();