<?php
namespace RESTWork;

class ErrorHandler
{
    public static function handleException($exception)
    {
        $exceptionMessage = $exception->getMessage();
        $exceptionFile = str_replace(BASE, '', $exception->getFile());
        $exceptionLine = $exception->getLine();
        $exceptionTrace = str_replace(BASE, '', $exception->getTraceAsString());

        $message = sprintf(
            '<strong>%s</strong>: %s <br />File: <strong>%s</strong> (Line: <strong>%s</strong>)<br /><br />%s',
            get_class($exception),
            $exceptionMessage,
            $exceptionFile,
            $exceptionLine,
            $exceptionTrace
        );

        echo '<pre>'.$message.'</pre>';
    }

    public static function handleNormalError($code, $error, $file, $line)
    {
        if(error_reporting() == 0) return;

        static::handleException(new \ErrorException($error, $code, 0, $file, $line));
    }

    public static function handleShutdown()
    {
        $error = error_get_last();

        if($error !== null) {
            extract($error, EXTR_SKIP);
            static::handleException(new \ErrorException($message, $type, 0, $file, $line));
        }
    }
}