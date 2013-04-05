<?php
namespace RESTWork;

class Config
{

    /**
     * This static var is used to save config items
     *
     * @var array $items
     * @static
     * @access public
     */
    public static $items = [];

    /**
     * Check if a key is saved in the config class
     *
     * @param mixed $key
     * @static
     * @access public
     * @return bool exists
     */
    public static function has($key)
    {
        return array_key_exists($key, static::$items);
    }

    /**
     * Get a saved item from the config class
     *
     * @param mixed $key
     * @param mixed $default
     * @static
     * @access public
     * @return mixed
     */
    public static function get($key, $default = null)
    {
        return static::has($key)
            ? static::$items[$key]
            : $default;
    }

    /**
     * Save an item in the config class
     *
     * @param mixed $key
     * @param mixed $value
     * @static
     * @access public
     * @return void
     */
    public static function set($key, $value)
    {
        static::$items[$key] = $value;
    }

    /**
     * Load a complete config file to merge with the config class's items.
     * Only support for php files that return an array:
     * <code>
     * <?php
     * return array(
     *      'key' = 'item',
     *      'key2' = [
     *          'key' => 'item'
     *      ]
     * );
     * </code>
     *
     * @param $file
     * @throws \InvalidArgumentException
     * @throws \Exception
     * @static
     * @access public
     * @return void
     */
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