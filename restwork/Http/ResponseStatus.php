<?php
namespace RESTWork\Http;

class ResponseStatus
{
    public $httpStatusCode;

    public $httpStatusMessage;

    public function __construct($httpStatusCode = 200, $httpStatusMessage = 'OK')
    {
        $this->httpStatusCode    = $httpStatusCode;
        $this->httpStatusMessage = $httpStatusMessage;
    }
}