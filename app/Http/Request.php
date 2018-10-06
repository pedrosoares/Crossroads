<?php
/**
 * Created by PhpStorm.
 * User: pedrosoares
 * Date: 10/6/18
 * Time: 4:48 PM
 */

namespace App\Http;


class Request extends \Illuminate\Http\Request {

    private $router;

    public function __construct(array $query = array(), array $request = array(), array $attributes = array(), array $cookies = array(), array $files = array(), array $server = array(), $content = null) {
        parent::__construct($query, $request, $attributes, $cookies, $files, $server, $content);
    }

    public function addRouter($router){
        $this->router = $router;
    }

    public function getRouter(){
        return $this->router;
    }

    /**
     * @return array
     */
    public function getRouteParams() {
        $route = call_user_func($this->getRouteResolver());
        return $route ? $route[2] : [];
    }

}