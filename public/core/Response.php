<?php

namespace MvcLearning\public\core;

class Response
{
    public function setStatusCode(int $code) : void
    {
        http_response_code($code);
    }
}