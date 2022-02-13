<?php

namespace Library\Classes;

use Library\Interfaces\PropertiesObjectInterface;
use Library\Classes\ParentClass;
use DateTime;

class Database {
    private string $object = "database";

    private string $id;

    private string $createdTime;

    private string $lastEditedTime;

    private array $title;

    private $icon;

    private object $properties;

    private object $parent;

    private string $url;


    public function __construct(string $id, string $createdTime, string $lastEditedTime, array $title, $icon, PropertiesObjectInterface $properties, $parent)
    {

        if (preg_match('/^[0-9A-F]{8}-[0-9A-F]{4}-4[0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i', $id))
        {
            $this->id = $id;
        } else {
            throw new \Exception("Invalid ID, the ID should be a valid UUID");
        }
        
        if ((DateTime::createFromFormat('Y-m-d\TH:i:s.u\Z', $createdTime) && DateTime::createFromFormat('Y-m-d\TH:i:s.u\Z', $lastEditedTime))!== false) {
            $this->createdTime = $createdTime;
            $this->lastEditedTime = $lastEditedTime;
        } else {
            throw new \Exception("Invalid date, the date should be a valid date");
        }

        $this->title = $title;
        $this->icon = $icon;
        $this->properties = $properties;

        if ($parent instanceof ParentClass) {
            $this->parent = $parent;
        } else {
            throw new \Exception("Invalid parent, the parent should be a valid parent or a workspace parent");
        }
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getCreatedTime(): string
    {
        return $this->createdTime;
    }

    public function getLastEditedTime(): string
    {
        return $this->lastEditedTime;
    }

    public function getTitle(): array
    {
        return $this->title;
    }

    public function getIcon()
    {
        return $this->icon;
    }

    public function getProperties()
    {
        return $this->properties;
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setId(string $id)
    {
        $this->id = $id;
    }

    public function setCreatedTime(string $createdTime)
    {
        if (DateTime::createFromFormat('Y-m-d H:i:s', $createdTime) !== false) {
            $this->createdTime = $createdTime;
        }
    }

    public function setLastEditedTime(string $lastEditedTime)
    {
        if (DateTime::createFromFormat('Y-m-d H:i:s', $lastEditedTime) !== false) {
            $this->lastEditedTime = $lastEditedTime;
        }
    }

    public function setTitle(array $title)
    {
        $this->title = $title;
    }

    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    public function setProperties(string $properties)
    {
        $this->properties = $properties;
    }

    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    public function setUrl(string $url)
    {
        $this->url = $url;
    }


}