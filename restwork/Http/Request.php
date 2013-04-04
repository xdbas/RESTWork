<?php namespace RESTWork\Http; defined('DS') or die('No direct script access');

use RESTWork\Helpers;

class Request
{
    private $headers = [];

    public function __construct()
    {
        $this->headers();
    }

    public function headers()
    {
        $_SERVER = Helpers::htmlentitiesArray($_SERVER, true);

        foreach($_SERVER as $key => $value) {
            $this->headers[$key] = $value;
        }
    }

    public function getHeader($key)
    {
        return array_key_exists($key, $this->headers)
            ? $this->headers[$key]
            : null;
    }

    public function getURI()
    {
        return trim(str_replace($this->headers['SCRIPT_NAME'], '', $this->headers['PHP_SELF']), '/');
    }
}