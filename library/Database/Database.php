<?php

namespace Library\Database;

use Library\HTTP\HttpMethods;
use Library\Interfaces\EmojiInterface;
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
        $response = $this->methods->get('databases', $id);

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

        $response = $this->methods->post('databases', $parent->getPageId(), $data);

        if ($response->getStatusCode() == 201) {
            return $response->getContent();
        }
        throw new \Exception("An error occured, the database was not created");
    }

    public function UpdateDatabase(PageInterface $page, PropertiesObjectInterface $property, bool $archived = null,  EmojiInterface $icon, string $cover = null)
    {

        //check if $icon and $cover are valid Json
        if ($icon != null) {
            if (json_decode($icon->emojiToJson) == null) {
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
        

        $response = $this->methods->patch('databases', $page->getPageId(), $data);

        if ($response->getStatusCode() == 200) {
            return $response->getContent();
        }
        throw new \Exception("An error occured, the database was not updated");
    }

    public function QueryDatabase(string $id, string $filter, string $property, string $direction, int $limit)
    {
        if ($direction != "ascending" && $direction != "descending") {
            throw new \Exception("Invalid direction, the direction should be ascending or descending");
        }
        if ($limit < 0) {
            throw new \Exception("Invalid limit, the limit should be a positive integer");
        }
        $data = [
            'filter' => $filter,
            'sorts' => ['property' => $property, 'direction' => $direction],
            'limit' => $limit
        ];

        $response = $this->methods->post('databases', $id, $data);

        if ($response->getStatusCode() == 200) {
            return $response->getContent();
        }
        throw new \Exception("An error occured, the database was not queried");

    }
}