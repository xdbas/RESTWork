<?php namespace RESTWork\Http; defined('DS') or die('No direct script access');

use RESTWork\Uri;
use RESTWork\SingletonTrait;
class Request
{
    use SingletonTrait;

    private $_url;

    private $_headers = [];

    public function __construct()
    {
        //$this->_url = new Uri;

        $this->headers();
    }

    public function headers()
    {
        foreach($_SERVER as $key => $value) {
            $this->_headers[htmlspecialchars($key, ENT_QUOTES, 'UTF-8')] = $value;
        }
    }

    public function getHeader($key)
    {
        return array_key_exists($key, $this->_headers)
            ? $this->_headers[$key]
            : null;
    }

    public function getURI()
    {
        return trim(str_replace($this->_headers['SCRIPT_NAME'], '', $this->_headers['PHP_SELF']), '/');
    }
}