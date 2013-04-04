<?php
namespace RESTWork;

class Config
{

    public static $items = [];

    public static function has($key)
    {
        return false;
    }

    public static function get($key)
    {

    }

    public static function set($key, $default = null)
    {

    }

    public static function loadFile($file)
    {
        if(Helpers::fileExists($file) === false) {
            throw new \InvalidArgumentException(sprintf('File [%s] is not found or readable.', $file));
        }

        if(strtolower(pathinfo($file)['extension']) == 'php') {

            $data = require_once $file;

            if(is_array($data) == false
                && $data instanceof \Travsersable == false) {
                throw new \Exception('Supplied file for loading should return an array.');
            }
        }

        static::$items = array_merge(static::$items, $data);
    }

}