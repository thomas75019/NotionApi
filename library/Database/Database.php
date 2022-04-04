<?php

namespace Library\Database;

use Library\HTTP\HttpMethods;
use Library\Interfaces\PropertiesObjectInterface;
use Library\Interfaces\ParentInterface;
use Library\Interfaces\PageInterface;

class Database 
{
    private $methods;

    public function __construct()
    {
        $this->methods = new HttpMethods();
    }

    public function retrieveDatabase(string $id)
    {
        $response = $this->methods->get('database', $id);

        if (is_array($response) ){
            return $response;
        }
        return 'Bad request';
    }

    public function CreateDatabase(ParentInterface $parent, PropertiesObjectInterface $property, string $title = null)
    {
        $data = [
            'id' => $parent->getPageId(),
            'created_time' => date('Y-m-d\TH:i:s.u\Z'),
            'last_edited_time' => date('Y-m-d\TH:i:s.u\Z'),
            'title' => $title,
            'property' => $property->toJson()
        ];

        $response = $this->methods->post('database', $parent->getPageId(), $data);

        if ($response->getStatusCode() == 201) {
            return $response->getContent();
        }
        throw new \Exception("An error occured, the database was not created");
    }

    public function UpdateDatabase(PageInterface $page, PropertiesObjectInterface $property, bool $archived = null,  string $icon = null, string $cover = null)
    {

        //check if $icon and $cover are valid Json
        if ($icon != null) {
            if (json_decode($icon) == null) {
                throw new \Exception("Invalid icon, the icon should be a valid Json");
            }
        }
        if ($cover != null) {
            if (json_decode($$cover) == null) {
                throw new \Exception("Invalid cover, the cover should be a valid Json");
            }
        }

        $data = [
            'page_id' => $page->getPageId(),
            'property' => $property->toJson(),
            'archived' => $archived,
            'icon' => $icon,
            'cover' => $cover
        ];
        

        $response = $this->methods->patch('database', $page->getPageId(), $data);

        if ($response->getStatusCode() == 200) {
            return $response->getContent();
        }
        throw new \Exception("An error occured, the database was not updated");
    }
}