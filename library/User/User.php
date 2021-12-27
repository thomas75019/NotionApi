<?php

namespace Library\User;

use Library\HTTP\HttpMethods;

class User 
{

    private $method;

    public function __construct()
    {
        $this->method = new HttpMethods();
    }

    public function retrieveUser(string $id)
    {
        $response = $this->method->get('user', $id);

        if (is_array($response))
        {
            return $response;
        }

        return 'Bad request';
    }

    public function retrieveTokensBotUser()
    {
        $response = $this->method->get('user', 'me');

        if (is_array($response))
        {
            return $response;
        }

        return 'Bad request';
    }
}