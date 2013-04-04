<?php
namespace RESTWork\Bootstrap;

use RESTWork\Config;
use RESTWork\Http;

class Bootstrap extends AbstractBootstrap
{

    public function _initConfig()
    {
        Config::loadFile(APPLICATION_PATH.'config'.DS.'Application.php');
    }

    public function _initBeforeHttpRequest(){}

    public function _initHttpRequest()
    {
        return  new Http\Request;
    }
}