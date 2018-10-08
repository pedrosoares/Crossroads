<?php

namespace App;


class Endpoint {

    public $domain = "";    // Domain of the Microservice
    public $uri = "";       // Request endpoint
    public $method = "";    // Request method
    public $whitelist = []; // List of IpAddress and Domains Allowed to request
    public $permission = [];// List of Permission required to request


    /**
     * This is a trick to transform the Json Array into
     * a nice object list, you can change this to a more
     * polished way.
     *
     * @param string $json
     * @return mixed
     */
    public static function parse(string $json) {
        $stdobj = json_decode($json);  //JSON to stdClass
        $temp = serialize($stdobj);    //stdClass to serialized

        // Now we reach in and change the class of the serialized object
        $className = Endpoint::class;
        $temp = str_replace('O:8:"stdClass":', 'O:' . strlen($className) . ':"' . $className . '":', $temp);

        // Unserialize and walk away like nothing happend
        return unserialize($temp);
    }

}