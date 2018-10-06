<?php
/**
 * Created by PhpStorm.
 * User: pedrosoares
 * Date: 10/6/18
 * Time: 4:15 PM
 */

namespace App\Services;


use GuzzleHttp\Client;

class RequestService {

    /**
     * @var Client
     */
    protected $client;

    public function __construct(Client $client) {
        $this->client = $client;
    }

    public function request($method, $url, $body = "", $headers = []){
        $res = $this->simpleRequest($method, $url, $body, $headers);
        $bodyContent = $res->getBody()->getContents();
        $contentType = $res->getHeader("Content-Type");
        if(count($contentType) > 0 && $contentType[0] === "application/json"){
            return json_decode($bodyContent, false);
        }
        return $bodyContent;
    }

    public function simpleRequest($method, $url, $body = "", $headers = []){
        return $this->client->request(strtoupper($method), $url, [
            "headers" => $headers,
            "body" => $body,
            'http_errors' => false
        ]);
    }

}