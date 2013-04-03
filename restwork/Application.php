<?php
namespace RESTWork;

class Application
{

    /**
     * This method will load and register a new autoloader for the system
     * multiple autoloader instances may be used.
     */
    public static function registerAutoloaders()
    {
        require_once 'Autoloader.php';
        $autoloader = new Autoloader(__NAMESPACE__, BASE);
        $autoloader->register();
    }

    /**
     * This method will be executed to set up the error handlers
     *
     * @static
     * @access public
     * @return void
     */
    private static function initErrorHandlers()
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

    /**
     * This method will initialize the bootstrap and run all its functions
     * @return \stdClass
     */
    private static function bootstrap()
    {
        $request = new Http\Request;

        return new \stdClass;
    }

    /**
     * @param \stdClass $bootstrap
     */
    public static function dispatch(\stdClass $bootstrap)
    {
        //Add logic
    }

    /**
     * This is the main method of this class, it is used to run an application.
     * @throws \RuntimeException
     */
    public static function run()
    {
        static::initErrorHandlers();
        static::registerAutoloaders();

        if(defined('APPLICATION_PATH') === false
            || defined('SYSTEM_PATH') === false) {
            throw new \RuntimeException ('APPLICATION_PATH And LIBRARY_PATH has to be defined for a stable run.');
        }

        static::dispatch(static::bootstrap());
    }

}