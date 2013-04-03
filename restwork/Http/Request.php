<?php namespace RESTWork\Http; defined('DS') or die('No direct script access');

use RESTWork\Uri;
use RESTWork\SingletonTrait;
class Request
{
    private $headers = [];

    public function __construct()
    {
        $this->headers();
    }

    public function headers()
    {
        foreach($_SERVER as $key => $value) {
            $this->headers[htmlspecialchars($key, ENT_QUOTES, 'UTF-8')] = $value;
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