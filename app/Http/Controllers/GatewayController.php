<?php

namespace App\Http\Controllers;

use App\Services\RequestService;
use App\Http\Request;
use Illuminate\Http\Response;

class GatewayController extends Controller {

    /**
     * @var RequestService
     */
    private $requestService;

    public function __construct(RequestService $requestService) {
        $this->requestService = $requestService;
    }

    public function get(Request $request) {
        return $this->handler($request, "get");
    }

    public function post(Request $request){
        return $this->handler($request, "post");
    }

    public function put(Request $request){
        return $this->handler($request, "put");
    }

    public function delete(Request $request){
        return $this->handler($request, "delete");
    }

    public function options(Request $request){
        return $this->handler($request, "options");
    }

    public function handler(Request $request, string $method){
        $url = $request->getRouter()->domain."/".$request->path();
        $body = file_get_contents('php://input');
        $headers = $request->headers->all();

        $response = $this->requestService->simpleRequest($method, $url, $body, $headers);

        $httpResponse = new Response($response->getBody()->getContents(), $response->getStatusCode());
        /*foreach ($response->getHeaders() as $key => $header) {
            if(!$httpResponse->headers->has($key)) {
                //$httpResponse->header($key, $header);
            }
        }*/
        return $httpResponse;
    }

}
