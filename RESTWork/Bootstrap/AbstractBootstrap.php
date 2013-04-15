<?php
namespace RESTWork\Bootstrap;

abstract class AbstractBootstrap
{
    protected static $instances = [];

    /**
     * The construction method that handles the class function
     *
     * @access public
     */
    public function __construct()
    {
        $methods = get_class_methods($this);

        foreach ($methods as $key => $value) {
            if (substr(strtolower($value), 0, 5) == '_init') {
                $methodReflection = new \ReflectionMethod($this, $value);
                $returnData = $methodReflection->invoke($this);

                if ($returnData !== null) {
                    $this->addInstance($returnData);
                }
            }
        }
    }

    final protected function addInstance($instance)
    {
        if (array_key_exists(($className = get_class($instance)), static::$instances)) {
            throw new \Exception(sprintf('The instance of class [%s] was already added.', $className));
        }

        static::$instances[$className] = $instance;
    }

    final protected function removeInstance($key)
    {

    }
}