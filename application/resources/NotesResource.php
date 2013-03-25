<?php


//get Collection
//get Element


//localhost/notes/1
class NotesResource
//extends \RESTWork\Resource
{
    public function __construct() {
        //parent::__construct();

        echo 'Constructed';
    }


    public function getCollection()
    {

    }

    public function getElement($id, $fields)
    {
        //$fields = \RESTWork\Request::getField();

    }

}