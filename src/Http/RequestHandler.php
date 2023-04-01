<?php
namespace Webtech\Http;

use Webtech\Http\Message\RequestInterface;
use Webtech\Http\Message\ResponseInterface;
use Webtech\Http\Message\ServerRequestInterface;
use Webtech\Http\Server\RequestHandlerInterface;
use Webtech\Http\Response;

//require_once "./Response.php";
//require_once "./Http/Message/ResponseInterface.php";
//require_once "./Http/Message/ServerRequestInterface.php";
//require_once "./Http/Server/RequestHandlerInterface.php";
class RequestHandler implements RequestHandlerInterface {

    public function handle(RequestInterface $request): ResponseInterface
    {
        // Handle the request and return a response
        $response = new ResponseFactory();
        $response = $response->createResponse();
        return $response->withStatus(200);
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // Handle the request using the next middleware in the chain or the final request handler
        return $this->handle($request);
    }
}