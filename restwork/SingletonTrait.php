<?php namespace RESTWork;
trait SingletonTrait
{
    private static $instance;

    final public static function getInstance()
    {
        return static::$instance instanceof self
            ? static::$instance
            : static::$instance = new static;
    }

    final private function __construct(){}
    final private function __clone(){}
    final private function __wakeup(){}
}