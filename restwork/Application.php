<?php

namespace RESTWork;

class Application
{

    public static function registerAutoloaders()
    {

    }

    public static function run()
    {
        require_once APPLICATION . 'resources'.DS.'NotesResource.php';

        echo 'Run';
    }

}