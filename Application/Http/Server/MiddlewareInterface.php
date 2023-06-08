<?php

namespace app\Application\Http\Server;

interface MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface;

}