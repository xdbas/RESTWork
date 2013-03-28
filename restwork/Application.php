<?php namespace RESTWork;

class Application
{

    public static function registerAutoloaders()
    {

    }

    /**
     * This method will be executed to set up the error handlers
     *
     * @static
     * @access public
     * @return void
     */
    public static function initErrorHandlers()
    {
        set_exception_handler(function($e)
        {
            require_once 'ErrorHandler.php';
            ErrorHandler::handleException($e);
        });

        set_error_handler(function($code, $error, $file, $line)
        {
            require_once 'ErrorHandler.php';
            ErrorHandler::handleNormalError($code, $error, $file, $line);
        });

        register_shutdown_function(function()
        {
            require_once 'ErrorHandler.php';
            ErrorHandler::handleShutdown();
        });
    }

    public static function run()
    {
        static::initErrorHandlers();

        if(defined('APPLICATION_PATH') === false
            || defined('SYSTEM_PATH') === false) {
            throw new \RuntimeException ('APPLICATION_PATH And LIBRARY_PATH has to be defined for a stable run.');
        }

//        require_once APPLICATION_PATH . 'resources'.DS.'NotesResource.php';
        echo 'END App';
    }

}