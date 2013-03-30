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

    private static function bootstrap()
    {
        //Replace to bootstrap file with hooks
        require_once SYSTEM_PATH . 'SingletonTrait.php';
        require_once SYSTEM_PATH . 'Uri.php';

        require_once SYSTEM_PATH . 'Http' . DS. 'Request.php';
        $request = Http\Request::getInstance();
        $request->getURI();

        require_once SYSTEM_PATH . 'Http' . DS. 'Response.php';
        $response = Http\Response::getInstance();
        $response->setBody('END App');
        $response->outPutStatus();

        return new \stdClass;
    }

    public static function dispatch(\stdClass $bootstrap)
    {
        //Add logic
    }

    public static function run()
    {
        static::initErrorHandlers();

        if(defined('APPLICATION_PATH') === false
            || defined('SYSTEM_PATH') === false) {
            throw new \RuntimeException ('APPLICATION_PATH And LIBRARY_PATH has to be defined for a stable run.');
        }

        static::dispatch(static::bootstrap());
    }

}