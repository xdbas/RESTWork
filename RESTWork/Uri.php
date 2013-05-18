<?php
namespace RESTWork;

use RESTWork\Http\Request;

class Uri
{

    private static $_uri;

    private static $_segments;

    public static function initialize(Request $request)
    {
        $uri = $request->getURI();
    }

    public function create($url, $ssl, $absolute)
    {

    }

    public function segment($i)
    {

    }

    public function current()
    {

    }

}