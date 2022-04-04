<?php

namespace Library\Classes;

use Error;
use Library\Interfaces\PropertiesObjectInterface;

class PropertiesClass implements PropertiesObjectInterface
{

    private array $authorizedType = ["title", "rich_text", "number", "select", "multi_select", "date", "people", "files", "checkbox", "url", "email", "phone_number", "formula", "relation", "rollup", "created_time", "created_by", "last_edited_time", "last_edited_by"];
    private string $id;

    private string $type;

    private string $name;


    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function setType(string $type): void
    {
        if (in_array($type, $this->authorizedType)) {
            $this->type = $type;
        }
        
        throw new Error('The type is not authorized, check Notion documentation to get more informations');
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function toJson(): string
    {
        return json_encode([
            'id' => $this->getId(),
            'type' => $this->getType(),
            'name' => $this->getName()
        ]);
    }

}