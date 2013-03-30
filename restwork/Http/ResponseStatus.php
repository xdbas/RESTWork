<?php namespace RESTWork\Http; defined('DS') or die('No direct script access');


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