<?php

return [

    /*
    | This if false will copy the microservice
    | header and return to the user, if false only
    | the Content-Type will be copied.
    */
    "override_header" => env('OVERRIDE_HEADER', true),

    /*
    | If the Microservice not return a Content-Type header
    | this will be used.
    */
    "default_content_type" => env('DEFAULT_CONTENT_TYPE', "text/html; charset=UTF-8"),

];