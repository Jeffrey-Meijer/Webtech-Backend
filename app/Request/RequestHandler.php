<?php

namespace Webtech\Request;

use Webtech\EventDispatcher\EventDispatcher;
use Webtech\EventDispatcher\Events\RequestEvent;
use Webtech\EventDispatcher\ListenerProvider;
use Webtech\Http\Message\RequestInterface;
use Webtech\Http\Message\ResponseInterface;
use Webtech\Http\Server\RequestHandlerInterface;
use Webtech\Response\ResponseFactory;


class RequestHandler implements RequestHandlerInterface
{

    public function handle(RequestInterface $request): ResponseInterface
    {
        $listenerProvider = new ListenerProvider();
        $listenerProvider->addListener("on.request", 'onRequest');
        $eventDispatcher = new EventDispatcher($listenerProvider);
        $requestEvent = new RequestEvent();
        $requestEvent->setRequest($request);
        $eventDispatcher->dispatch($requestEvent);
        $response = new ResponseFactory();
        $response = $response->createResponse();

        return $response->withStatus(200);
    }
}