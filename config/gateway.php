<?php

return [

    /*
    | This if false will copy the microservice
    | header and return to the user, if false only
    | the Content-Type will be copied.
    */
    "override_header" => true,

    /*
    | If the Microservice not return a Content-Type header
    | this will be used.
    */
    "default_content_type" => "text/html; charset=UTF-8",

];