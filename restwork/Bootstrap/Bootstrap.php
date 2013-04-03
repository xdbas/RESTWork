<?php
namespace RESTWork\Bootstrap;

use RESTWork\Http;

class Bootstrap extends AbstractBootstrap
{
    public function _initHttpRequest()
    {
        return  new Http\Request;
    }
}