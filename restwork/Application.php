<?php

namespace RESTWork;

class Application
{

    public static function run() {

        require_once APPLICATION . 'resources'.DS.'NotesResource.php';

        $class = new \NotesResource;
        $class->get();
        $class->put();
        $class->detele();
        $class->options();
        $class->patch();
        $class->post();
        $class->trace();


        echo 'Run';
    }

}