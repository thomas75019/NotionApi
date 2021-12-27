<?php

namespace Library\Database;

use Library\HTTP\HttpMethods;

class Database 
{
    private $methods;

    public function __construct()
    {
        $this->methods = new HttpMethods();
    }
    
    

    public function retrieveDatabase($id)
    {
        $response = $this->methods->get('database', $id);

        if (is_array($response) ){
            return $response;
        }
        return 'Bad request';
    }
}