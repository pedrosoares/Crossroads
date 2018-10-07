<?php
/**
 * Created by PhpStorm.
 * User: pedrosoares
 * Date: 10/7/18
 * Time: 7:09 PM
 */

namespace App;


class Endpoint {

    public $domain = "";
    public $uri = "";
    public $method = "";
    public $permission = [];

    private static $cache = null;

    /**
     * This is a trick to transform the Json Array into
     * a nice object list, you can change this to a more
     * polished way.
     *
     * @param string $json
     * @return mixed
     */
    public static function parse(string $json) {
        if(!isset(Endpoint::$cache)) {
            $stdobj = json_decode($json);  //JSON to stdClass
            $temp = serialize($stdobj);    //stdClass to serialized

            // Now we reach in and change the class of the serialized object
            $className = Endpoint::class;
            $temp = str_replace('O:8:"stdClass":', 'O:' . strlen($className) . ':"' . $className . '":', $temp);

            // Unserialize and walk away like nothing happend
            Endpoint::$cache = unserialize($temp);
        }
        return Endpoint::$cache;
    }

}