<?php

namespace Lib\Http;

class Request
{
    private $get;
    private $post;
    private $server;

    public function __construct($get,$post,$server)
    {
        $this->get = $get;
        $this->post = $post;
        $this->server = $server;
    }
    
    public function getGet()
    {
        return $this->get;
    }
    public function getPost()
    {
        return $this->post;
    }

    public function getMethod()
    {
        return $this->server["REQUEST_METHOD"];
    }

    public function getServer()
    {
        return $this->server;
    }

    public function getUri()
    {
        return $this->server["PATH_INFO"] ?? "/";
    }
}