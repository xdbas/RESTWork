RESTWork
========

Simple REST system to build small webservices without a huge framework or system for easy development.


SYSTEM
========

Here is a brief explanation of how certain processes are set-up and called throughout the framework initialization.


1. Enter framework via .htaccess
index.php

Will handle the incoming request and will set up some globals for all paths. It will attempt to call the application.

2. Application::Run()
The main method of the application gets called to intialize and run the system

3. Check system paths, Setup Error handlers and init autoloader
Self explanatory

4. Initialize the config handler and load config files

5. Call bootstrap and call all methods prefixed with '_' in standard order

    5a. _beforeRequest gets called
    Execute user code before the request will be fetched

    5b. _gatherRequest
    Fetch / Gather the HTTP Request send from browser or other client

        - Initialize URI class to handle the Request URI

    5c _beforeRoute
    Execute user code before the uri will be analysed to fit an added route

    5d _analyzeRoute
    Matches the uri to a Route and saves the data