<?php

namespace Library\Page;

use Library\HTTP\HttpMethods;

class Page 
{
    private $method;

    public function __construct()
    {
        $this->method = new HttpMethods();
    }

    public function retrievePage(string $id) 
    {   
        $response = $this->method->get('page', $id);

        if (is_array($response))
        {
            return $response;
        }

        return 'Bad request';

    }
}