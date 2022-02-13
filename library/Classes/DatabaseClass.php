<?php

namespace Library\Classes;

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


    public function __construct(string $id, string $createdTime, string $lastEditedTime, array $title, $icon, $properties, $parent)
    {
        $this->id = $id;
        $this->createdTime = $createdTime;
        $this->lastEditedTime = $lastEditedTime;
        $this->title = $title;
        $this->icon = $icon;
        $this->properties = $properties;
        $this->parent = $parent;
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

    public function setProperties($properties)
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