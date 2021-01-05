<?php

namespace SuperAdmin\Middleware;

use Cake\Http\Cookie\Cookie;
use Cake\I18n\Time;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Server\MiddlewareInterface;

class SuperAdminMiddleware implements MiddlewareInterface
{
    public function process(
        ServerRequestInterface $request,
        RequestHandlerInterface $handler
    ): ResponseInterface
    {
        // Calling $handler->handle() delegates control to the *next* middleware
        // In your application's queue.
        $response = $handler->handle($request);
        $identity = $request->getAttribute('identity');
        if($identity){
            if($identity->get('role') !=1){
                dd("You Are not authorized");
            }   
        }

        return $response;
    }
}