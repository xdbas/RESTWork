<?php
session_start();
error_reporting(-1);

if (defined('DS') === false) {
    define('DS', DIRECTORY_SEPARATOR);
}

chdir(__DIR__);

define('BASE', realpath('.').DS);
define('APPLICATION', BASE . 'application' . DS);
define('SYSTEM', BASE . 'restwork' . DS);

require_once SYSTEM.'application.php';
\RESTWork\Application::run();

